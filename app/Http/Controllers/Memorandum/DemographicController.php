<?php

namespace App\Http\Controllers\Memorandum;

use App\Models\Asset;
use App\Models\Demographic;
use App\Models\DemographicPage;
use App\Models\Memorandum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DemographicController extends Controller
{
    public function loadSectionCoverPage(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $rec = Demographic::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '78'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.demographic.section-cover', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateSectionCoverPage(Request $request, $id){
        $this->coverPageValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        Demographic::updateOrCreate([
            'memorandum_id' => $id
        ],$request->all());
        return redirect()->route('load.demographic-pages', $memorandum->id);
    }

    //start crud demographic templates
    public function loadDemographicPages(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $demographic_pages = DemographicPage::where('memorandum_id',$id)->latest()->paginate(20);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '80'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.demographic.demographic-pages.index', compact('pro_bar', 'assets','memorandum','demographic_pages'));
    }

    public function createDemographicPages($id){
        $memorandum = Memorandum::find($id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.demographic.demographic-pages.create',compact('memorandum','pro_bar','assets'));
    }

    public function storeDemographicPages(Request $request){
        $this->demographicPagesValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($request->memorandum_id);
        $data = $request->all();
        $images  = $request->images;
        $images_arr = [];
        foreach ($images as $image){
            if(!is_null($image)){
                $images_arr[] = $image;
            }
        }
        $data['images'] = json_encode($images_arr);
        DemographicPage::create($data);
        return redirect()->route('load.demographic-pages', $memorandum->id);
    }

    public function editDemographicPages($id){
        $rec = DemographicPage::find($id);
        $memorandum = Memorandum::find($rec->memorandum_id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.demographic.demographic-pages.edit',compact('memorandum','pro_bar','assets','rec'));
    }

    public function updateDemographicPages(Request $request, $id){
        $this->demographicPagesValidator($request->all())->validate();
        $data = $request->all();
        $images  = $request->images;
        $images_arr = [];
        foreach ($images as $image){
            if(!is_null($image)){
                $images_arr[] = $image;
            }
        }
        $data['images'] = json_encode($images_arr);
        $rec = DemographicPage::find($id);
        $rec->update($data);
        $memorandum = Memorandum::findOrFail($rec->memorandum_id);
        return redirect()->route('load.demographic-pages', $memorandum->id);
    }
    public function deleteDemographicPages($id){
        $rec = DemographicPage::find($id);
        $rec->delete();
        return redirect()->route('load.demographic-pages', $rec->memorandum_id);
    }

    //validation functions starts here
    public function coverPageValidator(array $data){
        return Validator::make($data, [
            'section_cover' => 'required'
        ]);
    }

    public function demographicPagesValidator(array $data){

        return Validator::make($data, [
            'images' => 'required|array',
            'template' => 'required'
        ]);
    }
}
