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
<head>
    <title>Laravel File Upload With Progress bar Tutorial Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <style>
        .progress { position:relative; width:100%; }
        .bar { background-color: #008000; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #7F98B2;}
    </style>
</head>
@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Create New Advertisement</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">

                <form method="post" action="{{route('advs.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Link </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Advertisement Link" name="link"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">From</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="date" placeholder="Last Name" name="from"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">To</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="date" placeholder="Last Name" name="to"  required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Select Your Video</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="form-control" name="image" required>
                                @if(count($videos) > 0)
                                    @foreach($videos as $video)
                                        <option value="{{$video->video}}">{{$video->name}}</option>
                                    @endforeach
                                @else
                                    <option value="">There is no videos yet!</option>
                                @endif
                            </select>
                            <center>
                                <a href="{{route('admin.video.page')}}" class="h5" target="_blank">Add New Video</a>
                            </center>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control"  type="submit" value="Save" >
                        </div>
                    </div>

                </form>
            </div>
            <!-- Default Basic Forms End -->


        </div>

    </div>


@endsection
@else
@section('main-container')
    <div class="pd-ltr-20 xs-pd-20-10" style="padding-top: 100px;direction:rtl;text-align:right">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>أضافة اعلان جديد</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">

                <form method="post" action="{{route('advs.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size:20px;font-weight:bold">رابط الاعلان </label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Advertisement Link" name="link"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"  style="font-size:20px;font-weight:bold">من</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="date" placeholder="Last Name" name="from"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label"  style="font-size:20px;font-weight:bold">الي</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="date" placeholder="Last Name" name="to"  required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label" style="font-size:20px;font-weight:bold">قم باختيار الفيديو</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="form-control" name="image" required>
                                @if(count($videos) > 0)
                                @foreach($videos as $video)
                                    <option value="{{$video->video}}">{{$video->name}}</option>
                                @endforeach
                                @else
                                    <option value="">There is no videos yet!</option>
                                @endif
                            </select>
                            <center>
                                <a href="{{route('admin.video.page')}}" class="h5" target="_blank">اضافة فيديو جديد</a>
                            </center>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control"  type="submit" value="حفظ" >
                        </div>
                    </div>

                </form>
            </div>
            <!-- Default Basic Forms End -->


        </div>

    </div>

@endsection
@endif


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

<script type="text/javascript">
    $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');

            $('form').ajaxForm({
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    alert('File Uploaded Successfully');
                    window.location.href = "/fileupload";
                }
            });
        });
    });
</script>
