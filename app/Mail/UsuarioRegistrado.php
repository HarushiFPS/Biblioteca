<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User; // <-- Importante

class UsuarioRegistrado extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Variable pública para usarla en la vista

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '¡Bienvenido a NEXUS Biblioteca!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.bienvenida', // Apuntamos a esta vista
        );
    }

    public function attachments(): array
    {
        return [];
    }
}