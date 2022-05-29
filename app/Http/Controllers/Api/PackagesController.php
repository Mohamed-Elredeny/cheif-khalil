<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\models\admin\Package;
use App\models\UserPackages;
use App\User;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        $msg = ['count'=>count($packages)];
        return $this->returnData(['packages'], [$packages], $msg);
    }
    public function success_package(Request $request)
    {
        $package = UserPackages::find($request->package_id);
        $email = $request->email;
        $NewDate=Date('y:m:d', strtotime('+' . $package->duration . ' days'));

        $currentUser = User::where('email',$email);
        $user = $currentUser->update([
            'package_id'  => $request->package_id,
            'endDateSubscripe' => $NewDate,
        ]);
        if($user) {
            $msg = 'you have successfully subscribed';
            return $this->returnSuccessMessage($msg, 200);
        }else
        {
            $msg = 'you did not subscribe there are some errors';
            return $this->returnError( 401,$msg);
        }

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
        $courses = UserPackages::find($id);
        $msg = ['id'=>$id];
        return $this->returnData(['packages'], [$courses], $msg);
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
