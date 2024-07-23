<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use illuminate\Mail\Mailables\Address;
class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Create a new message instance.
     */
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('includes.contact')
                    ->with('data', $this->data);
    }


    /**
     * Get the message envelope.
      */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         from: new Address('nour@gmail', 'private'),
    //         subject: 'complain',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'emails.contact',
           
            
    //     );
    

    
    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }

    
}
