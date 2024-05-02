{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 class=" text-danger"> This is list Page.</h1>
     <form action={{route("logout")}} method="POST">
    @csrf
    <input type="submit" name="logout" value=" Log Out"/>
    </form>
</body>
</html> --}}
@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">Admin List</h2>

                        </div>
                    </div>
                    <div class="table-data__tool-right">

                       <a href='{{route("category#createPage")}}'>
                        <button  class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add admin
                        </button>
                       </a>

                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">


                    @if (session("accountDeleted"))
                    <div class=" col-4 offset-8 alert alert-danger alert-dismissible fade show" role="alert">
                       <strong>
                           <i class="zmdi zmdi-check me-2 text-black"></i>
                          {{session("accountDeleted")}}</strong>
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                   @endif


                     @if (session("notAvilable"))
                     <div class=" col-4 offset-8 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>
                            <i class="zmdi zmdi-check me-2 text-danger"></i>
                           {{session("notAvilable")}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif

<div class="  offset-8">
    <form action='{{route("account#list")}}' method="GET">
       <div class=" my-4 d-flex">
        <input type="text" name="key" placeholder=" Search Admins" class=" form-control" value='{{request("key")}}'>
        <button type="submit" class=" btn bg-dark text-white" >
            <i class=" zmdi zmdi-search"></i>
        </button>
       </div>
    </form>
</div>

@if (request('key')||strlen(request("key")) !==0)
   <h4 class=" my-3">Search Key  :  {{request('key')}}</h4>
@endif

{{-- @if (count($data)!== 0) --}}
<h3 class=" text-black-50 text-center my-4">
    <i class=" zmdi zmdi-album "></i>
    Total - ( {{$data->total()}} )</h3>
                   <table class=" text-center table table-data2">

                    <thead class=" bg-black">
                        <tr class=" bg-black" >
                          <th>Image</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Gender</th>
                          <th>Phone</th>
                          <th>Address</th>
<th></th>
                          <th></th>
                        </tr>
                        <tr class="spacer"></tr>
                    </thead>
                    <tbody>


@foreach ($data as $admin)
    <tr class=" border-bottom  border-solid ">
        <td class="  col-2">
       @if ($admin->user_img === null)
       <img src="{{asset('img/account-icon-png-2.jpg')}}"  style=" width: 150px; height:150px" alt="">
       @else
       <img src="{{asset('storage/'.$admin->user_img)}}"  style=" width: 150px; height:150px" alt="">
       @endif
        </td>
        <td class=" col-2">
        {{$admin->name}}
        </td>
        <td class=" col-2">
            {{$admin->email}}
            </td>
            <td class=" col-1">
                {{$admin->gender}}
                </td>
                <td class=" col-1">
                    {{$admin->phone}}
                    </td>
                    <td class=" col-2">
                        {{$admin->address}}
                    </td>

<td>
    @if ($admin->id !== Auth::user()->id)
    <input type="hidden" id="hiddenId" value="{{$admin->id}}">
       <button class=" btn btn-sm btn-dark demoteBtn">Demote</button>
   @endif
</td>

                    <td class=" ">
                        <span class="  table-data-feature">

                          @if ($admin->id !== Auth::user()->id)
                          <a href="{{route('account#delete', $admin->id)}}">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </a>
                          @endif
                        </span>

                    </td>
    </tr>
@endforeach



                    </tbody>
                </table>
<div class=" mt-3">
    {{$data->appends(request()->query())->links()}}
</div>

                   {{-- @endif --}}
                   @if (count($data)===0)
                       <h1 class=" text-center text-secondary mt-5">There is not Admins here.</h1>
                   @endif
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
@endsection


@section('jqueryContext')
<script>
    $(document).ready(function(){
$('.demoteBtn').click(function(){
    let id = $(this).parents('tr').find('#hiddenId').val();
    console.log(id);
 $.ajax({
    type:"get",
    url:"/password/account/adminDemote",
    data:{
id
    },
    dataType:"json",
    success: function(response){
       window.location.reload();
    }
 })
})
    })
</script>
@endsection
