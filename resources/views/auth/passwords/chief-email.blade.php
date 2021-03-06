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
    Forget Password Chief
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    نسيت كلمة المرور الشيف
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Forget Password Chief
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    نسيت كلمة المرور الشيف
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

                            <form class="woocomerce-form woocommerce-form-login login text-center" method="post" action="{{ route('chief.password.email') }}">
                                @csrf 
                                
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="email">   Email
                                        <span class="required">*</span>
                                    </label>
                                    <input class="woocommerce-Input woocommerce-Input--text input-text text-center" type="email" name="email" id="email" placeholder=" Enter Your Email" required>
                                </p>

                                <p class="form-row">
                                    <button type="submit" class="woocommerce-Button button">Send </button>
                                </p>
                                <p class="woocommerce-LostPassword lost_password">
                                    <a href="login.html">Log In</a>
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

                            <form class="woocomerce-form woocommerce-form-login login text-center" method="post" action="{{ route('chief.password.email') }}">
                                @csrf 
                                
                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                    <label for="email">   البريد الالكتروني
                                        <span class="required">*</span>
                                    </label>
                                    <input class="woocommerce-Input woocommerce-Input--text input-text text-center" type="email" name="email" id="email" placeholder=" ادخل البريد الالكتروني" required>
                                </p>

                                <p class="form-row">
                                    <button type="submit" class="woocommerce-Button button">إرسال </button>
                                </p>

                                <p class="woocommerce-LostPassword lost_password">
                                    <a href="login.html">تسجيل دخول</a>
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


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('chief.password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
