@extends('admin.dashboard')
@section('main-container')
    @if( LaravelLocalization::getCurrentLocaleName() == "English")

        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Add New Review</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                    <form method="post" action="{{route('translation.reviews.add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Chief Arabic Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Arabic Name" name="chief_name_ar" style="direction: rtl;text-align:right">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Chief English Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="English Name" type="search" name="chief_name_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description Arabic</label>
                            <div class="col-sm-12 col-md-10">
                                <textArea placeholder="Description in Arabic" class="form-control" name="chief_description_ar" style="direction: rtl;text-align:right"></textArea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description English</label>
                            <div class="col-sm-12 col-md-10">
                                <textArea placeholder="Description in Arabic" class="form-control" name="chief_description_en"></textArea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Chief Role English</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Role English" type="search" name="chief_role_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Chief Role Arabic</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Role Arabic" type="search" name="chief_role_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control"  type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <center>
                                    <input class="col-sm-4 btn btn-dark"  type="submit" value="Save">
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Default Basic Forms End -->


            </div>

        </div>
    @else
        <div class="pd-ltr-20 xs-pd-20-10" style="padding-top: 100px;direction:rtl;text-align:right;">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>أضافة تقييم جديد</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                    <form method="post" action="{{route('translation.reviews.add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">اسم الطاهي بالعربية</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Arabic Name" name="chief_name_ar" style="direction: rtl;text-align:right">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">اسم الطاهي بالانجليزية</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="English Name" type="search" name="chief_name_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">التفاصيل بالعربية</label>
                            <div class="col-sm-12 col-md-10">
                                <textArea placeholder="Description in Arabic" class="form-control" name="chief_description_ar" style="direction: rtl;text-align:right"></textArea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">التفاصيل بالانجليزية</label>
                            <div class="col-sm-12 col-md-10">
                                <textArea placeholder="Description in Arabic" class="form-control" name="chief_description_en"></textArea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">وظيفة الطاهي بالانجليزية</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Role English" type="search" name="chief_role_en">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">وظيفة الطاهي بالعربية</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Role Arabic" type="search" name="chief_role_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الصورة</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control"  type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <center>
                                    <input class="col-sm-4 btn btn-dark"  type="submit" value="حفظ">
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
