@extends('admin.dashboard')
<style>
    .wizard-content .wizard>.actions>ul>li>a{
        display:none;
    }
</style>
@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add New Youtube Live Stream</h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="pd-20 card-box mb-30">

                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard vertical" id="tab-wizard" method="post" action="{{route('live.store')}}" enctype="multipart/form-data">
                        @csrf

                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Youtube Stream Url :</label>
                                        <input type="text" class="form-control" name="url" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Date :</label>
                                        <input type="datetime-local" class="form-control" name="start_date" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Name Arabic :</label>
                                        <input type="text" class="form-control" name="title_ar" style="text-align: right;direction: rtl">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Name English :</label>
                                        <input type="text" class="form-control" name="title_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description Arabic :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="description_ar" style="text-align: right;direction: rtl"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description English :</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="description_en"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category :</label>
                                        <select class="custom-select form-control" name="category_id">
                                            <option>Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name_en}}</option>
                                            @endforeach
                                        </select>
                                        <center>
                                            <a href="{{route('categories.create')}}" target="_blank">Add New Category</a>
                                        </center>
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

    <div style="padding-top:100px;direction: rtl;text-align:right;">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>اضافة بث مباشر جديد</h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="pd-20 card-box mb-30">

                <div class="wizard-content">
                    <form class="tab-wizard wizard-circle wizard vertical" id="tab-wizard" method="post" action="{{route('live.store')}}" enctype="multipart/form-data">
                        @csrf

                        <section>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label style="font-size:20px;font-weight:bold">رابط الاستريم من اليوتيوب</label>
                                        <input type="text" class="form-control" name="url" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:20px;font-weight:bold">بداية البث</label>
                                        <input type="datetime-local" class="form-control" name="start_date" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:20px;font-weight:bold">الاسم بالعربية</label>
                                        <input type="text" class="form-control" name="title_ar" style="text-align: right;direction: rtl">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:20px;font-weight:bold">الاسم بالانجليزية</label>
                                        <input type="text" class="form-control" name="title_en">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:20px;font-weight:bold">الوصف بالعربية</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="description_ar" style="text-align: right;direction: rtl"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:20px;font-weight:bold">الوصف بالانجليزية</label>
                                        <textarea  class="form-control" id="" cols="30" rows="10" name="description_en"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-size:20px;font-weight:bold">اختر الفئة</label>
                                        <select class="custom-select form-control" name="category_id">
                                            <option>اختر الفئة</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name_en}}</option>
                                            @endforeach
                                        </select>
                                        <center>
                                            <a href="{{route('categories.create')}}" target="_blank">اضافة فئه جديدة</a>
                                        </center>
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
