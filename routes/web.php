<?php

use App\Http\Controllers\GlobalMessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\GlobalMessage;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('voice')->group(function () {
    Route::get('/overview', function () {
        return view('voice.voice');
    })->name('voice');

    Route::get('/training/words', function () {
        return view('voice.training.words');
    })->name('voice.training.words');
});

Route::prefix('progress')->group(function () {
    Route::get('/overview', function () {
        return view('progress.progress');
    })->name('progress');

    Route::get('/hrt-tracker', function () {
        return view('progress.hrttracker');
    })->name('progress.hrttracker');

    Route::get('/bloodtests', function () {
        return view('progress.bloodtests');
    })->name('progress.bloodtests');
});

Route::get('/community', function () {
    return view('community');
})->middleware(['auth'])->name('community');

Route::get('/bot', function () {
    return view('bot');
})->middleware(['auth'])->name('bot');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth'])->name('admin');

Route::post('/global-messages', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'icon' => 'required|string', // assuming only png icons
        'type' => 'required|string',
    ]);

    

    // Save the message to the database
    GlobalMessage::create([
        'title' => $data['title'],
        'body' => $data['body'],
        'icon' => $data['icon'], // only store the filename
        'type' => $data['type'],
    ]);

    return back()->with('success', 'Message created!');
})->name('global-messages.store')->middleware('auth');

Route::get('/unsubscribe-message/{message}', [GlobalMessageController::class, 'unsubscribeFromMessage'])->name('unsubscribe.message');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});