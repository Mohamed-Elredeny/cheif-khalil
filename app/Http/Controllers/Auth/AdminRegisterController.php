<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showRegisterForm()
    {
        return view('auth.admin-register');
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

    public function register(Request $request)
    {
        $this->validate($request, [
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $filename = 'image';
        $image = $this->uploadVideo($request, $filename);

/*        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('/assets/images/admins'), $imageName);*/

        $request['image'] = $image;
        $request['password'] = Hash::make($request->password);
        $request['city'] = 'alex';
        Admin::create($request->all());

        return redirect()->intended(route('admin.dashboard'));
    }
}
