<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearProjection extends Model
{
    protected $fillable = [
        'memorandum_id',
        //income fields
        'gross_market_rent',
        'loss_to_lease',
        'gross_potential_rent',
        'vacancy_loss',
        'concessions',
        'non_revenue_units',
        'employee_discounts',
        'bad_debt',
        'total_rental_income',
        'economic_occupancy',
        'green_fee',
        'short_term_premiums',
        'carport_garages',
        'electricity_tenant_reim',
        'other_income',
        'total_other_income',
        'effective_gross_income',

        //expenses fields
        'professional_fees',
        'offsite_management',
        'administrative',
        'marketing_promotions',
        'repairs_maintenance',
        'contracts',
        'utilities',
        'internet_cable',
        'management_fee',
        'insurance',
        'real_estate_taxes',
        'operating_expenses',
        'net_operating_income',
        'reserves_replacements',
        'net_cash_flow_after_reserves',

        //general projection
        'projecting_increase_market_rents',
        'loss_lease_general',
        'vacancy_loss_general',
        'concessions_general',
        'non_revenue_units_general',
        'employee_discounts_general',
        'bad_debt_general',
        'other_income_general',
        'total_operating_expenses_general'

    ];
}
