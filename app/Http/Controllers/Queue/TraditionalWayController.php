<?php

namespace App\Http\Controllers\Queue;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\Queue\SendEmailToUser;
use App\Http\Controllers\Controller;
use App\Mail\Queue\SendEmailToAdmin;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Queue\StoreUserRequest;

class TraditionalWayController extends Controller
{
    public function storeUser(StoreUserRequest $request)
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
        
        Mail::to($user->email)->send(new SendEmailToUser($user_mail_data));

        $last_10_users = User::orderBy('id', 'desc')->limit(10)->get();

        if(count($last_10_users) > 0){

            Mail::to('md.mridulislam12345@gmail.com')->send(new SendEmailToAdmin($last_10_users));
        }

        return redirect()->back()->with('success', 'Registration Successful, Check Your Email');
    }
}
