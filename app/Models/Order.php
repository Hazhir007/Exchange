<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'fromCurrency',
        'toCurrency',
        'fee',
        'paid_amount',
        'true_amount',
        'trackingId',
        'status'
    ];


}
