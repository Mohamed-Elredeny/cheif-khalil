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
    <div class="table-responsive"  style="overflow-y:scroll">
        <table id="myTable" class="table table-striped table-bordered table-sm"  style="width:100%;" style="text-align:center">
            <thead>
            <tr>
                <th>
                    image
                </th>
                <th class="th-sm">
                    First Name
                </th>
                <th class="th-sm">
                    Last Name
                </th>
                <th class="th-sm">
                    Email
                </th>
                <th class="th-sm">
                    Phone
                </th>
                <th>
                    Gender
                </th>
                <th>
                    State
                </th>

                <th >
                    <center>
                        Controllers
                    </center>
                </th>

            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            @foreach($categories as $category)
                <tr style="text-align:center">
                    <td>
                        <img src="{{asset('assets/images/chiefs/'.$category->image.'')}}" alt="" style="width:70px;height:70px">
                    </td>
                    <td>{{$category->fname}}</td>
                    <td>{{$category->lname}}</td>
                    <td>{{$category->email}}</td>
                    <td>{{$category->phone}}</td>
                    <td>{{$category->gender}}</td>
                    <td >
                        @if($category->state == 0)
                            <div class="col-sm-12">
                                Refused
                            </div>
                            <div class="col-sm-12">
                                <form action="{{route('chiefs.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="1">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-success" value="Accept">
                                </form>
                            </div>
                        @elseif($category->state == 1)
                            <div class="col-sm-12">
                                <h6>
                                    Accepted
                                </h6>
                            </div>
                            <div class="col-sm-12">
                                <form action="{{route('chiefs.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="0">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-danger" value="Refuse">
                                </form>
                            </div>
                        @else
                            <div class="col-sm-12">
                                <h6>
                                    Pending
                                </h6>

                            </div>

                            <div class="col-sm-6">
                                <form action="{{route('chiefs.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="1">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-success" value="Accept">
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{route('chiefs.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="0">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-danger" value="Refuse">
                                </form>
                            </div>


                        @endif
                    </td>

                    <!-- Change States -->

                    <!-- End of States -->

                    <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Controllers
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="btn btn-dark col-sm-12" href="{{route('chiefs.show',['chief'=>$category->id])}}">Show</a>
                                        <a class="btn btn-dark col-sm-12"  href="{{route('chiefs.edit',['chief'=>$category->id])}}">Edit</a>
                                        <form method="post" action="{{route('chiefs.destroy',['chief'=>$category->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark col-sm-12" >Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </td>


                    <?$i++?>
                </tr>
            @endforeach
            <tfoot>
            <tr>
                <th colspan="11">
                    <center>
                        <br>
                        <a href="{{route('chiefs.create')}}" class="btn btn-dark ">Add New Chief</a>
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
                <th class="th-sm">
                   ?????????? ??????????
                </th>
                <th class="th-sm">
                    ?????????? ????????????
                </th>
                <th class="th-sm">
                    ???????????? ????????????????????
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

                <th >
                    <center>
                        ????????????
                    </center>
                </th>

            </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            @foreach($categories as $category)
                <tr style="text-align:center">
                    <td>
                        <img src="{{asset('assets/images/chiefs/'.$category->image.'')}}" alt="" style="width:70px;height:70px">
                    </td>
                    <td>{{$category->fname}}</td>
                    <td>{{$category->lname}}</td>
                    <td>{{$category->email}}</td>
                    <td>{{$category->phone}}</td>
                    <td>{{$category->gender}}</td>
                    <td >
                        @if($category->state == 0)
                            <div class="col-sm-12">
                                ??????????
                            </div>
                            <div class="col-sm-12">
                                <form action="{{route('users.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="1">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-success" value="????????">
                                </form>
                            </div>
                        @elseif($category->state == 1)
                            <div class="col-sm-12">
                                <h6>
                                    ??????????
                                </h6>
                            </div>
                            <div class="col-sm-12">
                                <form action="{{route('chiefs.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="0">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-danger" value="??????">
                                </form>
                            </div>
                        @else
                            <div class="col-sm-12">
                                <h6>
                                    ?????? ????????????????
                                </h6>

                            </div>

                            <div class="col-sm-6">
                                <form action="{{route('chiefs.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="1">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-success" value="????????" style="width:70px">
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{route('chiefs.state')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="state" value="0">
                                    <input type="hidden" name="userId" value="{{$category->id}}">
                                    <input type="submit" class="btn btn-danger" value="??????" style="width:70px">
                                </form>
                            </div>


                        @endif
                    </td>

                    <!-- Change States -->

                    <!-- End of States -->

                    <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        ????????????
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="btn btn-dark col-sm-12" href="{{route('chiefs.show',['chief'=>$category->id])}}">??????</a>
                                        <a class="btn btn-dark col-sm-12"  href="{{route('chiefs.edit',['chief'=>$category->id])}}">??????????</a>
                                        <form method="post" action="{{route('chiefs.destroy',['chief'=>$category->id])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-dark col-sm-12" >??????</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </td>


                    <?$i++?>
                </tr>
            @endforeach
            <tfoot>
            <tr>
                <th colspan="11">
                    <center>
                        <br>
                        <a href="{{route('chiefs.create')}}" class="btn btn-dark ">?????????? ???????? ????????</a>
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
