<style>
    .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
    .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
    .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
</style>
<head>
    <title>Laravel 7 Ajax File Upload with Progress Bar Example</title>

    <style>
        .progress { position:relative; width:100%; }
        .bar { background-color: #00ff00; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
    </style>
</head>

@extends('admin.dashboard')

@section('main-container')
    @if( LaravelLocalization::getCurrentLocaleName() == "English")
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Home Achievements</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <form method="post" action="{{route('translation.home_achievements.update',['id'=>$footer->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">Title En</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Title English" name="title_en" value="{{$footer->title_en}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Title Ar</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Title Arabic" name="title_ar" value="{{$footer->title_ar}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">Achievement En [1]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="Achievement English" type="text" name="achievement_1_en" value="{{$footer->achievement_1_en}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Achievement Ar [1]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="Achievement Arabic" type="text" name="achievement_1_ar" value="{{$footer->achievement_1_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">Details En [1]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Package Duration" type="text" name="achievement_details_1_en" cols="30" rows="10">{{$footer->achievement_details_1_en}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Details Ar [1]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Package Duration" type="text" name="achievement_details_1_ar" cols="30" rows="10">{{$footer->achievement_details_1_ar}}</textarea>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">Achievement En [2]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="Achievement English" type="text" name="achievement_2_en" value="{{$footer->achievement_2_en}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Achievement Ar [2]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="Achievement Arabic" type="text" name="achievement_2_ar" value="{{$footer->achievement_2_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">Details En [2]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Package Duration" type="text" name="achievement_details_2_en" cols="30" rows="10">{{$footer->achievement_details_2_en}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Details Ar [2]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Package Duration" type="text" name="achievement_details_2_ar" cols="30" rows="10">{{$footer->achievement_details_2_ar}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">Achievement En [3]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="Achievement English" type="text" name="achievement_3_en" value="{{$footer->achievement_3_en}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Achievement Ar [3]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="Achievement Arabic" type="text" name="achievement_3_ar" value="{{$footer->achievement_3_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">Details En [3]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Package Duration" type="text" name="achievement_details_3_en" cols="30" rows="10">{{$footer->achievement_details_3_en}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Details Ar [3]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Package Duration" type="text" name="achievement_details_3_ar" cols="30" rows="10">{{$footer->achievement_details_3_ar}}</textarea>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Select Your Video</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="form-control" name="video" required>
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

                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <video style="width:500px;height:200px" controls>
                                        <source src="{{asset('assets/videos/achievement/'.$footer->video)}}" type="video/mp4">
                                    </video>
                                </center>

                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <input type="submit"  value="Save" class="btn btn-dark" style="width:300px">

                                </center>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- Default Basic Forms End -->


            </div>

        </div>
    @else
        <div class="pd-ltr-20 xs-pd-20-10" style="padding-top: 100px;direction:rtl;text-align:right">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>جزء الانجازات</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">
                    <form method="post" action="{{route('translation.home_achievements.update',['id'=>$footer->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">العنوان بالانجليزية</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="العنوان بالانجليزية" name="title_en" value="{{$footer->title_en}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">العنوان بالعربية</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="العنوان بالعربية" name="title_ar" value="{{$footer->title_ar}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">الانجازات بالانجليزية [1]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="الانجازات بالانجليزية " type="text" name="achievement_1_en" value="{{$footer->achievement_1_en}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Achievement Ar [1]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="الانجازات بالعربية" type="text" name="achievement_1_ar" value="{{$footer->achievement_1_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">التفاصيل بالانجليزية [1]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="التفاصيل بالانجليزية" type="text" name="achievement_details_1_en" cols="30" rows="10">{{$footer->achievement_details_1_en}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">التفاصيل بالعربية [1]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="التفاصيل بالعربية" type="text" name="achievement_details_1_ar" cols="30" rows="10">{{$footer->achievement_details_1_ar}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">الانجازات بالانجليزية [2]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="الانجازات بالانجليزية " type="text" name="achievement_2_en" value="{{$footer->achievement_2_en}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Achievement Ar [2]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="الانجازات بالعربية" type="text" name="achievement_2_ar" value="{{$footer->achievement_2_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">التفاصيل بالانجليزية [2]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="التفاصيل بالانجليزية" type="text" name="achievement_details_2_en" cols="30" rows="10">{{$footer->achievement_details_2_en}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">التفاصيل بالعربية [2]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="التفاصيل بالعربية" type="text" name="achievement_details_2_ar" cols="30" rows="10">{{$footer->achievement_details_2_ar}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">الانجازات بالانجليزية [3]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="الانجازات بالانجليزية " type="text" name="achievement_3_en" value="{{$footer->achievement_3_en}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">Achievement Ar [3]</label>
                                <div class="col-sm-10">
                                    <input class="form-control" placeholder="الانجازات بالعربية" type="text" name="achievement_3_ar" value="{{$footer->achievement_3_ar}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-4">التفاصيل بالانجليزية [3]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="التفاصيل بالانجليزية" type="text" name="achievement_details_3_en" cols="30" rows="10">{{$footer->achievement_details_3_en}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-4">التفاصيل بالعربية [3]</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="التفاصيل بالعربية" type="text" name="achievement_details_3_ar" cols="30" rows="10">{{$footer->achievement_details_3_ar}}</textarea>
                                </div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Select Your Video</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="form-control" name="video" required>
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

                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <video style="width:500px;height:200px" controls>
                                        <source src="{{asset('assets/videos/achievement/'.$footer->video)}}" type="video/mp4">
                                    </video>
                                </center>

                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <center>
                                    <input type="submit"  value="حفظ" class="btn btn-dark" style="width:300px">

                                </center>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- Default Basic Forms End -->


            </div>

        </div>
    @endif
@endsection
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

    function validate(formData, jqForm, options) {
        var form = jqForm[0];
        if (!form.file.value) {
            alert('File not found');
            return false;
        }
    }

    (function() {

        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('form').ajaxForm({
            beforeSubmit: validate,
            beforeSend: function() {
                status.empty();
                var percentVal = '0%';
                var posterValue = $('input[name=file]').fieldValue();
                bar.width(percentVal)
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            success: function() {
                var percentVal = 'Wait, Saving';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
                alert('Uploaded Successfully');
                window.location.href = "/file-upload";
            }
        });

    })();
</script>
<script type="text/javascript">
    var SITEURL = "{{URL('/')}}";
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
                    alert('File Has Been Uploaded Successfully');
                    window.location.href = SITEURL +"/"+"ajax-file-upload-progress-bar";
                }
            });
        });
    });
</script>
