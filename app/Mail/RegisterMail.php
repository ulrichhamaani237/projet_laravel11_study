<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;



class RegisterMail extends Mailable
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
        return $this->markdown('admin.email.register_email')
                        ->subject(config('app.name').', Register Mail Password set');
    }
}