<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;  

class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }   
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();
        $croped_image = $input['image'];
        list($type, $croped_image) = explode(';', $croped_image);
        list(, $croped_image)      = explode(',', $croped_image);
        $croped_image = base64_decode($croped_image);
        $image_name = time().'.png';
        file_put_contents(base_path() . '/storage/app/public/cropImage/'.$image_name, $croped_image);
        return response()->json(['success'=>'Img stored successfully','img_name'=>$image_name]);
    }

}
?>