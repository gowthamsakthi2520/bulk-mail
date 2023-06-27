<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SendQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $details;
    public $timeout = 7200;
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        
        $data =array('gowtham.vnrk@gmail.com','gowthamsakthi2520@gmail.com');
      
        $input['subject'] = $this->details['subject'];
       
        foreach ($data as  $value) {

           
            $input['email'] = $value;
          
            Mail::send('bulkmailer',['detail'=>$input], function($message) use($input){
                $message->to($input['email'])
                    ->subject($input['subject']);
            });
          
        }


    }
}