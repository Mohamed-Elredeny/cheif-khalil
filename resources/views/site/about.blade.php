
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
        About Us
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
        نبذة عنا
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
        About Us
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
        نبذة عنا
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')

        <section class="ls ms s-pt-lg-100 s-pb-lg-75 c-my-0 video-part right-part-bg"
                 id="about">

            <div class="cover-image s-cover-left">
                <video width="100%" height="100%" controls style="z-index: 2">
                    <source src="{{asset('assets/videos/achievements/'.$Achievement->video)}}">
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

    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')


        <section class="ls ms s-pt-lg-100 s-pb-lg-75 c-my-0 video-part right-part-bg text-center text-md-left"
                 id="about">
            <div class="cover-image s-cover-left">
                <video width="100%" height="100%" controls style="z-index: 2">
                    <source src="{{asset('assets/videos/achievements/'.$Achievement->video)}}">
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

    @endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection
