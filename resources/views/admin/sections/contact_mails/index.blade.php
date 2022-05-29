@extends('admin.dashboard')
<style>
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting:before,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_asc:before,
    table.dataTable thead .sorting_asc_disabled:after,
    table.dataTable thead .sorting_asc_disabled:before,
    table.dataTable thead .sorting_desc:after,
    table.dataTable thead .sorting_desc:before,
    table.dataTable thead .sorting_desc_disabled:after,
    table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
    }
    table thead tr th{
        width:1px; white-space:nowrap;
        text-align:center;
    }
    table tbody tr td{
        white-space:normal;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
<div class="container">
    <center>
        <br>
        <div style="padding:40px;border:5px solid #040423;border-radius: 20px;">
            <center>
                <h4>
                    Contacts Mails Table
                </h4>
                <br><br>
            </center>

            @if(count($mails) > 0 )
                <div class="row" style="padding-bottom: 20px" >

                        <table class="table table-dark text-center">
                            <tr>
                                <td>

                                    Subject Arabic
                                </td>
                                <td>
                                    Subject English
                                </td>
                                <td>
                                    Mail
                                </td>
                                <td>
                                    Delete
                                </td>
                            </tr>
                            @foreach($mails as $mail)
                            <tr>
                                <td>
                                   {{$mail->subject_ar}}
                                </td>
                                <td>
                                    {{$mail->subject_en}}

                                </td>
                                <td>
                                    {{$mail->email}}
                                </td>
                                <td>
                                    <a href="{{route('admin.mails.remove',['id'=>$mail->id])}}" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </table>

                </div>

            @else
                <h6  style="padding-bottom: 20px">
                    There is no mails let !
                </h6>
            @endif
            <form action="{{route('admin.mails.add')}}" method="post">
                @csrf
                <div class="row" style="padding-bottom: 20px" >
                    <center>
                       <table class="table table-dark text-center">
                           <tr>
                               <td>

                                   Subject Arabic
                               </td>
                               <td>
                                   Subject English
                               </td>
                               <td>
                                   Mail
                               </td>
                           </tr>
                           <tr>
                               <td>
                                   <input type="text" name="subject_ar" class="btn btn-light">
                               </td>
                               <td>
                                   <input type="text" name="subject_en" class="btn btn-light">
                               </td>
                               <td>
                                   <input type="email" name="emails" class="btn btn-light" >
                               </td>
                           </tr>
                       </table>
                    </center>
                </div>

                <div class="row" style="padding-bottom: 20px" >
                    <center>
                        <div class="col-sm-4">
                            <input type="submit" value="Add New Mail" class="btn btn-dark">
                        </div>
                    </center>
                </div>
            </form>

        </div>
    </center>

</div>

@endsection
@else
@section('main-container')
    <div class="container" style="padding-top: 100px">
        <center>
            <br>
            <div style="padding:40px;border:5px solid #040423;border-radius: 20px;">
                <center>
                    <h4>
                        جدول ايميلات التواصل
                    </h4>
                    <br><br>
                </center>

                @if(count($mails) > 0 )
                    <div class="row" style="padding-bottom: 20px" >

                        <table class="table table-dark text-center">
                            <tr>
                                <td>

                                    الموضوع بالعربية
                                </td>
                                <td>
                                    الموضوع بالانجليزية
                                </td>
                                <td>
                                    البريد الالكتروني
                                </td>
                                <td>
                                   حذف
                                </td>
                            </tr>
                            @foreach($mails as $mail)
                                <tr>
                                    <td>
                                        {{$mail->subject_ar}}
                                    </td>
                                    <td>
                                        {{$mail->subject_en}}

                                    </td>
                                    <td>
                                        {{$mail->email}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.mails.remove',['id'=>$mail->id])}}" class="btn btn-danger">
                                            حذف
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>

                @else
                    <h6  style="padding-bottom: 20px">
                       لا يوجد ايميلات بعد!
                    </h6>
                @endif
                <form action="{{route('admin.mails.add')}}" method="post">
                    @csrf
                    <div class="row" style="padding-bottom: 20px" >
                        <center>
                            <table class="table table-dark text-center">
                                <tr>
                                    <td>

                                        الموضوع بالعربية
                                    </td>
                                    <td>
                                       الموضوع بالانجليزية
                                    </td>
                                    <td>
                                       البريد الالكتروني
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="subject_ar" class="btn btn-light">
                                    </td>
                                    <td>
                                        <input type="text" name="subject_en" class="btn btn-light">
                                    </td>
                                    <td>
                                        <input type="email" name="emails" class="btn btn-light">
                                    </td>
                                </tr>
                            </table>
                        </center>
                    </div>

                    <div class="row" style="padding-bottom: 20px" >
                        <center>
                            <div class="col-sm-4">
                                <input type="submit" value="اضافة بريد جديد" class="btn btn-dark">
                            </div>
                        </center>
                    </div>
                </form>

            </div>
        </center>

    </div>

@endsection
@endif
