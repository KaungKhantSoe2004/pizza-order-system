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
                                    <h3 class="text-center title-2"> {{$data->name}}'s' Account Info</h3>
                                </div>
                                <hr>

<div class=" mt-4" >
<div class=" container">


<form action="{{route('admin#updateUserAccount')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
    @csrf
<input type="hidden" name="hiddenId" value="{{$data->id}}">
    <div class=" d-flex  justify-content-center border-solid border-1 border-black imgContainer">
        @if ($data->user_img === null)
   <img src={{asset("img/account-icon-png-2.jpg")}} style=" width: 70px; height:70px" alt="">
@else
<img src='{{asset("storage/".$data->user_img)}}'  style=" width: 90px; height:90px"  alt="John Doe" />
@endif
    </div>

    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Edit User Profile</label>
        <input  id="cc-pament" type="file" name="profile"  class="@error('profile') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Profile ">
   @error('profile')
       <small class=" text-danger">{{$message}}</small>
   @enderror

    </div>

       <div class="form-group">
           <label for="cc-payment" class="control-label mb-1">Edit Name</label>
           <input  id="cc-pament" value="{{old("name", $data->name)}}" name="name"  class="@error('name') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Account name">
      @error('name')
          <small class=" text-danger">{{$message}}</small>
      @enderror

       </div>

       <div class="form-group">
           <label for="cc-payment" class="control-label mb-1">Edit Email</label>
           <input  id="cc-pament"  value='{{old("email", $data->email)}}' name="email" class="@error('email') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Your Email">
      @error('email')
          <small class=" text-danger">{{$message}}</small>
      @enderror
       </div>



       <div class="form-group">
        <label for="cc-payment" class="control-label mb-1"> Edit Phone Number</label>
        <input id="cc-pament" name="phone" value='{{old("number", $data->phone)}}'  class="@error('address') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Your Number">
   @error('phone')
       <small class=" text-danger">{{$message}}</small>
   @enderror

    </div>

    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Edit Address</label>
<textarea name="address" class=" form-control" id="" cols="30" rows="10"> {{old("address", $data->address)}}</textarea>
   @error('address')
       <small class=" text-danger">{{$message}}</small>
   @enderror

    </div>

    <div class="form-group">
        <label for="cc-payment" class="control-label mb-1">Role</label>
        <input id="cc-pament" name="role" disabled value='{{old("role", $data->role)}}' type="text"  class="@error('role') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Your Role">
     </div>

<div class=" form-group">
    <label for="cc-payment" class="control-label mb-1">Gender</label>
    <select name="gender" class=" form-control" id="">

        <option  value="male" @if ($data->gender === "male")
            selected
        @endif>Male</option>
        <option value="female" @if ($data->gender==="female")
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
