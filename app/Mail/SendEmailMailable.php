<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    protected $senderTitle;
    protected $senderMail;
    protected $userMail;
    protected $title;
    protected $data;
    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('deneme İsim','deeneemee@gmail.com');
    }
}
