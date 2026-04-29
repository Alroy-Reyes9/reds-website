<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $data) {}

    public function envelope(): Envelope
    {
        $replyTo = [];
        if (!empty($this->data['email'])) {
            $replyTo[] = new Address($this->data['email'], $this->data['name']);
        }

        return new Envelope(
            replyTo: $replyTo,
            subject: 'New Inquiry [' . $this->data['service'] . '] from ' . $this->data['name'],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'mail.contact-inquiry');
    }

    public function attachments(): array
    {
        return [];
    }
}
