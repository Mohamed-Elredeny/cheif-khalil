<?php

namespace App\Http\Controllers\Api;

use App\Chief;
use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Mail\Contactus;
use App\Mail\ContactusChief;
use App\models\Contact;
use App\models\ContactMails;
use App\models\Courses;
use App\models\CoursesLessons;
use App\models\CoursesLessonsQuiz;
use App\models\CoursesLessonsQuizQuestions;
use App\models\UserCoursesBooking;
use App\models\UserCoursesFavoriteList;
use App\models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CoursesController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register1','register2','forgetpassword','resetpassword','index','show','getContactMaisl','sendMailChief','sendMailCotactUs']]);
        $this->middleware('validUser',['except' => ['login','register1','register2','forgetpassword','resetpassword','index','show','getContactMaisl','sendMailChief','sendMailCotactUs']]);

    }
    public function index()
    {
        $courses = Courses::all();
        $course = [];
        foreach($courses as $cou){
            $cou->chief_id = Chief::find($cou->chief_id);
            $cou->chief_id->image = 'https://chefkhalil.com/assets/images/chiefs/'. $cou->chief_id->image;
            $cou->bookings_number =count(UserCoursesBooking::where('course_id',$cou->id)->get());
            $cou->bookings_number =count(UserCoursesBooking::where('course_id',$cou->id)->get());
            $cou->likes_number = count(UserCoursesFavoriteList::where('course_id',$cou->id)->get());
            $cou->image = 'https://chefkhalil.com/assets/images/courses/'.$cou->image;
            if($this->isCourseCompleate($cou->id)){
                $course [] = $cou;
            }
        }
        $msg = ['count'=>count($course)];
        return $this->returnData(['courses'], [$course], $msg);
    }
    public function isCourseCompleate($id)
    {
        $course = Courses::find($id);
        $courseLessons = CoursesLessons::where('course_id', $id)->get();
        if ($course->number_of_lessons == count($courseLessons)) {
            $sum = 0;
            foreach ($courseLessons as $courseLesson) {
                $lessonQuiz = CoursesLessonsQuiz::where('courses_lessons_id', $courseLesson->id)->first();
                $quizQues = CoursesLessonsQuizQuestions::where('courses_lessons_quiz_id', $lessonQuiz->id)->get();
                if ($lessonQuiz->number_of_questions == count($quizQues)) {
                    $sum = $sum + 1;
                }
            }

            if ($sum == count($courseLessons)) {
                return true;
            }
        }
    }


    public function addFavoriteCourse($course_id)
    {
        $user = auth('api')->user();
         UserCoursesFavoriteList::create([
            'user_id' => $user->id,
            'course_id' => $course_id,
        ]);
        $msg = 'You successfully add this course to your favorite';
        return $this->returnSuccessMessage($msg,200);
    }
    public function removeFavoriteCourse($course_id)
    {
        $user = auth('api')->user();
        if($user){
            DB::table('user_courses_favorite_list')->where('course_id', '=', $course_id)->where('user_id', '=', $user->id)->delete();
            $msg = 'You successfully removed this course from your favorite';
            return $this->returnSuccessMessage($msg,200);
        }
    }
    public function myFavoriteCourse()
    {
        $user = auth('api')->user();
        if($user) {
            $ids=[];
            $list = [];
            $coursesFavoriteList = UserCoursesFavoriteList::where('user_id', $user->id)->get();
            foreach ($coursesFavoriteList as $sad){
               $ids[]=  $sad->course_id;
            }
            foreach($ids as $id){
                $list [] = Courses::find($id);
            }
            foreach($list as $cou){
                $cou->chief_id = Chief::find($cou->chief_id);
                $cou->chief_id->image = 'https://chefkhalil.com/assets/images/chiefs/'. $cou->chief_id->image;
                $cou->bookings_number =count(UserCoursesBooking::where('course_id',$cou->id)->get());
                $cou->bookings_number =count(UserCoursesBooking::where('course_id',$cou->id)->get());
                $cou->likes_number = count(UserCoursesFavoriteList::where('course_id',$cou->id)->get());
                $cou->image = 'https://chefkhalil.com/assets/images/courses/'.$cou->image;
                if($this->isCourseCompleate($cou->id)){
                    $course [] = $cou;
                }
            }
            $msg = 'you add '. count($coursesFavoriteList).' to your favorite';
            return $this->returnData(['coursesFavoriteList'], [$list], $msg);
        }
    }
    public function all_course_lessons(){

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
    public function showCourse(Request $request)
    {
        $user = auth('api')->user();
        $course_id = $request->course_id;
        $enrolled_before = UserCoursesBooking::where('user_id',$user->id)->where('course_id',$course_id)->get();
        if(count($enrolled_before) == 0){
            UserCoursesBooking::create([
                'user_id'=>$user->id,
                'course_id'=>$course_id,
                'course_progress'=>0
            ]);
            $progress = 0;
        }else{
            $progress = $enrolled_before[0]->course_progress;
        }
        $msg='';
          $course_details = Courses::find($course_id);
          $course_details->image = 'https://chefkhalil.com/public/assets/images/courses/' . $course_details->image;
            //progress
                $user_progress=  UserCoursesBooking::where('course_id',$course_id)->where('user_id',$user->id)->get()[0]->course_progress;
            //count lessons
            $current_course_lessons = CoursesLessons::where('course_id',$course_id)->get();
            if($user_progress == count($current_course_lessons)){
                $is_completed = 1;
            }else{
                $is_completed = 0;
            }
        $course_details->progress = [
            'progress'=>$progress,
            'progress_count'=>count($current_course_lessons),
            'is_completed'=>$is_completed,
            'certificate'=>'http://www.orimi.com/pdf-test.pdf'
        ];
         return $this->returnData(['course'], [$course_details], $msg);

    }
    public function add()
    {
        $adds = Video::where('type','adds')->inRandomOrder()->limit(1)->get();
        if(count($adds) > 0){
            $adds[0]->video = 'https://chefkhalil.com/assets/videos/adds/'. $adds[0]->video;
        }
        return $adds;
    }

    public function lessons($course_id){
        $user = auth('api')->user();
        $lessons = CoursesLessons::where('course_id',$course_id)->get();
        //Vide
        foreach ($lessons as $lesson){
            $lesson->url = 'https://chefkhalil.com/assets/videos/courses/'.$lesson->url;
            $lesson->image = 'https://chefkhalil.com/assets/images/courses/'.intval($lesson->course_id).'/'.$lesson->image;
            $lesson->adv = $this->add();
        }

        $msg = ['lessons'=>count($lessons)];
        return $this->returnData(['courses'], [$lessons], $msg);
    }
    public function quiz($lesson_id){
        $user = auth('api')->user();
        $quiz = CoursesLessonsQuiz::where('courses_lessons_id',$lesson_id)->limit(1)->get();
        $quiz_questions = CoursesLessonsQuizQuestions::where('courses_lessons_quiz_id',$quiz[0]->id)->get();
        $data = [
            'quiz'=>$quiz,
            'questions'=>$quiz_questions
        ];
        $msg = [
            'quiz_id'=>$quiz[0]->id,
            'questions_number'=> count($quiz_questions)
            ];
        return $this->returnData(['data'], [$data], $msg);
    }
    public function userQuizAnswer(Request $request){
        $user = auth('api')->user();
        $quiz_id =$request->quiz_id;
        $answers = json_decode($request->answers);
        $answers_ids = json_decode($request->answers_ids);
        $lesson_number = $request->lesson_number;

         CoursesLessonsQuiz::find($quiz_id);
        for ($i=0;$i<count($answers);$i++) {
            $real_answers [] = [
                $answers_ids[$i]=>$answers[$i]
            ];
        }


        $lang = $request->lang;
        $quiz_questions = CoursesLessonsQuizQuestions::where('courses_lessons_quiz_id',$quiz_id)->get();
       /* return [
            'quiz_id'=>$quiz_id,
            'quiz_questions'=>$quiz_questions,
            'answers'=>$answers,
            'answers_id' => $answers_ids
        ];*/

        //Number Of Questions
        //Total Score
        $question_score = $request->total_score / count($quiz_questions);
        $response =0;
        for($i=0 ;$i<count($quiz_questions);$i++){
            if($quiz_questions[$i]['correct_answer_'.$lang] == $real_answers[$i][$quiz_questions[$i]['id']] ){
                $response += $question_score;
            }
        }
        $state = 0;
        if($response >= ($request->total_score/2) ){
            $state = 1;
        }else{
            $state=0;
        }

        //CoursesLessons::
        $courses_lessons_id = CoursesLessonsQuiz::find( $quiz_questions[0]->courses_lessons_quiz_id)->courses_lessons_id;
        $lessons_id = CoursesLessons::find($courses_lessons_id)->course_id;
        $user_progress =UserCoursesBooking::where('user_id',$user->id)->where('course_id',$lessons_id)->get();
        if(count($user_progress) > 0 ){
            $current_lesson = intval(CoursesLessons::find($courses_lessons_id)->lesson_number) -1;
            $old_progress = intval($user_progress[0]->course_progress);

            if($lesson_number == $old_progress){
                $full_response= [
                    'score'=>$response,
                    'state'=>$state,
                    'progress'=>$old_progress
                ];
                return $this->returnData(['response'], [$full_response],'you take this quiz before');
            }
            if($state == 0){
                $full_response= [
                    'score'=>$response,
                    'state'=>$state,
                    'progress'=>$old_progress
                ];
                return $this->returnData(['response'], [$full_response],'you did not pass  this quiz sry !');
            }
            $new_progress = $old_progress+ 1;
            $user_progress[0]->update([
                'course_progress'=>$new_progress
            ]);
            $full_response= [
                'score'=>$response,
                'state'=>$state,
                'progress'=>$new_progress
            ];
            return $this->returnData(['response'], [$full_response],'you successfully passed this quiz');
        }else{
            $full_response= [
                'msg'=>'you are not member in this course',
            ];
            return $this->returnData(['response'], [$full_response],'you are not member in this course');
        }

        /*
         * ['question_id'=>answer]
         * */
      /*
        foreach ($quiz_questions as $question){
            if($answers[$question->id] == $question['correct_answer'.$lang]){
                $response [] = 1;
            }else{
                $response [] = 0;
            }
        }*/

//        return $response;
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
    public function getContactMaisl(){
        $mails = ContactMails::get();
        return $mails;
    }

    public function sendMailChief(Request $request)
    {
        $chief_email = $request->chief_email;
        $messagee = $request->message;
        $emaill = $request->email;
        $namee = $request->name;
        Mail::to($chief_email)->send(new ContactusChief($messagee, $emaill, $namee));

        $msg = 'email successfully send chick your mail';
        return  $this->returnSuccessMessage($msg,200);
    }


    public function sendMailCotactUs(Request $request)
    {
        $messagee = $request->message;
        $emaill = $request->email;
        $namee = $request->name;
        $contact_mail = $request->contact_mail;
        $contactTitle = ContactMails::where('email', $contact_mail)->get();
        Mail::to($contact_mail)->send(new Contactus($messagee, $emaill, $namee));
        Contact::create([
            'title' => $contactTitle[0]->subject_en,
            'body' => $messagee,
            'sender_email' => $emaill,
            'received_email' => $contact_mail,
        ]);
        $msg = 'email successfully send chick your mail';
        return  $this->returnSuccessMessage($msg,200);
    }

}
