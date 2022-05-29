<?php

namespace App\Http\Controllers\Api;

use App\Chief;
use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\models\Courses;
use Illuminate\Http\Request;

class ChiefController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Chief::all();
        $msg = ['count'=>count($packages)];
        return $this->returnData(['chiefs'], [$packages], $msg);
    }

    public function courses($chief_id){
        $courses = Courses::where('chief_id',$chief_id)->get();
        $msg = ['count'=>count($courses)];
        return $this->returnData(['courses'], [$courses], $msg);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = Chief::find($id);
        $msg = ['id'=>$id];
        return $this->returnData(['chief_data'], [$courses], $msg);
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
