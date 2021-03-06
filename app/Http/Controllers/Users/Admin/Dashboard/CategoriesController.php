<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\models\admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.sections.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sections.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules =[
            'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image'=>'required',
        ];
        $messages = [
            'name_ar.required'=> 'this field can not be empty',
            'name_en.required'=> 'this field can not be empty',
            'description_ar.required'=> 'this field can not be empty',
            'description_en.required'=> 'this field can not be empty',
            'image.required'=> 'this field can not be empty',
        ];
       $validator = Validator::make($request->all(),$rules,$messages);

       if($validator->fails()){
           return  redirect()->back()->withErrors($validator)->withInputs($request->all());
       }else {
           $coverName = time() . '.' . $request->image->getClientOriginalExtension();
           $request->image->move(public_path('/assets/images/categories'), $coverName);

           Category::create([
               'name_ar'=>$request->name_ar,
               'name_en'=>$request->name_en,
               'description_ar'=>$request->description_ar,
               'description_en'=>$request->description_en,
               'image'=>$coverName
           ]);
           return redirect()->route('categories.index')->with('success', 'The Category has created successfully.');
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
        $category = Category::find($id);
        return view('admin.sections.categories.show',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.sections.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $rules =[
            /*'name_ar' => 'required',
            'name_en' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image'=>'required',*/
        ];
        $messages = [
        /*    'name_ar.required'=> 'this field can not be empty',
            'name_en.required'=> 'this field can not be empty',
            'description_ar.required'=> 'this field can not be empty',
            'description_en.required'=> 'this field can not be empty',
            'image.required'=> 'this field can not be empty',*/
        ];
        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInputs($request->all());
        }else {
            if($request->image){
                unlink(public_path('/assets/images/categories') .'/' . $request->old);
                $coverName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('/assets/images/categories'), $coverName);
            }else{
                $coverName = $request->old;
            }

            $category->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'description_ar' => $request->description_ar,
                'description_en' => $request->description_en,
                'image' => $coverName
            ]);

            return redirect()->route('categories.index')
                ->with('success','Product updated successfully');
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($category)
    {
        $old = Category::find($category);
        $old->delete();
        return redirect()->route('categories.index')->with('success','Product deleted successfully');
    }
}
