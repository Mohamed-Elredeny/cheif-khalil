@extends('admin.dashboard')
@section('main-container')
    @if( LaravelLocalization::getCurrentLocaleName() == "English")
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>Privacy</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                    <form method="post" action="{{route('translation.store.privacy')}}" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Arabic Title </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Title Name" name="title_ar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">English Title </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Title " type="text" name="title_en" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Number of Subtitle</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="number" placeholder="Number of Subtitle" id="skills" name="skills" onchange="NumOfFields()">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="container col-sm-12">
                                <div class="row">

                                    <div class="col-sm-4" id="container">
                                        <center><h6 class="hh" style="display:none">subtitle in arabic</h6></center>
                                        <br>
                                        <div class="row">
                                            <input id="sad" style="display:none" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4" id="container2">
                                        <center><h6 class="hh" style="display:none">subtitle in English</h6></center>
                                        <br>
                                        <div class="row">
                                            <input id="sad" style="display:none" class="form-control">
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-4" id="container1">
                                        <center><h6 class="hh" style="display:none;">النسبة</h6></center>
                                        <br>
                                        <input id="sad" style="display:none;margin-top: 18px" class="form-control">
                                    </div> --}}
                                </div>

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
                    </form>
                </div>
                <!-- Default Basic Forms End -->


            </div>

        </div>
    @else
        <div class="pd-ltr-20 xs-pd-20-10" style="padding:100px;direction: rtl;text-align:right;">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>الجزء السفلي</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 card-box mb-30">

                    <form method="post" action="{{route('translation.footer.update',['id'=>$footer->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">العنوان بالعربية</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Package Name" name="address_ar" value="{{$footer->address_ar}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">العنوان بالانجليزية </label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Package Price" type="text" name="address_en" value="{{$footer->address_en}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">رقم الهاتف</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Package Duration" type="text" name="phone" value="{{$footer->phone}}">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">البريد الإلكتروني</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Package Duration" type="text" name="email" value="{{$footer->email}}">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <center>
                                        <input class="form-control btn btn-outline-primary"  type="submit" name="حفظ" value="Save">
                                    </center>
                                </div>
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

                    // var newtest2 = test.cloneNode(true);
                    // newtest2.style.display = "block";
                    // newtest2.id = 'percentages' + i;
                    // newtest2.name = 'percentages' + i;

                    // newtest2.type = 'number';
                    // newtest2.placeholder = 'Type Your Percentage % ';
                    // document.getElementById("container1").appendChild(newtest2);


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
            // var myobj2 = document.getElementById("percentages"+i);
            var myobj3 = document.getElementById("skill_en"+i);


            myobj.remove();
            // myobj2.remove();
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
