@extends('user.layout.master')
@section('context')


<div class="main-content shadow-lg">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">


                <div class="container-fluid">
                    <div class="row">
                        <div class=" my-2  col-12">
                            @if (session("updateSuccess"))
                            <div class=" col-4 offset-8 alert alert-primary alert-dismissible fade show" role="alert">
                               <strong>
                                   <i class=" fa fa-check me-2 text-danger"></i>
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
                                    <h3 class="text-center title-2">{{Auth::user()->name}}'s Account Info</h3>
                                </div>
                                <hr>

<div class=" mt-4" >
<div class=" container">

<div class=" d-flex  justify-content-center border-solid border-1 border-black imgContainer">
    @if (Auth::user()->user_img === null)
   <img src={{asset("img/account-icon-png-2.jpg")}} style=" width: 90px; height:90px" alt="">
@else
<img src='{{asset("storage/".Auth::user()->user_img)}}'  style=" width: 90px; height:90px"  alt="John Doe" />
@endif
</div>
<h5 class="  my-3 offset-3">
    <i class=" me-2 zmdi zmdi-present-to-all"></i><span class=" text-black-50">Name  : {{Auth::user()->name}}
</span>
    </h5>
    <h5 class="  my-3 offset-3">
        <i class=" me-2 zmdi zmdi-email "></i><span class=" text-black-50">Email  : {{Auth::user()->email}}
    </span>
        </h5>
        <h5 class="  my-3 offset-3">
            <i class=" me-2 zmdi zmdi-map"></i><span class=" text-black-50">Address : {{Auth::user()->address}}
        </span>
            </h5>
            <h5 class="  my-3 offset-3">
                <i class=" me-2 zmdi zmdi-phone-in-talk"></i><span class=" text-black-50">Number  : {{Auth::user()->phone}}
            </span>
                </h5>
                <h5 class="  my-3 offset-3">
                    <i class=" me-2 zmdi zmdi-map"></i><span class=" text-black-50">Created at : {{Auth::user()->created_at->format("Z/M/Y")}}
                </span>
                    </h5>
               <div class=" col-12 d-flex justify-content-center text-center">
                <div  class=" col-3 btn btn-sm btn-dark text-center">
                    <a href={{route("user#editProfilePage")}} class=" text-decoration-none text-white"><button class=" btn btn-sm bg-black text-white">Edit Profile</button></a>

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
</div>



@endsection
