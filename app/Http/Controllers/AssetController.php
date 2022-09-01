<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AssetController extends Controller
{
    public function index(){
        $assets = Asset::all();

        return view('backend.assets.index', compact('assets'));
    }

    public function create(){
        return view('backend.assets.create');
    }

    public function store(Request $request){
        //$this->validator($request->all())->validate();
        $s3 = Storage::disk('s3');
        if( $files = $request->file('file') ){
            foreach ($files as $file){
                $file_name = $file->getClientOriginalName();
                $file_name = time().'_'.$file_name;
                $file->storeAs(
                    'public/assets', $file_name
                );
                $local_path = storage_path() . '/app/public/assets/';
                $file_path = '/assets/' . $file_name;
                if ($s3->put($file_path, file_get_contents($local_path . $file_name), 'public')) {
                    $image = $file_name;
                    $asset_name = explode('.',$image);
                    Asset::create([
                        'title' =>  $asset_name[0],
                        'alt'   =>  'asset-image',
                        'file'  =>  $image,
                    ]);
                    @unlink($local_path . $file_name);
                }
            }
            return response()->json('success',200);
        }
        return response()->json('fail',500);
    }

    public function validator(array $data){
        return validator::make( $data, [
            'title'     =>  'required|string',
            'alt'       =>  'string',
            'file'      =>  'mimes:jpg,png,jpeg,gif'
        ]);
    }

    public function getAssetWithId(Request $request){
        $asset_id = $request->asset_id;
        $asset = Asset::where('id',$asset_id)
            ->where('agency_id', Auth()->user()->agency_id)
            ->get();
        $asset_file = $asset->file;
        return response()->json(['data'=>$asset_file]);
    }

    public function getAsset(Request $request){
        $asset = Asset::findOrFail($request->asset_id);

        return response()->json(['data' => $asset]);
    }

    public function ajaxUpdate(Request $request){
        $asset = Asset::findOrFail($request->asset_id);
        $asset->update([
            'title' =>  $request->asset_title,
            'alt'   =>  $request->asset_alt
        ]);
        return response()->json(['data'=>$asset]);
    }

    public function ajaxDelete(Request $request){
        $asset = Asset::findOrFail($request->asset_id);
        $asset->delete();
        return response()->json(['data'=>'success']);
    }

    public function dropzoneFileUpload(Request $request){
        $file = $request->file;
        $s3 = Storage::disk('s3');
        $file_name = $request->file('file')->getClientOriginalName();
        $file_name = time().'_'.$file_name;
        $request->file('file')->storeAs(
            'public/assets', $file_name
        );
        $local_path = storage_path() . '/app/public/assets/';

        $file_path = '/assets/' . $file_name;

        if ($s3->put($file_path, file_get_contents($local_path . $file_name), 'public')) {
            $image = $file_name;
            @unlink($local_path . $file_name);
            $title = explode('.',$image);
            $asset = Asset::create([
                'title'     =>  $title[0],
                'alt'       =>  'asset-image',
                'file'      =>  $image,
            ]);
            return response()->json(['data'=>$asset->file]);
        } else {
            return response()->json('error', 400);
        }

    }
}
