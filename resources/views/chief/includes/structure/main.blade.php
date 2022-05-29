@if( LaravelLocalization::getCurrentLocaleName() == "English")
    <div class="left-side-bar">
    <div class="brand-logo">
        <a href="{{route('chief.dashboard')}}">
            <center>Chief Dashboard</center>
            <img src="{{asset('assets/vendors/images/cancel.svg')}}" alt="" class="dark-logo">
            <img src="{{asset('assets/vendors/images/deskapp-logo-white.svg')}}" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                <!--Courses-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Courses</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('chief_courses.index')}}">View all</a></li>
                        <li><a href="{{route('chief_courses.create')}}">Add New Course</a></li>
                    </ul>
                </li>
                <!--Videos Section-->
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon dw dw-house-1"></span><span class="mtext">Videos Page</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.video.page')}}">Add Video</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
@else
    <style>
        .sidebar-menu .dropdown-toggle:after {
            right: unset;
            left: 15px;
        }
        .sidebar-menu .dropdown-toggle .micon {
            right: 10px;
        }
        .mtext{
            padding-right: 60px;
        }
    </style>
    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{route('chief.dashboard')}}">
                <center><h5 style="color:white">لوحة تحكم الطاهي</h5></center>
                <img src="{{asset('assets/vendors/images/cancel.svg')}}" alt="" class="dark-logo">
                <img src="{{asset('assets/vendors/images/deskapp-logo-white.svg')}}" alt="" class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll" style="direction: rtl;text-align: right">
            <div class="sidebar-menu">
                <ul id="accordion-menu">

                    <!--Courses-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">الدورات</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('chief_courses.index')}}">عرض الكل</a></li>
                            <li><a href="{{route('chief_courses.create')}}">اضافة دورة جديدة</a></li>
                        </ul>
                    </li>
                    <!--Videos Section-->
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">صفحة الفيديوهات</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{route('admin.video.page')}}">اضافة فيديو جديد</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endif
