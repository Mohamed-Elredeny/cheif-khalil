@extends('admin.dashboard')
<style>
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }
    table thead tr th{
        width:1px; white-space:nowrap;
        text-align:center;
    }
    table tbody tr td{
        white-space:normal;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    <h4 class="mb-3"> Live Stream Dashboard</h4>
    <div class="row">
        <ul class="nav nav-pills mb-3 col-sm-12 "  id="pills-tab" role="tablist">
            <li class="col-sm-4" role="presentation" style="display:inline;">
                <button class="nav-item col-sm-12 btn btn-dark" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Finished</button>
            </li>
            <li role="presentation" class="col-sm-4" style="display:inline;">
                <button  class="nav-item col-sm-12 btn btn-dark" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Upcoming</button>
            </li>
            <li class="col-sm-4" role="presentation"  style="display:inline;">
                <button class="nav-item col-sm-12 btn btn-dark" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="true">Today</button>
            </li>
        </ul>
    </div>
    <br>
    <div class="row">
        <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show row active"  id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @foreach($lives as $l )
                        <div class="container">
                            <div class="row">
                                @if(date('y-m-d', strtotime($l->start_date)) < date('y-m-d'))
                                    <div class="col-sm-12" style="display:inline;border:5px black solid;padding:30px;border-radius: 20px;margin-bottom: 20px">
                                        <h2 class="text-center" >
                                            {{$l->title_en}}
                                        </h2>

                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <iframe style="width: 100%;height:400px" src="{{$l->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>
                                                    Category
                                                </h6>
                                                <hr>
                                                <div class="row">
                                                    <div class="col">
                                                        {{$l->category->name_en}}
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{route('categories.show',['category'=>$l->category->id])}}" class="btn btn-dark">
                                                            view
                                                        </a>
                                                    </div>
                                                </div>

                                                <br><br>
                                                <h6>
                                                    Description
                                                </h6>
                                                <hr>
                                                {{$l->description_en}}
                                            </div>




                                        </div>
                                        <center>
                                            <div class="col-sm-8  h5 "  style="margin-top: 20px">

                                                    <div class="col">
                                                        Starts at
                                                    </div>
                                                    <div class="col">
                                                        {{$l->start_date}}
                                                    </div>
                                            </div>
                                        </center>



                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @foreach($lives as $l )
                        <div class="container">
                            <div class="row">
                            @if(date('y-m-d', strtotime($l->start_date)) > date('y-m-d'))
                                    <div class="col-sm-12" style="display:inline;border:5px black solid;padding:30px;border-radius: 20px;margin-bottom: 20px">
                                        <h2 class="text-center" >
                                            {{$l->title_en}}
                                        </h2>

                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <iframe style="width: 100%;height:400px" src="{{$l->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>
                                                    Category
                                                </h6>
                                                <hr>
                                                <div class="row">
                                                    <div class="col">
                                                        {{$l->category->name_en}}
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{route('categories.show',['category'=>$l->category->id])}}" class="btn btn-dark">
                                                            view
                                                        </a>
                                                    </div>
                                                </div>

                                                <br><br>
                                                <h6>
                                                    Description
                                                </h6>
                                                <hr>
                                                {{$l->description_en}}
                                            </div>




                                        </div>
                                        <center>
                                            <div class="col-sm-8  h5 "  style="margin-top: 20px">

                                                <div class="col">
                                                    Starts at
                                                </div>
                                                <div class="col">
                                                    {{$l->start_date}}
                                                </div>
                                            </div>
                                        </center>



                                    </div>
                            @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    @foreach($lives as $l )
                        <div class="container">
                            <div class="row">
                    @if(date('y-m-d', strtotime($l->start_date)) == date('y-m-d'))
                            <div class="col-sm-12" style="display:inline;border:5px black solid;padding:30px;border-radius: 20px;margin-bottom: 20px">
                                <h2 class="text-center" >
                                    {{$l->title_en}}
                                </h2>

                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <iframe style="width: 100%;height:400px" src="{{$l->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="col-sm-4">
                                        <h6>
                                            Category
                                        </h6>
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                {{$l->category->name_en}}
                                            </div>
                                            <div class="col">
                                                <a href="{{route('categories.show',['category'=>$l->category->id])}}" class="btn btn-dark">
                                                    view
                                                </a>
                                            </div>
                                        </div>

                                        <br><br>
                                        <h6>
                                            Description
                                        </h6>
                                        <hr>
                                        {{$l->description_en}}
                                    </div>




                                </div>
                                <center>
                                    <div class="col-sm-8  h5 "  style="margin-top: 20px">

                                        <div class="col">
                                            Starts at
                                        </div>
                                        <div class="col">
                                            {{$l->start_date}}
                                        </div>
                                    </div>
                                </center>



                            </div>
                        @endif
                            </div>
                        </div>
                    @endforeach

                </div>
        </div>
    </div>
    <br>
    <center>
        <a href="{{route('live.create')}}" class="btn btn-dark">Add New Live Stream</a>
    </center>
    <br><br>
@endsection
@else
@section('main-container')
    <div style="padding-top: 100px;direction: rtl;text-align:right">
        <h4 class="mb-3">لوحة تحكم البث المباشر</h4>
        <div class="row">
            <ul class="nav nav-pills mb-3 col-sm-12 "  id="pills-tab" role="tablist">
                <li class="col-sm-4" role="presentation" style="display:inline;">
                    <button class="nav-item col-sm-12 btn btn-dark" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">منتهي</button>
                </li>
                <li role="presentation" class="col-sm-4" style="display:inline;">
                    <button  class="nav-item col-sm-12 btn btn-dark" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">قادم</button>
                </li>
                <li class="col-sm-4" role="presentation"  style="display:inline;">
                    <button class="nav-item col-sm-12 btn btn-dark" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="true">اليوم</button>
                </li>
            </ul>
        </div>
        <br>
        <div class="row">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show row active"  id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @foreach($lives as $l )
                        <div class="container">
                            <div class="row">
                                @if(date('y-m-d', strtotime($l->start_date)) < date('y-m-d'))
                                    <div class="col-sm-12" style="display:inline;border:5px black solid;padding:30px;border-radius: 20px;margin-bottom: 20px">
                                        <h2 class="text-center" >
                                            {{$l->title_ar}}
                                        </h2>

                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <iframe style="width: 100%;height:400px" src="{{$l->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>
                                                    الفئة
                                                </h6>
                                                <hr>
                                                <div class="row">
                                                    <div class="col ">
                                                        {{$l->category->name_ar}}
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{route('categories.show',['category'=>$l->category->id])}}" class="btn btn-dark ">
                                                            عرض
                                                        </a>
                                                    </div>
                                                </div>

                                                <br><br>
                                                <h6>
                                                    الوصف
                                                </h6>
                                                <hr>
                                                <div>
                                                    {{$l->description_ar}}

                                                </div>
                                            </div>




                                        </div>
                                        <center>
                                            <div class="col-sm-8  h5 "  style="margin-top: 20px">

                                                <div class="col">
                                                    موعد البث
                                                </div>
                                                <div class="col">
                                                    {{$l->start_date}}
                                                </div>
                                            </div>
                                        </center>



                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @foreach($lives as $l )
                        <div class="container">
                            <div class="row">
                                @if(date('y-m-d', strtotime($l->start_date)) > date('y-m-d'))
                                    <div class="col-sm-12" style="display:inline;border:5px black solid;padding:30px;border-radius: 20px;margin-bottom: 20px">
                                        <h2 class="text-center" >
                                            {{$l->title_ar}}
                                        </h2>

                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <iframe style="width: 100%;height:400px" src="{{$l->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>
                                                    الفئة
                                                </h6>
                                                <hr>
                                                <div class="row">
                                                    <div class="col ">
                                                        {{$l->category->name_ar}}
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{route('categories.show',['category'=>$l->category->id])}}" class="btn btn-dark ">
                                                            عرض
                                                        </a>
                                                    </div>
                                                </div>

                                                <br><br>
                                                <h6>
                                                    الوصف
                                                </h6>
                                                <hr>
                                                <div>
                                                    {{$l->description_ar}}

                                                </div>
                                            </div>




                                        </div>
                                        <center>
                                            <div class="col-sm-8  h5 "  style="margin-top: 20px">

                                                <div class="col">
                                                    موعد البث
                                                </div>
                                                <div class="col">
                                                    {{$l->start_date}}
                                                </div>
                                            </div>
                                        </center>



                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    @foreach($lives as $l )
                        <div class="container">
                            <div class="row">
                                @if(date('y-m-d', strtotime($l->start_date)) == date('y-m-d'))
                                    <div class="col-sm-12" style="display:inline;border:5px black solid;padding:30px;border-radius: 20px;margin-bottom: 20px">
                                        <h2 class="text-center" >
                                            {{$l->title_ar}}
                                        </h2>

                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <iframe style="width: 100%;height:400px" src="{{$l->url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <div class="col-sm-4">
                                                <h6>
                                                    الفئة
                                                </h6>
                                                <hr>
                                                <div class="row">
                                                    <div class="col ">
                                                        {{$l->category->name_ar}}
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{route('categories.show',['category'=>$l->category->id])}}" class="btn btn-dark ">
                                                            عرض
                                                        </a>
                                                    </div>
                                                </div>

                                                <br><br>
                                                <h6>
                                                    الوصف
                                                </h6>
                                                <hr>
                                                <div>
                                                    {{$l->description_ar}}

                                                </div>
                                            </div>




                                        </div>
                                        <center>
                                            <div class="col-sm-8  h5 "  style="margin-top: 20px">

                                                <div class="col">
                                                    موعد البث
                                                </div>
                                                <div class="col">
                                                    {{$l->start_date}}
                                                </div>
                                            </div>
                                        </center>



                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <br>
        <center>
            <a href="{{route('live.create')}}" class="btn btn-dark">أضافة بث مباشر جديد</a>
        </center>
        <br><br>
    </div>

@endsection
@endif


<script>

    var divsToHide = document.getElementsByClassName("finished"); //divsToHide is an array
    for(var i = 0; i < divsToHide.length; i++){
        divsToHide[i].style.visibility = "hidden";
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
