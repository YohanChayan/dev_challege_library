<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailBookAvailable extends Mailable
{
    use Queueable, SerializesModels;

    public $book;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookName)
    {
        $this->book = $bookName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.book-available')->with('book', $this->book);
    }
}
