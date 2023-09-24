<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CarBooked extends Mailable
{
    use Queueable, SerializesModels;

    private $car;
    private $booking;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Car $car, Booking $booking)
    {
        $this->car = $car;
        $this->booking = $booking;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Car Rented',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content('emails.car-booked');
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
