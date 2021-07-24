<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'from_currency_code',
        'from_currency_amount',
        'from_currency_formatted_amount',
        'to_currency_code',
        'to_currency_true_amount',
        'to_currency_formatted_amount',
        'fee_amount',
        'formatted_fee_amount',
        'formatted_fee_amount_in_irr',
        'tracking_code',
        'conversion_ratio'
    ];
}
