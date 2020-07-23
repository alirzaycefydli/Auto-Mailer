<?php

namespace App\Jobs;

use App\Mail\SendEmailMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $senderTitle;
    protected $senderMail;
    protected $userMail;
    protected $title;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($senderMail,$senderTitle,$userMail,$title,$data)
    {
        $this->senderMail = $senderMail;
        $this->senderTitle = $senderTitle;
        $this->userMail = $userMail;
        $this->title = $title;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send([],[],function ($message){
            $message->from($this->senderMail,$this->senderTitle);
            $message->to($this->userMail);
            $message->subject($this->title);
            $message->setBody($this->data,'text/html');
        });
    }
}
