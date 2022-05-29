@if($flag == 0)
@extends('chief.dashboard')
@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
    </style>

    <div class="pd-ltr-20 xs-pd-20-10">
    <div class="container">
        <form action="{{route('chief_lessons.store')}}" method="post" enctype="multipart/form-data" >
            @csrf

            <div class="row">
            <div class="col-sm-8">
                <input type="hidden" name="course_id" value="{{$course->id}}">
                <input type="hidden" name="lessons" value="{{count($lessons)}}">

            @for($i=0;$i<count($lessons);$i++)
                    <input type="hidden" name="{{'lesson_id'.$i}}" value="{{$lessons[$i]->id}}">
                        <div class="card mb-2 p-2" id="content{{$i}}" style="display:none">
                        <div class="card-body text-center"  style="height:auto">
                            <h4 class="card-title">{{$lessons[$i]->name_en}}</h4>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    Lesson Number
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text"  name="lesson_number{{$i}}" style="text-align: right;direction: rtl" value="{{$lessons[$i]->lesson_number}}">
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label  >Name Arabic :</label>
                                        <input type="text" class="form-control" name="name_ar{{$i}}" style="text-align: right;direction: rtl" value="{{$lessons[$i]->name_ar}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Name English :</label>
                                        <input type="text" class="form-control" name="name_en{{$i}}"  value="{{$lessons[$i]->name_en}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description Arabic :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_ar{{$i}}" style="text-align: right;direction: rtl">{{$lessons[$i]->details_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description English :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_en{{$i}}">{{$lessons[$i]->details_en}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img src="{{asset('assets/images/courses/'.$course->id.'/'.$lessons[$i]->image)}}" alt="" style="width:300px;height:200px">
                                        <label>Upload an image :</label>
                                        <input type="hidden" name="{{'old_image'.$i}}" value="{{$lessons[$i]->image}}">
                                        <input class="form-control" type="file" name="{{'image'.$i}}" value="{{$lessons[$i]->image}}">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <video style="width:300px;height:200px" controls>
                                            <source src="{{asset('assets/videos/courses/'.$lessons[$i]->url)}}" type="video/mp4">
                                        </video>
                                        <label>Upload an video :</label>
                                        <select  name="{{'video'.$i}}" class="form-control">
                                            @if(count($admin_videos) > 0)
                                                <option value="{{$lessons[$i]->url}}">Select Video</option>

                                            @foreach($admin_videos as $vid)
                                                @if($vid->video != $lessons[$i]->url)
                                                    <option value="{{$vid->video}}">{{$vid->name}}</option>
                                                @endif
                                            @endforeach
                                            @else
                                                <option value="">There is no videos yet</option>
                                            @endif
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <center>
                                <a href="{{route('chief.video.page')}}" target="_blank" class="h5">
                                    Add New Video
                                </a>
                            </center>
                            <br>
                            <hr>
                            <h4 class="text-center">
                                Quiz Details
                            </h4>
                            <input type="hidden" name="{{'quiz_id'.$i}}" value="{{$lessons[$i]->quiz->id}}" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Title Arabic : </label>
                                        <input type="text" class="form-control" name="quiz_title_ar{{$i}}" style="text-align: right;direction: rtl" value="{{$lessons[$i]->quiz->title_ar}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Title English :</label>
                                        <input type="text" class="form-control" name="quiz_title_en{{$i}}"  value="{{$lessons[$i]->quiz->title_en}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label  >Description Arabic : </label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="quiz_description_ar{{$i}}" style="text-align: right;direction: rtl">{{$lessons[$i]->quiz->description_ar}}</textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Description English : </label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="quiz_description_en{{$i}}">{{$lessons[$i]->quiz->description_en}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label  >Total Score </label>
                                        <input type="text" class="form-control" name="quiz_total_score{{$i}}" style="text-align: right;direction: rtl" value="{{$lessons[$i]->quiz->total_score}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Number Of Questions : </label>
                                        <input type="text" class="form-control" name="num_of_questions{{$i}}"  value="{{$lessons[$i]->quiz->number_of_questions}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Let us Add Question to Our Quiz </label>
                                        <br>
                                        <a  class="btn btn-dark" target="_blank" href="{{route('chief.lesson.add.question',['quiz_id'=>$lessons[$i]->quiz->id,'num_of_questions'=>$lessons[$i]->quiz->number_of_questions])}}">
                                            Add Questions
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>
                        </div>
                    </div>
                    @endfor
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-12 ">
                        <center>
                            <input type="submit" class="btn btn-dark col-sm-6" value="Save">
                        </center>
                        <br><br>
                    </div>
                </div>

                @for($i=0;$i<count($lessons);$i++)

                <div class="row ">
                    <div class="col-sm-12 ">
                        <div class="card mb-2 p-2 sad" id="tabs{{$i}}">
                            <div class="card-body text-center" onclick="dosmthing({{$i}},{{count($lessons)}})">
                              {{$lessons[$i]->name_en}}
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        </form>
    </div>
    </div>

@endsection
@else
@section('main-container')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
    </style>
    <div class="pd-ltr-20 xs-pd-20-10" s>
        <div class="container" style="padding-top: 100px;direction: rtl;text-align:right;">
            <form action="{{route('lessons.store')}}" method="post" enctype="multipart/form-data" >
                @csrf

                <div class="row">
                    <div class="col-sm-8">
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <input type="hidden" name="lessons" value="{{count($lessons)}}">

                        @for($i=0;$i<count($lessons);$i++)
                            <input type="hidden" name="{{'lesson_id'.$i}}" value="{{$lessons[$i]->id}}">
                            <div class="card mb-2 p-2" id="content{{$i}}" style="display:none">
                                <div class="card-body text-center"  style="height:auto">
                                    <h4 class="card-title">{{$lessons[$i]->name_en}}</h4>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4" style="font-size:20px;font-weight:bold">
                                            رقم الدرس
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text"  name="lesson_number{{$i}}" style="text-align: right;direction: rtl" value="{{$lessons[$i]->lesson_number}}">
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  style="font-size:20px;font-weight:bold">الاسم بالعربية</label>
                                                <input type="text" class="form-control" name="name_ar{{$i}}" style="text-align: right;direction: rtl" value="{{$lessons[$i]->name_ar}}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-size:20px;font-weight:bold">الاسم بالانجليزية</label>
                                                <input type="text" class="form-control" name="name_en{{$i}}"  value="{{$lessons[$i]->name_en}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-size:20px;font-weight:bold">التفاصيل بالعربية </label>
                                                <textarea  class="form-control" id="" cols="30" rows="10" name="details_ar{{$i}}" style="text-align: right;direction: rtl">{{$lessons[$i]->details_ar}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-size:20px;font-weight:bold">التفاصيل بالانجليزية</label>
                                                <textarea  class="form-control" id="" cols="30" rows="10" name="details_en{{$i}}">{{$lessons[$i]->details_en}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <img src="{{asset('assets/images/courses/'.$course->id.'/'.$lessons[$i]->image)}}" alt="" style="width:300px;height:200px">
                                                <label style="font-size:20px;font-weight:bold">اختر صورة</label>
                                                <input type="hidden" name="{{'old_image'.$i}}" value="{{$lessons[$i]->image}}">
                                                <input class="form-control" type="file" name="{{'image'.$i}}" value="{{$lessons[$i]->image}}">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <video style="width:300px;height:200px" controls>
                                                    <source src="{{asset('assets/videos/courses/'.$lessons[$i]->url)}}" type="video/mp4">
                                                </video>
                                                <label>Upload an video :</label>
                                                <select  name="{{'video'.$i}}" class="form-control">
                                                    @if(count($admin_videos) > 0)
                                                    <option value="{{$lessons[$i]->url}}">اختر فيديو</option>
                                                    @foreach($admin_videos as $vid)
                                                            @if($vid->video != $lessons[$i]->url)
                                                                <option value="{{$vid->video}}">{{$vid->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <option value="">There is no videos yet</option>
                                                    @endif
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                        <a href="{{route('chief.video.page')}}" target="_blank" class="h5">
                                            أضافة فيديو جديد
                                        </a>
                                    </center>
                                    <br>
                                    <hr>
                                    <h4 class="text-center">
                                       تفاصيل الاختبار
                                    </h4>
                                    <input type="hidden" name="{{'quiz_id'.$i}}" value="{{$lessons[$i]->quiz->id}}" >
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  style="font-size:20px;font-weight:bold">عنوان الاختبار بالعربية</label>
                                                <input type="text" class="form-control" name="quiz_title_ar{{$i}}" style="text-align: right;direction: rtl" value="{{$lessons[$i]->quiz->title_ar}}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-size:20px;font-weight:bold">عنوان الاختبار بالانجليزية</label>
                                                <input type="text" class="form-control" name="quiz_title_en{{$i}}"  value="{{$lessons[$i]->quiz->title_en}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  style="font-size:20px;font-weight:bold">تفاصيل الاختبار بالعربية</label>
                                                <textarea  class="form-control" id="" cols="30" rows="10" name="quiz_description_ar{{$i}}" style="text-align: right;direction: rtl">{{$lessons[$i]->quiz->description_ar}}</textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-size:20px;font-weight:bold">تفاصيل الاختبار بالانجليزية</label>
                                                <textarea  class="form-control" id="" cols="30" rows="10" name="quiz_description_en{{$i}}" style="text-align: right;direction: rtl">{{$lessons[$i]->quiz->description_en}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  style="font-size:20px;font-weight:bold">الدرجة الكلية </label>
                                                <input type="text" class="form-control" name="quiz_total_score{{$i}}" style="text-align: right;direction: rtl" value="{{$lessons[$i]->quiz->total_score}}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="font-size:20px;font-weight:bold">عدد الاسئلة</label>
                                                <input type="text" class="form-control" name="num_of_questions{{$i}}"  value="{{$lessons[$i]->quiz->number_of_questions}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="font-size:20px;font-weight:bold">هيا لنقم باضافة بعدد الاسئله للاختبار</label>
                                                <br>
                                                <a href="{{ route('chief.lesson.add.question',['quiz_id'=>$lessons[$i]->quiz->id,'num_of_questions'=>$lessons[$i]->quiz->number_of_questions]) }}" class="btn btn-dark" target="_blank">
                                                    اضافة الاسئلة
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <center>
                                    <input type="submit" class="btn btn-dark col-sm-6" value="Save">
                                </center>
                                <br><br>
                            </div>
                        </div>

                        @for($i=0;$i<count($lessons);$i++)

                            <div class="row ">
                                <div class="col-sm-12 ">
                                    <div class="card mb-2 p-2 sad" id="tabs{{$i}}">
                                        <div class="card-body text-center" onclick="dosmthing({{$i}},{{count($lessons)}})">
                                            {{$lessons[$i]->name_en}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

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
@else
    <script>
        location.reload();
    </script>
@endif
