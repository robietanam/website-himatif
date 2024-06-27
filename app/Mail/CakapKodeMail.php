<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CakapKodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $termsFilePath;


    /**
     * Create a new message instance.
     *
     * @param  array  $details
     * @return void
     */
    public function __construct(array $details, $termsFilePath)
    {
        $this->details = $details;
        $this->termsFilePath = $termsFilePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Kode Reedem CakapxHimatif')
                    ->markdown('emails.cakapkode')
                    ->attach($this->termsFilePath, [
                        'as' => 'TermsAndConditions.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}
