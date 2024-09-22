<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
class ComposeEmailMail extends Mailable
{
    use Queueable, SerializesModels;

    public $save;

    function __construct($save)
    {
        $this->save = $save;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

     public function build()
     {
         return $this->markdown('email.compose_email_email')
                        ->subject(config('app.name').', New Mail Send');
     }
}

