<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pair_currencies', function (Blueprint $table) {
            $table->id();
            $table->string('pair', 6);
            $table->string('from_currency', 3);
            $table->string('to_currency', 3);
            $table->float('conversion_ratio', 12, 6);
            $table->float('fee', 8,3)->default(0.001);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pair_currencies');
    }
}
