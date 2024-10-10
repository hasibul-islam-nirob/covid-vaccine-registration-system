<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VaccinationReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $scheduledDate;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $scheduledDate)
    {
        $this->user = $user;
        $this->scheduledDate = $scheduledDate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'COVID Vaccination Reminder',
            from: new Address('nirob.contact@gmail.com', 'COVID Vaccination Reminder'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.vaccination_reminder',
            // with: [
            //     'user' => $this->user,
            //     'scheduledDate' => $this->scheduledDate,
            // ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
