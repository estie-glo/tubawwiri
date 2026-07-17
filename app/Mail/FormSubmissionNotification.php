<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmissionNotification extends Mailable
{
    use Queueable, SerializesModels;

    public string $formTitle;
    public array $fields;

    /**
     * @param string $formTitle Titre affiché dans l'email (ex: "Nouveau message de contact")
     * @param array $fields Paires label => valeur à afficher dans le tableau récapitulatif
     */
    public function __construct(string $formTitle, array $fields)
    {
        $this->formTitle = $formTitle;
        $this->fields = $fields;
    }

    public function build()
    {
        return $this
            ->subject('[TUBAWWIRI] ' . $this->formTitle)
            ->view('emails.form-submission');
    }
}
