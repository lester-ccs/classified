<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Listing;
use App\User;

class ListingShared extends Mailable
{
    use Queueable, SerializesModels;

    public $listing;

    public $sender;

    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     * @param $listing
     * @param user
     * @param body
     */
    public function __construct(Listing $listing, User $sender, $body = null)
    {
        $this->listing = $listing;
        $this->sender = $sender;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('email.listing.shared.message')
            ->subject("{$this->sender->name} shared a listing with you.")
            ->from('support@classified.com');
    }
}
