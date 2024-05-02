@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 offset-8">

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


<form action="{{route('account#edit')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
    @csrf

    <div class=" d-flex  justify-content-center border-solid border-1 border-black imgContainer">
        @if (Auth::user()->user_img === null)
   <img src={{asset("img/account-icon-png-2.jpg")}} style=" width: 70px; height:70px" alt="">
@else
<img src='{{asset("storage/".Auth::user()->user_img)}}'  style=" width: 90px; height:90px"  alt="John Doe" />
@endif
    </div>

    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Edit Profile</label>
        <input  id="cc-pament" type="file" name="profile"  class="@error('profile') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Profile ">
   @error('error')
       <small class=" text-danger">{{$message}}</small>
   @enderror

    </div>

       <div class="form-group">
           <label for="cc-payment" class="control-label mb-1">Edit Name</label>
           <input  id="cc-pament" value="{{old("name", Auth::user()->name)}}" name="name"  class="@error('name') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Account name">
      @error('name')
          <small class=" text-danger">{{$message}}</small>
      @enderror

       </div>

       <div class="form-group">
           <label for="cc-payment" class="control-label mb-1">Edit Email</label>
           <input  id="cc-pament"  value='{{old("email", Auth::user()->email)}}' name="email" class="@error('email') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Your Email">
      @error('email')
          <small class=" text-danger">{{$message}}</small>
      @enderror
       </div>



       <div class="form-group">
        <label for="cc-payment" class="control-label mb-1"> Edit Phone Number</label>
        <input id="cc-pament" name="phone" value='{{old("number", Auth::user()->phone)}}'  class="@error('address') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Your Number">
   @error('phone')
       <small class=" text-danger">{{$message}}</small>
   @enderror

    </div>

    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Edit Address</label>
<textarea name="address" class=" form-control" id="" cols="30" rows="10"> {{old("address", Auth::user()->address)}}</textarea>
   @error('address')
       <small class=" text-danger">{{$message}}</small>
   @enderror

    </div>

    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Role</label>
        <input id="cc-pament" name="role" disabled value='{{old("role", Auth::user()->role)}}' type="text"  class="@error('role') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Your Role">
     </div>

<div class=" form-group">
    <label for="cc-payment" class="control-label mb-1">Gender</label>
    <select name="gender" class=" form-control" id="">

        <option  value="male" @if (Auth::user()->gender === "male")
            selected
        @endif>Male</option>
        <option value="female" @if (Auth::user()->gender==="female")
            selected
        @endif>Female</option>
    </select>
</div>
@error('gender')
<small class=" text-danger">{{$message}}</small>
@enderror

       <div>
           <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
               <span id="payment-button-amount">Save</span>
               <span id="payment-button-sending" style="display:none;">Sending…</span>
               <i class=" zmdi zmdi-edit"></i>
           </button>
       </div>
   </form>

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
