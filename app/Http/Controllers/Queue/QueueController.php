<?php

namespace App\Http\Controllers\Queue;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Queue\StoreUserRequest;
use App\Jobs\SendMailJob;
use App\Jobs\SendOtpJob;
use App\Mail\Queue\SendEmailToAdmin;
use App\Mail\Queue\SendEmailToUser;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Mail;

class QueueController extends Controller
{
    
    public function queueStoreUser(StoreUserRequest $request)
    {
        $user_name  = $request->name;
        $user_email = $request->email;

        $user = User::create([
            'name'  => $user_name,
            'email' => $user_email,
        ]);

        $user_mail_data = [
            'name' => $user->name,
            'email' => $user->email
        ];

        for($i=0; $i<10; $i++){

            dispatch(new SendMailJob($user, $user_mail_data));
        }
        
        return redirect()->back()->with('success', 'Registration Successful, Check Your Email');
    }







    public function sendOtp()
    {
        dispatch(new SendOtpJob)->onQueue('high');

        return redirect()->back()->with('success', 'Otp Sent Successfully, Check your Email.');
    }




}// End of class
