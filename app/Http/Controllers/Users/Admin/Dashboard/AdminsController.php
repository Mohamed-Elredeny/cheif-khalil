<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use App\models\admin\Package;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Admin::latest()->get();
        return view('admin.sections.admins.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.admins.create');
    }
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
                $request->file($filename)->move(public_path('/assets/images/admins/'), $image);
                return $image;
            }else{
                return 0;
            }
        }
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
            'fname'=>'required',
            'lname'=>'required',
            'password'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            $filename = 'image';
            $image = $this->uploadVideo($request, $filename);
                Admin::create([
                'fname' =>$request['fname'],
                'lname'=>$request['lname'],
                'email'=>$request['email'],
                'city'=>'city',
                'gender'=>$request['gender'],
                'password'=> Hash::make($request['password']),
                'phone'=>$request['phone'],
                'image'=>$image,
                'facebock'=>$request['facebock'],
                'twitter'=>$request['twitter'],
                'instagram'=>$request['instagram'],
                'snapchat'=>$request['snapchat'],
            ]);//Create new User


            return redirect()->route('admins.index')->with('success', 'The Admin has created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Admin::find($id);
        return view('admin.sections.admins.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Admin::find($id);
        return view('admin.sections.admins.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin)
    {
        $current_user =Admin::find($admin);
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            if($request->image){
                unlink(public_path('/assets/images/admins') .'/' . $request->old);
                $coverName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/assets/images/admins'), $coverName);
            }else{
                $coverName = $request->old;
            }
            $current_user->update([
                'fname' =>$request['fname'],
                'lname'=>$request['lname'],
                'email'=>$request['email'],
                'gender'=>$request['gender'],
                'phone'=>$request['phone'],
                'image'=>$coverName,
                'facebock'=>$request['facebock'],
                'twitter'=>$request['twitter'],
                'instagram'=>$request['instagram'],
                'snapchat'=>$request['snapchat'],
            ]);//Create new User

            return redirect()->route('admins.index')->with('success', 'The User has created successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Admin::find($id);
        $old->delete();
        return redirect()->route('admins.index')->with('message', 'Deleted successfully');
    }
}
