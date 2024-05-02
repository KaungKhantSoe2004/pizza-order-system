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
                            <h2 class="title-1">Product List</h2>

                        </div>
                    </div>
                    <div class="table-data__tool-right">

                       <a href='{{route("product#createPage")}}'>
                        <button  class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add Products
                        </button>
                       </a>

                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
<button class=" btn btn-danger" onclick={history.back()}>

    Back</button>
{{--
                    @if (session("deleteCategory"))
                    <div class=" col-4 offset-8 alert alert-danger alert-dismissible fade show" role="alert">
                       <strong>
                           <i class="zmdi zmdi-check me-2 text-black"></i>
                          {{session("deleteCategory")}}</strong>
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                   @endif --}}


                     {{-- @if (session("createSuccess"))
                     <div class=" col-4 offset-8 alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>
                            <i class="zmdi zmdi-check me-2 text-danger"></i>
                           {{session("createSuccess")}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif --}}

<div class="  offset-8">
    <form action='{{route("product#list")}}' method="GET">
       <div class=" my-4 d-flex">
        <input type="text" name="key" placeholder=" Search Categories" class=" form-control" value='{{request("key")}}'>
        <button type="submit" class=" btn bg-dark text-white" >
            <i class=" zmdi zmdi-search"></i>
        </button>
       </div>
    </form>
</div>
{{--
@if (request('key')||strlen(request("key")) !==0)
   <h4 class=" my-3">Search Key  :  {{request('key')}}</h4>
@endif --}}

{{-- @if (count($data)!== 0) --}}
{{-- <h3 class=" text-black-50 text-center my-4">
    <i class=" zmdi zmdi-album "></i>
    Total - ( {{$data->total()}} )</h3> --}}
    @if (request("key"))
      <h4 class="text-black my-3">Search Key: {{request("key")}}</h4>
    @endif
    @if (session("created"))
    <div class=" col-5 offset-7 alert alert-primary alert-dismissible fade show" role="alert">
       <strong>
           <i class="zmdi zmdi-check me-2 text-danger"></i>
          {{session("created")}}</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
   @endif

   @if (session("deleted"))
   <div class=" col-5 offset-7 alert alert-danger alert-dismissible fade show" role="alert">
      <strong>
          <i class="zmdi zmdi-check me-2 text-danger"></i>
         {{session("deleted")}}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <h3 class=" text-black-50 text-center my-4">
    <i class=" zmdi zmdi-album "></i>
    Total - ( {{$data->total()}} )</h3>
  <table class=" table table-data2 text-center">

                    <thead class=" bg-black">
                        <tr class="" >
                          <th>img</th>
                          <th>name</th>
                          <th>price</th>
                          <th>waiting time</th>
                          <th>category</th>
                          <th></th>
                        </tr>
                        <tr class="spacer"></tr>
                    </thead>
                    <tbody>
@foreach ($data as $eachProduct)
   <tr class=" col-12 bg-danger border border-solid  mt-3">
    <td class=" col-2" >
     <img style=" height: 130px" src={{asset("storage/".$eachProduct->product_img)}}  alt="">
    </td>
    <td class=" col-2">
{{strtoupper($eachProduct->name)}}
    </td>
    <td class=" col-2">
        {{$eachProduct->price}}
    </td>
    <td class=" col-2">{{$eachProduct->waiting_time}}</td>
    <td class=" col-2">{{$eachProduct->category_name}}</td>

<td class=" col-2">
    <div class="table-data-feature">
        <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
            <i class="zmdi zmdi-mail-send"></i>
        </button>
      <a href="{{route('product#editPage', $eachProduct->product_id)}}">
        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
            <i class="zmdi zmdi-edit"></i>
        </button>
    </a>
        <a href='{{route("product#delete", $eachProduct->product_id)}}'>
        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
            <i class="zmdi zmdi-delete"></i>
        </button>
    </a>
    <a href='{{route("product#detailsPage", $eachProduct->product_id)}}'>
            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                <i class="zmdi zmdi-more"></i>
            </button>
        </a>
    </div>
</td>

   </tr>
@endforeach







                    </tbody>
                </table>
                <div class=" mt-3">
                    {{$data->appends(request()->query())->links()}}
                </div>



                   @if (count($data)===0)
                       <h1 class=" text-center text-secondary mt-5">There is not Products here.</h1>
                   @endif
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
@endsection
