<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentJoinToCourse extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Tambahkan properti $data untuk digunakan di view

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data; // Simpan data yang dikirim ke properti $data
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ada Siswa yang Masuk ke Kelas Anda!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.studentJoinToCourse',
            with: ['data' => $this->data]  
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
