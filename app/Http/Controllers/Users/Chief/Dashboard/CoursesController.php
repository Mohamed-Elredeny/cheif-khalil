<?php

namespace App\Http\Controllers\Users\Chief\Dashboard;

use App\Chief;
use App\Http\Controllers\Controller;
use App\models\admin\Category;
use App\models\admin\Course;
use App\models\Courses;
use App\models\CoursesLessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Course::where('chief_id',auth()->user()->id)->get();
        return view('chief.sections.courses.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chiefs = Chief::where('id',auth()->user()->id)->get();
        $categories = Category::get();
        return view('chief.sections.courses.create',compact('chiefs','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'name_ar' => 'required',
            'name_en' => 'required',
            'details_ar' => 'required',
            'details_en' => 'required',
            'number_of_lessons'=>'required',
            'category_id'=>'required',
            'chief_id'=>'required',
            'image'=>'required'
        ];
        $messages = [
            'name_ar.required'=> __('course.name_ar_error'),
            'name_en.required'=> __('course.name_en_error'),
            'details_ar.required'=> __('course.details_ar_error'),
            'details_en.required'=> __('course.details_en_error'),
            'number_of_lessons.required'=> __('course.number_of_lessons_error'),
            'category_id.required'=> __('course.category_id_error'),
            'chief_id.required'=> __('course.chief_id_error'),
            'image.required'=> __('course.image_error'),
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator);
        }else {
            $coverName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/assets/images/courses'), $coverName);

            Course::create([
                'name_ar'=>$request->name_ar,
                'name_en'=>$request->name_en,
                'details_ar'=>$request->details_ar,
                'details_en'=>$request->details_en,
                'number_of_lessons'=>$request->number_of_lessons,
                'category_id'=>$request->category_id,
                'chief_id'=>$request->chief_id,
                'image'=>$coverName
            ]);
        }
        return redirect()->back()->with('message','Done Successfully');
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
        $course = Course::find($id);
        $chiefs=Chief::get();
        $categories = Category::get();
        return view('chief.sections.courses.edit',compact('course','chiefs','categories') );
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
        $current_user = Course::find($id);
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        } else {
            if($request->image){
                unlink(public_path('/assets/images/courses') .'/' . $request->old);
                $coverName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/assets/images/courses'), $coverName);
            }else{
                $coverName = $request->old;
            }
            $current_user->update([
                'name_ar'=>$request->name_ar,
                'name_en'=>$request->name_en,
                'details_ar'=>$request->details_ar,
                'details_en'=>$request->details_en,
                'number_of_lessons'=>$request->number_of_lessons,
                'category_id'=>$request->category_id,
                'chief_id'=>$request->chief_id,
                'image'=>$coverName
            ]);//Create new User

            return redirect()->back()->with('success', 'The Course has Updated successfully.');
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
        $old = Courses::find($id);
        $course_lessons  =CoursesLessons::where('course_id',$id)->get();
        foreach($course_lessons as $lesson){
            $lesson->delete();
        }
        $old->delete();
        return redirect()->route('courses.index')->with('message', 'Deleted successfully');
    }
}
