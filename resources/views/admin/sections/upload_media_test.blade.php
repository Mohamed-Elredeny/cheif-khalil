<!-- fileupload.blade.php -->
@if( LaravelLocalization::getCurrentLocaleName() == "English")

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <style>
        .progress { position:relative; width:100%; }
        .bar { background-color: #008000; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #7F98B2;}
    </style>
</head>
<body>
<br><br>
<center>
    <H1>Videos Page</H1>
    <a type="button" href="{{route('admin.dashboard')}}" class="btn btn-dark" target="_blank">
        Back To Dashboard
    </a>
</center>
<br><br>
<div class="container" style="padding:50px;border:5px solid black;border-radius: 20px">
    <form method="POST" action="{{ action('FileUploadController@fileStore') }}" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-sm-12">
            <h2>Welcome To Upload Videos Page</h2>
            <h6>Make Sure Your Video Extension is MP4 OR mov OR OGG </h6>
        </div>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-sm-3 h2">
            Select  Video
        </div>
        <div class="col-sm-9">
            <div class="form-group">
                <input name="file" type="file" class="form-control" required ><br/>
                <div class="progress">
                    <div class="bar"></div >
                    <div class="percent">0%</div >
                </div>
                <br>
            </div>
        </div>
      </div>
    <div class="row">
        <div class="col-sm-3 h2">
            Video Type
        </div>
        <div class="col-sm-9">
            <select class="form-data btn btn-dark" style="width:200px" name="type" required>
                <option value="adds">Advertisement</option>
                <option value="courses">Course</option>
                <option value="achievement">Achievements</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 h2">
            Video Name
        </div>
        <div class="col-sm-9">
            <input class="form-data btn btn-dark" style="width:200px"  name="name" required>
        </div>
    </div>
     <div class="row">
         <div class="col-sm-12">
             <center>
                 <input type="submit"  value="Submit" class="btn btn-dark" style="width:200px">

             </center>

         </div>
     </div>
    </form>
</div>
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
</body>
</html>
@else
    <!DOCTYPE html>
    <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <style>
            .progress { position:relative; width:100%; }
            .bar { background-color: #008000; width:0%; height:20px; }
            .percent { position:absolute; display:inline-block; left:50%; color: #7F98B2;}
        </style>
    </head>
    <body>
    <br><br>
    <center>
        <H1>صفحة الفيديوهات</H1>
        <a type="button" href="{{route('admin.dashboard')}}" class="btn btn-dark" target="_blank">
           العودة الي لوحة التحكم
        </a>
    </center>
    <br><br>
    <div class="container" style="padding:50px;border:5px solid black;border-radius: 20px;direction:rtl;text-align:right">
        <form method="POST" action="{{ action('FileUploadController@fileStore') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <h2>اهلا بك في صفحة تحميل الفيديوهات</h2>
                    <h6>من فضلك تأكد من امتداد الفيديو الخاص بك MP4 OR MOV OR OGG</h6>
                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-sm-3 h2">
                   اختر فيديو
                </div>
                <div class="col-sm-9">
                    <div class="form-group">
                        <input name="file" type="file" class="form-control" required  style="direction: rtl"><br/>
                        <div class="progress">
                            <div class="bar"></div >
                            <div class="percent">0%</div >
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 h2">
                    اختر نوع الفيديو
                </div>
                <div class="col-sm-9">
                    <select class="form-data btn btn-dark" style="width:200px" name="type" required>
                        <option value="adds">اعلان</option>
                        <option value="courses">دورة تدريبية</option>
                        <option value="achievement">انجاز</option>

                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 h2">
                    اختر اسم الفيديو
                </div>
                <div class="col-sm-9">
                    <input class="form-data btn btn-dark" style="width:200px"  name="name" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <center>
                        <input type="submit"  value="حفظ" class="btn btn-dark" style="width:200px">

                    </center>

                </div>
            </div>
        </form>
    </div>
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
    </body>
    </html>
@endif
