<?php

namespace App\Http\Controllers\Queue;

use App\Models\User;
use Faker\Guesser\Name;
use App\Jobs\SendOtpJob;
use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use App\Jobs\TransferAmountJob;
use Illuminate\Support\Facades\DB;
use App\Mail\Queue\SendEmailToUser;
use App\Http\Controllers\Controller;
use App\Mail\Queue\SendEmailToAdmin;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Queue\StoreUserRequest;

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




    // Transfer Money Form
    public function transferMoneyForm()
    {
        return view('queue.files.transfer-money-form');
    }



    // Store Transfer Money
    public function storeTransferMoney(Request $request)
    {
        $transfer_amount = $request->transfer_amount;

        dispatch(new TransferAmountJob($transfer_amount));

        return redirect()->back()->with('success', 'Transfer Money, Please Wait.');
    }




}// End of class
