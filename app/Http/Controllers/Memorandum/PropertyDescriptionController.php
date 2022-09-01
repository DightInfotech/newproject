<?php

namespace App\Http\Controllers\Memorandum;

use App\Models\Asset;
use App\Models\GalleryTemplate;
use App\Models\IncomeExpense;
use App\Models\Memorandum;
use App\Models\MemorandumMember;
use App\Models\MemorandumSetting;
use App\Models\MixUnit;
use App\Models\PricingFinancial;
use App\Models\PropertyDescription;
use App\Models\yearProjection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PropertyDescriptionController extends Controller
{
    public function loadSectionCoverPage(Request $request,$id){
        $memorandum = Memorandum::findOrFail($id);
        $rec = PropertyDescription::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '38'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.section-cover', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateSectionCoverPage(Request $request, $id){
        $this->coverPagevalidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        PropertyDescription::updateOrCreate([
            'memorandum_id' => $id
        ],$request->all());
        return redirect()->route('load.description.location.highlights', $memorandum->id);
    }

    public function loadLocationHighlights(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = PropertyDescription::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '40'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.location-highlights', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateLocationHighlights(Request $request, $id){
        $this->locationHighlightsValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        PropertyDescription::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.description.investment.highlights', $memorandum->id);
    }

    public function loadInvestmentHighlights(Request $request,$id){

        $memorandum = Memorandum::find($id);
        $rec = PropertyDescription::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '42'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.investment-highlights', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateInvestmentHighlights(Request $request, $id){
        $this->investmentHighlightsValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        PropertyDescription::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.description.investment.highlights.more', $memorandum->id);
    }

    public function loadInvestmentHighlightsMore(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = PropertyDescription::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '44'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.investment-highlights-more', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateInvestmentHighlightsMore(Request $request, $id){
        $this->investmentHighlightsMoreValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        PropertyDescription::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.description.summary', $memorandum->id);
    }

    public function loadPropertySummary(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = PropertyDescription::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '46'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.property-summary', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updatePropertySummary(Request $request, $id){
        $this->propertySummaryValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        PropertyDescription::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.description.amenities', $memorandum->id);
    }

    public function loadAmenities(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = PropertyDescription::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '48'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.amenities', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateAmenities(Request $request, $id){
        $this->amenitiesValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        PropertyDescription::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.description.gallery-pages', $memorandum->id);
    }
    //start crud gallery templates
    public function loadDescriptionGallery(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $gallery_pages = GalleryTemplate::where('memorandum_id',$id)->latest()->paginate(20);
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '50'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.gallery-pages.index', compact('pro_bar', 'assets','memorandum','gallery_pages'));
    }

    public function createGalleryTemplate($id){
        $memorandum = Memorandum::find($id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.gallery-pages.create',compact('memorandum','pro_bar','assets'));
    }

    public function storeDescriptionGallery(Request $request){
        $this->galleryValidator($request->all())->validate();
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
        GalleryTemplate::create($data);
        return redirect()->route('load.description.gallery-pages', $memorandum->id);
    }

    public function editGalleryTemplate($id){
        $rec = GalleryTemplate::find($id);
        $memorandum = Memorandum::find($rec->memorandum_id);
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.gallery-pages.edit',compact('memorandum','pro_bar','assets','rec'));
    }

    public function updateDescriptionGallery(Request $request, $id){
        $this->galleryValidator($request->all())->validate();
        $data = $request->all();
        $images  = $request->images;
        $images_arr = [];
        foreach ($images as $image){
            if(!is_null($image)){
                $images_arr[] = $image;
            }
        }
        $data['images'] = json_encode($images_arr);
        $rec = GalleryTemplate::find($id);
        $rec->update($data);
        $memorandum = Memorandum::findOrFail($rec->memorandum_id);
        return redirect()->route('load.description.gallery-pages', $memorandum->id);
    }
    public function deleteDescriptionGallery($id){
        $rec = GalleryTemplate::find($id);
        $rec->delete();
        return redirect()->route('load.description.gallery-pages', $rec->memorandum_id);
    }
    //end crud gallery templates

    public function loadPlatMaps(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = PropertyDescription::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '52'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.plat-maps', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updatePlatMaps(Request $request, $id){
        $this->platMapsValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        PropertyDescription::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.description.area-maps', $memorandum->id);
    }

    public function loadAreaMaps(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = PropertyDescription::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '54'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.area-maps', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateAreaMaps(Request $request, $id){
        $this->areaMapsValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        PropertyDescription::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.description.arial-photos', $memorandum->id);
    }

    public function loadArialPhotos(Request $request,$id){

        $memorandum = Memorandum::findOrFail($id);
        $rec = PropertyDescription::where('memorandum_id',$id)->first();
        $memorandum->memorandum_setting->update(
            [
                'current_url' => $request->path(),
                'progress_counter' => '56'
            ]
        );
        $pro_bar = $memorandum->memorandum_setting->progress_counter;
        $assets = Asset::all();
        return view('backend.memorandums.description.arial-photos', compact('pro_bar', 'assets','memorandum','rec'));
    }

    public function updateArialPhotos(Request $request, $id){
        $this->arialPhotosValidator($request->all())->validate();
        $memorandum = Memorandum::findOrFail($id);
        $data = $request->all();

        PropertyDescription::updateOrCreate([
            'memorandum_id' => $id
        ],$data);
        return redirect()->route('load.recent-sales.section.cover', $memorandum->id);
    }

    //validation functions starts here
    public function coverPagevalidator(array $data){
        return Validator::make($data, [
            'cover_page_1' => 'required'
        ]);
    }

    public function locationHighlightsValidator(array $data){
        return Validator::make($data, [
            'column1' => 'required',
            'column2' => 'required',
            'column3' => 'required'
        ]);
    }

    public function investmentHighlightsValidator(array $data){
        return Validator::make($data, [
            'invest_highlights1' => 'required',
            'highlights_image1' => 'required',
            'highlights_image2' => 'required'
        ]);
    }

    public function investmentHighlightsMoreValidator(array $data){
        return Validator::make($data, [
            'invest_highlights2' => 'required',
            'highlights_image3' => 'required',
            'highlights_image4' => 'required'
        ]);
    }

    public function propertySummaryValidator(array $data){

        return Validator::make($data, [
            'parcel_number' => 'required',
            'zoning' => 'required',
            'type_of_ownership' => 'required',
            'density_units_per_acre' => 'required',
            'parking' => 'required',
            'parking_ratio' => 'required',
            'landscaping' => 'required',
            'topography' => 'required',
            'water' => 'required',
            'electric' => 'required',
            'gas' => 'required',
            'foundation' => 'required',
            'framing' => 'required',
            'exterior' => 'required',
            'parking_surface' => 'required',
            'roof' => 'required',
            'hvac' => 'required'
        ]);
    }

    public function amenitiesValidator(array $data){

        return Validator::make($data, [
            'loc_amenities' => 'required',
            'amenity_image1' => 'required',
            'amenity_image2' => 'required',
            'unit_amenities' => 'required'
        ]);
    }

    public function galleryValidator(array $data){

        return Validator::make($data, [
            'title' => 'required',
            'images' => 'required|array',
            'template' => 'required'
        ]);
    }

    public function platMapsValidator(array $data){
        return Validator::make($data, [
            'plat_map1' => 'required',
            'plat_map2' => 'required'
        ]);
    }

    public function areaMapsValidator(array $data){
        return Validator::make($data, [
            'area_map1' => 'required',
            'area_map2' => 'required'
        ]);
    }

    public function arialPhotosValidator(array $data){
        return Validator::make($data, [
            'arial_image1' => 'required',
            'arial_image2' => 'required'
        ]);
    }
}
