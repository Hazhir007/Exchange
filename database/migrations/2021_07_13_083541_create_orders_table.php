<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('from_currency_code', 3);
            $table->float('from_currency_amount', 12, 6);
            $table->float('from_currency_formatted_amount', 12, 6);
            $table->string('to_currency_code', 3);
            $table->float('to_currency_true_amount', 12, 6);
            $table->float('to_currency_formatted_amount', 12, 6);
            $table->float('fee_amount', 12, 6);
            $table->float('formatted_fee_amount', 12, 6);
            $table->float('formatted_fee_amount_in_irr', 12, 6);
            $table->string('tracking_code');
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
        Schema::dropIfExists('orders');
    }
}
