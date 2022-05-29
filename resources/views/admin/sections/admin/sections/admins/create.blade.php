@extends('admin.dashboard')
@section('main-container')
    @if( LaravelLocalization::getCurrentLocaleName() == "English")

        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Create New Admin</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                    <form method="post" action="{{route('admins.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">First Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="First Name" name="fname"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Last Name" name="lname"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="email" placeholder="Email" name="email"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="password" placeholder="Password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="number" placeholder="Phone number" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Gender</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="gender" required>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="file" name="image" required>
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
    @else
        <div class="pd-ltr-20 xs-pd-20-10" style="padding-top: 100px;direction:rtl;text-align:right">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <center>
                                    <h4>اضافة مسئول جديد</h4>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                    <form method="post" action="{{route('admins.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الاسم الاول</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="First Name" name="fname"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الاسم الاخير</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Last Name" name="lname"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="email" placeholder="Email" name="email"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">كلمة المرور</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="password" placeholder="Password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">رقم الهاتف</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="number" placeholder="Phone number" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">النوع</label>
                            <div class="col-sm-4">
                                <select class="form-control" name="gender" required>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الصورة</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="file" name="image" required>
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

    @endif

@endsection

