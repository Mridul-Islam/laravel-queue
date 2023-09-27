<?php

namespace App\Jobs;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class TransferAmountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $amount;

    /**
     * Create a new job instance.
     */
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if($this->amount > 500){
            throw new Exception('Money Transfer fail.');
        }

        echo "BDT " . $this->amount . ' Transfered Successfully.';
    }


    public function failed($exception)
    {
        Mail::send([], [], function($msg){
            $msg->to('admin@mridul.com')
            ->subject('Money Transfer Failed')
            ->html('Hi, Your Money Transfer Failed');
        });
    }




}// End of class
