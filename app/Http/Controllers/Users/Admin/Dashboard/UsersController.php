<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;

use App\Admin;
use App\Http\Controllers\Controller;
use App\models\admin\Package;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = User::latest()->get();
        return view('admin.sections.users.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::get();
        return view('admin.sections.users.create',compact('packages'));

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
                $request->file($filename)->move(public_path('/assets/images/users/'), $image);
                return $image;
            }else{
                return 0;
            }
        }
    }


    public function store(Request $request)
    {

        $rules = [

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            $filename = 'image';
            $image = $this->uploadVideo($request, $filename);

            $package = Package::find($request->package_id);
            $duration = intval($package->duration);
            $date = date('Y-m-d');
                //increment 2 days
            $mod_date = strtotime($date . '+ '.$duration.' days');
            $endDateSubscripe= date('Y-m-d', $mod_date) ;

            $chief = User::create([
                'fname' =>$request['fname'],
                'lname'=>$request['lname'],
                'email'=>$request['email'],
                'password'=> Hash::make($request['password']),
                'phone'=>$request['phone'],
                'countryCode'=>$request['countryCode'],
                'code'=>1,
                'active'=>1,
                'state'=>1,
                'gender'=>$request['gender'],
                'package_id'=>$request['package_id'],
                'endDateSubscripe'=>$endDateSubscripe,
                'image'=>$image,
                'user_type'=>'Student',
                'rememberToken'=>'',
                'remember_token'=>''
            ]);//Create new User


            return redirect()->route('users.index')->with('success', 'The User has created successfully.');
        }
    }
    public function BanUser(Request $request){
        $user = User::find($request->userId);
        switch ($request->ban) {
            case '0':
                $user->update([
                    'active' => 0
                ]);
                return redirect()->back()->with('message', 'Done Successfully ');
            case '1':
                $user->update([
                    'active' => 1
                ]);
                return redirect()->back()->with('message', 'Done Successfully ');
        }
    }
    public function AcceptOrRefuse(Request $request){
        $user = User::find($request->userId);

        switch ($request->state){
           case '0':
               $user->update([
                  'state'=>0
               ]);
               return redirect()->back()->with('message','Done Successfully ');
           case '1':
               $user->update([
                   'state'=>1
               ]);
               return redirect()->back()->with('message','Done Successfully ');
           case '2':
               $user->update([
                   'state'=>2
               ]);
               return redirect()->back()->with('message','Done Successfully ');
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
        $packages = Package::get();

        $category = User::find($id);
        return view('admin.sections.users.show', compact('category','packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = User::find($id);
        $packages = Package::get();
        return view('admin.sections.users.edit', compact('category','packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $current_user =User::find($user);
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            if($request->image){
                unlink(public_path('/assets/images/users') .'/' . $request->old);
                $coverName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/assets/images/users'), $coverName);
            }else{
                $coverName = $request->old;
            }
                $current_user->update([
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'email' => $request['email'],
                'countryCode'=>$request->countryCode,
                'phone' => $request['phone'],
                'city' => $request['city'],
                'gender' => $request['gender'],
                'package_id' => $request['package_id'],
                'state' => 1,
                'image' =>   $coverName,
                'password' => Hash::make($request['password']),
                'user_type' => 'Student',
            ]);//Create new User

            return redirect()->route('users.index')->with('success', 'The User has Updated successfully.');
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
        $old = User::find($id);
        $old->delete();
        return redirect()->route('users.index')->with('message', 'Deleted successfully');
    }
}
