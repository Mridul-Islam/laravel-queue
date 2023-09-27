<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Mail\Queue\SendEmailToUser;
use App\Mail\Queue\SendEmailToAdmin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $user_mail_data;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $user_mail_data)
    {
        $this->user = $user;
        $this->user_mail_data = $user_mail_data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new SendEmailToUser($this->user_mail_data));

        $last_10_users = User::orderBy('id', 'desc')->limit(10)->get();

        if(count($last_10_users) > 0){

            Mail::to('md.mridulislam12345@gmail.com')->send(new SendEmailToAdmin($last_10_users));
        }
    }
}
