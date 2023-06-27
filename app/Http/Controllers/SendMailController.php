<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Jobs\SendQueueEmail;


class SendMailController extends Controller
{
    public function sendMail(Request $request)
    {
    	$details = [
    		'subject' => 'Bulk Mail Notification'
    	];
    	
        $job = (new SendQueueEmail($details)); 

        dispatch($job);
        return "Mail send successfully !!";
    }

}
