<?php

namespace App\Http\Controllers\Memorandum;

use App\Models\Asset;
use App\Models\IncomeExpense;
use App\Models\MarketingExchangeOption;
use App\Models\MarketPricing;
use App\Models\Memorandum;
use App\Models\MixUnit;
use App\Models\PricingFinancial;
use App\Models\ProjectionIncrement;
use App\Models\YearProjection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FinancialController extends Controller
{
    public function loadUnitMixGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '21'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $mix_units = MixUnit::where('memorandum_id',$id)->get();
        $pf = PricingFinancial::where('memorandum_id',$id)->first();
        return view('backend.memorandums.financial.unit-mix-graph',compact('memorandum','pro_bar','mix_units'));
    }

    public function updateUnitMixGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();
        $unit_type = $request->unit_type_graph;
        $unit_type = str_replace('data:image/png;base64,', '', $unit_type);
        $unit_type = str_replace(' ', '+', $unit_type);
        $unitTypeImg = 'unit-type-graph-'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$unitTypeImg));
        Storage::disk('public')->put('graph-images/'.$unitTypeImg, base64_decode($unit_type));
        $unit_rent = $request->unit_rent_sf;
        $unit_rent = str_replace('data:image/png;base64,', '', $unit_rent);
        $unit_rent = str_replace(' ', '+', $unit_rent);
        $unitRentImg = 'unit-rent-graph-'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$unitRentImg));
        Storage::disk('public')->put('graph-images/'.$unitRentImg, base64_decode($unit_rent));
        $data['unit_type_graph'] = $unitTypeImg;
        $data['unit_rent_sf'] = $unitRentImg;
        PricingFinancial::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.financial.income-expenses', $memorandum->id);
    }

    public function loadSectionCoverPage(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $rec = PricingFinancial::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '9'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.financial.section-cover', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateSectionCoverPage(Request $request, $id){
        $this->coverPageValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        PricingFinancial::updateOrCreate([
            'memorandum_id' => $id
        ],$request->all());
        return redirect()->route('load.financial.offering.summary', $memorandum->id);
    }

    public function loadFinancialOfferingPage(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = PricingFinancial::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '12'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.financial.offering-summary', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateFinancialOfferingPage(Request $request, $id){
        $this->offeringValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();
        
        $data['down_payment'] = number_format($this->cleanString($data['price'])*($data['down_payment_perc']/100));
        $data['price_per_sf'] = number_format($this->cleanString($data['price'])/$this->cleanString($data['rentable_square_feet']),2,'.',',');
        //For later usage calculated values



        PricingFinancial::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.financial.proposed', $memorandum->id);
    }

    public function loadFinancialProposedPage(Request $request,$id){

        $memorandum = Memorandum::find($id);
        $rec = PricingFinancial::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '15'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.financial.proposed', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateFinancialProposedPage(Request $request, $id){
        $this->proposedValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $pf = PricingFinancial::where('memorandum_id',$id)->first();
        $data = $request->all();
        $data['trust_loan_amount'] = number_format($this->cleanString($pf->price) - $this->cleanString($pf->down_payment));
        $data['payment'] = $this->payment_calculator($this->cleanString($data['trust_loan_amount']),$data['trust_amortization'],$data['trust_interest_rate']);
        $data['principle_reduction'] = $this->principle_reduction_calculator($this->cleanString($data['payment']),$this->cleanString($data['trust_loan_amount']),$data['trust_interest_rate']);
        PricingFinancial::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.financial.unit-mix', $memorandum->id);
    }


    public function loadFinancialProjectionPage(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = YearProjection::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '36'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.financial.year-projections', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateFinancialProjectionPage(Request $request, $id){
        $this->projectionValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        YearProjection::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.financial.projection-increment', $memorandum->id);
    }

    public function loadFinancialProjectionIncrement(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $projection_increments = ProjectionIncrement::where('memorandum_id',$id)->paginate(10);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '37'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.financial.projection-increments.index', compact('pro_bar', 'assets','memorandum','projection_increments'));
    }

    //unit mix CRUD start
    public function createProjectionIncrement($id){
        $memorandum = Memorandum::find($id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.financial.projection-increments.create',compact('memorandum','pro_bar'));
    }

    public function storeProjectionIncrement(Request $request){
        $this->projectionIncrementValidator($request->all())->validate();
        $data = $request->all();
        $projection_count = ProjectionIncrement::where('memorandum_id',$data['memorandum_id'])->count();
        $data['year'] = $projection_count+1;
        ProjectionIncrement::create($data);
        flash('Projection entry has been created.','success');
        return redirect()->route('load.financial.projection-increment',$request->memorandum_id);

    }

    public function editProjectionIncrement($id){
        $rec =  ProjectionIncrement::find($id);
        $memorandum = Memorandum::find($rec->memorandum_id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.financial.projection-increments.edit',compact('rec','memorandum','pro_bar'));
    }

    public function updateProjectionIncrement(Request $request,$id){
        $this->projectionIncrementValidator($request->all())->validate();

        $data = $request->all();
        $rec = ProjectionIncrement::find($id);
        $rec->update($data);

        flash('Projection entry has been updated.','success');
        return redirect()->route('load.financial.projection-increment',$rec->memorandum_id);
    }

    public function deleteProjectionIncrement($id){
        $unit =  ProjectionIncrement::find($id);
        $unit->delete();
        return redirect()->route('load.financial.projection-increment',$unit->memorandum_id);
    }
    //Projection Increment CRUD end

    public function loadFinancialUnitMixPage(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $pf = PricingFinancial::where('memorandum_id',$memorandum->id)->first();
        $mix_units = MixUnit::where('memorandum_id',$id)->paginate(20);
        $units_mix_without_nc = MixUnit::where('memorandum_id',$id)->where('isNC',0)->get();
        $units_mix_nc = MixUnit::where('memorandum_id',$id)->where('isNC',1)->get();

        $total_units_without_nc = $units_mix_without_nc->sum('number_of_units');
        $total_units_nc = $units_mix_nc->sum('number_of_units');
        if($total_units_nc > 0) {
            $total_units = $total_units_without_nc . '+' . $total_units_nc;
            $sum_units = $total_units_without_nc + $total_units_nc;
        }else{
            $total_units = $total_units_without_nc;
            $sum_units = $total_units_without_nc;
        }
        if($sum_units > 0)
            $price_per_unit = number_format(str_replace(',','',$pf->price)/$sum_units);
         else
             $price_per_unit = $sum_units;
        $pf->update([
            'number_of_units' => $total_units,
            'price_per_unit' => $price_per_unit,
        ]);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '18'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.financial.unit-mix.index', compact('pro_bar', 'assets','memorandum','mix_units'));
    }

    //unit mix CRUD start
    public function createUnitMix($id){
        $memorandum = Memorandum::find($id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.financial.unit-mix.create',compact('memorandum','pro_bar'));
    }

    public function storeUnitMix(Request $request){
        $this->unitMixValidator($request->all())->validate();
        $data = $request->all();
        $data['isNC'] = (isset($request->isNC) && $request->isNC == 1) ? 1 : 0;
        MixUnit::create($data);
        flash('Mix Unit entry has been created.','success');
        return redirect()->route('load.financial.unit-mix',$request->memorandum_id);

    }

    public function editUnitMix($id){
        $rec =  MixUnit::find($id);
        $memorandum = Memorandum::find($rec->memorandum_id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.financial.unit-mix.edit',compact('rec','memorandum','pro_bar'));
    }

    public function updateUnitMix(Request $request,$id){
        $this->unitMixValidator($request->all())->validate();

        $data = $request->all();
        /*$data['rent_per_sf'] = number_format(str_replace(',','',$data['current_rent_max'])/str_replace(',','',$data['sq_feet']),'2','.','');
        $data['rent_per_sf2'] = number_format(str_replace(',','',$data['proforma_rent_max'])/str_replace(',','',$data['sq_feet']),'2','.','');*/
        $data['isNC'] = (isset($request->isNC) && $request->isNC == 1) ? 1 : 0;
        $rec = MixUnit::find($id);
        $rec->update($data);

        flash('Mix Unit entry has been updated.','success');
        return redirect()->route('load.financial.unit-mix',$rec->memorandum_id);
    }

    public function deleteUnitMix($id){
        $unit =  MixUnit::find($id);
        $unit->delete();
        return redirect()->route('load.financial.unit-mix',$unit->memorandum_id);
    }
    //unit mix CRUD end
    public function loadFinancialIncomeExpensesPage(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = IncomeExpense::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '24'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();

        return view('backend.memorandums.financial.income-expenses', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateFinancialIncomeExpensesPage(Request $request, $id){
        $this->incomeExpensesValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();
        $unit_mix = MixUnit::where('memorandum_id',$id)->get();
        $gross_potential_rent = 0;$gross_potential_rent_proforma = 0;
        if(!empty($unit_mix)){
            foreach ($unit_mix as $unit){
                $gross_potential_rent+= $this->cleanString($unit->monthly_income);
                $gross_potential_rent_proforma+= $this->cleanString($unit->monthly_income2);
            }
        }
        $data['gross_potential_rent'] = number_format($this->cleanString($gross_potential_rent)*12);
        $data['gross_potential_rent_proforma'] = number_format($this->cleanString($gross_potential_rent_proforma)*12);
        $data['gross_potential_income'] = number_format($this->cleanString($data['gross_potential_rent']) + $this->cleanString($data['other_income']));
        $data['gross_potential_income_proforma'] = number_format($this->cleanString($data['gross_potential_rent_proforma']) + $this->cleanString($data['other_income_proforma']));
        $data['vacancy_collection_reserve'] = number_format($this->cleanString($data['gross_potential_rent'])*$request->vacancy_percentage);
        $data['vacancy_collection_reserve_proforma'] = number_format($this->cleanString($data['gross_potential_rent_proforma'])*$request->vacancy_percentage_proforma);

        $data['effective_gross_income'] = number_format($this->cleanString($data['gross_potential_income']) - $this->cleanString($data['vacancy_collection_reserve']));
        $data['effective_gross_income_proforma'] = number_format($this->cleanString($data['gross_potential_income_proforma']) - $this->cleanString($data['vacancy_collection_reserve_proforma']));


        $data['total_expenses'] = number_format($this->cleanString($data['professional_fees']) + $this->cleanString($data['offsite_management'])
            + $this->cleanString($data['onsite_management']) + $this->cleanString($data['administration']) + $this->cleanString($data['marketing'])
            + $this->cleanString($data['contract_services']) + $this->cleanString($data['utilities']) + $this->cleanString($data['maintenance'])
            + $this->cleanString($data['reserves']) + $this->cleanString($data['insurance']) + $this->cleanString($data['real_estate_taxes']));

        $data['total_expenses_proforma'] = number_format($this->cleanString($data['professional_fees_proforma']) + $this->cleanString($data['offsite_management_proforma'])
            + $this->cleanString($data['onsite_management_proforma']) + $this->cleanString($data['administration_proforma']) + $this->cleanString($data['marketing_proforma'])
            + $this->cleanString($data['contract_services_proforma']) + $this->cleanString($data['utilities_proforma']) + $this->cleanString($data['maintenance_proforma'])
            + $this->cleanString($data['reserves_proforma']) + $this->cleanString($data['insurance_proforma']) + $this->cleanString($data['real_estate_taxes_proforma']));

        $data['net_operating_income'] = number_format($this->cleanString($data['effective_gross_income']) - $this->cleanString($data['total_expenses']));
        $data['net_operating_income_proforma'] = number_format($this->cleanString($data['effective_gross_income_proforma']) - $this->cleanString($data['total_expenses_proforma']));

        $pf = PricingFinancial::where('memorandum_id',$id)->first();
        $cap_rate_current = number_format(($this->cleanString($data['net_operating_income'])/$this->cleanString($pf->price))*100,'2','.',',');
        $grm_current = number_format($this->cleanString($pf->price)/$this->cleanString($data['gross_potential_rent']),'2','.',',');
        $cap_rate_proforma = number_format(($this->cleanString($data['net_operating_income_proforma'])/$this->cleanString($pf->price))*100,'2','.',',');
        $grm_proforma = number_format($this->cleanString($pf->price)/$this->cleanString($data['gross_potential_rent_proforma']),'2','.',',');

//        $total_payments = number_format($this->cleanString($pf->payment) + $this->cleanString($pf->trust_payment),'2','.',',');
        $total_payments = number_format($this->cleanString($pf->payment),'2','.',',');

        $net_cash_flow_after_debt = number_format($this->cleanString($data['net_operating_income']) - ($this->cleanString($total_payments)*12),2,'.',',');
        $net_cash_flow_after_debt_proforma = number_format($this->cleanString($data['net_operating_income_proforma']) - ($this->cleanString($total_payments)*12));

        $total_return_current = number_format($this->cleanString($net_cash_flow_after_debt) + ($this->cleanString($pf->principle_reduction)*12));
        $total_return_proforma = number_format($this->cleanString($net_cash_flow_after_debt_proforma) + ($this->cleanString($pf->principle_reduction)*12),2,'.',',');
         
        $data['perc_egi'] = number_format(($this->cleanString($data['total_expenses'])/$this->cleanString($data['effective_gross_income'])*100),1,'.',',');
        $data['perc_egi_proforma'] = number_format(($this->cleanString($data['total_expenses_proforma'])/$this->cleanString($data['effective_gross_income_proforma'])*100),1,'.',',');

        $debt_coverage_ratio_current = number_format($this->cleanString($data['net_operating_income'])/($this->cleanString($total_payments)*12),2,'.',',');
        $debt_coverage_ratio_proforma = number_format($this->cleanString($data['net_operating_income_proforma'])/($this->cleanString($total_payments)*12),2,'.',',');


        $pf->update([
            'cap_rate_current' => $cap_rate_current,
            'grm_current' => $grm_current,
            'cap_rate_proforma' => $cap_rate_proforma,
            'grm_proforma' => $grm_proforma,
            'net_operating_income' => $data['net_operating_income'],
            'net_operating_income_proforma' => $data['net_operating_income_proforma'],
            'net_cash_flow_after_debt' => $net_cash_flow_after_debt,
            'net_cash_flow_after_debt_proforma' => $net_cash_flow_after_debt_proforma,
            'total_return' => $total_return_current,
            'total_return_proforma' => $total_return_proforma,
            'debt_coverage_ratio_current' => $debt_coverage_ratio_current,
            'debt_coverage_ratio_proforma' => $debt_coverage_ratio_proforma
        ]);

        $data['expenses_per_sf'] = number_format($this->cleanString($data['total_expenses'])/$this->cleanString($pf->rentable_square_feet),'2','.',',');
        $data['expenses_per_sf_proforma'] = number_format($this->cleanString($data['total_expenses_proforma'])/$this->cleanString($pf->rentable_square_feet),'2','.',',');

        IncomeExpense::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.financial.pricing-current', $memorandum->id);
    }

    public function loadFinancialPricingCurrent(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $p_c_list = MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_current_list')->first();
        $p_c_range = MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_current_range')->first();

        if(empty($p_c_list)){
            MarketPricing::create([
                'memorandum_id' => $id,
                'pricing_type' => 'pricing_current_list'
            ]);
        }
        if(empty($p_c_range)){
            MarketPricing::create([
                'memorandum_id' => $id,
                'pricing_type' => 'pricing_current_range'
            ]);
        }

        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '27'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;

        return view('backend.memorandums.financial.pricing-current', compact('pro_bar','memorandum','p_c_list','p_c_range'));
    }

    public function updateFinancialPricingCurrent(Request $request, $id){
       //$this->incomeExpensesValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->except('_token','_method');

        $pf = PricingFinancial::where('memorandum_id',$memorandum->id)->first();
        $inc = IncomeExpense::where('memorandum_id',$memorandum->id)->first();
        $units = $pf->number_of_units;
        if (strpos($units, '+') !== false) {
            $units_arr = explode('+',$units);
            if(count($units_arr) > 1){
                $dec_units = $units_arr[0];
                $non_dec_units = $units_arr[1];
                $number_of_units = $dec_units + $non_dec_units;
            }
        }else{
            $number_of_units = $units;
        }
        //current list values
        $down_payment = number_format($this->cleanString($data['price'])*($pf->down_payment_perc/100));
        $first_trust_mortage = number_format($this->cleanString($data['price']) - $this->cleanString($down_payment));
        $interest_rate = $pf->trust_interest_rate;
        $payment = $this->payment_calculator($this->cleanString($first_trust_mortage),$pf->trust_amortization,$interest_rate);
        $debt_service = number_format($payment*12);
        $debt_coverage_ratio = number_format($this->cleanString($pf->net_operating_income)/$this->cleanString($debt_service),2,'.',',');
        $net_cash_flow_after = number_format($this->cleanString($pf->net_operating_income) - $this->cleanString($debt_service));
        $return_perc = number_format(($this->cleanString($net_cash_flow_after)/$this->cleanString($down_payment))*100,2,'.',',');
        $principle_reduction = number_format($this->principle_reduction_calculator($payment,$this->cleanString($first_trust_mortage),$interest_rate)*12);
        $total_return = number_format($this->cleanString($principle_reduction) + $this->cleanString($net_cash_flow_after));
        $total_return_perc = number_format(($this->cleanString($total_return)/$this->cleanString($down_payment))*100,2,'.',',');
        $cap_rate = number_format(($this->cleanString($pf->net_operating_income)/$this->cleanString($data['price'])*100),2,'.',',');
        $grm = number_format($this->cleanString($data['price'])/$this->cleanString($inc->gross_potential_rent),2,'.',',');
        $price_per_unit = number_format($this->cleanString($data['price'])/$number_of_units);
        $price_per_sf = number_format($this->cleanString($data['price'])/$this->cleanString($pf->rentable_square_feet),2,'.',',');

        //current range values
        $down_payment_range = number_format($this->cleanString($data['price_range'])*($pf->down_payment_perc/100));
        $first_trust_mortage_range = number_format($this->cleanString($data['price_range']) - $this->cleanString($down_payment_range));
        $interest_rate_range = $pf->trust_interest_rate;
        $payment_range = $this->payment_calculator($this->cleanString($first_trust_mortage_range),$pf->trust_amortization,$interest_rate_range);
        $debt_service_range = number_format($payment_range*12);
        $debt_coverage_ratio_range = number_format($this->cleanString($pf->net_operating_income)/$this->cleanString($debt_service_range),2,'.',',');
        $net_cash_flow_after_range = number_format($this->cleanString($pf->net_operating_income) - $this->cleanString($debt_service_range));
        $return_perc_range = number_format(($this->cleanString($net_cash_flow_after_range)/$this->cleanString($down_payment_range)*100),2,'.',',');
        $principle_reduction_range = number_format($this->principle_reduction_calculator($this->cleanString($payment_range),$this->cleanString($first_trust_mortage_range),$interest_rate_range)*12);
        $total_return_range = number_format($this->cleanString($principle_reduction_range) + $this->cleanString($net_cash_flow_after_range));
        $total_return_perc_range = number_format(($this->cleanString($total_return_range)/$this->cleanString($down_payment_range))*100,2,'.',',');
        $cap_rate_range = number_format(($this->cleanString($pf->net_operating_income)/$this->cleanString($data['price_range']))*100,2,'.',',');
        $grm_range = number_format($this->cleanString($data['price_range'])/$this->cleanString($inc->gross_potential_rent),2,'.',',');
        $price_per_unit_range = number_format($this->cleanString($data['price_range'])/$number_of_units);
        $price_per_sf_range = number_format($this->cleanString($data['price_range'])/$this->cleanString($pf->rentable_square_feet),2,'.',',');

        MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_current_list')->update([
            'price' => $data['price'],
            'down_payment'        => $down_payment,
            'down_payment_perc'   => $pf->down_payment_perc,
            'first_trust_mortage' => $first_trust_mortage,
            'interest_rate'       => $interest_rate,
            'debt_service'        => $debt_service,
            'debt_coverage_ratio' => $debt_coverage_ratio,
            'net_cash_flow_after' => $net_cash_flow_after,
            'debt_service_return' => $return_perc,
            'principal_reduction' => $principle_reduction,
            'total_return'        => $total_return,
            'total_return_perc'   => $total_return_perc,
            'cap_rate'            => $cap_rate,
            'grm'                 => $grm,
            'price_per_unit'      => $price_per_unit,
            'price_per_sf'        => $price_per_sf,
            'net_operating_income'=> $pf->net_operating_income,
        ]);
        MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_current_range')->update([
            'price' => $data['price_range'],
            'down_payment'        => $down_payment_range,
            'down_payment_perc'   => $pf->down_payment_perc,
            'first_trust_mortage' => $first_trust_mortage_range,
            'interest_rate'       => $interest_rate_range,
            'debt_service'        => $debt_service_range,
            'debt_coverage_ratio' => $debt_coverage_ratio_range,
            'net_cash_flow_after' => $net_cash_flow_after_range,
            'debt_service_return' => $return_perc_range,
            'principal_reduction' => $principle_reduction_range,
            'total_return'        => $total_return_range,
            'total_return_perc'   => $total_return_perc_range,
            'cap_rate'            => $cap_rate_range,
            'grm'                 => $grm_range,
            'price_per_unit'      => $price_per_unit_range,
            'price_per_sf'        => $price_per_sf_range,
            'net_operating_income'=> $pf->net_operating_income,
        ]);

        return redirect()->route('load.financial.pricing-proforma', $memorandum->id);
    }

    public function loadFinancialPricingProforma(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $p_c_list = MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_proforma_list')->first();
        $p_c_range = MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_proforma_range')->first();

        if(empty($p_c_list)){
            MarketPricing::create([
                'memorandum_id' => $id,
                'pricing_type' => 'pricing_proforma_list'
            ]);
        }
        if(empty($p_c_range)){
            MarketPricing::create([
                'memorandum_id' => $id,
                'pricing_type' => 'pricing_proforma_range'
            ]);
        }

        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '30'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;

        return view('backend.memorandums.financial.pricing-proforma', compact('pro_bar','memorandum','p_c_list','p_c_range'));
    }

    public function updateFinancialPricingProforma(Request $request, $id){
        //$this->incomeExpensesValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        $pf = PricingFinancial::where('memorandum_id',$memorandum->id)->first();
        $inc = IncomeExpense::where('memorandum_id',$memorandum->id)->first();
        $units = $pf->number_of_units;
        if (strpos($units, '+') !== false) {
            $units_arr = explode('+',$units);
            if(count($units_arr) > 1){
                $dec_units = $units_arr[0];
                $non_dec_units = $units_arr[1];
                $number_of_units = $dec_units + $non_dec_units;
            }
        }else{
            $number_of_units = $units;
        }
        //proforma list values
        $down_payment = number_format($this->cleanString($data['price'])*($pf->down_payment_perc/100));
        $first_trust_mortage = number_format($this->cleanString($data['price']) - $this->cleanString($down_payment));
        $interest_rate = $pf->trust_interest_rate;
        $payment = $this->payment_calculator($this->cleanString($first_trust_mortage),$pf->trust_amortization,$interest_rate);
        $debt_service = number_format($payment*12);
        $debt_coverage_ratio = number_format($this->cleanString($pf->net_operating_income_proforma)/$this->cleanString($debt_service),2,'.',',');
        $net_cash_flow_after = number_format($this->cleanString($pf->net_operating_income_proforma) - $this->cleanString($debt_service));
        $return_perc = number_format(($this->cleanString($net_cash_flow_after)/$this->cleanString($down_payment))*100,2,'.',',');
        $principle_reduction = number_format($this->principle_reduction_calculator($payment,$this->cleanString($first_trust_mortage),$interest_rate)*12);
        $total_return = number_format($this->cleanString($principle_reduction) + $this->cleanString($net_cash_flow_after));
        $total_return_perc = number_format(($this->cleanString($total_return)/$this->cleanString($down_payment))*100,2,'.',',');
        $cap_rate = number_format(($this->cleanString($pf->net_operating_income_proforma)/$this->cleanString($data['price'])*100),2,'.',',');
        $grm = number_format($this->cleanString($data['price'])/$this->cleanString($inc->gross_potential_rent_proforma),2,'.',',');
        $price_per_unit = number_format($this->cleanString($data['price'])/$number_of_units);
        $price_per_sf = number_format($this->cleanString($data['price'])/$this->cleanString($pf->rentable_square_feet),2,'.',',');

        //proforma range values
        $down_payment_range = number_format($this->cleanString($data['price_range'])*($pf->down_payment_perc/100));
        $first_trust_mortage_range = number_format($this->cleanString($data['price_range']) - $this->cleanString($down_payment_range));
        $interest_rate_range = $pf->trust_interest_rate;
        $payment_range = $this->payment_calculator($this->cleanString($first_trust_mortage_range),$pf->trust_amortization,$interest_rate_range);
        $debt_service_range = number_format($payment_range*12);
        $debt_coverage_ratio_range = number_format($this->cleanString($pf->net_operating_income_proforma)/$this->cleanString($debt_service_range),2,'.',',');
        $net_cash_flow_after_range = number_format($this->cleanString($pf->net_operating_income_proforma) - $this->cleanString($debt_service_range));
        $return_perc_range = number_format(($this->cleanString($net_cash_flow_after_range)/$this->cleanString($down_payment_range)*100),2,'.',',');
        $principle_reduction_range = number_format($this->principle_reduction_calculator($this->cleanString($payment_range),$this->cleanString($first_trust_mortage_range),$interest_rate_range)*12);
        $total_return_range = number_format($this->cleanString($principle_reduction_range) + $this->cleanString($net_cash_flow_after_range));
        $total_return_perc_range = number_format(($this->cleanString($total_return_range)/$this->cleanString($down_payment_range))*100,2,'.',',');
        $cap_rate_range = number_format(($this->cleanString($pf->net_operating_income_proforma)/$this->cleanString($data['price_range']))*100,2,'.',',');
        $grm_range = number_format($this->cleanString($data['price_range'])/$this->cleanString($inc->gross_potential_rent_proforma),2,'.',',');
        $price_per_unit_range = number_format($this->cleanString($data['price_range'])/$number_of_units);
        $price_per_sf_range = number_format($this->cleanString($data['price_range'])/$this->cleanString($pf->rentable_square_feet),2,'.',',');

        MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_proforma_list')->update([
            'price' => $data['price'],
            'down_payment'        => $down_payment,
            'down_payment_perc'   => $pf->down_payment_perc,
            'first_trust_mortage' => $first_trust_mortage,
            'interest_rate'       => $interest_rate,
            'debt_service'        => $debt_service,
            'debt_coverage_ratio' => $debt_coverage_ratio,
            'net_cash_flow_after' => $net_cash_flow_after,
            'debt_service_return' => $return_perc,
            'principal_reduction' => $principle_reduction,
            'total_return'        => $total_return,
            'total_return_perc'   => $total_return_perc,
            'cap_rate'            => $cap_rate,
            'grm'                 => $grm,
            'price_per_unit'      => $price_per_unit,
            'price_per_sf'        => $price_per_sf,
            'net_operating_income'=> $pf->net_operating_income_proforma,
        ]);
        MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_proforma_range')->update([
            'price' => $data['price_range'],
            'down_payment'        => $down_payment_range,
            'down_payment_perc'   => $pf->down_payment_perc,
            'first_trust_mortage' => $first_trust_mortage_range,
            'interest_rate'       => $interest_rate_range,
            'debt_service'        => $debt_service_range,
            'debt_coverage_ratio' => $debt_coverage_ratio_range,
            'net_cash_flow_after' => $net_cash_flow_after_range,
            'debt_service_return' => $return_perc_range,
            'principal_reduction' => $principle_reduction_range,
            'total_return'        => $total_return_range,
            'total_return_perc'   => $total_return_perc_range,
            'cap_rate'            => $cap_rate_range,
            'grm'                 => $grm_range,
            'price_per_unit'      => $price_per_unit_range,
            'price_per_sf'        => $price_per_sf_range,
            'net_operating_income'=> $pf->net_operating_income_proforma,
        ]);

        return redirect()->route('load.financial.exchange-options', $memorandum->id);
    }

    public function loadFinancialExchangeOptions(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $sales_range = MarketingExchangeOption::where('memorandum_id',$id)->first();

        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '33'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;

        return view('backend.memorandums.financial.sales-range', compact('pro_bar','memorandum','sales_range'));
    }

    public function updateFinancialExchangeOptions(Request $request, $id){
        //$this->incomeExpensesValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->except('_token','_method');
        $data['exchange_option_1'] = json_encode($request->exchange_option1);
        $data['exchange_option_2'] = json_encode($request->exchange_option2);

        $pf = PricingFinancial::where('memorandum_id',$memorandum->id)->first();
        $price_list = MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_current_list')->first();
        $price_range = MarketPricing::where('memorandum_id',$id)->where('pricing_type','pricing_current_range')->first();

        $data['sales_range_price1'] = $pf->price;
        $data['sales_escrow_fees1']  = number_format($this->cleanString($data['sales_range_price1'])*0.065);
        $data['seller_net_proceeds1'] = number_format($this->cleanString($data['sales_range_price1']) - $this->cleanString($data['existing_debt_retirement1']) - $this->cleanString($data['sales_escrow_fees1']));
        $data['seller_return_equity1'] = number_format(($this->cleanString($data['seller_actual_income1'])/$this->cleanString($data['seller_net_proceeds1']))*100,2,'.',',');

        $data['sales_range_price2'] = $price_list->price;
        $data['sales_escrow_fees2']  = number_format($this->cleanString($data['sales_range_price2'])*0.065);
        $data['seller_net_proceeds2'] = number_format($this->cleanString($data['sales_range_price2']) - $this->cleanString($data['existing_debt_retirement1']) - $this->cleanString($data['sales_escrow_fees2']));
        $data['seller_return_equity2'] = number_format(($this->cleanString($data['seller_actual_income1'])/$this->cleanString($data['seller_net_proceeds2']))*100,2,'.',',');

        $data['sales_range_price3'] = $price_range->price;
        $data['sales_escrow_fees3']  = number_format($this->cleanString($data['sales_range_price3'])*0.065);
        $data['seller_net_proceeds3'] = number_format($this->cleanString($data['sales_range_price3']) - $this->cleanString($data['existing_debt_retirement1']) - $this->cleanString($data['sales_escrow_fees3']));
        $data['seller_return_equity3'] = number_format(($this->cleanString($data['seller_actual_income1'])/$this->cleanString($data['seller_net_proceeds3']))*100,2,'.',',');

        $data['existing_debt_retirement2'] = $data['existing_debt_retirement1'];
        $data['existing_debt_retirement3'] = $data['existing_debt_retirement1'];
        $data['seller_actual_income2'] = $data['seller_actual_income1'];
        $data['seller_actual_income3'] = $data['seller_actual_income1'];
        MarketingExchangeOption::updateOrCreate([
            'memorandum_id' => $id
        ], $data);
        return redirect()->route('load.financial.projections', $memorandum->id);
    }

    //validation functions starts here
    public function coverPageValidator(array $data){
        return Validator::make($data, [
            'cover_page_1' => 'required'
        ],[
            'cover_page_1.required' => 'The Page Image is required.'
        ]);
    }

    public function offeringValidator(array $data){
        return Validator::make($data, [
            'cover_page_2' => 'required',
            'price' => 'required',
            'down_payment_perc' => 'required',
            'rentable_square_feet' => 'required',
            'number_of_buildings' => 'required',
            'number_of_stories' => 'required',
            'year_built' => 'required',
            'lot_size' => 'required'
        ],[
            'cover_page_2.required' => 'The Page Image is required.'
        ]);
    }

    public function proposedValidator(array $data){

        return Validator::make($data, [
            'cover_page_3' => 'required',
            'loan_type' => 'required',
            'interest_rate' => 'required',
            'amortization' => 'required',
            'due_date' => 'required',
            'lender_name' => 'required',
            'trust_loan_type' => 'required',
            'trust_interest_rate' => 'required',
            'trust_amortization' => 'required',
            'trust_program' => 'required',
            'trust_loan_value' => 'required',
        ],[
            'cover_page_3.required' => 'The Page Image is required.'
        ]);
    }

    public function projectionValidator(array $data){

        return Validator::make($data, [
            'loss_to_lease' => 'required',
            'concessions' => 'required',
            'non_revenue_units' => 'required',
            'economic_occupancy' => 'required',
            'short_term_premiums' => 'required',
            'carport_garages' => 'required',
            'electricity_tenant_reim' => 'required',
            'internet_cable' => 'required',

        ],[
        'short_term_premiums.required' => 'The storage field  is required.',
            'carport_garages.required' => 'The garages/carports field is required',
            'electricity_tenant_reim.required' => 'The tenant reimbursements field is required',
        ]);
    }

    public function unitMixValidator(array $data){
        return Validator::make($data, [
            'number_of_units' => 'required',
            'unit_type' => 'required',
            'sq_feet' => 'required',
            'current_rent_min' => 'required',
            'monthly_income' => 'required',
            'proforma_rent_min' => 'required',
            'monthly_income2' => 'required'
        ]);
    }

    public function projectionIncrementValidator(array $data){
        return Validator::make($data, [
            'market_rents' => 'required',
            'loss_to_lease' => 'required',
            'vacancy_loss' => 'required',
            'concessions' => 'required',
            'non_revenue_units' => 'required',
            'other_income' => 'required',
            'total_operating_expenses' => 'required'
        ]);
    }

    public function incomeExpensesValidator(array $data){
        return Validator::make($data, [
            'other_income' => 'required',
            'vacancy_percentage',
            'vacancy_percentage_proforma',
            'real_estate_taxes' => 'required',
            'marketing' => 'required',
            'onsite_management' => 'required',
            'administration' => 'required',
            'maintenance' => 'required',
            'contract_services' => 'required',
            'utilities' => 'required',
            'offsite_management' => 'required',
            'insurance' => 'required',
            'professional_fees' => 'required',
            'reserves' => 'required',

            'other_income_proforma' => 'required',
            'real_estate_taxes_proforma' => 'required',
            'marketing_proforma' => 'required',
            'onsite_management_proforma' => 'required',
            'administration_proforma' => 'required',
            'maintenance_proforma' => 'required',
            'contract_services_proforma' => 'required',
            'utilities_proforma' => 'required',
            'offsite_management_proforma' => 'required',
            'insurance_proforma' => 'required',
            'professional_fees_proforma' => 'required',
            'reserves_proforma' => 'required',
        ]);
    }

    public function cleanString($string){
        if($string)
            return str_replace(',','',$string);
        else
            return 0;
    }

    public function payment_calculator($loan,$amortization,$rate){
        $term = $amortization*12;
        $apr = $rate/1200;
        $loan_amount = $loan;
        $amount = $apr * - $loan_amount * pow((1 + $apr), $term) / (1 - pow((1 + $apr), $term));

        return $this->round_up($amount,2);
    }
    public function principle_reduction_calculator($payment,$loan,$rate){
        $interest = $loan*$rate/1200;
        $principle_reduction =  $payment - $interest;

        return round($principle_reduction,2);

    }
    public function round_up($value, $places)
    {
        $mult = pow(10, abs($places));
        return $places < 0 ?
            ceil($value / $mult) * $mult :
            ceil($value * $mult) / $mult;
    }
}
