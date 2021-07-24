<?php

namespace App\Console;

use App\Domain\ClientRequest\ClientRequest;
use App\Domain\ExternalApi\NavasanApi\NavasanApi;
use App\Models\PairCurrency;
use App\Repositories\PairCurrencyRepository\PairCurrencyRepository;
use App\Services\GetPairConversionRatio\Navasan\ReturnStructuredResult;
use App\Services\GetPairConversionRatio\Navasan\UpdatePairCurrencyConversionTableService;
use GuzzleHttp\Client;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
//        $schedule->call('UpdatePairCurrencyConversionTableService')->everyMinute()->sendOutputTo("schedule.txt");
        $schedule->call(
            new UpdatePairCurrencyConversionTableService(
                new PairCurrencyRepository(
                    new PairCurrency()),
                    new ReturnStructuredResult(
                        new NavasanApi(
                            new ClientRequest(
                                new Client()
                            )
                        )
                    )
            )
        )->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
