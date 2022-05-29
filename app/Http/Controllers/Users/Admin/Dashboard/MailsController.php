<?php

namespace App\Http\Controllers\Users\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\models\ContactMails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailsController extends Controller
{
    public function view(){
        $mails = ContactMails::get();
        return view('admin.sections.contact_mails.index',compact('mails'));
    }
    public function add(Request $request){
        $rules =[
            'subject_en' => 'required',
            'subject_ar' => 'required',
            'emails' => 'required',

        ];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInputs($request->all());
        }else {
            $subject_en = $request->subject_en;
            $subject_ar = $request->subject_ar;
            $emails = $request->emails;

            ContactMails::create([
                'subject_en'=>$subject_en,
                'subject_ar'=>$subject_ar,
                'email'=>$emails,

            ]);
            return redirect()->back()->with('success', 'The Mail has created successfully.');
        }

    }
    public function remove($id){
        $mail = ContactMails::find($id);
        $mail->delete();
        return redirect()->back()->with('message','The Mail Deleted Successfully');

    }
}
