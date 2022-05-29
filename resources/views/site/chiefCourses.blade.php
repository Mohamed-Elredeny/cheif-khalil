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
    Chief {{$chief['fname']}} {{$chief['lname']}} Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
     دورات الشيف {{$chief['fname']}} {{$chief['lname']}}
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Chief {{$chief['fname']}} {{$chief['lname']}} Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    {{$chief['fname']}} {{$chief['lname']}} دورات الشيف
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-pt-60 s-pb-75 s-pt-lg-50 s-pb-lg-100 gallery-title border-none">
				<div class="container">
                    <div class="row">
                        @if(count($course) > 0)
                        @foreach($course as $coursess)
                        <div class="col-xl-4 col-md-6" >
                            <div class="item-media">
                                <img src="{{asset('assets/images/courses')}}/{{$coursess->image}}" alt="" style="height: 300px">
                                <div class="media-links">
                                    <a class="abs-link" href="/showCourseDetails/{{$coursess->id}}"></a>
                                </div>
                                <div class="content-absolute bg-maincolor2-transparent text-left ds">
                                    <a href="/showChiefDetails/{{$coursess->courseChief['id']}}">
                                        <h6>{{$coursess->courseChief['fname']}} {{$coursess->courseChief['lname']}}</h6>
                                    </a>
                                    <div class="autor half-circle">
                                        <img src="{{asset('assets/images/chiefs')}}/{{$coursess->courseChief['image']}}" alt="" >
                                    </div>
                                </div>
                            </div>
                            <div class="item-content">
                                <h5>
                                    <a href="/showCourseDetails/{{$coursess->id}}">{{$coursess->courseCategory['name_en']}}</a>
                                </h5>

                                <p>
                                    <a href="/showCourseDetails/{{$coursess->id}}">{{$coursess->name_en}}</a>
                                </p>

                            </div>
                            <div class="program-icon text-center">
                                <div>
                                    <i class="fa fa-users color-main"></i>
                                    {{count($coursess->coursesBooking)}}
                                </div>
                                <div>
                                    <i class="fa fa-heart color-main"></i>
                                    {{count($coursess->coursesFavoriteList)}}
                                </div>
                                <div>
                                    @if(Auth::guard('web')->user())
                                        @if(count($coursesFavoriteList)>0)
                                            @for($i = 0; $i < count($coursesFavoriteList); $i++)

                                                @if($coursee->id == $coursesFavoriteList[$i]['course_id'])
                                                    <a class="love-fill text-center col-2" href="/removeFavoriteCourse/{{$coursee->id}}" style="padding: 15px;">
                                                        <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                    </a>
                                                    @break

                                                @elseif($i == count($coursesFavoriteList)-1 )
                                                    <a class="love text-center col-2" href="/addFavoriteCourse/{{$coursee->id}}" style="padding: 15px; color:#82b440">
                                                        <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                    </a>
                                                    @break

                                                @endif

                                            @endfor

                                        @else
                                            <a class="love text-center col-2" href="/addFavoriteCourse/{{$coursee->id}}" style="padding: 15px; color:#82b440">
                                                <i class="fa fa fa-heart" aria-hidden="true"></i>
                                            </a>
                                        @endif

                                    @endif

                                    @if(!Auth::guard('web')->user())
                                        <a class="love text-center col-2" href="/login" style="padding: 15px; color:#82b440" >
                                            <i class="fa fa fa-heart" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                            <div class="col-sm-12">
                                <center>
                                    <h4 class="btn btn-danger h3" style="color:white">
                                        There is no Courses yet!
                                    </h4>
                                </center>
                            </div>

                        @endif
                    </div>
                </div>
						{{-- <div class="d-none d-lg-block divider-60"></div> --}}
					{{-- </div>

				</div> --}}
</section>


@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-pt-60 s-pb-75 s-pt-lg-50 s-pb-lg-100 gallery-title border-none text-right">
    <div class="container">
        <div class="row">
            @if(count($course) > 0)
            @foreach($course as $coursess)
                <div class="col-xl-4 col-md-6" >
                    <div class="item-media">
                        <img src="{{asset('assets/images/courses')}}/{{$coursess->image}}" alt="" style="height: 300px">
                        <div class="media-links">
                            <a class="abs-link" href="/showCourseDetails/{{$coursess->id}}"></a>
                        </div>
                        <div class="content-absolute bg-maincolor2-transparent text-left ds">
                            <a href="/showChiefDetails/{{$coursess->courseChief['id']}}">
                                <h6>{{$coursess->courseChief['fname']}} {{$coursess->courseChief['lname']}}</h6>
                            </a>
                            <div class="autor half-circle">
                                <img src="{{asset('assets/images/chiefs')}}/{{$coursess->courseChief['image']}}" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="item-content">
                        <h5>
                            <a href="/showCourseDetails/{{$coursess->id}}">{{$coursess->courseCategory['name_ar']}}</a>
                        </h5>

                        <p>
                            <a href="/showCourseDetails/{{$coursess->id}}">{{$coursess->name_ar}}</a>

                        </p>

                    </div>
                    <div class="program-icon text-center">
                        <div>
                            <i class="fa fa-users color-main"></i>
                            {{count($coursess->coursesBooking)}}
                        </div>
                        <div>
                            <i class="fa fa-heart color-main"></i>
                            {{count($coursess->coursesFavoriteList)}}
                        </div>
                        <div>
                            @if(Auth::guard('web')->user())
                                @if(count($coursesFavoriteList)>0)
                                    @for($i = 0; $i < count($coursesFavoriteList); $i++)

                                        @if($coursee->id == $coursesFavoriteList[$i]['course_id'])
                                            <a class="love-fill text-center col-2" href="/removeFavoriteCourse/{{$coursee->id}}" style="padding: 15px;">
                                                <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                            </a>
                                            @break

                                        @elseif($i == count($coursesFavoriteList)-1 )
                                            <a class="love text-center col-2" href="/addFavoriteCourse/{{$coursee->id}}" style="padding: 15px; color:#82b440">
                                                <i class="fa fa fa-heart" aria-hidden="true"></i>
                                            </a>
                                            @break

                                        @endif

                                    @endfor

                                @else
                                    <a class="love text-center col-2" href="/addFavoriteCourse/{{$coursee->id}}" style="padding: 15px; color:#82b440">
                                        <i class="fa fa fa-heart" aria-hidden="true"></i>
                                    </a>
                                @endif

                            @endif

                            @if(!Auth::guard('web')->user())
                                <a class="love text-center col-2" href="/login" style="padding: 15px; color:#82b440" >
                                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <div class="col-sm-12">
                <center>
                    <h4 class="btn btn-danger h3" style="color:white">
                       لا يوجد دورات بعد!
                    </h4>
                </center>
            </div>

            @endif
        </div>
    </div>
            {{-- <div class="d-none d-lg-block divider-60"></div> --}}
        {{-- </div>

    </div> --}}
</section>


@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
