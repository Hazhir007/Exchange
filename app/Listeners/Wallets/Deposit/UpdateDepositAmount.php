<?php

namespace App\Listeners\Wallets\Deposit;

use App\Events\Wallet\Deposit\UserDeposited;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateDepositAmount
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
     * @param UserDeposited $event
     * @return void
     */
    public function handle(UserDeposited $event)
    {
//        $event->
    }
}
