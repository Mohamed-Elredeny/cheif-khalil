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
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

@if( LaravelLocalization::getCurrentLocaleName() == "English")
@section('main-container')
    <div class="table-responsive"  style="overflow-y:scroll">
        <table id="myTable" class="table table-striped table-bordered table-sm"  style="width:100%;" style="text-align:center">
            <thead>
            <tr>
                <th class="th-sm">
                    Number
                </th>
                <th class="th-sm">
                    Image
                </th>
                <th class="th-sm">
                    Name Arabic
                </th>
                <th class="th-sm">
                     Name English
                </th>
                <th class="th-sm">
                    Description Arabic
                </th>
                <th class="th-sm">
                    Details English
                </th>
                <th class="th-sm">
                   Role Arabic
                </th>
                <th class="th-sm">
                    Role English
                </th>
                <th colspan="3" >
                    <center>
                        Controllers
                    </center>
                </th>

            </tr>
            </thead>
            <tbody>
            <?php $i = 0?>
            @foreach($categories as $category)
                <tr style="text-align:left">
                    <?php $i++ ?>
                    <td>{{$i}}</td>
                    <td><img src="{{asset('assets/images/translate/reviews/'.$category->image)}}" alt="" style="width:70px;height:70px"></td>
                    <td>{{$category->chief_name_ar}}</td>
                    <td>{{$category->chief_name_en}}</td>
                    <td>{{$category->chief_description_ar}}</td>
                    <td>{{$category->chief_description_en}}</td>
                    <th>{{$category->chief_role_ar}}</th>
                    <th>{{$category->chief_role_en}}</th>
                        <td>
                        <center>
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Controllers
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="btn btn-dark col-sm-12" href="{{route('translation.reviews.delete',['category'=>$category->id])}}">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </td>
                </tr>
            @endforeach

            <tfoot>
            <tr>
                <th colspan="9">
                    <center>
                        <br>
                        <a href="{{route('translation.reviews.view_add')}}" class="btn btn-dark ">Add New Review</a>

                    </center>
                </th>

            </tr>
            </tfoot>
        </table>
    </div>
@endsection
@else
@section('main-container')
    <div style="text-align:right;direction:rtl;padding-top: 100px">
        <div class="table-responsive"  style="overflow-y:scroll">
            <table id="myTable" class="table table-striped table-bordered table-sm"  style="width:100%;" style="text-align:center">
                <thead>
                <tr>
                    <th class="th-sm">
                        الرقم
                    </th>
                    <th class="th-sm">
                        الصوره
                    </th>
                    <th class="th-sm">
                        الاسم بالعربية
                    </th>
                    <th class="th-sm">
                        الاسم بالانجليزية
                    </th>
                    <th class="th-sm">
                        التفاصيل بالعربية
                    </th>
                    <th class="th-sm">
                        التفاصيل بالانجليزية
                    </th>
                    <th class="th-sm">
                       الوظيفة بالعربية
                    </th>
                    <th class="th-sm">
                       الوظيفة بالانجليزية
                    </th>
                    <th colspan="3" >
                        <center>
                            التحكم
                        </center>
                    </th>

                </tr>
                </thead>
                <tbody>
                <?php $i = 0?>
                @foreach($categories as $category)
                    <tr style="text-align:left">
                        <?php $i++ ?>
                        <td>{{$i}}</td>
                        <td><img src="{{asset('assets/images/translate/reviews/'.$category->image)}}" alt="" style="width:70px;height:70px"></td>
                        <td>{{$category->chief_name_ar}}</td>
                        <td>{{$category->chief_name_en}}</td>
                        <td>{{$category->chief_description_ar}}</td>
                        <td>{{$category->chief_description_en}}</td>
                        <th>{{$category->chief_role_ar}}</th>
                        <th>{{$category->chief_role_en}}</th>
                        <td>
                            <center>
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            التحكم
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a class="btn btn-dark col-sm-12" href="{{route('translation.reviews.delete',['category'=>$category->id])}}">
                                                حذف
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </td>
                    </tr>
                @endforeach

                <tfoot>
                <tr>
                    <th colspan="9">
                        <center>
                            <br>
                            <a href="{{route('translation.reviews.view_add')}}" class="btn btn-dark ">اضافة تقييم جديد</a>

                        </center>
                    </th>

                </tr>
                </tfoot>
            </table>
        </div>
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
