<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    //variabile contenente i dati per la view
    public $lead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_lead) //non è la stessa variabile!! ma la convenzione vuole che il nome del parametro passato sia lo stesso nome preceduto da underscore
    {
        $this->lead= $_lead; //passo i dati in modo tale che la view possa vederli (messi dentro pubblic lead)
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */

    //definiamo oggetto del messaggio e indirizzo di risposta
    public function envelope()
    {
        return new Envelope(
            replyTo: $this->lead->address, //campo email
            subject: 'New Contact',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */

     //corpo della mail, messaggio, cioc he ci mostrerà la mail
    public function content()
    {
        return new Content(
            view: 'mail.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
