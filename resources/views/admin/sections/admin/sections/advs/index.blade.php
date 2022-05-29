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

@if( LaravelLocalization::getCurrentLocaleName() == "English")
        @section('main-container')
            <center>
                <h4 class="mb-3">Your Advertisement</h4>
            </center>

            <div class="row">
                @if(count($categories)>0)
                @foreach($categories as $cats)

                            <div class="col-sm-4 mb-5">
                                <form method="post" action="{{route('advs.update',['adv'=>$cats->id])}}" enctype="multipart/form-data" style="display:inline">
                                    @csrf
                                    @method('PUT')
                                <div class="card">

                                    <video src="{{asset('assets/videos/adds/'.$cats->url)}}" controls></video>
                                    <div class="card-body">

                                        <div class="row" style="padding-bottom: 10px">
                                            <div class="col-sm-3">
                                                Link
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text" class="btn btn-dark" name="link"  style="width:100%" value="{{$cats->link}}">
                                            </div>

                                        </div>
                                        <div class="row" style="padding-bottom: 10px">
                                            <div class="col-sm-3">
                                                From
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="date" class="btn btn-dark"  name="from" style="width:100%" value="{{$cats->from}}">
                                            </div>

                                        </div>
                                        <div class="row" style="padding-bottom: 10px">
                                            <div class="col-sm-3">
                                                To
                                            </div>
                                            <div class="col-sm-9" >
                                                <input type="date" class="btn btn-dark" name="to" style="width:100%" value="{{$cats->to}}">
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 50px">

                                            <div class="col">
                                                <input type="submit" value="update" class="btn btn-dark" style="width: 100px">
                                            </div>
                                            <div class="col">
                                                <a href="{{route('adv.delete',['adv_id'=>$cats->id])}}" class="btn btn-danger" style="width: 100px">Delete</a>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                                </form>
                            </div>

                @endforeach
                @else
                    <center>
                        <h2>
                            There is no Advertisement yet!
                        </h2>
                    </center>

                @endif
            </div>
            <br>
            <center>
                <a href="{{route('advs.create')}}" class="btn btn-dark">Add New Advertisement</a>
            </center>
            <br><br>
        @endsection
    @else
        @section('main-container')
            <div style="padding-top: 100px;direction: rtl;text-align: right">
                <center>
                    <h4 class="mb-3">اعلاناتك</h4>
                </center>

                <div class="row">
                    @if(count($categories)>0)
                        @foreach($categories as $cats)

                            <div class="col-sm-4 mb-5">
                                <form method="post" action="{{route('advs.update',['adv'=>$cats->id])}}" enctype="multipart/form-data" style="display:inline">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">

                                        <video src="{{asset('assets/videos/adds/'.$cats->url)}}" controls></video>
                                        <div class="card-body">

                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-sm-3">
                                                    اللينك
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="text" class="btn btn-dark" name="link"  style="width:100%" value="{{$cats->link}}">
                                                </div>

                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-sm-3">
                                                    من
                                                </div>
                                                <div class="col-sm-9">
                                                    <input type="date" class="btn btn-dark"  name="from" style="width:100%" value="{{$cats->from}}">
                                                </div>

                                            </div>
                                            <div class="row" style="padding-bottom: 10px">
                                                <div class="col-sm-3">
                                                    الي
                                                </div>
                                                <div class="col-sm-9" >
                                                    <input type="date" class="btn btn-dark" name="to" style="width:100%" value="{{$cats->to}}">
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 50px">

                                                <div class="col">
                                                    <input type="submit" value="تعديل" class="btn btn-dark" style="width: 100px">
                                                </div>
                                                <div class="col">
                                                    <a href="{{route('adv.delete',['adv_id'=>$cats->id])}}" class="btn btn-danger" style="width: 100px">حذف</a>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </form>
                            </div>

                        @endforeach
                    @else
                        <center>
                            <h2>
                                لا يوجد اعلانات بعد!
                            </h2>
                        </center>

                    @endif
                </div>
                <br>
                <center>
                    <a href="{{route('advs.create')}}" class="btn btn-dark">اضافة اعلان جديد</a>
                </center>
                <br><br>
            </div>
        @endsection
@endif
