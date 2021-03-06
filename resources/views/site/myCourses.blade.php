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
    My Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    دوراتي
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    My Courses
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    دوراتي
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>
    <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>

    {{-- <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script> --}}



@if (    LaravelLocalization::getCurrentLocaleName() == 'English')

<section class="ls s-py-75 s-py-lg-100 c-gutter-60">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-60"></div>

            <main class="offset-lg-1 col-lg-10">
                <article class="vertical-item content-padding post type-post status-publish format-standard has-post-thumbnail ">
                    <!-- .post-thumbnail -->
                    
                    <div>

                        <!-- .entry-meta -->

                        <div>

                            <div class="col-md-12 col-lg-12 animate" data-animation="fadeInUp">
                                <div class="widget widget_recent_posts">
    
                                    <h3 class="widget-title">My Courses </h3>
                                    <ul id="enrolls" class="list-unstyled">
                                        @foreach($course as $coursess)
                                            @if(count($myCoursesBooking)>0)
                                                @for($i = 0; $i < count($myCoursesBooking); $i++)
                                                    @if($coursess->id == $myCoursesBooking[$i]['course_id'])

                                                        <li class="bordered row">
                                                            <div class="col-3">
                                                                <a style="margin: 5px;" href="/courseLessonses/{{$coursess->id}}/{{$myCoursesBooking[$i]['course_progress']}}">
                                                                    <img style="height: 100%; width:100%" src="{{asset('assets/images/courses')}}/{{$coursess->image}}" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="media-body col-5">
                                                                <br>
                                                                <p>
                                                                    <a href="/courseLessonses/{{$coursess->id}}/{{$myCoursesBooking[$i]['course_progress']}}"> {{$coursess->name_en}} </a>
                                                                </p>
                                                                <p>
                                                                    <a href="/showChiefDetails/{{$coursess->courseChief['id']}}"> {{$coursess->courseChief['fname']}} {{$coursess->courseChief['lname']}} </a>
                                                                </p>
                                                                {{-- <h6 class="item-meta text-left">
                                                                    <i class="fa fa-calendar color-main"></i>
                                                                    20-20-2020
                                                                </h6> --}}
                                                            </div>
                                                            <div class="btn-timetable col-4">
                                                                <br>
                                                                <a  class="btn btn-outline-maincolor" href="/courseLessonses/{{$coursess->id}}/{{$myCoursesBooking[$i]['course_progress']}}"  style="margin-bottom: 5px;" >contenue course</a>
                                                                @if($myCoursesBooking[$i]['state'] == 1)
                                                                <input onclick="generateCertficate('{{$coursess->courseChief['fname']}} {{$coursess->courseChief['lname']}}','{{$coursess->name_en}}')" type="submit" class="btn btn-outline-maincolor" value="download certificate">
                                                                    @else
                                                                    <input onclick="alert('you must finish course to get a certificate')" type="submit" class="btn btn-outline-maincolor" value="download certificate">

                                                                @endif
                                                                <br>
                                                            </div>
                                                            <br>
                                                        </li>
                                                        <br>

                                                        @break
                                                    @endif
                                                @endfor
                                            
                                            @endif
                                        @endforeach
                                        @if(count($myCoursesBooking)==0)
                                            <li>No Courses enrolled</li>
                                        @endif
                                    </ul>
                                </div>
    
    
                            </div>
                            
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .item-content -->
                </article>


            </main>

        </div>

    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-py-75 s-py-lg-100 c-gutter-60 text-right">
    <div class="container">
        <div class="row">

            <div class="d-none d-lg-block divider-60"></div>

            <main class="offset-lg-1 col-lg-10">
                <article class="vertical-item content-padding post type-post status-publish format-standard has-post-thumbnail ">
                    <!-- .post-thumbnail -->
                    
                    <div>

                        <!-- .entry-meta -->

                        <div>

                            <div class="col-md-12 col-lg-12 animate" data-animation="fadeInUp">
                                <div class="widget widget_recent_posts">
    
                                    <h3 class="widget-title">دوراتي </h3>
                                    <ul id="enrolls" class="list-unstyled">
                                        @foreach($course as $coursess)
                                            @if(count($myCoursesBooking)>0)
                                                @for($i = 0; $i < count($myCoursesBooking); $i++)
                                                    @if($coursess->id == $myCoursesBooking[$i]['course_id'])

                                                        <li class="bordered row">
                                                            <div class="col-3">
                                                                <a style="margin: 5px;" href="/courseLessonses/{{$coursess->id}}/{{$myCoursesBooking[$i]['course_progress']}}">
                                                                    <img style="height: 100%; width:100%" src="{{asset('assets/images/courses')}}/{{$coursess->image}}" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="media-body col-5">
                                                                <br>
                                                                <p>
                                                                    <a href="/courseLessonses/{{$coursess->id}}/{{$myCoursesBooking[$i]['course_progress']}}"> {{$coursess->name_ar}} </a>
                                                                </p>
                                                                <p>
                                                                    <a href="/showChiefDetails/{{$coursess->courseChief['id']}}"> {{$coursess->courseChief['fname']}} {{$coursess->courseChief['lname']}} </a>
                                                                </p>
                                                                {{-- <h6 class="item-meta text-left">
                                                                    <i class="fa fa-calendar color-main"></i>
                                                                    20-20-2020
                                                                </h6> --}}
                                                            </div>
                                                            <div class="btn-timetable col-4">
                                                                <br>
                                                                <a  class="btn btn-outline-maincolor" href="/courseLessonses/{{$coursess->id}}/{{$myCoursesBooking[$i]['course_progress']}}"  style="margin-bottom: 5px;" >تكملة الدورة</a>
                                                                @if($myCoursesBooking[$i]['state'] == 1)
                                                                <input onclick="generateCertficate('{{$coursess->courseChief['fname']}} {{$coursess->courseChief['lname']}}','{{$coursess->name_ar}}')" type="submit" class="btn btn-outline-maincolor" value="تنزيل الشهادة">
                                                                    @else
                                                                    <input onclick="alert('يجب تكملة الدورة لتنزيل الشهادة')" type="submit" class="btn btn-outline-maincolor" value="تنزيل الشهادة">

                                                                @endif
                                                                <br>
                                                            </div>
                                                            <br>
                                                        </li>
                                                        <br>

                                                        @break
                                                    @endif
                                                @endfor
                                            
                                            @endif
                                        @endforeach
                                        @if(count($myCoursesBooking)==0)
                                            <li>لا توجد دورات</li>
                                        @endif
                                    </ul>
                                </div>
    
    
                            </div>
                            
                        </div>
                        <!-- .entry-content -->
                    </div>
                    <!-- .item-content -->
                </article>


            </main>

        </div>

    </div>
</section>

@endif




<script>
    async function generateCertficate(student,course){
         const { PDFDocument, StandardFonts, rgb, degrees } = PDFLib;
         // Create a new PDFDocument
         const pdfDoc = await PDFDocument.create()
         pdfDoc.registerFontkit(fontkit)
         // Embed the Times Roman font
         // const timesRomanFont = await pdfDoc.embedFont(StandardFonts.TimesRoman)
         const url = "{{asset('assets/site/certificate/Tajawal-Light.ttf')}}";
         const fontBytes = await fetch(url).then(res => res.arrayBuffer())   
         const font = await pdfDoc.embedFont(fontBytes)

             // pdfDoc.setAuthor(this.pdfInfo.author);
             // pdfDoc.setTitle(this.pdfInfo.title);
             // pdfDoc.setKeywords(this.pdfInfo.keywords.split(","));
         // Add a blank page to the document
         const page = pdfDoc.addPage()

         const imageurl = "{{asset('assets/site/certificate/certificate.png')}}";
         //const imageurl = 'https://pdf-lib.js.org/assets/minions_banana_alpha.png'
         const pngImageBytes = await fetch(imageurl).then(res => res.arrayBuffer())    ;
         const pngImage = await pdfDoc.embedPng(pngImageBytes)

         //841.89
         //595.28
         // Get the width and height of the page
         page.setSize(841.89,595.28);
         const { width, height } = page.getSize()
         
         // Draw a string of text toward the top of the page
         const fontSize = 40;
         page.drawImage(pngImage, {
             x: 0,
             y: 0,
             width: width,
             height: height,
         })
         page.drawText(student, {
             x: width/3,
             y: 350,
             size: fontSize,
             font: font,
             color: rgb(0, 0, 0)
         })
         page.drawText(course, {
             x: (width/3)-25,
             y: 250,
             size: fontSize,
             font: font,
             color: rgb(0, 0, 0)
         })

         // Serialize the PDFDocument to bytes (a Uint8Array)
             const pdfBytes = await pdfDoc.save()


             // Trigger the browser to download the PDF document
             download(pdfBytes, "certificate.pdf", "application/pdf;charset='utf-8'");
     }
    
</script>


@endsection

@section('footer')
    @include('site.includes.footer')
@endsection


