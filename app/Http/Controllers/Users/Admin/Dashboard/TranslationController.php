<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\models\admin\Video;
use App\models\Footer;
use App\models\Trans\Achievement;
use App\models\Trans\Privacy;
use App\models\Trans\StudentReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TranslationController extends Controller
{
    //Footer
    public function view_footer(){
        $footer = Footer::get();
        if(count($footer) == 0 ){
           $footer =Footer::create([
               'address_ar'=> 'Add Your Address Ar',
                'address_en'=> 'Add Your Address En' ,
                'phone'=> 'Add Your  Phone',
                'email'=> 'Add Your Emails',
                 'facebook'=>'Facebook Account',
                'twitter'=>'Twitter Account',
                'Instagram'=>'Instagram Account',
                'snapchat'=>'Snapchat Account'
            ]);
        }else{
            $footer = Footer::first();
        }

        return view('admin.sections.translations.footer',compact('footer'));
    }
    public function update_footer(Request $request){
        $package =  Footer::first();
        $rules = [
            'address_ar' => 'required',
            'address_en' => 'required',
            'phone' => 'required',
            'email' =>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'Instagram'=>'required',
            'snapchat'=>'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $package->update([
                'address_ar' => $request->address_ar,
                'address_en' => $request->address_en,
                'phone' =>$request->phone,
                'email' =>$request->email,
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'Instagram'=>$request->Instagram,
                'snapchat'=>$request->snapchat,
            ]);
        }
        return redirect()->back()->with('message', 'Done Successfully');
    }

    //Update
    public function view_home_achievements(){
        $videos = Video::where('type','achievement')->get();

        $footer = Achievement::get();
        if(count($footer) == 0 ){
            $footer =Achievement::create([
                'title_en'=>'enter data',
                'achievement_1_en'=>'enter data',
                'achievement_2_en'=>'enter data',
                'achievement_3_en'=>'enter data',
                'achievement_details_1_en'=>'enter data',
                'achievement_details_2_en'=>'enter data',
                'achievement_details_3_en'=>'enter data',
                'title_ar'=>'enter data',
                'achievement_1_ar'=>'enter data',
                'achievement_2_ar'=>'enter data',
                'achievement_3_ar'=>'enter data',
                'achievement_details_1_ar'=>'enter data',
                'achievement_details_2_ar'=>'enter data',
                'achievement_details_3_ar'=>'enter data',
                'video'=>'enter data',
            ]);
        }else{
            $footer = Achievement::first();
        }

        return view('admin.sections.translations.home_achievements',compact('footer','videos'));
    }
    public function uodate_home_achievements(Request $request){
        $package =  Achievement::first();
        $rules = [
            'title_en'=>'required',
            'achievement_1_en'=>'required',
            'achievement_2_en'=>'required',
            'achievement_3_en'=>'required',
            'achievement_details_1_en'=>'required',
            'achievement_details_2_en'=>'required',
            'achievement_details_3_en'=>'required',
            'title_ar'=>'required',
            'achievement_1_ar'=>'required',
            'achievement_2_ar'=>'required',
            'achievement_3_ar'=>'required',
            'achievement_details_1_ar'=>'required',
            'achievement_details_2_ar'=>'required',
            'achievement_details_3_ar'=>'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if($request->video){
                $filename = 'video';
                $image = $request->input('video');
            }


            $package->update([
                'title_en'=>$request->title_en,
                'title_ar'=>$request->title_ar,
                'achievement_1_en'=>$request->achievement_1_en,
                'achievement_2_en'=>$request->achievement_2_en,
                'achievement_3_en'=>$request->achievement_3_en,
                'achievement_1_ar'=>$request->achievement_1_ar,
                'achievement_2_ar'=>$request->achievement_2_ar,
                'achievement_3_ar'=>$request->achievement_3_ar,
                'achievement_details_1_ar'=>$request->achievement_details_1_ar,
                'achievement_details_2_ar'=>$request->achievement_details_2_ar,
                'achievement_details_3_ar'=>$request->achievement_details_3_ar,
                'achievement_details_1_en'=>$request->achievement_details_1_en,
                'achievement_details_2_en'=>$request->achievement_details_2_en,
                'achievement_details_3_en'=>$request->achievement_details_3_en,
                'video'=>$image
            ]);
        }
        return redirect()->back()->with('message', 'Done Successfully');
    }





    public function view_home_students_reviews(){
        $categories = StudentReview::get();
        return view('admin.sections.translations.home_students_reviews_index',compact('categories'));
    }
    public function uodate_students_reviews(Request $request){
        $package =  Achievement::first();
        $rules = [
            'chief_name_ar'=>'required',
            'chief_role_ar'=>'required',
            'chief_description_ar'=>'required',
            'chief_name_en'=>'required',
            'chief_role_en'=>'required',
            'chief_description_en'=>'required',
            'image'=>'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            if($request->video){
                $filename = 'video';
                $image = $this->uploadVideo($request, $filename);
            }else{
                $image = $request->old;
            }


            $package->update([
                'title_en'=>$request->title_en,
                'title_ar'=>$request->title_ar,
                'achievement_1_en'=>$request->achievement_1_en,
                'achievement_2_en'=>$request->achievement_2_en,
                'achievement_3_en'=>$request->achievement_3_en,
                'achievement_1_ar'=>$request->achievement_1_ar,
                'achievement_2_ar'=>$request->achievement_2_ar,
                'achievement_3_ar'=>$request->achievement_3_ar,
                'achievement_details_1_ar'=>$request->achievement_details_1_ar,
                'achievement_details_2_ar'=>$request->achievement_details_2_ar,
                'achievement_details_3_ar'=>$request->achievement_details_3_ar,
                'achievement_details_1_en'=>$request->achievement_details_1_en,
                'achievement_details_2_en'=>$request->achievement_details_2_en,
                'achievement_details_3_en'=>$request->achievement_details_3_en,
                'video'=>$image
            ]);
        }
        return redirect()->back()->with('message', 'Done Successfully');
    }
    public function create_review()
    {
        return view('admin.sections.translations.home_students_reviews_create');
    }
    public function store_review(Request $request)
    {
        $rules =[

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInputs($request->all());
        }else {
            $coverName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/assets/images/translate/reviews'), $coverName);

            StudentReview::create([
                'chief_name_ar'=>$request->chief_name_ar,
                'chief_role_ar'=>$request->chief_role_ar,
                'chief_description_ar'=>$request->chief_description_ar,
                'chief_name_en'=>$request->chief_name_en,
                'chief_role_en'=>$request->chief_role_en,
                'chief_description_en'=>$request->chief_description_en,
                'image'=>$coverName,
            ]);
            return redirect()->back()->with('success', 'The Category has created successfully.');
        }
    }
    public function delete_review($category){
        $old = StudentReview::find($category);
        $old->delete();
        return redirect()->back()->with('success','Review deleted successfully');
    }
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        $fileName = time().'.'.request()->file->getClientOriginalExtension();
        request()->file->move(public_path('files'), $fileName);
        return response()->json(['success'=>'You have successfully upload file.']);
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
                $request->file($filename)->move(public_path('/assets/videos/achievements/'), $image);
                return $image;
            }else{
                return 0;
            }
        }
    }


    // privacy
    public function index_privacy()
    {
        $privacy = Privacy::get();
        return view('admin.sections.translations.privacy.index', compact('privacy'));
    }

    public function create_privacy()
    {
        return view('admin.sections.translations.privacy.create');
    }

    public function store_privacy(Request $request)
    {
        for ($i = 0; $i < $request->skills; $i++) {
            $skills_ar [] = $request->input('skill_ar' . $i);
            $skills_en [] = $request->input('skill_en' . $i);
        }
        $subtitle_ar = implode('|', $skills_ar);
        $subtitle_en = implode('|', $skills_en);
        //echo $subtitle_ar;
        $privacyr = Privacy::create([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'subtitle_en' => $subtitle_en,
            'subtitle_ar' => $subtitle_ar,
        ]);

        $privacy = Privacy::get();
        return view('admin.sections.translations.privacy.index', compact('privacy'));

    }

    public function edit_privacy($id)
    {
        $privacy = Privacy::find($id);
        return view('admin.sections.translations.privacy.edit', compact('privacy'));
    }

    public function delete_subtitle_privacy($id, $i)
    {
        $privacy = Privacy::find($id);
        $sub = explode('|', $privacy['subtitle_en']);
        $sub_ar = explode('|', $privacy['subtitle_ar']);
        unset($sub[$i]);
        unset($sub_ar[$i]);
        $subtitle_ar = implode('|', $sub);
        $subtitle_en = implode('|', $sub_ar);
        $privacy->update([
            'subtitle_en' => $subtitle_ar,
            'subtitle_ar' => $subtitle_en,
        ]);
        return redirect()->back()->with('message', 'Done Successfully');
    }

    public function udate_privacy(Request $request, $id)
    {
        $privacy = Privacy::find($id);
        $sub = explode('|', $privacy['subtitle_en']);
        $sub_ar = explode('|', $privacy['subtitle_ar']);
        for ($i = 0; $i < count($sub); $i++) {
            $skills_ar [] = $request->input('sub_ar' . $i);
            $skills_en [] = $request->input('sub_en' . $i);

        }
        //echo $request['sub_en0'];
        for ($i = 0; $i < $request->skills; $i++) {
            $skills_ar [] = $request->input('skill_ar' . $i);
            $skills_en [] = $request->input('skill_en' . $i);
        }
        $subtitle_ar = implode('|', $skills_ar);
        $subtitle_en = implode('|', $skills_en);
        //echo $subtitle_ar;
        $privacy->update([
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'subtitle_en' => $subtitle_en,
            'subtitle_ar' => $subtitle_ar,
        ]);
        return redirect()->back()->with('message', 'Done Successfully');
    }

}
