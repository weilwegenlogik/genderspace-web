<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information. yes
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        Log::info('Function: update called.');
        Log::info('Request Data:', $request->all());

        // Read the forbidden words from the CSV file
        $forbiddenWords = File::get(base_path('wordlist.csv'));
        $forbiddenWordsArray = explode(PHP_EOL, $forbiddenWords);

        // Validate the request for the "global_name" field as required and filter for forbidden words
        $request->validate([
            'global_name' => [
                
                function ($attribute, $value, $fail) use ($forbiddenWordsArray) {
                    // Check if the input contains any forbidden words
                    foreach ($forbiddenWordsArray as $word) {
                        if (stripos($value, trim($word)) !== false) {
                            $fail("The display name contains a forbidden word.");
                        }
                    }
                },
            ],
        ]);

        Log::info('Validation passed for updating profile.');


        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        Log::info('Profile updated successfully.');


        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
