<?php

namespace Database\Seeders;

use App\Services\GetPairConversionRatio\Navasan\UpdatePairCurrencyConversionTableService;
use Illuminate\Database\Seeder;

class PairCurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * UpdatePairCurrencyConversionTableService Is a invokable Class
     *
     * @return void
     */
    public function run(UpdatePairCurrencyConversionTableService $updatePairCurrencyConversionTableService)
    {
        $updatePairCurrencyConversionTableService();
    }
}
