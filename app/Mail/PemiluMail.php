<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PemiluMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;


    /**
     * Create a new message instance.
     *
     * @param  array  $details
     * @return void
     */
    public function __construct(array $details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Token Pemilihan | Pemilu HIMATIF 2024')
                    ->markdown('emails.pemilu');
    }
}
