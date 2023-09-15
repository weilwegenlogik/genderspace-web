<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GlobalMessage;
use App\Models\User;

class GlobalMessageController extends Controller
{

    public function unsubscribeFromMessage(GlobalMessage $message)
    {
        auth()->user()->unsubscribedMessages()->attach($message);
    
        // Redirect back or return a response.
        return back();
    }
    

}
