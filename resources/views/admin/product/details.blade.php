@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">


                <div class="container-fluid">
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
                    <div class="col-lg-6 offset-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2"> Details Page</h3>
                                </div>
                                <hr>

<div class=" mt-4" >
<div class=" container">

<div class=" d-flex  justify-content-center border-solid border-1 border-black imgContainer">

<img src='{{asset("storage/".$data->product_img)}}'  style=" width: 200px; height:200px"  alt="John Doe" />

</div>
<h4 class=" text-center text-white mb-3  mt-2">
    <i class=" me-2 zmdi zmdi-present-to-all"></i><span class=" fs-6 text-black"> {{strtoupper($data->name)}}
</span>
    </h4>

    <div class=" my-3 ms-2">
        <button class=" btn  btn-sm bg-warning text-black">
           <i class=" zmdi zmdi-delicious"></i> {{$category}}
        </button>
    </div>

    <span class=" ms-2">
        <button class=" btn  btn-sm bg-black text-white">
           <i class=" zmdi zmdi-money"></i> {{$data->price}} kyats
        </button>
    </span>
    <span class=" ms-2">
        <button class=" btn btn-sm bg-black text-white">
           <i class=" zmdi zmdi-time"></i> {{$data->waiting_time}} min
        </button>
    </span>
    <span class=" ms-2">
        <button class=" btn  btn-sm bg-black text-white">
           <i class=" zmdi zmdi-eye"></i> {{$data->view_count}} views
        </button>
    </span>

                <h4 class="  mt-5  mb-2">
                    <i class=" me-2 zmdi zmdi-label"></i><span class=" text-black">Description
                </span>
                    </h4>
                    <div class=" mb-4 text-sm text-black">
                     &nbsp;  &nbsp;   &nbsp;   &nbsp;   &nbsp; {{$data->description}}
                    </div>
                <div href="#" class=" text-center">
                    <a href={{route("product#editPage", $data->product_id)}} class=" text-decoration-none text-white"><button class=" btn bg-black text-white">Edit Product</button></a>

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
