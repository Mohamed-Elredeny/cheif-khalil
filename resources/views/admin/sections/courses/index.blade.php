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
    }
    table tbody tr td{
        white-space:normal;

    }
    .table td{
        width:90px;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    <div class="table-responsive"  style="overflow-y:scroll">
        <table id="myTable" class="table table-striped table-bordered table-sm"  style="width:100%;" style="text-align:center">
            <thead>
            <tr>
                <th>
                    Image
                </th>
                <th>
                    Arabic Name
                </th>
                <th class="th-sm">
                    English Name
                </th>
                <th class="th-sm">
                    Details Arabic
                </th>
                <th class="th-sm">
                    Details English
                </th>
                <th class="th-sm">
                     Lessons Number
                </th>
                <th>
                    Category
                </th>
                <th>
                    Chief
                </th>
                <th colspan="3" >
                    <center>
                        Controllers
                    </center>
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr style="text-align:center">
                    <td>
                         <img src="{{asset('assets/images/courses/'.$category->image.'')}}" alt="" style="width:70px;height:70px">
                     </td>
                    <td>{{$category->name_ar}}</td>
                    <td>{{$category->name_en}}</td>
                    <td>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenterar{{$category->id}}">
                            view
                        </button>
                    </td>
                    <td>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenteren{{$category->id}}">
                            view
                        </button>
                    </td>
                    <td>
                        {{$category->number_of_lessons}}
                        <br><br>
                        <a class="btn btn-dark" href="{{route('lessons.create',['course_id'=>$category->id])}}">Show</a>
                    </td>


                    <td>
                        <a href="{{route('categories.show',['category'=>$category->category->id])}}" target="_blank">
                            {{$category->category->name_en}}
                        </a>
                    </td>
                    <td>
                        <a href="{{route('chiefs.show',['chief'=>$category->chief->id])}}" target="_blank">
                            {{$category->chief->fname . " ". $category->chief->lname}}
                        </a>
                    </td>
                    <td colspan="3" class="col-sm-12">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Controllers
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="btn btn-dark col-sm-12"  href="{{route('courses.edit',['course'=>$category->id])}}">Edit</a>
                                    <form method="post" action="{{route('courses.destroy',['course'=>$category->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark col-sm-12" >Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                     </td>
                </tr>
            @endforeach

            <tfoot>
            <tr>
                <th colspan="11">
                    <center>
                        <br>
                        <a href="{{route('courses.create')}}" class="btn btn-dark ">Add New Course</a>

                    </center>
                </th>

            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@else
@section('main-container')
    <div class="table-responsive"  style="overflow-y:scroll;padding-top:100px">
        <table id="myTable" class="table table-striped table-bordered table-sm"  style="width:100%;" style="direction: rtl;text-align:right">
            <thead>
            <tr>
                <th>
                    ????????????
                </th>
                <th>
                    ?????????? ????????????????
                </th>
                <th class="th-sm">
                    ?????????? ??????????????????????
                </th>
                <th class="th-sm">
                    ???????????????? ????????????????
                </th>
                <th class="th-sm">
                   ???????????????? ??????????????????????
                </th>
                <th class="th-sm">
                    ?????? ????????????
                </th>
                <th>
                   ??????????
                </th>
                <th>
                   ????????????
                </th>
                <th colspan="3" >
                    <center>
                       ????????????
                    </center>
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr style="text-align:center">
                    <td>
                        <img src="{{asset('assets/images/courses/'.$category->image.'')}}" alt="" style="width:70px;height:70px">
                    </td>
                    <td>{{$category->name_ar}}</td>
                    <td>{{$category->name_en}}</td>
                    <td>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenterar{{$category->id}}">
                           ??????
                        </button>
                    </td>
                    <td>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenteren{{$category->id}}">
                            ??????
                        </button>
                    </td>
                    <td>
                        {{$category->number_of_lessons}}
                        <br><br>
                        <a class="btn btn-dark" href="{{route('lessons.create',['course_id'=>$category->id])}}">??????</a>
                    </td>


                    <td>{{$category->category_id}}</td>
                    <td>{{$category->chief_id}}</td>

                    <td colspan="3" class="col-sm-12">
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">


                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ????????????
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="btn btn-dark col-sm-12"  href="{{route('courses.edit',['course'=>$category->id])}}">??????????</a>
                                    <form method="post" action="{{route('courses.destroy',['course'=>$category->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-dark col-sm-12" >??????</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach

            <tfoot>
            <tr>
                <th colspan="11">
                    <center>
                        <br>
                        <a href="{{route('courses.create')}}" class="btn btn-dark ">?????????? ???????? ??????????</a>

                    </center>
                </th>

            </tr>
            </tfoot>
        </table>
    </div>

@endsection
@endif
<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

@foreach($categories as $category)

<!-- Modal -->
<div class="modal fade" id="exampleModalCenterar{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="direction:rtl;text-align:right">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$category->details_ar}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenteren{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="direction:ltr;text-align:left">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$category->details_en}}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endforeach
