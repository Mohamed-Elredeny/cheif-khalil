@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<div class="header_absolute">
    <!-- header with three Bootstrap columns - left for logo, center for navigation and right for includes-->
    <header class="page_header s-bordertop nav-narrow ds justify-nav-center header-main">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-1 col-lg-1 col-9">
                    <a href="/" class="logo">
                        <img src="../assets/site/images/logo.png" alt="">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-4 col-1 text-sm-center">
                    <!-- main nav start -->
                    <nav class="top-nav">
                        <ul class="nav sf-menu">

                            <li class="active">
                                <a href="/">Home</a>
                            </li>

                            <li>
                                <a href="{{route('showCourses')}}">Courses</a>
                            </li>

                            <li>
                                <a href="{{route('showChiefs')}}">Chiefs</a>
                            </li>

                            <li>
                                <a href="{{route('allStream')}}">Livestreams</a>
                            </li>

                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('showCotactUs')}}">Contact Us</a></li>


                            @if(!Auth::guard('web')->user() && !Auth::guard('chief')->user() && !Auth::guard('admin')->user())

                            <li>
                                <a href=""><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                 Sign In</a>
                                    <ul>
                                        <li><a href="/login">Student</a></li>
                                        <li><a href="{{route('chief.login')}}">Chief</a></li>
                                        <li><a href="{{route('admin.login')}}">Admin</a></li>
                                    </ul>
                            </li>

                            <li>
                                <a href=""><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                 Sign Up</a>
                                    <ul>
                                        <li><a href="/register">Student</a></li>
                                        <li><a href="{{route('chief.register')}}">Chief</a></li>
                                    </ul>
                            </li>
                            @endif

                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>


                    </nav>
                    <!-- eof main nav -->
                </div>
                @if(Auth::guard('web')->user())

                <div class="col-xl-2 col-lg-6 col-sm-2 col-2 text-left text-xl-right d-none d-lg-block">
                    <div id="" class="dropdown" >
                        <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                            data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user"
                                aria-hidden="true"></i> {{Auth::guard('web')->user()->fname}} {{Auth::guard('web')->user()->lname }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu bg-dark" style="text-align: left; width:250px">
                            <li class="mb-2"><a href="{{route('myProfile')}}">My profile</a></li>
                            <li class="mb-2"><a href="{{route('myCourses')}}">My Courses</a></li>
                            <li class="mb-2"><a href="{{route('myFavoriteCourse')}}">Favorite Course</a></li>
                            <li class="mb-2"><a href="{{route('myFollowingChieff')}}">Following Chiefs</a></li>
                            <li class="mb-2"><a href="/editProfileInfo">Update Profile</a></li>
                            <li class="mb-2"><a href="/editProfileAccount">Chage Password</a></li>
                            <li class="mb-2"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 Log Out
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></li>
                        </ul>
                    </div>
                </div>
                @endif

                @if(Auth::guard('admin')->user())

                <div class="col-xl-2 col-lg-6 col-sm-2 col-2 text-left text-xl-right d-none d-lg-block">
                    <div id="" class="dropdown" >
                        <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                            data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user"
                                aria-hidden="true"></i> {{Auth::guard('admin')->user()->fname}} {{Auth::guard('admin')->user()->lname}}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu bg-dark" style="text-align: left; width:250px">
                            <li class="mb-2"><a href="/admin">My Dashbourd</a></li>
                            <li class="mb-2"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 Log Out
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></li>
                        </ul>
                    </div>
                </div>
                @endif

                @if(Auth::guard('chief')->user())

                <div class="col-xl-2 col-lg-6 col-sm-2 col-2 text-left text-xl-right d-none d-lg-block">
                    <div id="" class="dropdown" >
                        <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                            data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user"
                                aria-hidden="true"></i> {{Auth::guard('chief')->user()->fname}} {{Auth::guard('chief')->user()->lname}}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu bg-dark" style="text-align: left; width:250px">
                            <li class="mb-2"><a href="/chief">My Dashbourd</a></li>
                            <li class="mb-2"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 Log Out
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!-- header toggler -->
        <span class="toggle_menu">
            <span></span>
        </span>
    </header>
</div>

@elseif ( LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<div class="header_absolute">
    <!-- header with three Bootstrap columns - left for logo, center for navigation and right for includes-->
    <header class="page_header s-bordertop nav-narrow ds justify-nav-center header-main" dir="rtl">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-1 col-lg-1 col-9">
                    <a href="/" class="logo">
                        <img src="../assets/site/images/logo.png" alt="">
                    </a>
                </div>
                <div class="col-xl-8 col-lg-4 col-1 text-sm-center">
                    <!-- main nav start -->
                    <nav class="top-nav">
                        <ul class="nav sf-menu">

                            <li class="active">
                                <a href="/">???????????? ??????????????</a>
                            </li>

                            <li>
                                <a href="{{route('showCourses')}}">??????????????</a>
                            </li>

                            <li>
                                <a href="{{route('showChiefs')}}">??????????????</a>
                            </li>

                            <li>
                                <a href="{{route('allStream')}}">???????? ??????????????</a>
                            </li>

                            <li><a href="{{route('about')}}">???? ??????</a></li>
                            <li><a href="{{route('showCotactUs')}}">?????????? ????????</a></li>


                            @if(!Auth::guard('web')->user() && !Auth::guard('chief')->user() && !Auth::guard('admin')->user())

                            <li>
                                <a href=""><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                 ????????</a>
                                    <ul>
                                        <li><a href="/login">????????</a></li>
                                        <li><a href="{{route('chief.login')}}">??????</a></li>
                                        <li><a href="{{route('admin.login')}}">??????????</a></li>
                                    </ul>
                            </li>

                            <li>
                                <a href=""><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                                 ???????? ????????</a>
                                    <ul>
                                        <li><a href="/register">????????</a></li>
                                        <li><a href="{{route('chief.register')}}">??????</a></li>
                                    </ul>
                            </li>
                            @endif

                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>


                    </nav>
                    <!-- eof main nav -->
                </div>
                @if(Auth::guard('web')->user())

                <div class="col-xl-2 col-lg-6 col-sm-2 col-2 text-left text-xl-right d-none d-lg-block">
                    <div id="" class="dropdown" >
                        <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                            data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user"
                                aria-hidden="true"></i> {{Auth::guard('web')->user()->fname}} {{Auth::guard('web')->user()->lname }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu bg-dark" style="text-align: left; width:250px">
                            <li class="mb-2"><a href="{{route('myProfile')}}">??????????</a></li>
                            <li class="mb-2"><a href="{{route('myCourses')}}">????????????</a></li>
                            <li class="mb-2"><a href="{{route('myFavoriteCourse')}}">?????????????? ??????????????</a></li>
                            <li class="mb-2"><a href="{{route('myFollowingChieff')}}">?????????????? ??????????????????</a></li>
                            <li class="mb-2"><a href="/editProfileInfo">?????????? ????????????</a></li>
                            <li class="mb-2"><a href="/editProfileAccount">???????? ???????? ????????????</a></li>
                            <li class="mb-2"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 ?????????? ????????
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></li>
                        </ul>
                    </div>
                </div>
                @endif

                @if(Auth::guard('admin')->user())

                <div class="col-xl-2 col-lg-6 col-sm-2 col-2 text-left text-xl-right d-none d-lg-block">
                    <div id="" class="dropdown" >
                        <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                            data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user"
                                aria-hidden="true"></i> {{Auth::guard('admin')->user()->fname}} {{Auth::guard('admin')->user()->lname}}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu bg-dark" style="text-align: left; width:250px">
                            <li class="mb-2"><a href="/admin">???????? ????????????</a></li>
                            <li class="mb-2"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 ?????????? ????????
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></li>
                        </ul>
                    </div>
                </div>
                @endif

                @if(Auth::guard('chief')->user())

                <div class="col-xl-2 col-lg-6 col-sm-2 col-2 text-left text-xl-right d-none d-lg-block">
                    <div id="" class="dropdown" >
                        <button class="btn btn-maincolor2 dropdown-toggle" type="button"
                            data-toggle="dropdown" style="font-size: large;"><i class="fa fa-user"
                                aria-hidden="true"></i> {{Auth::guard('chief')->user()->fname}} {{Auth::guard('chief')->user()->lname}}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu bg-dark" style="text-align: left; width:250px">
                            <li class="mb-2"><a href="/chief">???????? ????????????</a></li>
                            <li class="mb-2"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 ?????????? ????????
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form></li>
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <!-- header toggler -->
        <span class="toggle_menu">
            <span></span>
        </span>
    </header>
</div>

@endif
