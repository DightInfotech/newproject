<?php

namespace App\Http\Controllers\Memorandum;

use App\Mail\MemoFileSent;
use App\Models\MemoFile;
use App\Models\Memorandum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = MemoFile::latest()->paginate(10);
        return view('backend.memorandums.files.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send_file($id)
    {
        $file = MemoFile::find($id);
        return view('backend.memorandums.files.send-form',compact('file'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sent_file(Request $request)
    {
        $file = MemoFile::find($request->file_id);
        $memorandum = Memorandum::find($request->memorandum_id);
        $memo_sent = \App\Models\MemoFileSent::create([
            'memo_file_id' => $file->id,
            'link_ref' => uniqid().'_'.time(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        Mail::to($request->email)->send(new MemoFileSent($memorandum,$memo_sent,$file));
        flash('Memorandum file has been sent successfully.','success');
        return redirect()->route('memo.files');
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
}
