<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\MarketComparable;
use App\Models\MarketComparableField;
use App\Models\MarketComparableGraph;
use App\Models\Memorandum;
use App\Models\PricingFinancial;
use App\Models\RecentSale;
use App\Models\RecentSaleField;
use App\Models\RentComparable;
use App\Models\RentComparableField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MarketComparableController extends Controller
{
    public function loadMarketComparableGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '92'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $market_comparables = MarketComparable::where('memorandum_id',$id)->get();
        $avg_cap = $market_comparables->avg('cap_rate');
        $avg_cap = number_format($avg_cap,2,'.','');
        $avg_grm = $market_comparables->avg('grm');
        $avg_grm = number_format($avg_grm,2,'.','');
        $pf = PricingFinancial::where('memorandum_id',$id)->first();
        return view('backend.memorandums.market-comparables.cap-grm-graph',compact('memorandum','pro_bar','market_comparables','avg_cap','avg_grm','pf'));
    }

    public function updateMarketComparableGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();
        $cap = $request->avg_cap_rate;
        $cap = str_replace('data:image/png;base64,', '', $cap);
        $cap = str_replace(' ', '+', $cap);
        $capImgName = 'cap-avg-graph-market-'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$capImgName));
        Storage::disk('public')->put('graph-images/'.$capImgName, base64_decode($cap));
        $grm = $request->avg_grm_rate;
        $grm = str_replace('data:image/png;base64,', '', $grm);
        $grm = str_replace(' ', '+', $grm);
        $grmImgName = 'grm-avg-graph-market-'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$grmImgName));
        Storage::disk('public')->put('graph-images/'.$grmImgName, base64_decode($grm));
        $data['avg_cap_rate'] = $capImgName;
        $data['avg_grm_rate'] = $grmImgName;
        MarketComparableField::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.market-comparable.price.graphs', $memorandum->id);
    }

    public function loadMarketComparablePriceGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '94'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $market_comparables = MarketComparable::where('memorandum_id',$id)->get();
        $avg_price_sf = $market_comparables->avg('price_per_sf');
        $avg_price_sf = number_format($avg_price_sf,2,'.','');
        $avg_price_unit = $market_comparables->avg('price_per_unit');
        $avg_price_unit = number_format($avg_price_unit,2,'.','');
        $pf = PricingFinancial::where('memorandum_id',$id)->first();
        return view('backend.memorandums.market-comparables.price-unit-graph',compact('memorandum','pro_bar','market_comparables','avg_price_sf','avg_price_unit','pf'));
    }

    public function updateMarketComparablePriceGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();
        $price_sf = $request->avg_price_sf;
        $price_sf = str_replace('data:image/png;base64,', '', $price_sf);
        $price_sf = str_replace(' ', '+', $price_sf);
        $price_sfImg = 'sf-avg-graph-market-'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$price_sfImg));
        Storage::disk('public')->put('graph-images/'.$price_sfImg, base64_decode($price_sf));
        $price_unit = $request->avg_price_unit;
        $price_unit = str_replace('data:image/png;base64,', '', $price_unit);
        $price_unit = str_replace(' ', '+', $price_unit);
        $price_unitImg = 'unit-avg-graph-market-'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$price_unitImg));
        Storage::disk('public')->put('graph-images/'.$price_unitImg, base64_decode($price_unit));
        $data['avg_price_sf'] = $price_sfImg;
        $data['avg_price_unit'] = $price_unitImg;
        MarketComparableField::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.market-plan.section.cover',$memorandum->id);
    }

    public function loadSectionCoverPage(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $rec = MarketComparableField::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '83'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.market-comparables.section-cover', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateSectionCoverPage(Request $request, $id){
        $this->coverPageValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        MarketComparableField::updateOrCreate([
            'memorandum_id' => $id
        ],$request->all());
        return redirect()->route('market-comparables.graphs.index', $memorandum->id);
    }

    //load graphs
    public function loadGraphs(Request $request,$id)
    {
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '86'
            ]
        );
        $graphs = MarketComparableGraph::where('memorandum_id',$id)->paginate(20);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.market-comparables.graphs.index',compact('graphs','memorandum','pro_bar'));
    }

    public function createGraph($id)
    {
        $memorandum = Memorandum::findOrFail($id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.market-comparables.graphs.create',compact('memorandum','pro_bar'));
    }

    public function storeGraph(Request $request)
    {
        $request->validate([
            'page_title' => 'required',
            'graph_label' => 'required',
            'y_axis' => 'required',
            'graph_values' => 'required',
        ]);
        $data = $request->all();
        $values_arr = explode(',',$request->graph_values);
        $x_axis_arr = explode(',',$request->x_axis);
        if($x_axis_arr[0] == 'Subject'){
            array_shift($values_arr);
        }
        $data['avg_value'] = number_format(array_sum($values_arr)/count(array_filter($values_arr)),2,'.',',');
        $graph = MarketComparableGraph::create($data);
        flash('Market Comparable Graph has been added successfully.','success');
        return redirect()->route('market-comparables.graphs.edit',$graph->id);
    }

    public function editGraph($id)
    {
        $graph = MarketComparableGraph::find($id);
        $memorandum = Memorandum::find($graph->memorandum_id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.market-comparables.graphs.edit',compact('graph','memorandum','pro_bar'));
    }

    public function updateGraph(Request $request, $id)
    {
        $request->validate([
            'page_title' => 'required',
            'graph_label' => 'required',
            'y_axis' => 'required',
            'graph_values' => 'required',
        ]);
        $data = $request->all();
        $values_arr = explode(',',$request->graph_values);
        $x_axis_arr = explode(',',$request->x_axis);
        if($x_axis_arr[0] == 'Subject'){
            array_shift($values_arr);
        }
        if(!empty($values_arr)) {
            foreach ($values_arr as $val) {
                if (trim($val) != 0)
                    $skip_arr[] = $val;
            }
        }
        $data['avg_value'] = number_format(array_sum($skip_arr)/count($skip_arr),2,'.',',');
        $img = $request->graph_image;
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $graphImgName = 'graph-img-market'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$graphImgName));
        Storage::disk('public')->put('graph-images/'.$graphImgName, base64_decode($img));
        $data['graph_image'] = $graphImgName;
        MarketComparableGraph::find($id)->update($data);
        flash('Market Comparable Graph has been updated successfully.','success');
        return redirect()->route('market-comparables.graphs.index',$request->memorandum_id);
    }

    public function destroyGraph($id)
    {
        MarketComparableGraph::find($id)->delete();
        flash('Market Comparable Graph has been deleted successfully.','success');
        return back();
    }
    //end graphs

    public function loadMarketComparableMap(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $rec = MarketComparableField::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '90'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.market-comparables.map', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateMarketComparableMap(Request $request, $id){
        $this->mapValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        MarketComparableField::updateOrCreate([
            'memorandum_id' => $id
        ],$request->all());
        return redirect()->route('market-comparable.index',$memorandum->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '94'
            ]
        );
        $market_comparables = MarketComparable::where('memorandum_id',$id)->paginate(20);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.market-comparables.index',compact('market_comparables','memorandum','pro_bar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $memorandum = Memorandum::findOrFail($id);
        $assets = Asset::latest()->get();
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.market-comparables.create',compact('assets','memorandum','pro_bar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        $data = $request->all();
        $unit_types = $request->unit_types;
        $unit_numbers = $request->unit_numbers;
        $units = [];$total_units=0;
        if(count($unit_types) > 0){
            for ($i=0;$i<count($unit_types);$i++){
               $units[$i][$unit_types[$i]] = $unit_numbers[$i];
               $total_units+= $unit_numbers[$i];
            }
        }
        $sale_price = str_replace(',','',$request->sale_price);
        $data['total_units'] = $total_units;
        $data['price_per_unit'] = $sale_price/$total_units;
        $data['units'] = json_encode($units);
        MarketComparable::create($data);
        flash('Property has been added successfully.','success');
        return redirect()->route('market-comparable.index',$request->memorandum_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rec = MarketComparable::find($id);
        $memorandum = Memorandum::find($rec->memorandum_id);
        $assets = Asset::latest()->get();
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.market-comparables.edit',compact('rec','assets','memorandum','pro_bar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $sale = MarketComparable::find($id);
        $data = $request->all();
        $unit_types = $request->unit_types;
        $unit_numbers = $request->unit_numbers;
        $units = [];$total_units=0;
        if(count($unit_types)  > 0){
            for ($i=0;$i<count($unit_types);$i++){
                $units[$i][$unit_types[$i]] = $unit_numbers[$i];
                $total_units+= $unit_numbers[$i];
            }
        }
        $sale_price = str_replace(',','',$request->sale_price);
        $data['total_units'] = $total_units;
        $data['price_per_unit'] = $sale_price/$total_units;
        $data['units'] = json_encode($units);
        $sale->update($data);
        flash('Property has been updated successfully.','success');
        return redirect()->route('market-comparable.index',$request->memorandum_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MarketComparable::find($id)->delete();
        flash('Property has been deleted successfully.','success');
        return back();
    }

    //validation functions starts here
    public function coverPageValidator(array $data){
        return Validator::make($data, [
            'section_cover' => 'required'
        ]);
    }

    public function mapValidator(array $data){
        return Validator::make($data, [
            'map_image' => 'required',
            'map_subjects' => 'required'
        ]);
    }
}
