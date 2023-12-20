<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Messages;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
class MessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
       
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {  
       
        $message = $this->message;
        $msg = Messages::find($message->id);
        $user  = User::find($message->user_id);
        // echo '<pre>';
        // print_r($msg);exit; 
        return $this->subject('New building message from condeto')->view('emails.condeto_message',compact('msg','user'));
    }
}
