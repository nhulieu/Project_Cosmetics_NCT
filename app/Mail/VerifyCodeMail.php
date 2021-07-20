<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailParam;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $emailParam = $data;
        //dd($emailParam);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('NCT Cosmetic: Verification Code')
            ->view('mail.change_password')
            ->text("mail.change_password_plain");
    }
}
