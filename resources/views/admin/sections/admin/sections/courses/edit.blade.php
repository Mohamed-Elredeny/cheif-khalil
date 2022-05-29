@extends('admin.dashboard')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    <style>
        .wizard-content .wizard>.actions>ul>li>a{
            display:none;
        }

    </style>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Edit Course Details</h4>
                        </div>

                    </div>
                </div>
            </div>


            <div class="pd-20 card-box mb-30">

                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard vertical" id="tab-wizard" method="post" action="{{route('courses.update',['course'=>$course->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h5>Course Details</h5>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Name Arabic :</label>
                                        <input value="{{$course->name_ar}}" type="text" class="form-control" name="name_ar" style="text-align: right;direction: rtl">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Name English :</label>
                                        <input value="{{$course->name_en}}" type="text" class="form-control" name="name_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description Arabic :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_ar" style="text-align: right;direction: rtl">{{$course->details_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description English :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_en">{{$course->details_en}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Chief :</label>
                                        <select class="custom-select form-control" name="chief_id">
                                            <option selected value="{{$course->chief_id}}">{{$course->chief->fname}} {{$course->chief->fname}}</option>

                                          @foreach($chiefs as $chief)
                                                @if($chief->id != $course->chief_id)
                                                  <option value="{{$chief->id}}">{{$chief->fname}} {{$chief->lname}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <center>
                                            <a href="{{route('chiefs.create')}}" target="_blank">Add New Chief</a>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category :</label>
                                        <select class="custom-select form-control" name="category_id">
                                            <option selected value="{{$course->category_id}}">{{$course->category->name_en}}</option>
                                                @foreach($categories as $category)
                                                        @if($category->id != $course->category_id)
                                                        <option value="{{$category->id}}">{{$category->name_en}}</option>
                                                        @endif
                                                    @endforeach
                                        </select>
                                        <center>
                                            <a href="{{route('categories.create')}}" target="_blank">Add New Category</a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type the Number of course lessons:</label>
                                        <input class="form-control" type="number" name="number_of_lessons" onchange="myFunction(this.value)" value="{{$course->number_of_lessons}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Upload an image :</label>
                                        <input class="form-control" type="hidden" name="old" required value="{{$course->image}}">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <center>
                                            <input class="form-control btn btn-outline-primary"  type="submit" name="save" value="Save">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </form>
                </div>
            </div>


        </div>

    </div>
@endsection
@else
@section('main-container')
    <style>
        .wizard-content .wizard>.actions>ul>li>a{
            display:none;
        }

    </style>
    <div class="pd-ltr-20 xs-pd-20-10"  style="padding-top: 100px;direction: rtl;text-align:right;">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>اضافة دورة جديدة</h4>
                        </div>

                    </div>
                </div>
            </div>


            <div class="pd-20 card-box mb-30">

                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard vertical" id="tab-wizard" method="post" action="{{route('courses.update',['course'=>$course->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px" >الاسم بالعربية</label>
                                        <input type="text" class="form-control" name="name_ar" style="text-align: right;direction: rtl" value="{{$course->name_ar}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px" >الاسم بالانجليزية</label>
                                        <input type="text" class="form-control" name="name_en" value="{{$course->name_en}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px">التفاصيل بالعربية</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_ar" style="text-align: right;direction: rtl">{{$course->details_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px">التفاصيل بالانجليزية</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="details_en">{{$course->details_en}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px">اختر طاهي</label>
                                        <select class="custom-select form-control" name="chief_id">
                                            <option selected value="{{$course->chief_id}}">{{$course->chief->fname}} {{$course->chief->fname}}</option>

                                            @foreach($chiefs as $chief)
                                                @if($chief->id != $course->chief_id)
                                                    <option value="{{$chief->id}}">{{$chief->fname}} {{$chief->lname}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <center>
                                            <a href="{{route('chiefs.create')}}" target="_blank">أضافة طاهي جديد</a>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px">اختر فئه</label>
                                        <select class="custom-select form-control" name="category_id">
                                            <option selected value="{{$course->category_id}}">{{$course->category->name_ar}}</option>
                                            @foreach($categories as $category)
                                                @if($category->id != $course->category_id)
                                                    <option value="{{$category->id}}">{{$category->name_ar}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <center>
                                            <a href="{{route('categories.create')}}" target="_blank">اضافة فئه جديدة</a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px">ادخل عدد الدروس في الدورة</label>
                                        <input class="form-control" type="number" name="number_of_lessons" onchange="myFunction(this.value)" value="{{$course->number_of_lessons}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight:bold;font-size:20px">قم برفع صورة</label>
                                        <input class="form-control" type="hidden" name="old" required value="{{$course->image}}">
                                        <input class="form-control" type="file" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <center>
                                            <input class="form-control btn btn-outline-primary"  type="submit" name="save" value="حفظ">
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h5>تفاصيل الدورة</h5>
                    </form>
                </div>
            </div>


        </div>

    </div>
@endsection
@endif
<script>
    var x=0;
    function myFunction(val) {
        x = val;
        if(IsThereCourses(x)){

        }
    }
    function IsThereCourses(x){
        if(x <= 0){
            return 0;
        }else{
            return 1;
        }
    }






</script>
