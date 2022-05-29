<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;


use App\Http\Controllers\Controller;
use App\models\admin\CheifSkills;
use App\models\ChiefsSkills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Chief;

class ChiefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Chief::latest()->get();
        return view('admin.sections.chiefs.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.chiefs.create');
    }
    public function AcceptOrRefuse(Request $request){
        $user = Chief::find($request->userId);

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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:chiefs',
            'password' => 'required',
            'phone' => 'required',
            'image'=>'required',
            'gender'=>'required'
        ];
        $messages = [
            'fname.required' => __('chief.fname_error'),
            'lname.required' => __('chief.lname_error'),
            'email.required' => __('chief.email_error'),
            'password.required' => __('chief.password_error'),
            'phone.required' => __('chief.phone_error'),
            'gender'=>__('chief.gender_error'),
            'image'=>__('chief.image_error'),

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            $coverName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/assets/images/chiefs'), $coverName);

                $chief=Chief::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
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
                'state'=>1
            ]);
           //Create new chief

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
            return redirect()->route('chiefs.index')->with('success', 'The Category has created successfully.');
        }
    }
    function setDynamicIdsIntoArray($number,$array){
        for($i=0;$i < $number;$i++){
            $skills [] = $array;
        }
        return $skills;
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Chief::find($id);
        return view('admin.sections.chiefs.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Chief::find($id);
        $chief_skills = ChiefsSkills::where('chief_id',$id)->get();
        return view('admin.sections.chiefs.edit', compact('category','chief_skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteSkill($skill_id){
        $skill = ChiefsSkills::find($skill_id);

        $skill->delete();
        return redirect()->back()->with('messages','Done Successfully');
    }
    public function update(Request $request,  $chief)
    {
        $Chief = Chief::find($chief);
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'gender'=>'required'
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {

            if($request->image){
               unlink(public_path('/assets/images/chiefs') .'/' . $request->old);
                $coverName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/assets/images/chiefs'), $coverName);
            }else{
                $coverName = $request->old;
            }
                $Chief->update([
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

                    'state'=>$request->state,
            ]);
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
                    'chief_id'=>$Chief->id,
                ]);
            }
            return redirect()->route('chiefs.index')
                ->with('success', 'Chief updated successfully');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($category)
    {

        $old = Chief::find($category);
        $chiefs_skills = ChiefsSkills::where('chief_id',$category)->get();
        foreach ($chiefs_skills as $chief){
            $chief->delete();
        }
        $old->delete();
        return redirect()->route('chiefs.index')->with('success', 'Product deleted successfully');
    }
}
