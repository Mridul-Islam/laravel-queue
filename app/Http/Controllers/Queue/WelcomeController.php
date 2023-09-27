<?php

namespace App\Http\Controllers\Queue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    public function queueSendEmailForm()
    {
        return view('queue.files.queue-send-email-form');
    }



}// End of class
