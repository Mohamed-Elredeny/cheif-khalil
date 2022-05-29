@extends('chief.dashboard')
    @if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    @if (!empty($success))
        <div class="alert alert-success">
            <h1>{{$success}}</h1>
        </div>
    @endif
    <style>
        .sad{
            color:black;
            background: #fff;
            cursor:pointer;
        }
        .sad:hover{
            font-weight:bolder;
            color:#fff;
            background: #031e23;
            cursor:pointer;
        }
        .happy{
            font-weight:bolder;
            color:#fff;
            background: #031e23;
            cursor:pointer;
        }
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }


        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}

         .wizard-content .wizard>.actions>ul>li>a{
             display:none;
         }
    </style>
    <div class="wizard-content" style="padding:30px">
            @csrf
            <center>
                <h3>
                    Quiz Questions
                </h3>
                @for($i=0;$i<count($quiz_questions);$i++)
                    <form action="{{route('chief.lesson.update.question')}}" method="post">
                        @csrf
                        <input type="hidden" name="question_id" value="{{$quiz_questions[$i]->id}}">
                        <section style="padding:20px;border:5px solid black;margin-top: 20px;text-align:left" class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-10 h4">
                                    Question Number  [ {{$i+1}} ]
                                </div>
                                <div class="col-sm-2">

                                    <a href="{{route('chief.lesson.remove.question',['id'=> $quiz_questions[$i]->id])}}" class="btn btn-danger">
                                        Delete
                                    </a>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px" >Question Arabic</label>
                                        <input type="text" class="form-control" name="question_ar" style="text-align: right;direction: rtl" value="{{$quiz_questions[$i]->question_ar}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px" >Question English</label>
                                        <input type="text" class="form-control" name="question_en" value="{{$quiz_questions[$i]->question_en}}">
                                    </div>
                                </div>
                            </div>
                            <?php
                            $answers_ar = explode("|", $quiz_questions[$i]->all_answers_ar);
                            $answers_en = explode("|", $quiz_questions[$i]->all_answers_en);

                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px" >Answers Arabic</label>
                                        @for($j=0;$j<4;$j++)
                                            <input type="text" class="form-control" name="all_answers_ar{{$j}}" style="text-align: right;direction: rtl" value="{{$answers_ar[$j]}}">
                                        @endfor
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px" >Answers English</label>
                                        @for($j=0;$j<4;$j++)
                                            <input type="text" class="form-control" name="all_answers_en{{$j}}" style="text-align: right;direction: rtl" value="{{$answers_en[$j]}}">
                                        @endfor

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px" >Correct  Answer Arabic</label>
                                        <input type="text" class="form-control" name="correct_answer_ar" style="text-align: right;direction: rtl" value="{{$quiz_questions[$i]->correct_answer_ar}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px" >Correct  Answer English</label>
                                        <input type="text" class="form-control" name="correct_answer_en" value="{{$quiz_questions[$i]->correct_answer_en}}">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
<!--                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px" >Question Score</label>
                                        <input type="text" class="form-control" name="question_score" style="text-align: right;direction: rtl" value="">
                                    </div>
                                </div>-->

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br>
                                        <input class="btn btn-dark"  style="width:100px;height:50px;padding-top: 13px" type="submit" value="Update">

                                    </div>
                                </div>

                            </div>
                        </section>
                    </form>

                @endfor
                <h3>
                    <br>
                    <?php
                    $new_quiz = \App\models\CoursesLessonsQuiz::find($quiz_id);
                    $questions =intval($new_quiz->number_of_questions);
                    $questions+=1;


                    ?>
                    <a href="{{route('chief.lesson.add.question',['quiz_id'=>$quiz_id,'num_of_questions'=>$questions])}}" class="btn btn-dark">
                        Add New Question
                    </a>
                </h3>
            </center>



    </div>
@endsection

@else
    <div style="padding-top:100px">
        @section('main-container')
            <div class="wizard-content" style="padding:30px;">
                @csrf
                <center>
                    <h3>
                        اسئلة الاختبار
                    </h3>
                    @for($i=0;$i<count($quiz_questions);$i++)
                        <form action="{{route('chief.lesson.update.question')}}" method="post">
                            @csrf
                            <input type="hidden" name="question_id" value="{{$quiz_questions[$i]->id}}">
                            <section style="padding:20px;border:5px solid black;margin-top: 20px;text-align:right" class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-10 h4">
                                        السوال رقم [ {{$i+1}} ]
                                    </div>
                                    <div class="col-sm-2">

                                        <a href="{{route('chief.lesson.remove.question',['id'=> $quiz_questions[$i]->id])}}" class="btn btn-danger">
                                            حذف
                                        </a>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight:bold;font-size:20px" >السوال بالعربية</label>
                                            <input type="text" class="form-control" name="question_ar" style="text-align: right;direction: rtl" value="{{$quiz_questions[$i]->question_ar}}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight:bold;font-size:20px" >السوال بالانجليزية</label>
                                            <input type="text" class="form-control" name="question_en" value="{{$quiz_questions[$i]->question_en}}">
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $answers_ar = explode("|", $quiz_questions[$i]->all_answers_ar);
                                $answers_en = explode("|", $quiz_questions[$i]->all_answers_en);

                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight:bold;font-size:20px" >الاجابات بالعربية</label>
                                            @for($j=0;$j<4;$j++)
                                                <input type="text" class="form-control" name="all_answers_ar{{$j}}" style="text-align: right;direction: rtl" value="{{$answers_ar[$j]}}">
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight:bold;font-size:20px" >الاجابات بالانجليزية</label>
                                            @for($j=0;$j<4;$j++)
                                                <input type="text" class="form-control" name="all_answers_en{{$j}}" style="text-align: right;direction: rtl" value="{{$answers_en[$j]}}">
                                            @endfor

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight:bold;font-size:20px" >الاجابة الصحيحة بالعربية</label>
                                            <input type="text" class="form-control" name="correct_answer_ar" style="text-align: right;direction: rtl" value="{{$quiz_questions[$i]->correct_answer_ar}}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="font-weight:bold;font-size:20px" >الاجابة الصحيحة بالانجليزية</label>
                                            <input type="text" class="form-control" name="correct_answer_en" value="{{$quiz_questions[$i]->correct_answer_en}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--                            <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label style="font-weight:bold;font-size:20px" >Question Score</label>
                                                                    </div>
                                                                </div>-->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br>
                                            <input class="btn btn-dark"  style="width:100px;height:50px;padding-top: 13px" type="submit" value="تعديل">

                                        </div>
                                    </div>

                                </div>
                            </section>
                        </form>

                    @endfor
                    <h3>
                        <br>
                        <?php
                        $new_quiz = \App\models\CoursesLessonsQuiz::find($quiz_id);
                        $questions =intval($new_quiz->number_of_questions);
                        $questions+=1;


                        ?>
                        <a href="{{route('chief.lesson.add.question',['quiz_id'=>$quiz_id,'num_of_questions'=>$questions])}}" class="btn btn-dark">
                            اضافة سوال جديد
                        </a>
                    </h3>
                </center>



            </div>
        @endsection
    </div>


@endif
<script type="text/javascript">


    function dosmthing(id,lessons){
        for(var i=0;i < lessons;i++){
            document.getElementById('content' + i).style.display = 'none';
            document.getElementById('tabs' + i).classList.remove("happy");
        }
        document.getElementById('content' + id).style.display = 'block';
        document.getElementById('tabs' + id).classList.add("happy");
    }
</script>

