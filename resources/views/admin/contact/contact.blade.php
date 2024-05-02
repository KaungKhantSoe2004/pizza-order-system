
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
                            <h2 class="title-1">Mails List</h2>

                        </div>
                    </div>
                    <div class="table-data__tool-right">

                       {{-- <a href='{{route("category#createPage")}}'>
                        <button  class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add category
                        </button>
                       </a> --}}
{{--
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button> --}}
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">


                    @if (session("deleteSuccess"))
                    <div class=" col-4 offset-8 alert alert-danger alert-dismissible fade show" role="alert">
                       <strong>
                           <i class="zmdi zmdi-check me-2 text-black"></i>
                          {{session("deleteSuccess")}}</strong>
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                   @endif


                     {{-- @if (session("createSuccess"))
                     <div class=" col-4 offset-8 alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>
                            <i class="zmdi zmdi-check me-2 text-danger"></i>
                           {{session("createSuccess")}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif --}}

<div class="  offset-8">
    <form action='{{route("admin#mailListPage")}}' method="GET">
       <div class=" my-4 d-flex">
        <input type="text" name="key" placeholder=" Search Mails" class=" form-control" value='{{request("key")}}'>
        <button type="submit" class=" btn bg-dark text-white" >
            <i class=" zmdi zmdi-search"></i>
        </button>
       </div>
    </form>
</div>

{{-- @if (request('key')||strlen(request("key")) !==0)
   <h4 class=" my-3">Search Key  :  {{request('key')}}</h4>
@endif --}}

@if (count($data)!== 0)
<h3 class=" text-black-50 text-center my-4">
    <i class=" zmdi zmdi-album "></i>
    Total - ( {{$data->total()}} )</h3>
                   <table class=" text-center table table-data2">

                    <thead class=" bg-black">
                        <tr class=" bg-black" >
                          <th>id</th>
                          <th> Name</th>
                          <th> Email</th>
                          <th>Message</th>
                          <th>Posted at</th>
                          <th></th>
                        </tr>
                        <tr class="spacer"></tr>
                    </thead>
                    <tbody>

@foreach ($data as $c)
   <tr class=" ">
<td>{{$c->contact_id}}</td>
<td>{{$c->name}}</td>
<td>{{$c->email}}</td>
<td>{{Str::of($c->message)->limit(30)}}</td>
<td>{{$c->created_at->format('j-F-Y')}}</td>
<td>


    <div class="table-data-feature">


        <a href={{route('admin#deleteMail',$c->contact_id)}}>
        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
            <i class="zmdi zmdi-delete"></i>
        </button>
    </a>
   <a href="{{route("admin#contactInfo",$c->contact_id)}}">
    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
        <i class="zmdi zmdi-more"></i>
    </button>
</a>
    </div>
    </td>
</tr>
@endforeach

                       {{-- @foreach ($data as $eachCategory)
                       <tr class="">
                        <td>{{$eachCategory->category_id}}</td>
                        <td>
                            <span class="block-email">{{strtoupper($eachCategory->name)}}</span>
                        </td>

                        <td>{{date("d-m-Y", strtotime($eachCategory->created_at))}}</td>
<td>


<div class="table-data-feature">
    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
        <i class="zmdi zmdi-mail-send"></i>
    </button>
  <a href={{route("editCategoryPage", $eachCategory->category_id)}}>
    <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
        <i class="zmdi zmdi-edit"></i>
    </button>
</a>
    <a href={{route('deleteCategory', $eachCategory->category_id)}}>
    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
        <i class="zmdi zmdi-delete"></i>
    </button>
</a>
    <button class="item" data-toggle="tooltip" data-placement="top" title="More">
        <i class="zmdi zmdi-more"></i>
    </button>
</div>
</td>

                    </tr>
                    <tr class="spacer"></tr>
                       @endforeach --}}

                    </tbody>
                </table>
<div class=" mt-3">
    {{$data->appends(request()->query())->links()}}
</div>

                   @endif
                   @if (count($data)===0)
                       <h1 class=" text-center text-secondary mt-5">There is not Mails here.</h1>
                   @endif
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
@endsection
