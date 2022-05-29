@extends('admin.dashboard')
@section('main-container')
    @if( LaravelLocalization::getCurrentLocaleName() == "English")

    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Add New Chief</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">

                <form method="post" action="{{route('chiefs.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">First Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="First Name" name="fname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Last Name</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Last Name" type="text" name="lname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" placeholder="Email" type="email" name="email">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control"  type="password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control"  type="number" name="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Gender</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="form-control" name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="col-sm-12 col-form-label">Biography Arabic</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="biography_ar" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-12 col-form-label">Biography English</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="biography_en" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="col-sm-12  col-form-label">Professional Life Arabic</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="professionalLife_ar" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-12 col-form-label">Professional Life English</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="professionalLife_en" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Facebook Account</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Facebook Account" name="facebook">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Instagram Account</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Instagram Account" name="instagram">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Twitter Account</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Twitter Account" name="twitter">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Snapchat</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" placeholder="Snapchat Account" name="snapchat">
                        </div>
                    </div>
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
        <div class="pd-ltr-20 xs-pd-20-10" style="direction: rtl;text-align:right;padding-top:100px">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>أضافة طاهي جديد</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                    <form method="post" action="{{route('chiefs.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الاسم الاول</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="First Name" name="fname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الاسم الاخير</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Last Name" type="text" name="lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Email" type="email" name="email">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الرقم السري</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control"  type="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">رقم الجوال</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control"  type="number" name="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">النوع</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="form-control" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-12 col-form-label">السيرة الشخصيه بالعربيه</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea class="form-control" name="biography_ar" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-12 col-form-label">السيرة الشخصيه بالانجليزية</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea class="form-control" name="biography_en" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="col-sm-12  col-form-label">الحياة المهنية بالعربية</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea class="form-control" name="professionalLife_ar" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-12 col-form-label">الحياة المهنية بالانجليزية</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea class="form-control" name="professionalLife_en" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">حساب فيسبوك</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Facebook Account" name="facebook">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label"> حساب انستغرام </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Instagram Account" name="instagram">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">حساب تويتر</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Twitter Account" name="twitter">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">حساب سناب شات</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Snapchat Account" name="snapchat">
                            </div>
                        </div>

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

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">الصوره</label>
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
