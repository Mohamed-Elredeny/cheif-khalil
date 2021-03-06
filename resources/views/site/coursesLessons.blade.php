@extends('site.layouts.site')
@section('loading')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Loading...
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    ...جاري التحميل
    @endif
@endsection

@section('title')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    {{$course->name_en}}
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    {{$course->name_ar}}
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    {{$course->name_en}}
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    {{$course->name_ar}}
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls  c-gutter-60  contacts">
    <div class="container">

        <div class="">
            <div class="divider-55 d-none d-xl-block"></div>
            <div class="vid-main-wrapper mt-5 clearfix row mx-auto ">
                <!-- THE VIDEO PLAYER -->
                @if($forChickLessonAvailble == 0)

                    <div class="vid-container col-12 col-md-6 col-lg-8" style="height: 415px; width:100%;">
                        <img src="{{asset('assets/images/courses')}}/{{$course->image}}" alt="" style="height: 415px; width:100%;">
                        <div class="text-md-left entry-meta item-meta bg-dark-transpatent meta-event">
                            <a href="/en/showChiefDetails/{{$course->courseChief['id']}}">
                            Cheif: <span>{{$course->courseChief['fname']}} {{$course->courseChief['lname']}}</span>
                            </a>
                        </div>
                    </div>

                @else

                    <div id="course" class="col-12 col-md-6 col-lg-8" style="display: block;">
                        <video id="myVedio" controls width="100%" height="415">
                            <source src="{{asset('assets/videos/courses')}}/{{$myCoursesLesson[0]->url}}" controls="controls">
                        </video>
                    </div>

                    @isset($add[0])
                    <div id="adds" class="col-12 col-md-6 col-lg-8" style="display: none;">
                        <video id="addVideo" src="{{asset('assets/videos/adds')}}/{{$add[0]->url}}" controls="controls"  width="100%" height="415"></video>
                        <div style="position: absolute; right: 30px; top: 10px; z-index: 6; background-color: white; padding: 4px; font-size: 14px;"><a href="" style="color: black;"><i class="fa fa-info-circle" style="font-size:14px"></i>  {{$add[0]->link}}</a></div>
                        <div style="position: absolute; right: 30px; bottom: 16%; z-index: 8;">
                        <div class="">
                            <div class="">
                            <input id="skip" type="submit" class="btn btn-primary" value=" Skip after 5 sec">
                            </div>
                        </div>
                        </div>
                    </div>
                    @endisset

                    @if(!Auth::guard('web')->user())
                        <div id="choose" class="col-12 col-md-6 col-lg-8" style="display: none;">
                            <br><br><br><br>
                            <div class="text-center">
                                <h5>Sign In To Start Exam</h5>
                                <br><br>
                                <a href="/en/login" class="btn btn-maincolor2">Sign In</a>
                            </div>
                            <br><br>

                        </div>

                    @elseif($booking == 0)

                        <div id="choose" class="col-12 col-md-6 col-lg-8" style="display: none;">
                            <br><br><br><br>
                            <div class="text-center">
                                <h5>Inroll Course To Start Exam</h5>
                                <br><br>
                                <a href="/enrollCourse/{{$course->id}}" class="btn btn-maincolor2">Inroll</a>
                            </div>
                            <br><br>

                        </div>

                    @else
                        <div id="choose" class="col-12 col-md-6 col-lg-8" style="display: none;">
                            <br><br><br><br>
                            <div class="text-center">
                                <input id="exam" type="submit" class="btn  btn-maincolor2" value=" Start Exam ">
                            </div>
                            <br><br>
                            <div class="text-center">
                                <input id="repeat" type="submit" class="btn  btn-maincolor2" value=" Repeat Lesson ">
                            </div>
                        </div>
                    @endif

                    <div id="examdiv" class="col-12 col-md-6 col-lg-8" style=" display: none;" >
                        <div class="">
                            <h4 class="mt-4" id="pText">{{$myCoursesLesson[0]->quiz['title_en']}}</h4>
                            <p>{{$myCoursesLesson[0]->quiz['description_en']}}</p>
                        </div>


                        <form >
                            <div class=" quiz-container mt-sm-5 my-1">
                                @foreach($myCoursesLesson[0]->quiz->quizQuestions as $question)
                                <?php
                                    $arrAnswer = explode('|', $question['all_answers_en']);
                                ?>
                                    <div class="quiz-question ml-sm-5 pl-sm-5 pt-2">
                                        <div class="py-2 h5 text-primary"><b> {{$question['question_en']}} </b></div>
                                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="quiz-options">

                                            @for($i = 0; $i < count($arrAnswer) ; $i++)
                                            <label class="quiz-options">{{$arrAnswer[$i]}} <input type="radio" value="{{$arrAnswer[$i]}}" name="answer{{$question['id']}}">
                                                <span class="quiz-checkmark"></span> </label>

                                            @endfor


                                        </div>
                                    </div>
                                @endforeach
                                <div  class="d-flex align-items-center pt-3">

                                    <div class="ml-auto mr-sm-5"> <p id="sad" class="btn btn-maincolor quiz-next btn-Result">Finish </p> </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="scoreDivSad" class="col-12 col-md-6 col-lg-8" style="display: none;">

                    </div>


                @endif

                <!-- THE PLAYLIST -->
                <div class="vid-list-container col-12 col-md-6 col-lg-4" style="height: 415px; width:100%;">
                    <ol id="vid-list">
                        <ul>

                            <li>
                                <!--We Use Image Source and Video Source-->
                                <a href="/courseLessonses/{{$course->id}}/0">
                                    <span class="vid-thumb"><img width=52
                                            style="height:42px; border-radius:.2em"
                                            src="{{asset('assets/images/courses')}}/{{$course->image}}" /></span>
                                    <div class="desc">Introducton Of Course </div>
                                </a>
                            </li>
                            {{-- <br> --}}

                            @foreach($corseAllLessons as $corseAllLesson)
                                <li>
                                    <!--We Use Image Source and Video Source-->
                                    {{-- @if(Auth::guard('web')->user()) --}}
                                    @if($corseAllLesson->lesson_number <= $myLessonIndex)

                                    <a href='/courseLessonses/{{$course->id}}/{{$corseAllLesson->lesson_number}}'>
                                    @else
                                        <a>
                                    @endif

                                        <span class="vid-thumb"><img width=52
                                                style="height:42px; border-radius:.2em"
                                                src="{{asset('assets/images/courses')}}/{{$course->id}}/{{$corseAllLesson->image}}" /></span>
                                        <div class="desc">{{$corseAllLesson->name_en}}</div>
                                    </a>
                                </li>
                                {{-- <br> --}}
                            @endforeach



                        </ul>
                    </ol>
                </div>
            </div>

            <!--Title and Button-->
            <div class="row ml-auto mt-3">
                @if($forChickLessonAvailble == 0)
                    <div class="col-12 col-lg-8">
                        <h4 class="mt-4" id="pText">{{$course->name_en}}</h4>
                        <p>{{$course->details_en}}</p>
                    </div>
                    {{--
                    <div class="mt-3 col-12  col-lg-4 d-flex justify-content-start">
                        <button class="btn btn-maincolor btn-sm certificate-button"> Download Certificate <i
                                class="fas fa-download ml-3"></i></button>
                    </div> --}}

                @else
                <div class="col-12 col-lg-8">
                    <h4 class="mt-4" id="pText">{{$myCoursesLesson[0]->name_en}}</h4>
                    <p>{{$myCoursesLesson[0]->details_en}}</p>
                </div>
                @endif

                @if(!Auth::guard('web')->user())
                    <div class="col-sm-2 text-center">
                        <a href="/login" class="btn btn-maincolor">Enroll</a>
                    </div>
                @else

                    @if($booking == 0 && Auth::guard('web')->user())
                        <div class="col-sm-2 text-center">
                            <a href="/enrollCourse/{{$course->id}}" class="btn btn-maincolor">Enroll</a>
                        </div>
                    @endif
                @endif
            </div>

            @if($forChickLessonAvailble == 1)

            <div id="comments" class="comments-area bordered col-lg-8">

                <h4 class="comments-title">
                    Comments In This Topic:
                </h4>
                <ol class="comment-list">
                    @foreach($myCoursesLesson[0]->comments as $comment)


                    <li class="comment">
                        <article class="comment-body">
                            <footer class="comment-meta">
                                <div class="comment-author vcard">
                                    <img alt="" src="{{asset('assets/images/users')}}/{{ $comment->commentUser['image'] }}">
                                    <b class="fn">
                                        <a href="#" rel="nofollow" class="url">{{$comment->commentUser['fname']}} {{$comment->commentUser['lname']}}</a>
                                    </b>
                                </div>
                                <!-- .comment-author -->

                                <div class="comment-metadata">
                                    <a href="#" class="color-main2">
                                        <time datetime="2018-03-14T07:57:01+00:00">
                                            {{$comment->created_at}}
                                        </time>
                                    </a>
                                </div>
                                <!-- .comment-metadata -->
                            </footer>
                            <!-- .comment-meta -->

                            <div class="comment-content">
                                <p>{{$comment->body}}</p>
                            </div>
                            <!-- .comment-content -->

                        </article>
                        <!-- .comment-body -->

                    </li>

                    <!-- #comment-## -->
                    @endforeach

                    <li id="toyComment">

                    </li>

                </ol>
                <!-- .comment-list -->

            </div>

            <div class="comment-form-reply ls bordered col-lg-8" id="reply">
                <div id="respond" class="comment-respond">
                    <h4 id="reply-title" class="comment-reply-title">Write Feedback Now:</h4>
                    <form id="comment-form" class="comment-form">

                        <p class="comment-form-comment">
                            <label for="comment">Your Comment</label>
                            <textarea id="commentBodyToty" name="comment" cols="45" rows="8" maxlength="65525"
                                aria-required="true" placeholder="Your Comment..."
                                required="required"></textarea>
                        </p>
                        <p class="form-submit">
                            {{-- <button id="totyHappy" class="submit">
                                sad
                            </button> --}}
                            @if(Auth::guard('web')->user())
                            <input id="totyHappy" type="submit" class="submit" value="Send now">
                            @else
                            <a href="/login" class="btn btn-maincolor">Send Now</a>
                            @endif
                        </p>
                    </form>
                </div>
                <!-- #respond -->
            </div>
            @endif

        </div>
        <!--.col-* -->

    </div>
</section>

<div class="divider-55 d-none d-xl-block"></div>



@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls  c-gutter-60  contacts text-right">
    <div class="container">

        <div class="">
            <div class="divider-55 d-none d-xl-block"></div>
            <div class="vid-main-wrapper mt-5 clearfix row mx-auto ">
                <!-- THE VIDEO PLAYER -->
                @if($forChickLessonAvailble == 0)

                    <div class="vid-container col-12 col-md-6 col-lg-8" style="height: 415px; width:100%;">
                        <img src="{{asset('assets/images/courses')}}/{{$course->image}}" alt="" style="height: 415px; width:100%;">
                        <div class="text-md-left entry-meta item-meta bg-dark-transpatent meta-event">
                            <a href="/en/showChiefDetails/{{$course->courseChief['id']}}">
                            الشيف: <span>{{$course->courseChief['fname']}} {{$course->courseChief['lname']}}</span>
                            </a>
                        </div>
                    </div>

                @else

                    <div id="course" class="col-12 col-md-6 col-lg-8" style="display: block;">
                        <video id="myVedio" controls width="100%" height="415">
                            <source src="{{asset('assets/videos/courses')}}/{{$myCoursesLesson[0]->url}}" controls="controls">
                        </video>
                    </div>

                    @isset($add[0])
                    <div id="adds" class="col-12 col-md-6 col-lg-8" style="display: none;">
                        <video id="addVideo" src="{{asset('assets/videos/adds')}}/{{$add[0]->url}}" controls="controls"  width="100%" height="415"></video>
                        <div style="position: absolute; right: 30px; top: 10px; z-index: 6; background-color: white; padding: 4px; font-size: 14px;"><a href="" style="color: black;"><i class="fa fa-info-circle" style="font-size:14px"></i>  {{$add[0]->link}}</a></div>
                        <div style="position: absolute; right: 30px; bottom: 16%; z-index: 8;">
                        <div class="">
                            <div class="">
                            <input id="skip" type="submit" class="btn btn-primary" value=" Skip after 5 sec">
                            </div>
                        </div>
                        </div>
                    </div>
                    @endisset

                    @if(!Auth::guard('web')->user())
                        <div id="choose" class="col-12 col-md-6 col-lg-8" style="display: none;">
                            <br><br><br><br>
                            <div class="text-center">
                                <h5>سجل دخول لبدأ الامتحان</h5>
                                <br><br>
                                <a href="/en/login" class="btn btn-maincolor2">تسجيل الدخول</a>
                            </div>
                            <br><br>

                        </div>

                    @elseif($booking == 0)

                        <div id="choose" class="col-12 col-md-6 col-lg-8" style="display: none;">
                            <br><br><br><br>
                            <div class="text-center">
                                <h5>اشتري الدورة لبدأ الاومتحان</h5>
                                <br><br>
                                <a href="/enrollCourse/{{$course->id}}" class="btn btn-maincolor2">شراء</a>
                            </div>
                            <br><br>

                        </div>

                    @else
                        <div id="choose" class="col-12 col-md-6 col-lg-8" style="display: none;">
                            <br><br><br><br>
                            <div class="text-center">
                                <input id="exam" type="submit" class="btn  btn-maincolor2" value=" Start Exam ">
                            </div>
                            <br><br>
                            <div class="text-center">
                                <input id="repeat" type="submit" class="btn  btn-maincolor2" value=" Repeat Lesson ">
                            </div>
                        </div>
                    @endif

                    <div id="examdiv" class="col-12 col-md-6 col-lg-8" style=" display: none;" >
                        <div class="">
                            <h4 class="mt-4" id="pText">{{$myCoursesLesson[0]->quiz['title_ar']}}</h4>
                            <p>{{$myCoursesLesson[0]->quiz['description_ar']}}</p>
                        </div>


                        <form >
                            <div class=" quiz-container mt-sm-5 my-1">
                                @foreach($myCoursesLesson[0]->quiz->quizQuestions as $question)
                                <?php
                                    $arrAnswer = explode('|', $question['all_answers_ar']);
                                    $arrAnswer1 = explode('|', $question['all_answers_en']);

                                ?>
                                    <div class="quiz-question ml-sm-5 pl-sm-5 pt-2">
                                        <div class="py-2 h5 text-primary"><b> {{$question['question_ar']}} </b></div>
                                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="quiz-options">

                                            @for($i = 0; $i < count($arrAnswer) ; $i++)
                                            <label class="quiz-options">
                                                <div style="padding-right: 45px">
                                                {{$arrAnswer[$i]}}
                                                </div>
                                                <input type="radio" value="{{$arrAnswer[$i]}}" name="answer{{$question['id']}}">
                                                <span class="quiz-checkmark" style="right: 0px !important"></span> </label>

                                            @endfor


                                        </div>
                                    </div>
                                @endforeach
                                <div  class="d-flex align-items-center pt-3">

                                    <div class="ml-auto mr-sm-5"> <p id="sad" class="btn btn-maincolor quiz-next btn-Result">تسليم الامتحان </p> </div>
                                </div>
                            </div>
                        </form>


                    </div>

                    <div id="scoreDivSad" class="col-12 col-md-6 col-lg-8" style="display: none;">

                    </div>


                @endif

                <!-- THE PLAYLIST -->
                <div class="vid-list-container col-12 col-md-6 col-lg-4" style="height: 415px; width:100%;">
                    <ol id="vid-list">
                        <ul>

                            <li>
                                <!--We Use Image Source and Video Source-->
                                <a href="/courseLessonses/{{$course->id}}/0" style="color:white">
                                    {{-- <span class="vid-thumb"><img width=52
                                            style="height:42px; border-radius:.2em"
                                            src="{{asset('assets/images/courses')}}/{{$course->image}}" /></span>
                                    <div class="desc">مقدمة عن الدورة </div> --}}
                                    <div class="row">
                                        <div class="col-4">
                                            <img width=52
                                                style="height:42px; border-radius:.2em"
                                                src="{{asset('assets/images/courses')}}/{{$course->image}}" />
                                        </div>
                                        <div class="col-8">
                                            مقدمة عن الدورة
                                        </div>
                                    </div>
                                </a>
                            </li>
                            {{-- <br> --}}

                            @foreach($corseAllLessons as $corseAllLesson)
                                <li>
                                    <!--We Use Image Source and Video Source-->
                                    {{-- @if(Auth::guard('web')->user()) --}}
                                    @if($corseAllLesson->lesson_number <= $myLessonIndex)

                                    <a href='/courseLessonses/{{$course->id}}/{{$corseAllLesson->lesson_number}}' style="color:white">
                                    @else
                                        <a>
                                    @endif

                                    <div class="row">
                                        <div class="col-4">
                                            <img width=52
                                                style="height:42px; border-radius:.2em"
                                                src="{{asset('assets/images/courses')}}/{{$course->id}}/{{$corseAllLesson->image}}" />
                                        </div>
                                        <div class="col-8">
                                            {{$corseAllLesson->name_ar}}
                                        </div>
                                    </div>
                                        {{-- <span class="vid-thumb"><img width=52
                                                style="height:42px; border-radius:.2em"
                                                src="{{asset('assets/images/courses')}}/{{$course->id}}/{{$corseAllLesson->image}}" /></span>
                                        <div class="desc">{{$corseAllLesson->name_ar}}</div> --}}
                                    </a>
                                </li>
                                {{-- <br> --}}
                            @endforeach



                        </ul>
                    </ol>
                </div>
            </div>

            <!--Title and Button-->
            <div class="row ml-auto mt-3">
                @if($forChickLessonAvailble == 0)
                    <div class="col-12 col-lg-8">
                        <h4 class="mt-4" id="pText">{{$course->name_ar}}</h4>
                        <p>{{$course->details_ar}}</p>
                    </div>
                    {{--
                    <div class="mt-3 col-12  col-lg-4 d-flex justify-content-start">
                        <button class="btn btn-maincolor btn-sm certificate-button"> Download Certificate <i
                                class="fas fa-download ml-3"></i></button>
                    </div> --}}

                @else
                <div class="col-12 col-lg-8">
                    <h4 class="mt-4" id="pText">{{$myCoursesLesson[0]->name_ar}}</h4>
                    <p>{{$myCoursesLesson[0]->details_ar}}</p>
                </div>
                @endif


                @if(!Auth::guard('web')->user())
                    <div class="col-sm-2 text-center">
                        <a href="/login" class="btn btn-maincolor">شراء</a>
                    </div>
                @else
                    @if($booking == 0 && Auth::guard('web')->user())
                        <div class="col-sm-2 text-center">
                            <a href="/enrollCourse/{{$course->id}}" class="btn btn-maincolor">شراء</a>
                        </div>
                    @endif
                @endif
            </div>

            @if($forChickLessonAvailble == 1)

            <div id="comments" class="comments-area bordered col-lg-8">

                <h4 class="comments-title">
                    التعليقات علي هذا الدرس
                </h4>
                <ol class="comment-list">
                    @foreach($myCoursesLesson[0]->comments as $comment)


                    <li class="comment">
                        <article class="comment-body" style="margin-right: 100px">
                            <footer class="comment-meta">
                                <div class="comment-author vcard">
                                    <img alt="" src="{{asset('assets/images/users')}}/{{ $comment->commentUser['image'] }}" style="right: -100px">
                                    <b class="fn">
                                        <a href="#" rel="nofollow" class="url">{{$comment->commentUser['fname']}} {{$comment->commentUser['lname']}}</a>
                                    </b>
                                </div>
                                <!-- .comment-author -->

                                <div class="comment-metadata">
                                    <a href="#" class="color-main2">
                                        <time datetime="2018-03-14T07:57:01+00:00">
                                            {{$comment->created_at}}
                                        </time>
                                    </a>
                                </div>
                                <!-- .comment-metadata -->
                            </footer>
                            <!-- .comment-meta -->

                            <div class="comment-content">
                                <p>{{$comment->body}}</p>
                            </div>
                            <!-- .comment-content -->

                        </article>
                        <!-- .comment-body -->

                    </li>

                    <!-- #comment-## -->
                    @endforeach

                    <li id="toyComment">

                    </li>

                </ol>
                <!-- .comment-list -->

            </div>

            <div class="comment-form-reply ls bordered col-lg-8" id="reply">
                <div id="respond" class="comment-respond">
                    <h4 id="reply-title" class="comment-reply-title">اكتب تعليقك الان</h4>
                    <form id="comment-form" class="comment-form">

                        <p class="comment-form-comment">
                            <label for="comment">تعليقك</label>
                            <textarea id="commentBodyToty" name="comment" cols="45" rows="8" maxlength="65525"
                                aria-required="true" placeholder="تعليقك ..."
                                required="required"></textarea>
                        </p>
                        <p class="form-submit">
                            {{-- <button id="totyHappy" class="submit">
                                sad
                            </button> --}}
                            @if(Auth::guard('web')->user())
                            <input id="totyHappy" type="submit" class="submit" value="ارسل الان">
                            @else
                            <a href="/login" class="btn btn-maincolor">ارسل الان</a>
                            @endif
                        </p>
                    </form>
                </div>
                <!-- #respond -->
            </div>



            @endif

        </div>
        <!--.col-* -->

    </div>



</section>

@endif



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@isset($myCoursesLesson[0])
    <script>

        $(document).ready(function(){
            $('#sad').click(function(){
                var unievrsity = $(this).val();
                var quizId = {{$myCoursesLesson[0]->quiz->id}};
                var courseId = {{$course->id}};
                var coursesLesson = {{$myCoursesLesson[0]->lesson_number}};
                var arr = {};
                var x = {{$myCoursesLesson[0]->quiz->quizQuestions[0]['id']}};

                @for($y =0; $y < count($myCoursesLesson[0]->quiz->quizQuestions) ; $y++)


                    var myAnswer = document.querySelector('input[name = "answer'+{{$myCoursesLesson[0]->quiz->quizQuestions[$y]['id']}}+'"]:checked');

                    if(myAnswer != null){
                        arr['answer'+{{$myCoursesLesson[0]->quiz->quizQuestions[$y]['id']}}] = myAnswer.value;
                    }

                @endfor
                console.log({{$y}});

                console.log(arr);

                Object.size = function(obj) {
                var size = 0,
                    key;
                for (key in obj) {
                    if (obj.hasOwnProperty(key)) size++;
                }
                return size;
                };

                // Get the size of an object

                var size = Object.size(arr);

                    if (size<{{count($myCoursesLesson[0]->quiz->quizQuestions)}}) {
                        alert("please answer all question");
                    }
                        $.ajax({
                        url:'https://chefkhalil.com/getResult',
                            method:"post",
                            data:{Arr:arr,QuizId:quizId,CourseId:courseId,CoursesLesson:coursesLesson},
                            dataType:"text",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function(data){
                                var examDiv = document.getElementById ("examdiv");
                                examDiv.style.display = "none";
                                var scoreSad = document.getElementById ("scoreDivSad");
                                scoreSad.style.display = "block";
                                $('#scoreDivSad').html(data);
                                // alert(data);
                            }
                        });

            });
        });
    </script>
@endisset

@isset($myCoursesLesson[0])
<script>

    $(document).ready(function(){
        $('#totyHappy').click(function(event){
            event.preventDefault();
            var unievrsity = $(this).val();
            var comment = document.getElementById("commentBodyToty").value;
            var coursesLesson = {{$myCoursesLesson[0]->id}};
            console.log(comment);
            $.ajax({
            url:'https://chefkhalil.com/setComment',
                method:"post",
                data:{Comment:comment,CoursesLesson:coursesLesson},
                dataType:"text",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    document.getElementById("commentBodyToty").value="";
                    $('#toyComment').html(data);
                    // alert(data);
                }
            });

        });
    });
</script>
@endisset

<script src="{{asset('assets/site/js/lessons.js')}}"></script>
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
