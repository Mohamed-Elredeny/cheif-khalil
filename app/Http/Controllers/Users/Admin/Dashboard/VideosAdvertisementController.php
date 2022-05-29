<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\models\Adds;
use App\models\admin\Package;
use App\models\admin\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideosAdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Adds::latest()->get();
        return view('admin.sections.advs.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videos = Video::where('type','adds')->get();
        return view('admin.sections.advs.create',compact('videos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadVideo(Request $request,$filename)
    {
        $filename = strval($filename);
        if ($request->hasFile($filename)) {
            //  Let's do everything here
            if ($request->file($filename)->isValid()) {
                //
                $validated = $request->validate([
                    $filename => 'file',
                ]);
                $extension = $request->file($filename)->extension();
                $image = time() . '.' . $request->file($filename)->getClientOriginalExtension();
                $request->file($filename)->move(public_path('/assets/videos/adds/'), $image);
                return $image;
            }else{
                return 0;
            }
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'image' => 'required',
            'from' => 'required',
            'to' => 'required',
            'link'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $filename = 'image';
            $url = $request->image;
            Adds::create([
                'url' =>$url,
                'skiped'=>0,
                'clicked'=>0,
                'from'=>$request->from,
                'to'=>$request->to,
                'link'=>$request->link,
            ]);
        }
        return redirect()->back()->with('message', 'Done Successfully');
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
        //
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
        $package = Adds::find($id);

        $package->update([
            'link' => $request->link,
            'from' => $request->from,
            'to' => $request->to,
        ]);


        return redirect()->back()->with('message', 'Done Successfully');
    }
    public function deleteAdv($adv_id){
        $skill = Adds::find($adv_id);

        $skill->delete();
        return redirect()->back()->with('messages','Done Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
