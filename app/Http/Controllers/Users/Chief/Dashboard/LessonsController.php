<?php

namespace App\Http\Controllers\Users\Chief\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\models\admin\Category;
use App\models\admin\Course;

use App\models\admin\Video;
use App\models\Courses;
use App\models\CoursesLessons;
use App\models\CoursesLessonsQuiz;
use App\models\CoursesLessonsQuizQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LessonsController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addQuestion($quiz_id,$num_of_questions){
        $quiz = CoursesLessonsQuiz::find($quiz_id);
        $quiz_questions = CoursesLessonsQuizQuestions::where('courses_lessons_quiz_id',$quiz_id)->get();
        $num = intval($num_of_questions);
        if($num > 0) {
            while (count($quiz_questions) != $num) {
                CoursesLessonsQuizQuestions::create([
                    'question_ar' => 'اضافة سوال',
                    'question_en' => 'add question',
                    'correct_answer_en' => '1',
                    'correct_answer_ar' => '1',
                    'all_answers_en' => '1|2|2|4',
                    'all_answers_ar' => '1|2|2|4',
                    'courses_lessons_quiz_id' => $quiz_id,
                ]);
                $quiz = CoursesLessonsQuiz::find($quiz->id);
                $quiz->update([
                    'number_of_questions'=>$num
                ]);

                $quiz_questions = CoursesLessonsQuizQuestions::where('courses_lessons_quiz_id', $quiz_id)->get();
            }
            return view('chief.sections.lessons.questions.create', compact('quiz_questions','quiz_id'));
        }else{
            return redirect()->route('chief.lessons.create',['course_id'=>$quiz->lesson->course->id,'quiz_id'=>$quiz_id])->with('message','Change number of questions');
        }
    }
    public function updateQuestions(Request $request){

        $question_id = $request->question_id;
        for ($i = 0; $i < 4; $i++) {
            $all_answers_en [] = $request->input('all_answers_en' . $i);
            $all_answers_ar [] = $request->input('all_answers_ar' . $i);
        }
        $answers_en = implode('|', $all_answers_en);
        $answers_ar = implode('|', $all_answers_ar);
        //Ty ya martina for ur help
        // Structure   => in:x,y,z
        $all_real_answers_en = 'in:'.implode(',', $all_answers_en);
        $all_real_answers_ar = 'in:'.implode(',', $all_answers_ar);


        $validator = Validator::make($request->all(), [
            'correct_answer_ar' => [$all_real_answers_ar],
            'correct_answer_en' => [$all_real_answers_en],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all());
        }else {


            $question_update = CoursesLessonsQuizQuestions::find($question_id);
            $quiz_id = $question_update->courses_lessons_quiz_id;
            $question_update->update([
                'question_ar' => $request->question_ar,
                'question_en' => $request->question_en,
                'correct_answer_en' => $request->correct_answer_en,
                'correct_answer_ar' => $request->correct_answer_ar,
                'all_answers_en' => $answers_en,
                'all_answers_ar' => $answers_ar,
                'courses_lessons_quiz_id' => $quiz_id,
            ]);

            return redirect()->back()->with('message', 'Done Successfully');
        }
    }
    public function deleteQuestions($question_id){
        $question = CoursesLessonsQuizQuestions::find($question_id);
        $quiz = CoursesLessonsQuiz::find($question->courses_lessons_quiz_id);
        $number_of_questions = intval($quiz->number_of_questions);
        if($number_of_questions > 0){
            $number_of_questions -=1;
            $quiz->update([
                'number_of_questions'=>$number_of_questions
            ]);
        }else{
            return redirect()->route('chief.lessons.create',['course_id'=>$quiz->lesson->course->id]);
        }


        $question->delete();

        return redirect()->route('chief.lesson.add.question',['quiz_id'=>$quiz->id,'num_of_questions'=>$number_of_questions]);
    }


    public function index($course_id)
    {
        $course = Course::find($course_id);
        return view('chief.sections.lessons.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($course_id)
    {

        $course = Course::find($course_id);
        $lessons = CoursesLessons::where('course_id',$course_id)->orderBy('id', 'asc')->get();
        $flag=0;
        $admin_videos = Video::where('type','courses')->get();
        if(count(@$lessons) != $course->number_of_lessons) {
            $dif = abs(count($lessons)  - $course->number_of_lessons);
            for ($i = 0; $i < $dif; $i++) {
                $newlesson = CoursesLessons::create([
                    'name_ar' => 'الدرس رقم' . $i,
                    'name_en' => 'Lesson number' . $i,
                    'details_ar' => 'تفاصيل الدرس رقم' . $i,
                    'details_en' => 'details lesson number' . $i,
                    'image' => 'image' . $i,
                    'url'=>'video'.$i,
                    'course_id'=>$course->id,
                    'lesson_number'=>0
                ]);
                CoursesLessonsQuiz::create([
                    'title_ar'=>'اسم الاختبار',
                    'title_en'=>'quiz name',
                    'description_ar'=>'وصف الاختبار',
                    'description_en'=>'Quiz Description',
                    'number_of_questions'=>0,
                    'total_score'=>0,
                    'courses_lessons_id'=>$newlesson->id,
                ]);

            }
            $flag=1;
        }
        return view('chief.sections.lessons.create',compact('course','lessons','flag','admin_videos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function uploadVideo(Request $request,$filename,$course_id,$old,$type)
    {
        $filename = strval($filename);

        if ($request->hasFile($filename)) {
            //  Let's do everything here
            if ($request->file($filename)->isValid()) {
                //
                $validated = $request->validate([
                    $filename => 'file',
                ]);
                //unlink(public_path('/assets/'.$type.'/courses/'.$course_id) .'/' . $old);
                $extension = $request->file($filename)->extension();
                $image = time() . '.' . $request->file($filename)->getClientOriginalExtension();
                $request->file($filename)->move(public_path('/assets/'.$type.'/courses/'.$course_id.'/'), $image);
                return $image;
            }else{
                return $old;
            }
        }else{
            return $old;
        }
    }
    public function real_time_1(){

    }
    public function real_time(){
        $fileName = $_FILES['file1']['name']; // The file name
        $fileTmpLoc = $_FILES['file1']['tmp_name']; // File in the PHP tmp folder
        $fileType = $_FILES['file1']['type']; // The type of file it is
        $fileSize = $_FILES['file1']['size']; // File size in bytes
        $fileErrorMsg = $_FILES['file1']['error']; // 0 for false... and 1 for true
        if (!$fileTmpLoc) { // if file not chosen
            echo 'ERROR: Please browse for a file before clicking the upload button.';
            exit();
        }
        if (move_uploaded_file($fileTmpLoc, "test_uploads/$fileName")) {
            echo "$fileName upload is complete";
        } else {
            echo 'move_uploaded_file function failed';
        }
    }
    /*
            $request->file($filename)->move(public_path('/assets/videos/'.$course_id.'/'.$lesson_id.'/'), $image);
            return $image;
        }*/


    public function store(Request $request)
    {
        $lessons = $request->lessons;
        $course_id = $request->course_id;


        for($i=0;$i<$lessons;$i++) {
            $lesson_image  = 'image'.$i;
            $old_image = $request->input('old_image'.$i);

            $lesson_video = 'video'.$i;
            //$old_video = $request->input('old_video'.$i);

            $lesson_id = $request->input('lesson_id' . $i);

            $image = $this->uploadVideo($request,$lesson_image,$course_id,$old_image,'images');
            //$video = $this->uploadVideo($request,$lesson_video,$course_id,$old_video,'videos');
            $video =  $request->input('video' . $i);
            //Lesson Details
            $lesson_name_ar = $request->input('name_ar' . $i);
            $lesson_name_en = $request->input('name_en' . $i);
            $lesson_details_ar = $request->input('details_ar' . $i);
            $lesson_details_en = $request->input('details_en' . $i);
            $lesson_number = $request->input('lesson_number' . $i);


            //Quiz Details
            $quiz_id = $request->input('quiz_id' . $i);
            $quiz_title_ar = $request->input('quiz_title_ar' . $i);
            $quiz_title_en= $request->input('quiz_title_en' . $i);
            $quiz_description_ar= $request->input('quiz_description_ar' . $i);
            $quiz_description_en= $request->input('quiz_description_en' . $i);
            $quiz_total_score= $request->input('quiz_total_score' . $i);
            $num_of_questions= $request->input('num_of_questions' . $i);

            $lesson = CoursesLessons::find($lesson_id);

            $lesson->update([
                'name_ar'=> $lesson_name_ar,
                'name_en'=>$lesson_name_en,
                'details_ar'=>$lesson_details_ar,
                'details_en'=>$lesson_details_en,
                'image'=>$image,
                'url'=>$video,
                'lesson_number'=>$lesson_number
            ]);
            $quiz=CoursesLessonsQuiz::find($quiz_id);
            $quiz->update([
                'title_ar' =>$quiz_title_ar ,
                'title_en'=>$quiz_title_en,
                'description_ar'=>$quiz_description_ar,
                'description_en'=>$quiz_description_en,
                'number_of_questions'=>$num_of_questions,
                'total_score'=>$quiz_total_score,
                'courses_lessons_id'=>$lesson_id,
            ]);
        }
        return redirect()->back()->with('message','Course Updated Successfully ! :)');
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
}
