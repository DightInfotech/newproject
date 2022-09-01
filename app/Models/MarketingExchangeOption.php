<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketingExchangeOption extends Model
{
    protected $fillable = [
        'memorandum_id',
        'sales_range_price1',
        'sales_range_price2',
        'sales_range_price3',

        'existing_debt_retirement1',
        'existing_debt_retirement2',
        'existing_debt_retirement3',

        'sales_escrow_fees1',
        'sales_escrow_fees2',
        'sales_escrow_fees3',

        'seller_net_proceeds1',
        'seller_net_proceeds2',
        'seller_net_proceeds3',

        'seller_actual_income1',
        'seller_actual_income2',
        'seller_actual_income3',

        'seller_return_equity1',
        'seller_return_equity2',
        'seller_return_equity3',

        'exchange_option_1',
        'exchange_option_2',
        'is_skipped'
    ];
}
