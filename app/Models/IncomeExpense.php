<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomeExpense extends Model
{
    protected $fillable = [
      'memorandum_id',

        'gross_potential_rent',
        'other_income',
        'gross_potential_income',
        'vacancy_percentage',
        'vacancy_percentage_proforma',
        'vacancy_collection_reserve',
        'effective_gross_income',
        'real_estate_taxes',
        'marketing',
        'onsite_management',
        'administration',
        'maintenance',
        'contract_services',
        'utilities',
        'offsite_management',
        'insurance',
        'professional_fees',
        'reserves',
        'total_expenses',
        'expenses_per_sf',
        'perc_egi',
        'net_operating_income',

        'gross_potential_rent_proforma',
        'other_income_proforma',
        'gross_potential_income_proforma',
        'vacancy_collection_reserve_proforma',
        'effective_gross_income_proforma',
        'real_estate_taxes_proforma',
        'marketing_proforma',
        'onsite_management_proforma',
        'administration_proforma',
        'maintenance_proforma',
        'contract_services_proforma',
        'utilities_proforma',
        'offsite_management_proforma',
        'insurance_proforma',
        'professional_fees_proforma',
        'reserves_proforma',
        'total_expenses_proforma',
        'expenses_per_sf_proforma',
        'perc_egi_proforma',
        'net_operating_income_proforma'
    ];
}
