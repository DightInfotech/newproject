<?php

namespace App\Http\Controllers\Memorandum;

use App\Models\Asset;
use App\Models\MarketPlan;
use App\Models\MarketTimelinePage;
use App\Models\Memorandum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MarketPlanController extends Controller
{
    public function loadSectionCoverPage(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $rec = MarketPlan::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '97'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.market-plan.section-cover', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateSectionCoverPage(Request $request, $id){
        $this->coverPageValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        MarketPlan::updateOrCreate([
            'memorandum_id' => $id
        ],$request->all());
        return redirect()->route('load.market-plan.timeline.pages', $memorandum->id);
    }

    //start crud gallery templates
    public function loadMarketTimelinePages(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $market_timeline_pages = MarketTimelinePage::where('memorandum_id',$id)->latest()->paginate(20);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '100'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.market-plan.market-timelines.index', compact('pro_bar', 'assets','memorandum','market_timeline_pages'));
    }

    public function createMarketTimelinePages($id){
        $memorandum = Memorandum::find($id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.market-plan.market-timelines.create',compact('memorandum','pro_bar'));
    }

    public function storeMarketTimelinePages(Request $request){
        $this->timelineValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($request->memorandum_id);
        $data = $request->all();
        MarketTimelinePage::create($data);
        return redirect()->route('load.market-plan.timeline.pages', $memorandum->id);
    }

    public function editMarketTimelinePages($id){
        $rec = MarketTimelinePage::find($id);
        $memorandum = Memorandum::find($rec->memorandum_id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        return view('backend.memorandums.market-plan.market-timelines.edit',compact('memorandum','pro_bar','rec'));
    }

    public function updateMarketTimelinePages(Request $request, $id){
        $this->timelineValidator($request->all())->validate();
        $data = $request->all();
        $rec = MarketTimelinePage::find($id);
        $rec->update($data);
        $memorandum = Memorandum::findOrFail($rec->memorandum_id);
        return redirect()->route('load.market-plan.timeline.pages', $memorandum->id);
    }
    public function deleteMarketTimelinePages($id){
        $rec = MarketTimelinePage::find($id);
        $rec->delete();
        return redirect()->route('load.market-plan.timeline.pages', $rec->memorandum_id);
    }
    //end crud gallery templates

    public function coverPageValidator(array $data){
        return Validator::make($data, [
            'section_cover' => 'required'
        ]);
    }

    public function timelineValidator(array $data){
        return Validator::make($data, [
            'column1' => 'required',
            'column2' => 'required'
        ]);
    }
}
