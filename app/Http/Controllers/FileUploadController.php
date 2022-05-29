<?php

namespace App\Http\Controllers;

use App\models\admin\Video;
use Illuminate\Http\Request;
//use App\FileUpload;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('admin.sections.upload_media_test');
    }
    public function fileUpload1()
    {
        return view('chief.sections.upload_media_test');
    }

    public function fileStore(Request $request)
    {
        $request->validate([
             'type'=>'required',
             'name'=>'required',
        ]);
        $fileName = time().'.'.request()->file->getClientOriginalExtension();

        $request->file->move(public_path('assets/videos/'.$request->type.''), $fileName);

        Video::create([
            'video'=>$fileName,
            'type'=>$request->type,
            'name'=>$request->name
        ]);
        return response()->json(['success'=>'File Uploaded Successfully']);
    }
}
