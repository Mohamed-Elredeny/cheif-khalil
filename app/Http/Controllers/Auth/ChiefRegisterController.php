<?php

namespace App\Http\Controllers\Auth;

use App\Chief;
use App\models\ChiefsSkills;
use Illuminate\Http\Request;
use App\models\admin\CheifSkills;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ChiefRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:chief');
    }

    public function showRegisterForm()
    {
        return view('auth.chief-register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:chiefs',
            'password' => ['required', 'string', 'min:8','confirmed'],
            'phone' => 'required',
            'gender'=>'required',
            'image'=> ['required','image','mimes:jpg,png,gif,jpeg','max:2048'],
        ]);
        $request['password'] = Hash::make($request->password);
            $coverName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/assets/images/chiefs'), $coverName);

            $chief = Chief::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => $request->password,
                'phone'=>$request->phone,
                'gender'=>$request->gender,
                'image' => $coverName,
                'biography_ar'=>$request->biography_ar,
                'biography_en'=>$request->biography_en,
                'professionalLife_ar'=>$request->professionalLife_ar,
                'professionalLife_en'=>$request->professionalLife_en,
                'instagram' =>$request->instagram,
                'twitter'=>$request->twitter,
                'facebook'=>$request->facebook,
                'snapchat'=>$request->snapchat,
                'state' => '2',
            ]);//Create new chief



            for($i=0;$i<$request->skills;$i++) {
                $skills_ar []= $request->input('skill_ar'.$i);
                $skills_en []= $request->input('skill_en'.$i);
                $percentages[] = $request->input('percentages'.$i);
            }
            for($i = 0 ;$i < $request->skills;$i++) {
                ChiefsSkills::create([
                    'skill_en'=> $skills_en[$i],
                    'skill_ar'=> $skills_ar[$i],
                    'percentage'=>$percentages[$i],
                    'chief_id'=>$chief->id,
                ]);
            }


        return redirect()->intended(route('chief.dashboard'));

    }
}
