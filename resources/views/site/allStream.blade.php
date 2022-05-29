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
    All Livetreams
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    كل البث المباشر
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    All Livetreams
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    كل البث المباشر
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

            <div class="d-none d-lg-block divider-65"></div>

            <div class="col-sm-12 text-center">
                <div class="section-heading">
                    <h6 class="small-text color-main">All Livestreams</h6>
                    <h3>Our Livestreams</h3>
                </div>
                <div class="d-block d-md-none divider-20"></div>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-xl-7">
                        <div class="filters gallery-filters small-text text-lg-right">
                            <a href="#" data-filter="*" class="active selected">All Categories</a>
                            <a href="#" data-filter=".Finished">Finished</a>
                            <a href="#" data-filter=".Today">Today</a>
                            <a href="#" data-filter=".Upcoming">Upcoming</a>
                        </div>
                    </div>
                </div>


                <div class="row isotope-wrapper masonry-layout c-mb-50" style="height: 600px" data-filters=".gallery-filters">
                    @foreach($lives as $live)
                    @if(date('y-m-d', strtotime($live->start_date)) > date('y-m-d'))
                    
                        <div class="col-xl-4 col-md-6 Upcoming" style="height: 650px">
                    
                    @elseif(date('y-m-d', strtotime($live->start_date)) == date('y-m-d'))
                    
                        <div class="col-xl-4 col-md-6 Today " style="height: 650px">
                    @else
                    <div class="col-xl-4 col-md-6 Finished" style="height: 650px">
                    @endif
                        <div class="vertical-item text-center bordered " >
                            <div class="item-media">
                                <iframe style="width: 100%;height:400px" src="{{$live->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="item-content">
                                <h5>
                                    {{$live->title_en}}
                                </h5>
                                <p>
                                    {{$live->start_date}}
                                </p>
    
                                <p>
                                    {{$live->category->name_en}}
                                </p>

                                <p>
                                    {{$live->description_en}}
                                </p>
                                
    
                            </div>
                            
                        </div>

                    </div>
                    @endforeach

                </div>
                <!-- .isotope-wrapper-->
                
            </div>

            <div class="d-none d-lg-block divider-60"></div>
        </div>

    </div>
</section>
@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-pt-60 s-pb-75 s-pt-lg-50 s-pb-lg-100 gallery-title border-none">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-65"></div>

            <div class="col-sm-12 text-center">
                <div class="section-heading">
                    <h6 class="small-text color-main">كل البث</h6>
                    <h3>بثنا المباشر</h3>
                </div>
                <div class="d-block d-md-none divider-20"></div>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-xl-7">
                        <div class="filters gallery-filters small-text text-lg-right">
                            <a href="#" data-filter="*" class="active selected">الكل</a>
                            <a href="#" data-filter=".Finished">المنتهية</a>
                            <a href="#" data-filter=".Today">اليوم</a>
                            <a href="#" data-filter=".Upcoming">القادمة</a>
                        </div>
                    </div>
                </div>


                <div class="row isotope-wrapper masonry-layout c-mb-50" style="height: 600px" data-filters=".gallery-filters">
                    @foreach($lives as $live)
                    @if(date('y-m-d', strtotime($live->start_date)) > date('y-m-d'))
                    
                        <div class="col-xl-4 col-md-6 Upcoming" style="height: 650px">
                    
                    @elseif(date('y-m-d', strtotime($live->start_date)) == date('y-m-d'))
                    
                        <div class="col-xl-4 col-md-6 Today " style="height: 650px">
                    @else
                    <div class="col-xl-4 col-md-6 Finished" style="height: 650px">
                    @endif
                        <div class="vertical-item text-center bordered ">
                            <div class="item-media">
                                <iframe style="width: 100%;height:400px" src="{{$live->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <div class="item-content">
                                <h5>
                                    {{$live->title_ar}}
                                </h5>
                                <p>
                                    {{$live->start_date}}
                                </p>
    
                                <p>
                                    {{$live->category->name_ar}}
                                </p>

                                <p>
                                    {{$live->description_ar}}
                                </p>
                                
    
                            </div>
                            
                        </div>

                    </div>
                    @endforeach

                </div>
                <!-- .isotope-wrapper-->
                
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


