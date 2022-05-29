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
    Home
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    الصفحة الرئيسية
    @endif
@endsection


@section('header')
    @include('site.includes.headerHome')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')


<section class="page_slider">
    <div class=" flexslider " data-nav="true" data-dots="false">
        <ul class="slides">
            @if(count($liveStreams)==0)
            <li class="ds text-center">
                <span class="flexslider-overlay"></span>
                <img src="{{asset('assets/site/images/slide01.jpg')}}" alt="" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="intro_layers_wrapper">
                                <div class="intro_layers">
                                    <div class="intro_layer" data-animation="fadeInUp">
                                        <h6 class="text-uppercase intro_after_featured_word color-main">
                                            Cooking is Easy, We Will Prove it to You!
                                        </h6>
                                    </div>
                                    <div class="intro_layer" data-animation="fadeInUp">
                                        <div class="d-inline-block">
                                            <h2 class="intro_featured_word">
                                                No Availible Cooking Class Now:
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="intro_layer flex-countdown" data-animation="fadeInUp">
                                        {{-- <div id="flex-countdown"></div> --}}

                                    {{-- use "data-date" attribute with your date value to set date that you need to count to --}}
                                    {{-- <div id="comingsoon-countdown" data-date="March 29, 2022 10:00:00"></div> --}}
                                        {{-- <div id="flex-countdown" data-date="March 29, 2022 10:00:00"></div> --}}

                                    </div>
                                    {{-- <div class="intro_layer flex-btn" data-animation="fadeInUp">
                                        <div class="d-inline-block">
                                            <a href="#" class="btn btn-maincolor" >Show Details</a>
                                            {{-- <a href="#" class="btn btn-light">our feedback</a> --}}
                                        {{-- </div>

                                    </div> --}}

                                </div>
                                <!-- eof .intro_layers -->
                            </div>
                            <!-- eof .intro_layers_wrapper -->
                        </div>
                        <!-- eof .col-* -->
                    </div>
                    <!-- eof .row -->
                </div>
                <!-- eof .container-fluid -->
            </li>
            @endif

            @foreach($liveStreams as $liveStream)
            <li class="ds text-center">
                <span class="flexslider-overlay"></span>
                <img src="{{asset('assets/site/images/slide01.jpg')}}" alt="">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="intro_layers_wrapper">
                                <div class="intro_layers">
                                    <div class="intro_layer" data-animation="fadeInUp">
                                        <h6 class="text-uppercase intro_after_featured_word color-main">
                                            Cooking is Easy, We Will Prove it to You!
                                        </h6>
                                    </div>
                                    <br>
                                    <h4 class="text-uppercase intro_after_featured_word color-main">
                                        {{$liveStream->title_en}}
                                    </h4>
                                    <br>
                                    <div class="intro_layer" data-animation="fadeInUp">
                                        <div class="d-inline-block">
                                            <h2 class="intro_featured_word">
                                                Next Cooking Class Starts In:
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="intro_layer flex-countdown" data-animation="fadeInUp">
                                        {{-- <div id="flex-countdown"></div> --}}

                                    {{-- use "data-date" attribute with your date value to set date that you need to count to --}}
                                    {{-- <div id="comingsoon-countdown" data-date="March 29, 2022 10:00:00"></div> --}}
                                        <div id="flex-countdown" data-date="{{$liveStream->start_date}}" Timezone="Asia/Riyad"></div>
                                    </div>
                                    <div class="intro_layer flex-btn" data-animation="fadeInUp">
                                        <div class="d-inline-block">
                                            <a href="#" class="btn btn-maincolor" data-toggle="modal" data-target="#exampleModal">Show Details</a>
                                            {{-- <a href="#" class="btn btn-light">our feedback</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <!-- eof .intro_layers -->
                            </div>
                            <!-- eof .intro_layers_wrapper -->
                        </div>
                        <!-- eof .col-* -->
                    </div>
                    <!-- eof .row -->
                </div>
                <!-- eof .container-fluid -->
            </li>
            @endforeach


        </ul>
    </div>
    <!-- eof flexslider -->
    <div class="gt3_svg_line">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="308px" height="41px" viewBox="0 0 308.000000 41.000000" preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,41.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                <path d="M1280 395 c-174 -30 -287 -70 -558 -199 -271 -129 -410 -171 -617 -185 -61 -5 585 -8 1435 -8 850 0 1498 3 1440 7 -212 15 -344 54 -625 187 -285 135 -382 169 -560 198 -111 18 -409 18 -515 0z"/>
            </g>
        </svg>
    </div>
</section>

{{-- courses section --}}

<section class="ls s-py-40 s-py-lg-130 program program-carousel animate" data-animation="fadeInUp" id="classes">
    <div class="container">
        <div class="divider-25"></div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="section-heading">
                    <h3>Our Cooking Classes</h3>
                    <img class="image-wrap" src="{{asset('assets/site/images/icon-main.png')}}" alt="" >
                </div>
                <div class="d-none d-lg-block divider-60"></div>
                <div class="owl-carousel carousel-nav" data-responsive-lg="3" data-responsive-md="2" data-responsive-sm="2" data-responsive-xs="1" data-nav="true" data-loop="true">
                    @foreach($course as $courses)
                    <div class="vertical-item text-center bordered">
                        <div class="item-media">
                            <img src="{{asset('assets/images/courses')}}/{{$courses->image}}" alt="" style="height: 400px">
                            <div class="media-links">
                                <a class="abs-link" href="/showCourseDetails/{{$courses->id}}"></a>
                            </div>
                            <div class="content-absolute bg-maincolor2-transparent text-left ds">
                                <h6><a class="" href="/showChiefDetails/{{$courses->courseChief['id']}}">{{$courses->courseChief['fname']}} {{$courses->courseChief['lname']}} <a></h6>
                                <div class="autor half-circle">
                                    <a class="" href="/showChiefDetails/{{$courses->courseChief['id']}}"> <img src="{{asset('assets/images/chiefs')}}/{{$courses->courseChief['image']}}" alt="" style="height:80px;width:80px"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-content" style="height:200px;overflow-y: scroll">
                            <h5 >
                                <a href="/showCourseDetails/{{$courses->id}}" > {{$courses->name_en}} </a>
                            </h5>
                            <p >
                                {{$courses->courseCategory['name_en']}}
                            </p>

                        </div>
                        <div class="program-icon text-center">
                            <div>
                                <i class="fa fa-users color-main"></i>
                                {{count($courses->coursesBooking)}}
                            </div>
                            <div>
                                <i class="fa fa-heart color-main"></i>
                                {{count($courses->coursesFavoriteList)}}
                            </div>
                            <div>
                                @if(Auth::guard('web')->user())
                                    @if(count($coursesFavoriteList)>0)
                                        @for($i = 0; $i < count($coursesFavoriteList); $i++)

                                            @if($courses->id == $coursesFavoriteList[$i]['course_id'])
                                                <a class="love-fill text-center col-2" href="/removeFavoriteCourse/{{$courses->id}}" style="padding: 15px;">
                                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @elseif($i == count($coursesFavoriteList)-1 )
                                                <a class="love text-center col-2" href="/addFavoriteCourse/{{$courses->id}}" style="padding: 15px; color:#82b440">
                                                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @endif

                                        @endfor

                                    @else
                                        <a class="love text-center col-2" href="/addFavoriteCourse/{{$courses->id}}" style="padding: 15px; color:#82b440">
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
                </div>
            </div>
        </div>
        <div class="divider-30"></div>
        <br><br>
        <div class="row nav-btn">
            <div class="col-sm-12 text-center">
                <a href="/showCourses" class="btn btn-maincolor2">View More</a>
            </div>
        </div>
    </div>
</section>

{{-- Achivments --}}
<section class="ls ms s-pt-lg-100 s-pb-lg-75 c-my-0 video-part right-part-bg"
         id="about">

    <div class="cover-image s-cover-left">
        <video width="100%" style="padding-top: 50%" controls style="z-index: 2">
            <source src="{{asset('assets/videos/achievement/'.$Achievement->video)}}">
        </video>
    </div>
    <div class="row align-items-center">
        <div class="col-12 col-lg-6 ">

        </div>
        <div class="col-12 col-lg-5 order-lg-2  animate" data-animation="slideInLeft">
            <div class="d-none d-lg-block divider-55"></div>
            <div class="item-content">
                <h3 class="fs-32 color-main text-uppercase">{{$Achievement->title_en}}</h3>
                <div class="d-none d-lg-block divider-50"></div>
                <div class="media">
                    <div class="icon-styled color-main2">
                        <i class="fa fa-trophy"></i>
                    </div>
                    <div class="media-body">
                        <h5 style="text-align:left;">
                            {{$Achievement->achievement_1_en}}
                        </h5>
                        <p>
                            {{$Achievement->achievement_details_1_en}}
                        </p>
                    </div>
                </div>
                <div class="media">
                    <div class="icon-styled color-main2">
                        <i class="fa fa-group"></i>
                    </div>
                    <div class="media-body">
                        <h5 style="text-align:left;">
                            {{$Achievement->achievement_2_en}}
                        </h5>
                        <p>
                            {{$Achievement->achievement_details_2_en}}
                        </p>
                    </div>
                </div>
                <div class="media">
                    <div class="icon-styled color-main2">
                        <i class="fa fa-hourglass-half"></i>
                    </div>
                    <div class="media-body">
                        <h5 style="text-align:left;">
                            {{$Achievement->achievement_3_en}}
                        </h5>
                        <p>
                            {{$Achievement->achievement_details_3_en}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none d-lg-block divider-20"></div>
</section>


{{-- Reviews --}}
<section
    class="ls ms s-pt-lg-130 s-pb-lg-130 c-gutter-100 c-my-0 left-part-bg testimonials-section text-center text-md-left"
    id="testimonials">
    <div class="owl-carousel owl-nav-bottom" data-responsive-lg="1" data-responsive-md="1"
         data-responsive-sm="1" data-responsive-xs="1" data-nav="true" data-loop="true" data-margin="0">
        @foreach($Reviews as $rev)
            <div class="owl-section-item">
                <div class="cover-image s-cover-right">
                    <img src="{{asset('assets/images/translate/reviews/'.$rev->image)}}" alt="">
                </div>
                <div class="container">

                    <div class="row">
                        <div class="col-lg-6 order-lg-2">
                        </div>
                        <div class="col-lg-6 order-lg-1 animate" data-animation="slideInLeft">
                            <div class="d-none d-lg-block divider-120"></div>
                            <div class="item-content">

                                <header>

                                    <h3>
                                        <a >Reviews of Our Students</a>
                                    </h3>
                                </header>
                                <p class="excerpt">
                                    {{$rev->chief_description_en}}
                                </p>

                                <span class="media-item float-right">
                                <img src="images/signature.png" alt="">
                            </span>
                                <h4>   {{$rev->chief_name_en}}</h4>
                                <h6 class="small-text color-main">{{$rev->chief_role_en}}</h6>
                            </div>
                            <div class="d-none d-lg-block divider-120"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <div class="gt3_svg_line bottom-line">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="308px" height="41px"
             viewBox="0 0 308.000000 41.000000" preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,41.000000) scale(0.100000,-0.100000)" fill="#000000"
               stroke="none">
                <path
                    d="M1280 395 c-174 -30 -287 -70 -558 -199 -271 -129 -410 -171 -617 -185 -61 -5 585 -8 1435 -8 850 0 1498 3 1440 7 -212 15 -344 54 -625 187 -285 135 -382 169 -560 198 -111 18 -409 18 -515 0z" />
            </g>
        </svg>
    </div>
</section>
{{-- Best Chiefs --}}


<section class="ls s-py-40 s-py-lg-130 chiefs chiefs-carousel ls animate" data-animation="fadeInUp" id="chiefs">
    <div class="container">
        <div class="divider-25"></div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="section-heading">
                    <h6 class="small-text color-main">Our team of professionals</h6>
                    <h3>Best Chefs of Chif`s Khalil School</h3>
                    <img class="image-wrap" src="{{asset('assets/site/images/icon-main2.png')}}" alt="">
                </div>
                <div class="d-none d-lg-block divider-60"></div>
                <div class="owl-carousel carousel-nav" data-responsive-lg="3" data-responsive-md="2" data-responsive-sm="2" data-responsive-xs="1" data-nav="true" data-loop="true">
                    @foreach($chief as $chieff)
                    <div class="vertical-item content-absolute content-hover text-center">
                        <div class="item-media">
                            <img src="{{asset('assets/images/chiefs')}}/{{$chieff->image}}" alt="" style="height: 400px">
                        </div>
                        <div class="item-content bg-maincolor-transparent">
                            <h4>
                                <a class="dark" href="/showChiefDetails/{{$chieff->id}}">{{$chieff->fname}} {{$chieff->lname}}</a>
                            </h4>

                            <div class="content-body">

                                <p class="social-icons">
                                    <a href="{{$chieff->facebook}}" class="fa fa-facebook color-light" title="facebook"></a>
                                    <a href="{{$chieff->twitter}}" class="fa fa-twitter color-light" title="twitter"></a>
                                    <a href="{{$chieff->instagram}}" class="fa fa-instagram color-light" title="instagram"></a>
                                    <a href="{{$chieff->snapchat}}" class="fa fa-snapchat-ghost color-light" title="snapchat"></a>
                                </p>
                                <div class="team-button">
                                    <a href="/showChiefDetails/{{$chieff->id}}" class="btn btn-team">view profile</a>
                                    @if(Auth::guard('web')->user())
                                    @if(count($followingChiefList)>0)
                                        @for($i = 0; $i < count($followingChiefList); $i++)

                                            @if($chieff->id == $followingChiefList[$i]['chief_id'])
                                                <a class="love-fill text-center col-2" href="/unFollowingChieff/{{$chieff->id}}" style="padding: 15px;">
                                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @elseif($i == count($followingChiefList)-1 )
                                                <a class="love text-center col-2" href="/followingChieff/{{$chieff->id}}" style="padding: 15px; color:#82b440">
                                                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @endif

                                        @endfor

                                    @else
                                        <a class="love text-center col-2" href="/followingChieff/{{$chieff->id}}" style="padding: 15px; color:#82b440">
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
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="divider-30"></div>
        <br><br>
        <div class="row nav-btn">
            <div class="col-sm-12 text-center">
                <a href="/showChiefs" class="btn btn-maincolor2">View More</a>
            </div>
        </div>
    </div>
</section>


{{-- contact --}}

<section class="ls s-py-40 s-py-lg-130 contact-form main-from s-overlay" id="contacts">
    <div class="container" style="padding-bottom: 30px;">
        {{-- <div class="divider-25"></div> --}}
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h6 class="small-text color-main2">send your question</h6>
                    <h3>Contact Us</h3>
                    <img class="image-wrap" src="assets/site/images/icon-main.png" alt="">
                </div>
                <div class="d-none d-lg-block divider-60"></div>
            </div>
        </div>
        <form class=" c-mb-10 c-mb-md-20 c-gutter-20" method="post" action="{{ route('sendMailCotactUs') }}">
            @csrf
            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group has-placeholder text-right">
                        <label for="contact-name">Full Name
                            <span class="required">*</span>
                        </label>
                        <span class="fa fa-user color-main"></span>
                        <input type="text" aria-required="true" size="30" value="" name="name"
                            id="contact-name" class="form-control color-main" placeholder="Full Name" required>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group has-placeholder text-right">
                        <label for="contact-email">Email
                            <span class="required">*</span>
                        </label>
                        <i class="fa fa-envelope color-main"></i>
                        <input type="email" aria-required="true" size="30" value="" name="email"
                            id="contact-email" class="form-control" placeholder="Email" required>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group has-placeholder">
                        <label for="contact-subject">Subject</label>
                        <i class="fa fa-pencil color-main" style="color: white;"></i>
                        <select class="form-control" name="subject" required>
                            @foreach($contactMails as $contactMail)
                                <option value="{{$contactMail->email}}">{{$contactMail->subject_en}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="col-sm-12">

                    <div class="form-group has-placeholder text-right">
                        <label for="contact-message">Message</label>
                        <i class="fa fa-pencil color-main"></i>
                        <textarea aria-required="true" rows="6" cols="45" name="message"
                            id="contact-message" class="form-control" placeholder="Message..." required></textarea>
                    </div>
                </div>

            </div>
            {{-- <div class="divider-10"></div> --}}
            <div class="row">

                <div class="col-sm-12 text-center">

                    <div class="form-group">
                        <button type="submit" class="btn btn-maincolor">Send
                        </button>
                    </div>
                </div>

            </div>
        </form>
        {{-- <div class="divider-30"></div> --}}
    </div>
</section>


{{-- category --}}

<section class="ls s-py-40 s-py-lg-130 blog-carousel animate" data-animation="fadeInUp" id="blog">
    <div class="container">
        <div class="divider-25"></div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="section-heading">
                    <h6 class="small-text color-main">Latest news ChifKhailSchool</h6>
                    <h3>Our Fresh Blog Posts</h3>
                </div>
                <div class="d-block d-md-none divider-20"></div>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-xl-7">
                        <div class="filters gallery-filters small-text text-lg-right">
                            <a href="#" data-filter="*" class="active selected">All Categories</a>
                            @foreach($category as $categoryy)
                            {{-- {{$name_en = str_replace(" ", "_", $categoryy->name_en)}} --}}
                            <a href="#" data-filter=".{{str_replace(" ", "_", $categoryy->name_en)}}">{{$categoryy->name_en}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="row isotope-wrapper masonry-layout c-mb-50" data-filters=".gallery-filters">
                    @foreach($course as $coursee)
                    {{-- {{$courseename_en = str_replace(" ", "_", $coursee->courseCategory['name_en'])}} --}}
                    <div class="col-xl-4 col-md-6 {{str_replace(" ", "_", $coursee->courseCategory['name_en'])}} " >

                        <div class="vertical-item text-center padding-top">
                            <div class="item-media">
                                <img style="height: 400px;" src="{{asset('assets/images/courses')}}/{{$coursee->image}}" alt="" style="height: 400px">
                                <div class="media-links">
                                    <div class="links-wrap">
                                        <a class="link-zoom" title=""  href="/showCourseDetails/{{$coursee->id}}"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-content" style="height:150px;overflow-y: scroll">
                                <div class="small-text tag color-main">
                                    <a href="/showCourseDetails/{{$coursee->id}}">{{$coursee->courseCategory['name_en']}}</a>
                                </div>
                                <h5>
                                    <a href="/showCourseDetails/{{$coursee->id}}">{{$coursee->name_en}}</a>
                                </h5>
                            </div>
                            <br>
                            <div class="row nav-btn">
                                <div class="col-sm-8 text-center">
                                    <a href="/showCourseDetails/{{$coursee->id}}" class="btn btn-maincolor">View Details</a>

                                </div>
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

                </div>
                <!-- .isotope-wrapper-->
                <br><br>

                <div class="row nav-btn">
                    <div class="col-sm-12 text-center">
                        <a href="/showCourses" class="btn btn-maincolor2">View More</a>
                    </div>
                </div>

            </div>

            <div class="d-none d-lg-block divider-60"></div>
        </div>

    </div>
</section>

@foreach($liveStreams as $liveStreamm)
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="+1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$liveStreamm->title_en}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe style="width: 100%;height:400px" src="{{$liveStreamm->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')



<section class="page_slider">
    <div class=" flexslider " data-nav="true" data-dots="false">
        <ul class="slides">
            @if(count($liveStreams)==0)
                <li class="ds text-center">
                    <span class="flexslider-overlay"></span>
                    <img src="{{asset('assets/site/images/slide01.jpg')}}" alt="" >
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="intro_layers_wrapper">
                                    <div class="intro_layers">
                                        <div class="intro_layer" data-animation="fadeInUp">
                                            <h6 class="text-uppercase intro_after_featured_word color-main">
                                                الطبخ امر سهل وسنعمل علي جعله اسهل لك

                                            </h6>
                                        </div>
                                        <div class="intro_layer" data-animation="fadeInUp">
                                            <div class="d-inline-block">
                                                <h2 class="intro_featured_word">
                                                    لا يوجد اي بث مباشر متاح حاليا
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="intro_layer flex-countdown" data-animation="fadeInUp">
                                            {{-- <div id="flex-countdown"></div> --}}

                                            {{-- use "data-date" attribute with your date value to set date that you need to count to --}}
                                            {{-- <div id="comingsoon-countdown" data-date="March 29, 2022 10:00:00"></div> --}}
                                            {{-- <div id="flex-countdown" data-date="March 29, 2022 10:00:00"></div> --}}

                                        </div>
                                        {{-- <div class="intro_layer flex-btn" data-animation="fadeInUp">
                                            <div class="d-inline-block">
                                                <a href="#" class="btn btn-maincolor" >Show Details</a>
                                                {{-- <a href="#" class="btn btn-light">our feedback</a> --}}
                                        {{-- </div>

                                    </div> --}}

                                    </div>
                                    <!-- eof .intro_layers -->
                                </div>
                                <!-- eof .intro_layers_wrapper -->
                            </div>
                            <!-- eof .col-* -->
                        </div>
                        <!-- eof .row -->
                    </div>
                    <!-- eof .container-fluid -->
                </li>
            @endif

            @foreach($liveStreams as $liveStream)
                <li class="ds text-center">
                    <span class="flexslider-overlay"></span>
                    <img src="{{asset('assets/site/images/slide01.jpg')}}" alt="">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="intro_layers_wrapper">
                                    <div class="intro_layers">
                                        <div class="intro_layer" data-animation="fadeInUp">
                                            <h6 class="text-uppercase intro_after_featured_word color-main">
                                                الطبخ امر سهل وسنعمل علي جعله اسهل لك
                                            </h6>
                                        </div>
                                        <br>
                                        <h4 class="text-uppercase intro_after_featured_word color-main">
                                            {{$liveStream->title_en}}
                                        </h4>
                                        <br>
                                        <div class="intro_layer" data-animation="fadeInUp">
                                            <div class="d-inline-block">
                                                <h2 class="intro_featured_word">
                                                   سوف يبدأ اقرب بث مباشر في خلال :
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="intro_layer flex-countdown" data-animation="fadeInUp">
                                            {{-- <div id="flex-countdown"></div> --}}

                                            {{-- use "data-date" attribute with your date value to set date that you need to count to --}}
                                            {{-- <div id="comingsoon-countdown" data-date="March 29, 2022 10:00:00"></div> --}}
                                            <div id="flex-countdown" data-date="{{$liveStream->start_date}}"></div>

                                        </div>
                                        <div class="intro_layer flex-btn" data-animation="fadeInUp">
                                            <div class="d-inline-block">
                                                <a href="#" class="btn btn-maincolor" data-toggle="modal" data-target="#exampleModal">عرض التفاصيل</a>
                                                {{-- <a href="#" class="btn btn-light">our feedback</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- eof .intro_layers -->
                                </div>
                                <!-- eof .intro_layers_wrapper -->
                            </div>
                            <!-- eof .col-* -->
                        </div>
                        <!-- eof .row -->
                    </div>
                    <!-- eof .container-fluid -->
                </li>
            @endforeach


        </ul>
    </div>
    <!-- eof flexslider -->
    <div class="gt3_svg_line">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="308px" height="41px" viewBox="0 0 308.000000 41.000000" preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,41.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                <path d="M1280 395 c-174 -30 -287 -70 -558 -199 -271 -129 -410 -171 -617 -185 -61 -5 585 -8 1435 -8 850 0 1498 3 1440 7 -212 15 -344 54 -625 187 -285 135 -382 169 -560 198 -111 18 -409 18 -515 0z"/>
            </g>
        </svg>
    </div>
</section>

<section class="ls s-py-40 s-py-lg-130 program program-carousel animate"  data-animation="fadeInUp" id="classes">
    <div class="container">
        <div class="divider-25"></div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="section-heading">
                    <h3> أحدث دورس الطبخ
                    </h3>
                    <img class="image-wrap" src="{{asset('assets/site/images/icon-main.png')}}" alt="">
                </div>
                <div class="d-none d-lg-block divider-60"></div>
                <div class="owl-carousel carousel-nav" data-responsive-lg="3" data-responsive-md="2" data-responsive-sm="2" data-responsive-xs="1" data-nav="true" data-loop="true">
                    @foreach($course as $courses)
                    <div class="vertical-item text-center bordered" dir="rtl">
                        <div class="item-media">
                            <img src="{{asset('assets/images/courses')}}/{{$courses->image}}" alt="" style="height: 400px">
                            <div class="media-links">
                                <a class="abs-link" href="/showCourseDetails/{{$courses->id}}"></a>
                            </div>
                            <div class="content-absolute bg-maincolor2-transparent text-left ds">
                                <h6><a class="" href="/showChiefDetails/{{$courses->courseChief['id']}}">{{$courses->courseChief['fname']}} {{$courses->courseChief['lname']}}</a></h6>
                                <div class="autor half-circle">
                                    <a class="" href="/showChiefDetails/{{$courses->courseChief['id']}}"> <img src="{{asset('assets/images/chiefs')}}/{{$courses->courseChief['image']}}" alt="" style="height:80px;width:80px"></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-content" style="height:150px;overflow-y: scroll">
                            <h5>
                                <a href="/showCourseDetails/{{$courses->id}}"> {{$courses->name_ar}}</a>
                            </h5>

                            <p>
                                {{$courses->courseCategory['name_ar']}}

                            </p>

                        </div>
                        <div class="program-icon text-center">
                            <div>
                                <i class="fa fa-users color-main"></i>
                                {{count($courses->coursesBooking)}}
                            </div>
                            <div>
                                <i class="fa fa-heart color-main"></i>
                                {{count($courses->coursesFavoriteList)}}
                            </div>
                            <div>
                                @if(Auth::guard('web')->user())
                                    @if(count($coursesFavoriteList)>0)
                                        @for($i = 0; $i < count($coursesFavoriteList); $i++)

                                            @if($courses->id == $coursesFavoriteList[$i]['course_id'])
                                                <a class="love-fill text-center col-2" href="/removeFavoriteCourse/{{$courses->id}}" style="padding: 15px;">
                                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @elseif($i == count($coursesFavoriteList)-1 )
                                                <a class="love text-center col-2" href="/addFavoriteCourse/{{$courses->id}}" style="padding: 15px; color:#82b440">
                                                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @endif

                                        @endfor

                                    @else
                                        <a class="love text-center col-2" href="/addFavoriteCourse/{{$courses->id}}" style="padding: 15px; color:#82b440">
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
                </div>
            </div>
        </div>
        <div class="divider-30"></div>
        <br><br>
        <div class="row nav-btn">
            <div class="col-sm-12 text-center">
                <a href="/showCourses" class="btn btn-maincolor2">كل الدورات</a>
            </div>
        </div>
    </div>
</section>

{{-- about Us 1 --}}

<section class="ls ms s-pt-lg-100 s-pb-lg-75 c-my-0 video-part right-part-bg text-center text-md-left"
         id="about">
    <div class="cover-image s-cover-left">
        <video width="100%" style="padding-top: 50%" controls style="z-index: 2">
            <source src="{{asset('assets/videos/achievement/'.$Achievement->video)}}">
        </video>
    </div>
    <div class="row align-items-center">
        <div class="col-12 col-lg-6 ">

        </div>
        <div class="col-12 col-lg-5 order-lg-2  animate" data-animation="slideInLeft">
            <div class="d-none d-lg-block divider-55"></div>
            <div class="item-content">
                <h3 class="fs-32 color-main text-uppercase">{{$Achievement->title_en}}</h3>
                <div class="d-none d-lg-block divider-50"></div>
                <div class="media">
                    <div class="icon-styled color-main2">
                        <i class="fa fa-trophy"></i>
                    </div>
                    <div class="media-body">
                        <h5 style="text-align:right;">
                            {{$Achievement->achievement_1_ar}}
                        </h5>
                        <p style="text-align:right;">
                            {{$Achievement->achievement_details_1_ar}}
                        </p>
                    </div>
                </div>
                <div class="media">
                    <div class="icon-styled color-main2">
                        <i class="fa fa-group"></i>
                    </div>
                    <div class="media-body">
                        <h5 style="text-align:right;">
                            {{$Achievement->achievement_2_ar}}
                        </h5>
                        <p style="text-align:right;">
                            {{$Achievement->achievement_details_2_ar}}
                        </p>
                    </div>
                </div>
                <div class="media">
                    <div class="icon-styled color-main2">
                        <i class="fa fa-hourglass-half"></i>
                    </div>
                    <div class="media-body">
                        <h5 style="text-align:right;">
                            {{$Achievement->achievement_3_ar}}
                        </h5>
                        <p style="text-align:right;">
                            {{$Achievement->achievement_details_3_ar}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-none d-lg-block divider-20"></div>
</section>

{{-- about us 2 --}}

<section
    class="ls ms s-pt-lg-130 s-pb-lg-130 c-gutter-100 c-my-0 left-part-bg testimonials-section text-center text-md-left"
    id="testimonials">
    <div class="owl-carousel owl-nav-bottom" data-responsive-lg="1" data-responsive-md="1"
         data-responsive-sm="1" data-responsive-xs="1" data-nav="true" data-loop="true" data-margin="0">
        @foreach($Reviews as $rev)
            <div class="owl-section-item">
                <div class="cover-image s-cover-right">
                    <img src="{{asset('assets/images/translate/reviews/'.$rev->image)}}" alt="">
                </div>
                <div class="container">

                    <div class="row">
                        <div class="col-lg-6 order-lg-2">
                        </div>
                        <div class="col-lg-6 order-lg-1 animate" data-animation="slideInLeft">
                            <div class="d-none d-lg-block divider-120"></div>
                            <div class="item-content">

                                <header>
                                    <h3 style="text-align:right;">
                                        <a >توصيات بعض الطهاه</a>
                                    </h3>
                                </header>
                                <p class="excerpt" style="text-align:right;">
                                    {{$rev->chief_description_ar}}
                                </p>

                                <span class="media-item float-right">
                                <img src="images/signature.png" alt="">
                            </span>
                                <h4 style="text-align:right;">   {{$rev->chief_name_ar}}</h4>
                                <h6 class="small-text color-main" style="text-align:right;">{{$rev->chief_role_ar}}</h6>
                            </div>
                            <div class="d-none d-lg-block divider-120"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</section>

{{-- Best Chiefs --}}


<section class="ls s-py-40 s-py-lg-130 chiefs chiefs-carousel ls animate" data-animation="fadeInUp" id="chiefs">
    <div class="container">
        <div class="divider-25"></div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="section-heading">
                    {{-- <h6 class="small-text color-main">Our team of proffesionals</h6> --}}
                    <h3>افضل الشيفات في منصة الشيف خليل</h3>
                    <img class="image-wrap" src="{{asset('assets/site/images/icon-main2.png')}}" alt="">
                </div>
                <div class="d-none d-lg-block divider-60"></div>
                <div class="owl-carousel carousel-nav" data-responsive-lg="3" data-responsive-md="2" data-responsive-sm="2" data-responsive-xs="1" data-nav="true" data-loop="true">
                    @foreach($chief as $chieff)
                    <div dir="rtl" class="vertical-item content-absolute content-hover text-center">
                        <div class="item-media">
                            <img src="{{asset('assets/images/chiefs')}}/{{$chieff->image}}" alt="" style="height: 400px">
                        </div>
                        <div class="item-content bg-maincolor-transparent">
                            <h4>
                                <a class="dark" href="/showChiefDetails/{{$chieff->id}}">{{$chieff->fname}} {{$chieff->lname}}</a>
                            </h4>

                            <div class="content-body">

                                <p class="social-icons">
                                    <a href="{{$chieff->facebook}}" class="fa fa-facebook color-light" title="facebook"></a>
                                    <a href="{{$chieff->twitter}}" class="fa fa-twitter color-light" title="twitter"></a>
                                    <a href="{{$chieff->instagram}}" class="fa fa-instagram color-light" title="instagram"></a>
                                    <a href="{{$chieff->snapchat}}" class="fa fa-snapchat-ghost color-light" title="snapchat"></a>
                                </p>
                                <div class="team-button">
                                    <a href="/showChiefDetails/{{$chieff->id}}" class="btn btn-team">عرض التفاصيل</a>
                                    @if(Auth::guard('web')->user())
                                    @if(count($followingChiefList)>0)
                                        @for($i = 0; $i < count($followingChiefList); $i++)

                                            @if($chieff->id == $followingChiefList[$i]['chief_id'])
                                                <a class="love-fill text-center col-2" href="/unFollowingChieff/{{$chieff->id}}" style="padding: 15px;">
                                                    <i class="fa fa fa-heart-o" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @elseif($i == count($followingChiefList)-1 )
                                                <a class="love text-center col-2" href="/followingChieff/{{$chieff->id}}" style="padding: 15px; color:#82b440">
                                                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                                @break

                                            @endif

                                        @endfor

                                    @else
                                        <a class="love text-center col-2" href="/followingChieff/{{$chieff->id}}" style="padding: 15px; color:#82b440">
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
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="divider-30"></div>
        <br><br>
        <div class="row nav-btn">
            <div class="col-sm-12 text-center">
                <a href="/showChiefs" class="btn btn-maincolor2">كل الشيفات</a>
            </div>
        </div>
    </div>
</section>

{{-- contact --}}

<section class="ls s-py-40 s-py-lg-130 contact-form main-from s-overlay" dir="rtl" id="contacts">
    <div class="container" style="padding-bottom: 30px;">
        {{-- <div class="divider-25"></div> --}}
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-heading">
                    <h6 class="small-text color-main2">ارسل لنا استفسارك</h6>
                    <h3>تواصل معنا</h3>
                    <img class="image-wrap" src="assets/site/images/icon-main.png" alt="">
                </div>
                <div class="d-none d-lg-block divider-60"></div>
            </div>
        </div>

        <form class="contact-form c-mb-10 c-mb-md-20 c-gutter-20" method="post" action="{{ route('sendMailCotactUs') }}">
            @csrf
            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group has-placeholder text-right">
                        <label for="contact-name">الاسم كامل
                            <span class="required">*</span>
                        </label>
                        <span class="fa fa-user color-main"></span>
                        <input type="text" aria-required="true" size="30" value="" name="name"
                            id="contact-name" class="form-control color-main" placeholder="الاسم كامل" required>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group has-placeholder text-right">
                        <label for="contact-email">البريد الالكتروني
                            <span class="required">*</span>
                        </label>
                        <i class="fa fa-envelope color-main"></i>
                        <input type="email" aria-required="true" size="30" value="" name="email"
                            id="contact-email" class="form-control" placeholder="البريد الالكتروني" required>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group has-placeholder">
                        <label for="contact-subject">الموضوع</label>
                        <i class="fa fa-pencil color-main" style="color: white;"></i>
                        <select class="form-control" name="subject" required>
                            @foreach($contactMails as $contactMail)
                                <option value="{{$contactMail->email}}">{{$contactMail->subject_ar}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="col-sm-12">

                    <div class="form-group has-placeholder text-right">
                        <label for="contact-message">الرسالة</label>
                        <i class="fa fa-pencil color-main"></i>
                        <textarea aria-required="true" rows="6" cols="45" name="message"
                            id="contact-message" class="form-control" placeholder="الرسالة..." required></textarea>
                    </div>
                </div>

            </div>
            {{-- <div class="divider-10"></div> --}}
            <div class="row">

                <div class="col-sm-12 text-center">

                    <div class="form-group">
                        <button type="submit" class="btn btn-maincolor">Send
                        </button>
                    </div>
                </div>

            </div>
        </form>

    </div>
</section>

{{-- category --}}

<section dir="rtl" class="ls s-py-40 s-py-lg-130 blog-carousel animate" data-animation="fadeInUp" id="blog">
    <div class="container">
        <div class="divider-25"></div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div class="section-heading">
                    <h6 class="small-text color-main">اخدث دورات منصه الشيف خليل</h6>
                    <h3>دوراتنا</h3>
                </div>
                <div class="d-block d-md-none divider-20"></div>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-xl-7">
                        <div class="filters gallery-filters small-text text-lg-right">
                            <a href="#" data-filter="*" class="active selected">كل الاصناف</a>
                            @foreach($category as $categoryy)
                            <a href="#" data-filter=".{{str_replace(" ", "_", $categoryy->name_ar)}}">{{$categoryy->name_ar}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="row isotope-wrapper masonry-layout c-mb-50" data-filters=".gallery-filters">
                    @foreach($course as $coursee)
                    <div class="col-xl-4 col-md-6 {{str_replace(" ", "_", $coursee->courseCategory['name_ar'])}} " >

                        <div class="vertical-item text-center padding-top">
                            <div class="item-media">
                                <img style="height: 400px;" src="{{asset('assets/images/courses')}}/{{$coursee->image}}" alt="" style="height: 400px">
                                <div class="media-links">
                                    <div class="links-wrap">
                                        <a class="link-zoom " title="" href="/showCourseDetails/{{$coursee->id}}"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-content" style="height:150px;overflow-y: scroll">
                                <div class="small-text tag color-main">
                                    <a href="/showCourseDetails/{{$coursee->id}}">{{$coursee->courseCategory['name_ar']}}</a>
                                </div>
                                <h5>
                                    <a href="/showCourseDetails/{{$coursee->id}}">{{$coursee->name_ar}}</a>
                                </h5>
                            </div>
                            <br>
                            <div class="row nav-btn">
                                <div class="col-sm-8 text-center">
                                    <a href="/showCourseDetails/{{$coursee->id}}" class="btn btn-maincolor">عرض التفاصيل</a>

                                </div>
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

                </div>
                <!-- .isotope-wrapper-->
                <br><br>

                <div class="row nav-btn">
                    <div class="col-sm-12 text-center">
                        <a href="/showCourses" class="btn btn-maincolor2">كل الدورات</a>
                    </div>
                </div>

            </div>

            <div class="d-none d-lg-block divider-60"></div>
        </div>

    </div>
</section>


@endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection



