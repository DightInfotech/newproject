<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketPricing extends Model
{
    protected $fillable = [
        'memorandum_id',
        'price',
        'down_payment_percentage',
        'down_payment',
        'first_trust_mortage',
        'interest_rate',
        'net_operating_income',
        'debt_service',
        'debt_coverage_ratio',
        'net_cash_flow_after',
        'debt_service_return',
        'principal_reduction',
        'total_return',
        'total_return_perc',
        'cap_rate',
        'grm',
        'price_per_unit',
        'price_per_sf',
        'pricing_type'
    ];
}
