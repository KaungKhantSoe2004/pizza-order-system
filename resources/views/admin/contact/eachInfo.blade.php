@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">

                <button class=" mb-4 btn btn-danger" onclick={history.back()}>

                    Back</button>
                <div class="container-fluid ">
                    <div class="row">
                        <div class=" my-2  col-12">
                            @if (session("updateSuccess"))
                            <div class=" col-4 offset-8 alert alert-primary alert-dismissible fade show" role="alert">
                               <strong>
                                   <i class="zmdi zmdi-check me-2 text-danger"></i>
                                  {{session("updateSuccess")}}</strong>
                               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                           @endif
                        </div>
                    </div>
                    <div class=" col-11 col-lg-11 offset-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">{{$data->name}}'s Message </h3>
                                </div>

                                <hr>

<div class=" mt-4" >
<div class=" container">

<div class=" d-flex  justify-content-center border-solid border-1 border-black imgContainer">


</div>
<h4 class=" ms-2  text-black mb-3  mt-2">
    <i class=" me-2 zmdi zmdi-account"></i>
    <span>Name :   </span>
    {{$data->name}}
    </h4>

    {{-- <div class=" my-3 ms-2">
        <button class=" btn  btn-sm bg-warning text-black">
           <i class=" zmdi zmdi-delicious"></i> {{$category}}
        </button>
    </div> --}}

    <div class=" mb-3 ms-2">
        <h4 class="  text-black">
           <i class="me-2 zmdi zmdi-email"></i>
           <span>Email :   </span>
           {{$data->email}}
        </h4>
    </div>
    <div class=" mb-3 ms-2">
        <h4 class=" text-black">
           <i class=" me-2 zmdi zmdi-time"></i>
           <span>Posted At : </span>
           {{$data->created_at->format('j-F-Y')}}
        </h4>
    </div>

    <a href={{route('admin#deleteMail',$data->contact_id)}}>
        <button class=" btn btn-sm btn-danger">Delete</button>
    </a>

                <h4 class="  mt-5  mb-2">
                    <i class=" me-2 zmdi zmdi-mail"></i><span class=" text-black">Message
                </span>
                    </h4>
                    <div class=" mb-4 text-sm text-black">
                     &nbsp;  &nbsp;   &nbsp;   &nbsp;   &nbsp; {{$data->message}}
                    </div>

</div>

</div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
