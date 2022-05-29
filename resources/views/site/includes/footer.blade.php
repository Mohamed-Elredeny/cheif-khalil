@if (    LaravelLocalization::getCurrentLocaleName() == 'English')
<footer class="page_footer ds s-pt-90 s-pb-15 s-pt-lg-130 s-pb-lg-75 c-gutter-60 s-parallax text-center text-lg-left ">
    <div class="container">
        <div class="row">
            <div class="divider-30 d-none d-xl-block"></div>

            <div class="col-md-12 col-lg-4 animate text-center text-lg-left" data-animation="fadeInUp">
                <div class="widget widget_icons_list footer-list">
                    <div class="text-center">
                        <a href="./" class="logo logo-footer">
                            <img src="{{asset('assets/site/images/logo.png')}}" alt="" style="height: 200px;position: relative;right: 130px;">
                       </a>


                    </div>

                    <p class="after-logo h5">Cheif Khalil-School</p>

                    <p class="icon-inline">
                        <span class="icon-styled color-main2">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        <span>{{__('footer.address')}}</span>
                    </p>

                    <p class="icon-inline">
                        <span class="icon-styled color-main2">
                            <i class="fa fa-phone"></i>
                        </span>
                        <span>
                            {{__('footer.phone')}}
                        </span>
                    </p>

                    <p class="icon-inline">
                        <span class="icon-styled color-main2">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <span>
                            <a class="border-bottom" href="#">{{__('footer.email')}}</a>
                        </span>
                    </p>
                    <p class="social-icons">
                        <a href="{{__('footer.facebook')}}" class="fa fa-facebook color-light" title="facebook"></a>
                        <a href="{{__('footer.twitter')}}" class="fa fa-twitter color-light" title="twitter"></a>
                        <a href="{{__('footer.instagram')}}" class="fa fa-instagram color-light" title="instagram"></a>
                        <a href="{{__('footer.snapchat')}}" class="fa fa-snapchat-ghost color-light" title="snapchat"></a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 animate" data-animation="fadeInUp">
                <div class="widget widget_recent_posts">

                    <h3 class="widget-title"><br> <br> </h3>
                    <ul class="list-unstyled">
                        <li class="media">
                            <div class="media-body">
                                <p class="">
                                    <a href="about.html">About US </a>
                                </p>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-body">
                                <p class="">
                                    <a href="/showCotactUs">Cotact Us</a>
                                </p>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-body">
                                <p class="">
                                    <a href="index.html">Privacy Policy</a>
                                </p>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-body">
                                <p class="">
                                    <a href="index.html">Terms and Conditions</a>
                                </p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                <p style="font-size:12px;color:orange;font-weight:bolder;">
                                     The site is authenticated by Marouf platform of the Saudi Ministry of Commerce
                                </p>
                            </div>
                        </li>



                    </ul>
                </div>


            </div>

            <div class="col-md-6 col-lg-4 animate text-center text-lg-left" data-animation="fadeInUp">
                <div class="widget widget_mailchimp footer_mailchimp">

                    <h3 class="widget-title">Subscribe Now</h3>

                    <p class="">
                        Enter Your Email to Subscribe
                    </p>

                    <form class="" action="/register">
                        <label for="mailchimp_email">
                            <span class="screen-reader-text">Subscribe</span>
                        </label>

                        <input id="mailchimp_email" name="email" type="email" class="form-control mailchimp_email ds" placeholder="Email">
                        <div class="">
                        <button  type="submit" class="btn btn-maincolor">Subscription</button>
                        </div>
                        <div class="response"></div>
                    </form>

                </div>
            </div>
            <div class="divider-20 d-none d-xl-block"></div>
        </div>
    </div>
</footer>

<section class="page_copyright ds s-py-25 s-py-lg-5 s-parallax s-overlay footer-overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="divider-20 d-none d-lg-block"></div>
            <div class="col-md-12 text-center">
                <p> &copy; All Rights reserved to Chef Khalil-School | Developed by <a href="http://we-work.pro/"> We-Work</a>
                </p>


            </div>
            <div class="divider-20 d-none d-lg-block"></div>
        </div>
    </div>
</section>

@elseif ( LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<footer class="page_footer ds s-pt-90 s-pb-15 s-pt-lg-130 s-pb-lg-75 c-gutter-60 s-parallax" dir="rtl">
    <div class="container">
        <div class="row">
            <div class="divider-30 d-none d-xl-block"></div>

            <div class="col-md-12 col-lg-4 animate text-center text-lg-left" data-animation="fadeInUp">
                <div class="widget widget_icons_list footer-list">
                    <p style="display:flex;"  class="text-center">
                        <a href="./" class="logo logo-footer">
                            <img src="{{asset('assets/site/images/logo.png')}}" alt="" style="height: 200px;position: relative;left: 70px;">
                        </a>
                    </p>
                    <p style="display: flex;" class="text-center">منصة الشيف خليل </p>
                    <p style="display: flex;" >
                        <span class="icon-styled color-main2">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        <span>&#160;{{__('footer.address')}}</span>
                    </p>
                    <p style="display: flex;" >
                        <span class="icon-styled color-main2">
                            <i class="fa fa-phone"></i>
                        </span>
                        <span>&#160;{{__('footer.phone')}}</span>
                    </p>
                    <p style="display: flex;">
                        <span class="icon-styled color-main2">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <span>
                            <a class="border-bottom" href="#">&#160;{{__('footer.email')}}</a>
                        </span>
                    </p>
                    <p style="display:flex" class="social-icons">
                        <a href="{{__('footer.facebook')}}" class="fa fa-facebook color-light" title="facebook"></a>
                        <a href="{{__('footer.twitter')}}" class="fa fa-twitter color-light" title="twitter"></a>
                        <a href="{{__('footer.instagram')}}" class="fa fa-instagram color-light" title="instagram"></a>
                        <a href="{{__('footer.snapchat')}}" class="fa fa-snapchat-ghost color-light" title="snapchat"></a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 animate" data-animation="fadeInUp">
                <div class="widget widget_recent_posts">

                    <h3 class="widget-title"><br> <br> </h3>
                    <ul class="list-unstyled">
                        <li class="media">
                            <div class="media-body">
                                <p class="text-center">
                                    <a href="about.html">نبذة عنا </a>
                                </p>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-body">
                                <p class="text-center">
                                    <a href="contact-us.html">تواصل معنا</a>
                                </p>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-body">
                                <p class="text-center">
                                    <a href="index.html">حماية الخصوصية</a>
                                </p>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-body">
                                <p class="text-center">
                                    <a href="index.html">الشروط و الأحكام</a>
                                </p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-body">
                                <p style="font-size:12px;color:orange;font-weight:bolder;">
                                    الموقع موثق من قبل منصة معروف التابعة لوزارة التجارة السعودية
                                </p>
                            </div>
                        </li>



                    </ul>
                </div>


            </div>

            <div class="col-md-6 col-lg-4 animate text-center text-lg-left" data-animation="fadeInUp">
                <div class="widget widget_mailchimp footer_mailchimp">

                    <h3 class="widget-title">اشترك الان</h3>

                    <p class="text-right">
                        قم بإدخال البريد الإلكتروني للأشتراك معنا
                    </p>

                    <form class="" action="/register">
                        <label for="mailchimp_email">
                            <span class="screen-reader-text">اشترك</span>
                        </label>

                        <input id="mailchimp_email" name="email" type="email" class="form-control mailchimp_email ds" placeholder="البريد الإلكتروني">
                        <div class="text-right">
                        <button  type="submit" class="btn btn-maincolor">اشترك</button>
                        </div>
                        <div class="response"></div>
                    </form>

                </div>
            </div>
            <div class="divider-20 d-none d-xl-block"></div>
        </div>
    </div>
</footer>

<section class="page_copyright ds s-py-25 s-py-lg-5 s-parallax s-overlay footer-overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="divider-20 d-none d-lg-block"></div>
            <div class="col-md-12 text-center">
                <p> <a href="http://we-work.pro/"> We-Work </a> : جميع حقوق النشر محفوظة لمنصة الشبف خليل | قام بالتطوير &copy;
                </p>
            </div>
            <div class="divider-20 d-none d-lg-block"></div>
        </div>
    </div>
</section>

@endif
