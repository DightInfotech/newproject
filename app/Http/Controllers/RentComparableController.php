<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Memorandum;
use App\Models\PricingFinancial;
use App\Models\RentComparable;
use App\Models\RentComparableField;
use App\Models\RentComparableGraph;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RentComparableController extends Controller
{
    public function loadAvgOccupancyGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '74'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $rent_comparables = RentComparable::where('memorandum_id',$id)->get();
        $avg_occup = $rent_comparables->avg('occupancy');
        $pf = PricingFinancial::where('memorandum_id',$id)->first();
        $assets = Asset::all();
        $rec = RentComparableField::where('memorandum_id',$id)->first();
        return view('backend.memorandums.rent-comparables.occupancy-graph',compact('assets','rec','memorandum','pro_bar','rent_comparables','avg_occup','pf'));
    }

    public function updateAvgOccupancyGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();
        $occup = $request->avg_occupancy;
        $occup = str_replace('data:image/png;base64,', '', $occup);
        $occup = str_replace(' ', '+', $occup);
        $avgOccupImg = 'occupancy-avg-graph-'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$avgOccupImg));
        Storage::disk('public')->put('graph-images/'.$avgOccupImg, base64_decode($occup));
        $data['avg_occupancy'] = $avgOccupImg;
        RentComparableField::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.rent-comparable.rents.graphs', $memorandum->id);
    }

    public function loadAvgRentGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '76'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $rent_comparables = RentComparable::where('memorandum_id',$id)->get();
        if(!empty($rent_comparables)){
            $br1ba = []; $br2ba = []; $average_br1ba = 0; $average_br2ba = 0;
            foreach ($rent_comparables as $rent){
                $units = json_decode($rent->units);
                for($i=0;$i<count($units);$i++){
                    $valArr = [];$val2Arr = [];
                    if(key($units[$i]) == '1BR 1BA'){
                        $valArr = $units[$i]->{key($units[$i])};
                        $br1ba[] = $this->cleanString($valArr[2]);
                    }else if(key($units[$i]) == '2BR 1BA'){
                        $val2Arr = $units[$i]->{key($units[$i])};
                        $br2ba[] = $this->cleanString($val2Arr[2]);
                    }
                }
            }
        }
        if(count($br1ba) > 0) {
            $br1ba = array_filter($br1ba);
            $average_br1ba = number_format(array_sum($br1ba)/count($br1ba),2,'.','');
        }
        if(count($br2ba) > 0) {
            $br2ba = array_filter($br2ba);
            $average_br2ba = number_format(array_sum($br2ba)/count($br2ba),2,'.','');
        }
        $pf = PricingFinancial::where('memorandum_id',$id)->first();
        return view('backend.memorandums.rent-comparables.rent-graph',compact('assets','rec','memorandum','pro_bar','rent_comparables','br1ba','br2ba','average_br1ba','average_br2ba','pf'));
    }

    public function updateAvgRentGraphs(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();
        $rent1 = $request->avg_rent_1bd;
        $rent1 = str_replace('data:image/png;base64,', '', $rent1);
        $rent1 = str_replace(' ', '+', $rent1);
        $rentImgName1 = 'rent-avg-1bd1ba-graph-'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$rentImgName1));
        Storage::disk('public')->put('graph-images/'.$rentImgName1, base64_decode($rent1));
        $rent2 = $request->avg_rent_2bd;
        $rent2 = str_replace('data:image/png;base64,', '', $rent2);
        $rent2 = str_replace(' ', '+', $rent2);
        $rentImgName2 = 'rent-avg-2bd1ba-graph-'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$rentImgName2));
        Storage::disk('public')->put('graph-images/'.$rentImgName2, base64_decode($rent2));
        $data['avg_rent_1bd'] = $rentImgName1;
        $data['avg_rent_2bd'] = $rentImgName2;
        RentComparableField::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.demographic.section.cover',$memorandum->id);
    }

    public function loadSectionCoverPage(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $rec = RentComparableField::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '68'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.rent-comparables.section-cover', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateSectionCoverPage(Request $request, $id){
        $this->coverPageValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        RentComparableField::updateOrCreate([
            'memorandum_id' => $id
        ],$request->all());
        return redirect()->route('rent-comparables.graphs.index', $memorandum->id);
    }

    //load graphs
    public function loadGraphs(Request $request,$id)
    {
        $memorandum = Memorandum::findOrFail($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '70'
            ]
        );
        $graphs = RentComparableGraph::where('memorandum_id',$id)->paginate(20);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.rent-comparables.graphs.index',compact('graphs','memorandum','pro_bar'));
    }

    public function createGraph($id)
    {
        $memorandum = Memorandum::findOrFail($id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.rent-comparables.graphs.create',compact('memorandum','pro_bar'));
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
        $graph = RentComparableGraph::create($data);
        flash('Market Comparable Graph has been added successfully.','success');
        return redirect()->route('rent-comparables.graphs.edit',$graph->id);
    }

    public function editGraph($id)
    {
        $graph = RentComparableGraph::find($id);
        $memorandum = Memorandum::find($graph->memorandum_id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.rent-comparables.graphs.edit',compact('graph','memorandum','pro_bar'));
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
        $graphImgName = 'graph-img-rent'.$id.'.'.'png';
        @unlink(storage_path('app/public/graph-images/'.$graphImgName));
        Storage::disk('public')->put('graph-images/'.$graphImgName, base64_decode($img));
        $data['graph_image'] = $graphImgName;
        RentComparableGraph::find($id)->update($data);
        flash('Rent Comparable Graph has been updated successfully.','success');
        return redirect()->route('rent-comparables.graphs.index',$request->memorandum_id);
    }

    public function destroyGraph($id)
    {
        RentComparableGraph::find($id)->delete();
        flash('Rent Comparable Graph has been deleted successfully.','success');
        return back();
    }
    //end graphs

    public function loadRentComparableMap(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $rec = RentComparableField::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '74'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.rent-comparables.map', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateRentComparableMap(Request $request, $id){
        $this->mapValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        RentComparableField::updateOrCreate([
            'memorandum_id' => $id
        ],$request->all());
        return redirect()->route('rent-comparable.index', $memorandum->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {
        $memorandum = Memorandum::find($id);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '72'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $rent_comparables = RentComparable::where('memorandum_id',$id)->paginate(20);
        return view('backend.memorandums.rent-comparables.index',compact('rent_comparables','memorandum','pro_bar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $memorandum = Memorandum::find($id);
        $assets = Asset::latest()->get();
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.rent-comparables.create',compact('assets','memorandum','pro_bar'));
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
        $unit_sqfts = $request->unit_sqfts;
        $unit_rents = $request->unit_rents;
        $units = [];$total_units=0;
        if(count($unit_types) > 0){
            for ($i=0;$i<count($unit_types);$i++){
                $rent_per_sqft = number_format($this->cleanString($unit_rents[$i])/$this->cleanString($unit_sqfts[$i]),2,'.',',');
                $units[$i][$unit_types[$i]] = array($unit_numbers[$i],$unit_sqfts[$i],$unit_rents[$i],$rent_per_sqft);
                $total_units+= $unit_numbers[$i];
            }
        }

        $data['total_units'] = $total_units;
        $data['units'] = json_encode($units);
        RentComparable::create($data);
        flash('Rent Comparable Property has been added successfully.','success');
        return redirect()->route('rent-comparable.index',$request->memorandum_id);
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
        $rent = RentComparable::find($id);
        $memorandum = Memorandum::find($rent->memorandum_id);
        $units = json_decode($rent->units);
        $assets = Asset::latest()->get();
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.rent-comparables.edit',compact('rent','assets','memorandum','pro_bar'));
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
        $rent = RentComparable::find($id);
        $data = $request->all();
        $unit_types = $request->unit_types;
        $unit_numbers = $request->unit_numbers;
        $unit_sqfts = $request->unit_sqfts;
        $unit_rents = $request->unit_rents;
        $units = [];$total_units=0;
        if(count($unit_types) > 0){
            for ($i=0;$i<count($unit_types);$i++){
                $rent_per_sqft = number_format($this->cleanString($unit_rents[$i])/$this->cleanString($unit_sqfts[$i]),2,'.',',');
                $units[$i][$unit_types[$i]] = array($unit_numbers[$i],$unit_sqfts[$i],$unit_rents[$i],$rent_per_sqft);
                $total_units+= $unit_numbers[$i];
            }
        }
        $data['total_units'] = $total_units;
        $data['units'] = json_encode($units);
        $rent->update($data);
        flash('Rent Comparable Property has been updated successfully.','success');
        return redirect()->route('rent-comparable.index',$request->memorandum_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RentComparable::find($id)->delete();
        flash('Rent Comparable Property has been deleted successfully.','success');
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

    public function cleanString($string){
        if($string)
            return str_replace(',','',$string);
        else
            return 0;
    }
}
