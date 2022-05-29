<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\models\admin\Category;
use App\models\LiveStreamVideos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteStream($stream_id){
        LiveStreamVideos::destroy($stream_id);
        return redirect()->back();
    }
    public function index()
    {
        $lives = LiveStreamVideos::get();
        return view('admin.sections.liveStream.index',compact('lives'));
    }
    public function changeFlag($flag){

        $lives = Live::get();
        return view('admin.sections.liveStream.index',compact('lives','flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function getVideoId($url){
        $i=-1;
        $result='';
        for($j=1;$j<= strlen($url);$j++ ){
            $res = substr($url,$i,1);
            if($res === '/'){
                break;
            }
            $i--;
            $result .=$res;
        }
        return strrev ($result);
    }
    public function create()
    {
        $categories =Category::get();
        return view('admin.sections.liveStream.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'title_ar' => 'required',
            'title_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'start_date'=>'required',
            'url'=>'required',
            'category_id'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $url = 'https://www.youtube.com/embed/'.$this->getVideoId($request->url).'';

            LiveStreamVideos::create([
                'title_ar' => $request->title_ar,
                'title_en' => $request->title_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                'start_date'=>$request->start_date,
                'url'=>$url,
                'category_id'=>$request->category_id,
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
        //
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
