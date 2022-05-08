<?php

namespace App\Listeners;

use App\Events\DiscountCodeCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendDiscountCreatedNotificationToBrand
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
     * @param  \App\Events\DiscountCodeCreated  $event
     * @return void
     */
    public function handle(DiscountCodeCreated $event)
    {
        /**
         * Can send to webhook notification
         */
        logger('New discount created');
        logger($event->discount->toArray());
    }
}
