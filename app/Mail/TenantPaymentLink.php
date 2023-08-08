<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TenantPaymentLink extends Mailable
{
    use Queueable, SerializesModels;
    public $tenant;
    public $expired_date;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tenant, $expired_date)
    {
        //
        $this->tenant = $tenant;
        $this->expired_date = $expired_date;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Final Step: Confirm Order',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.tenant_payment_link',
            with: [
                'tenant' => $this->tenant,
                'expired_date' => $this->expired_date,
            ],
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
