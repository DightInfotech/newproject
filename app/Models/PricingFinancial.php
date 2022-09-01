<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingFinancial extends Model
{
    protected $fillable = [
        'memorandum_id',
        'cover_page_1',

        'cover_page_2',
        'price',
        'down_payment_perc',
        'down_payment',
        'price_per_unit',
        'price_per_sf',
        'number_of_units',
        'rentable_square_feet',
        'number_of_buildings',
        'number_of_stories',
        'year_built',
        'year_rennovated',
        'lot_size',
        'cap_rate_current',
        'grm_current',
        'net_operating_income',
        'net_cash_flow_after_debt',
        'total_return',
        'cap_rate_proforma',
        'grm_proforma',
        'net_operating_income_proforma',
        'net_cash_flow_after_debt_proforma',
        'total_return_proforma',

        'cover_page_3',
        'loan_amount',
        'loan_type',
        'interest_rate',
        'amortization',
        'due_date',
        'lender_name',
        'trust_loan_amount',
        'trust_loan_type',
        'trust_interest_rate',
        'trust_amortization',
        'trust_program',
        'trust_loan_value',
        'trust_debt_coverage_ratio',

        'unit_type_graph',
        'unit_rent_sf',
        'payment',
        'trust_payment',
        'principle_reduction',
        'debt_coverage_ratio_current',
        'debt_coverage_ratio_proforma'
    ];
}
