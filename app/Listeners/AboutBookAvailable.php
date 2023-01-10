<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\NotifyMe;
use App\Models\Book;

use App\Events\MessageSender;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailBookAvailable;

class AboutBookAvailable
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(MessageSender $event)
    {
        $bookName = Book::find($event->UserInfo->book_id)->first();

        if($event->UserInfo->notify_via == 'email'){

            // Tested
            Mail::to($event->UserInfo->source)->send( new MailBookAvailable($bookName->name) );

        }
        else if($event->UserInfo->notify_via == 'whatsapp'){
            
            $whatsapp = 'api';
            // Integration with Whatsapp
        }
        else if($event->UserInfo->notify_via == 'telegram'){
            
            $telegram = 'api';
            // Integration with Telegram
        }
        else if($event->UserInfo->notify_via == 'messenger'){
            
            $messenger = 'api';
            // Integration with Facebook Messenger
        }

    }
}
