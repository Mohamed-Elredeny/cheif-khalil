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
    LogUp
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    تسجيل حساب جديد
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    LogUp Chief
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
     تسجيل حساب شيف جديد
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    
    <section class="ls s-pt-75 s-pb-60 s-py-lg-100 shop-account-login">
        <div class="container">
            <div class="row">

                <div class="d-none d-lg-block divider-60"></div>

                <main class="col-lg-12">
                    <article>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="woocommerce">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                <header class="entry-header">
									<h4 class="margin-20">Account Information
									</h4>
								</header>
                                
                                <form class="woocommerce-EditAccountForm edit-account" action="{{ route('chief.register.submit') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                        <label for="lname">Last Name
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('lname') is-invalid @enderror" name="lname" id="account_last_name" value="" placeholder="Last Name" required>
                                        @if ($errors->has('lname'))
                                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                        <label for="fname">First Name
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('fname') is-invalid @enderror" name="fname" id="account_first_name" value="" placeholder="First Name" required>
                                        @if ($errors->has('fname'))
                                            <span class="text-danger">{{ $errors->first('fname') }}</span>
                                        @endif
                                    </p>

                                    
                                    <div class="clear">

                                    </div>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" >
                                        <label for="gender">Gender
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            {{-- <option value="">--- Chose ---</option> --}}
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <!-- <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_gender" value="" placeholder="النوع" required> -->
                                        @if ($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="email">Email
                                            <span class="required">*</span>
                                        </label>
                                        <input pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="email1" value=" " placeholder="Email" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="phone">Phone
                                            <span class="required">*</span>
                                        </label>
                                        <input pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="phone" id="account_phone" value="" placeholder="Phone" required>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password">Password</label>
                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" minlength="8" name="password" id="password" placeholder="Password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text"  name="password_confirmation" id="password-confirm" placeholder="Confirm Password" required>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </p>

                                    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label class="col-sm-12 col-form-label">Biography Arabic</label>
                                        <div class="col-sm-12 ">
                                            <textarea class="form-control" name="biography_ar" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        @if ($errors->has('biography_ar'))
                                            <span class="text-danger">{{ $errors->first('biography_ar') }}</span>
                                        @endif
                                    </div>
                                    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label class="col-sm-12 col-form-label">Biography English</label>
                                        <div class="col-sm-12 ">
                                            <textarea class="form-control" name="biography_en" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        @if ($errors->has('biography_en'))
                                            <span class="text-danger">{{ $errors->first('biography_en') }}</span>
                                        @endif
                                    </div>

                                    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label class="col-sm-12  col-form-label">Professional Life Arabic</label>
                                        <div class="col-sm-12 ">
                                            <textarea class="form-control" name="professionalLife_ar" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        @if ($errors->has('professionalLife_ar'))
                                            <span class="text-danger">{{ $errors->first('professionalLife_ar') }}</span>
                                        @endif
                                    </div>
                                    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label class="col-sm-12 col-form-label">Professional Life English</label>
                                        <div class="col-sm-12 ">
                                            <textarea class="form-control" name="professionalLife_en" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        @if ($errors->has('professionalLife_en'))
                                            <span class="text-danger">{{ $errors->first('professionalLife_en') }}</span>
                                        @endif
                                    </div>

                                    <br>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="facebook">Facebook
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('facebook') is-invalid @enderror" name="facebook" placeholder="Facebook" >
                                        @if ($errors->has('facebook'))
                                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="instagram">Instagram
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('instagram') is-invalid @enderror" name="instagram" placeholder="Instagram" >
                                        @if ($errors->has('instagram'))
                                            <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="twitter">Twitter
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('twitter') is-invalid @enderror" name="twitter" placeholder="Twitter" >
                                        @if ($errors->has('twitter'))
                                            <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                        @endif
                                    </p>

                                    
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Number of skills</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="number" placeholder="Number of skills" id="skills" name="skills" onchange="NumOfFields()">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="container col-sm-12">
                                            <div class="row">
                
                                                <div class="col-sm-4" id="container">
                                                        <center><h6 class="hh" style="display:none">Skills Ar</h6></center>
                                                    <br>
                                                    <div class="row">
                                                            <input id="sad" style="display:none" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4" id="container2">
                                                    <center><h6 class="hh" style="display:none">Skills En</h6></center>
                                                    <br>
                                                    <div class="row">
                                                        <input id="sad" style="display:none" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4" id="container1">
                                                    <center><h6 class="hh" style="display:none;">Percentages</h6></center>
                                                    <br>
                                                    <input id="sad" style="display:none;margin-top: 18px" class="form-control">
                                                </div>
                                            </div>
                
                                        </div>
                                    </div>
                
                                        

                                    <div class="form-group" style="width: 10%;">
                                        <label class="btn btn-default btn-block btn-file bg-warning" id="btnFileUpload"> <i class="fa fa-upload"></i> Image
                                          &nbsp;
                                          <span id="spnFilePath"></span>             
                                        <input type="file" id="FileUpload1" name="image" style="display: none;" required>
                                        </label>
                                        <label for="FileUpload1" id="file" style="display: none;">
                                            <span class="required">*</span>
                                            Image	
                                        </label>
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>

                                    <div class="clear"></div>

                                    <p>
                                        <div>
                                        <button id="next1" type="submit" class="woocommerce-Button button" > Next </button>
                                    </div>
                                    </p>

                                </form>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </article>

                </main>

                <div class="d-none d-lg-block divider-50"></div>
            </div>

        </div>
    </section>

    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    <section dir="rtl" class="ls s-pt-75 s-pb-60 s-py-lg-100 shop-account-login text-right">
        <div class="container">
            <div class="row">

                <div class="d-none d-lg-block divider-60"></div>

                <main class="col-lg-12">
                    <article>
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="woocommerce">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                <header class="entry-header">
									<h4 class="margin-20">معلومات الحساب
									</h4>
								</header>
                                
                                <form class="woocommerce-EditAccountForm edit-account" action="{{ route('chief.register.submit') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                        <label for="lname">الاسم الاخير
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('lname') is-invalid @enderror" name="lname" id="account_last_name" value="" placeholder="الاسم الاخير" required>
                                        @if ($errors->has('lname'))
                                            <span class="text-danger">{{ $errors->first('lname') }}</span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
                                        <label for="fname">الاسم الاول
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('fname') is-invalid @enderror" name="fname" id="account_first_name" value="" placeholder="الاسم الاول" required>
                                        @if ($errors->has('fname'))
                                            <span class="text-danger">{{ $errors->first('fname') }}</span>
                                        @endif
                                    </p>

                                    
                                    <div class="clear">

                                    </div>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide" >
                                        <label for="gender">النوع
                                            <span class="required">*</span>
                                        </label>
                                        <select class="form-control" id="gender" name="gender" required>
                                            {{-- <option value="">--- Chose ---</option> --}}
                                            <option value="male">ذكر</option>
                                            <option value="female">انثي</option>
                                        </select>
                                        <!-- <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_gender" value="" placeholder="النوع" required> -->
                                        @if ($errors->has('gender'))
                                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="email">البريد الالكتروني
                                            <span class="required">*</span>
                                        </label>
                                        <input pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="email1" value=" " placeholder="البريد الالكتروني" required>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="phone">رقم الهاتف
                                            <span class="required">*</span>
                                        </label>
                                        <input pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="phone" id="account_phone" value="" placeholder="رقم الهاتف" required>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password">كلمة المرور</label>
                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" minlength="8" name="password" id="password" placeholder=" كلمة المرور" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password-confirm">تأكيد كلمة المرور</label>
                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text"  name="password_confirmation" id="password-confirm" placeholder="تأكيد كلمة المرور" required>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </p>

                                    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label class="col-sm-12 col-form-label">الحياة المهنية باللغه العربيه     </label>
                                        <div class="col-sm-12 ">
                                            <textarea class="form-control" name="biography_ar" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        @if ($errors->has('biography_ar'))
                                            <span class="text-danger">{{ $errors->first('biography_ar') }}</span>
                                        @endif
                                    </div>
                                    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label class="col-sm-12 col-form-label">الحياة المهنية باللغة الانجليزية                                        </label>
                                        <div class="col-sm-12 ">
                                            <textarea class="form-control" name="biography_en" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        @if ($errors->has('biography_en'))
                                            <span class="text-danger">{{ $errors->first('biography_en') }}</span>
                                        @endif
                                    </div>

                                    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label class="col-sm-12  col-form-label">السيرة شخصية باللغة العربيه</label>
                                        <div class="col-sm-12 ">
                                            <textarea class="form-control" name="professionalLife_ar" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        @if ($errors->has('professionalLife_ar'))
                                            <span class="text-danger">{{ $errors->first('professionalLife_ar') }}</span>
                                        @endif
                                    </div>
                                    <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label class="col-sm-12 col-form-label">السيرة شخصية باللغة الانجليزية</label>
                                        <div class="col-sm-12 ">
                                            <textarea class="form-control" name="professionalLife_en" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        @if ($errors->has('professionalLife_en'))
                                            <span class="text-danger">{{ $errors->first('professionalLife_en') }}</span>
                                        @endif
                                    </div>

                                    <br>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="facebook">الفيسبوك
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('facebook') is-invalid @enderror" name="facebook" placeholder="الفيسبوك" >
                                        @if ($errors->has('facebook'))
                                            <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="instagram">Instagram
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('instagram') is-invalid @enderror" name="instagram" placeholder="الانستجرام" >
                                        @if ($errors->has('instagram'))
                                            <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                        @endif
                                    </p>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="twitter">Twitter
                                            <span class="required">*</span>
                                        </label>
                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text @error('twitter') is-invalid @enderror" name="twitter" placeholder="تويتر" >
                                        @if ($errors->has('twitter'))
                                            <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                        @endif
                                    </p>

                                    
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">عدد المهارات</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="number" placeholder="Number of skills" id="skills" name="skills" onchange="NumOfFields()">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="container col-sm-12">
                                            <div class="row">
            
                                                <div class="col-sm-4" id="container">
                                                    <center><h6 class="hh" style="display:none">المهارات بالعربية</h6></center>
                                                    <br>
                                                    <div class="row">
                                                        <input id="sad" style="display:none" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4" id="container2">
                                                    <center><h6 class="hh" style="display:none">المهارات بالانجليزية</h6></center>
                                                    <br>
                                                    <div class="row">
                                                        <input id="sad" style="display:none" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4" id="container1">
                                                    <center><h6 class="hh" style="display:none;">النسبة</h6></center>
                                                    <br>
                                                    <input id="sad" style="display:none;margin-top: 18px" class="form-control">
                                                </div>
                                            </div>
            
                                        </div>
                                    </div>
                
                                        

                                    <div class="form-group" style="width: 10%;">
                                        <label class="btn btn-default btn-block btn-file bg-warning" id="btnFileUpload"> <i class="fa fa-upload"></i> الصوره الشخصية
                                          &nbsp;
                                          <span id="spnFilePath"></span>             
                                        <input type="file" id="FileUpload1" name="image" style="display: none;" required>
                                        </label>
                                        <label for="FileUpload1" id="file" style="display: none;">
                                            <span class="required">*</span>
                                            الصوره الشخصية	
                                        </label>
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>

                                    <div class="clear"></div>

                                    <p>
                                        <div>
                                        <button id="next1" type="submit" class="woocommerce-Button button" > Next </button>
                                    </div>
                                    </p>

                                </form>
                            </div>
                        </div>
                        <!-- .entry-content -->
                    </article>

                </main>

                <div class="d-none d-lg-block divider-50"></div>
            </div>

        </div>
    </section>
    @endif
@endsection

@section('footer')
    @include('site.includes.footer')
@endsection



<script>
    var flag = 0;
    if(flag === 1){
        var oldVal=0;
    }
    function NumOfFields(){
        usingClassNameToShowDisplayNone();
        var skills = document.getElementById('skills').value;
        //alert(skills);
        if(skills > 0) {

            if (flag !== 1) {
                var test = document.getElementById('sad');

                for (var i = 0; i < skills; i++) {
                    var newtest = test.cloneNode(true);
                    newtest.style.display = "block";
                    newtest.id = 'skill_ar' + i;
                    newtest.name = 'skill_ar' + i;

                    newtest.placeholder = 'Type Your Skill Arabic';
                    document.getElementById("container").appendChild(newtest);

                    var newtest3 = test.cloneNode(true);
                    newtest3.style.display = "block";
                    newtest3.id = 'skill_en' + i;
                    newtest3.name = 'skill_en' + i;

                    newtest3.placeholder = 'Type Your Skill English';
                    document.getElementById("container2").appendChild(newtest3);

                    var newtest2 = test.cloneNode(true);
                    newtest2.style.display = "block";
                    newtest2.id = 'percentages' + i;
                    newtest2.name = 'percentages' + i;

                    newtest2.type = 'number';
                    newtest2.placeholder = 'Type Your Percentage % ';
                    document.getElementById("container1").appendChild(newtest2);


                    flag = 1;
                    oldVal = skills;
                }
            } else if(oldVal !== null) {
                alert('You have already specify number of skills ');
                flag =0;
                resetFields(oldVal);
                //alert(oldVal + '' + skills);
            }
        }else{
            alert('Enter a valid number');
        }
    }
    function resetFields(oldVal){
        for(var i=0;i<oldVal;i++) {
            var myobj = document.getElementById("skill_ar"+i);
            var myobj2 = document.getElementById("percentages"+i);
            var myobj3 = document.getElementById("skill_en"+i);


            myobj.remove();
            myobj2.remove();
            myobj3.remove();

        }
        NumOfFields();
    }

    function usingClassNameToShowDisplayNone() {
        var myClasses = document.querySelectorAll('.hh'),
            i = 0,
            l = myClasses.length;
        for (i; i < l; i++) {
            myClasses[i].style.display = 'block';
        }
    }
</script>