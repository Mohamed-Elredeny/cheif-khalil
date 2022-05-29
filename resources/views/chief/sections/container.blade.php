@extends('chief.dashboard')

@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    <div class="container">
        <div class="main-body">

            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{asset('assets/images/chiefs/'.auth()->user()->image)}}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{auth()->user()->fname ." ". auth()->user()->lname}}</h4>
                                    <p class="text-secondary mb-1">{{auth()->user()->email}}</p>
                                    <p class="text-muted font-size-sm">{{auth()->user()->phone}}</p>
                                    <!--                                    <button class="btn btn-primary">Follow</button>
                                                                        <button class="btn btn-outline-primary">Message</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                <span class="text-secondary">{{auth()->user()->twitter}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <span class="text-secondary">{{auth()->user()->instagram}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                <span class="text-secondary">{{auth()->user()->facebock}}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <i class="fa fa-snapchat" style="font-size:25px;padding-right: 10px"></i>
                                    Snapchat
                                </h6>
                                <span class="text-secondary">{{auth()->user()->snapchat}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{auth()->user()->fname ." ". auth()->user()->lname}}

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{auth()->user()->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{auth()->user()->phone}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{auth()->user()->gender}}

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">Courses</h5>
                                </div>
                            </div>
                            <hr>
                            <center>
                                <div class="row" style="width: 900px;">
                                    @foreach(\App\models\admin\Course::where('chief_id',auth()->user()->id)->limit(15)->get() as $course)
                                        <div class="card col-sm-4" style="margin-right: 10px;margin-bottom: 10px">
                                            <center>
                                                <br>
                                                <h6>
                                                    {{$course->name_en}}
                                                </h6>
                                                <br>
                                                <img src="{{asset('assets/images/courses/'.$course->image)}}" alt="" style="height: 90px;width: 90px">
                                                <br>
                                                <br>
                                                <a href="{{route('lessons.create',['course_id'=>$course->id])}}" class="btn btn-dark" target="_blank">
                                                    view
                                                </a>
                                                <br><br>
                                            </center>
                                            <div>
                                                <hr>
                                                <center>
                                                    <h6>
                                                        Chief
                                                    </h6>
                                                </center>
                                                <hr>
                                                <div class="row">
                                                    <div class="col h5">
                                                        {{$course->chief->fname . " ". $course->chief->lname}}
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{route('chiefs.show',['chief'=>$course->chief->id])}}" class="btn btn-dark" target="_blank">
                                                            view
                                                        </a>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>


                                    @endforeach
                                </div>

                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@else
@section('main-container')
    <div class="container" style="padding-right:60px;margin-top:100px;text-align: right">
        <div class="main-body">

            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">

                                <img src="{{asset('assets/images/admins/'.auth()->user()->image)}}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{auth()->user()->fname ." ". auth()->user()->lname}}</h4>
                                    <p class="text-secondary mb-1">{{auth()->user()->email}}</p>
                                    <p class="text-muted font-size-sm">{{auth()->user()->phone}}</p>
                                    <!--                                    <button class="btn btn-primary">Follow</button>
                                                                        <button class="btn btn-outline-primary">Message</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>تويتر</h6>
                                <span class="text-secondary">{{auth()->user()->twitter}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>انستغرام</h6>
                                <span class="text-secondary">{{auth()->user()->instagram}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>فيسبوك</h6>
                                <span class="text-secondary">{{auth()->user()->facebock}}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <i class="fa fa-snapchat" style="font-size:25px;padding-right: 10px"></i>
                                    سناب شات
                                </h6>
                                <span class="text-secondary">{{auth()->user()->snapchat}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الاسم الكامل</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{auth()->user()->fname ." ". auth()->user()->lname}}

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">البريد الالكتروني</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{auth()->user()->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">الجوال</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{auth()->user()->phone}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">النوع</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{auth()->user()->gender}}

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">الدورات</h5>
                                </div>
                            </div>
                            <hr>
                            <center>
                                <div class="row" style="width: 900px;">
                                    @foreach(\App\models\admin\Course::where('chief_id',auth()->user()->id)->limit(15)->get() as $course)
                                        <div class="card col-sm-4" style="margin-right: 10px;margin-bottom: 10px">
                                            <center>
                                                <br>
                                                <h6>
                                                    {{$course->name_ar}}
                                                </h6>
                                                <br>
                                                <img src="{{asset('assets/images/courses/'.$course->image)}}" alt="" style="height: 90px;width: 90px">
                                                <br>
                                                <br>
                                                <a href="{{route('lessons.create',['course_id'=>$course->id])}}" class="btn btn-dark" target="_blank">
                                                    عرض
                                                </a>
                                                <br><br>
                                            </center>
                                            <div>
                                                <hr>
                                                <center>
                                                    <h6>
                                                        الطاهي
                                                    </h6>
                                                </center>
                                                <hr>
                                                <div class="row">
                                                    <div class="col h5">
                                                        {{$course->chief->fname . " ". $course->chief->lname}}
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{route('chiefs.show',['chief'=>$course->chief->id])}}" class="btn btn-dark" target="_blank">
                                                            عرض
                                                        </a>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>


                                    @endforeach
                                </div>

                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
