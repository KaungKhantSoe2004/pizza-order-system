@extends('user.layout.master')
@section('context')
<h2 class=" my-4 text-center">Change Your Password</h2>
<div class="d-flex justify-content-center  container">

    <form action={{route("user#changePassword")}} class=" col-5" method="post" novalidate="novalidate">
        @csrf
           <div class="form-group">
               <label for="cc-payment" class="control-label mb-1">Old Password</label>
               <input  id="cc-pament" name="oldPassword" type="password" class="@error('oldPassword') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Old Password">
          @error('oldPassword')
              <small class=" text-danger">{{$message}}</small>
          @enderror
          @if (session("passwordDifferent"))
          <small class=" text-danger">{{session("passwordDifferent")}}</small>
       @endif
           </div>

           <div class="form-group">
               <label for="cc-payment" class="control-label mb-1">New Password</label>
               <input  id="cc-pament" name="newPassword" type="password" class="@error('newPassword') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="New Password">
          @error('newPassword')
              <small class=" text-danger">{{$message}}</small>
          @enderror
           </div>

           <div class="form-group">
               <label for="cc-payment" class="control-label mb-1">Confirm Password</label>
               <input id="cc-pament" name="confirmPassword" type="password" class="@error('confirmPassword') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Confirm New Passoword">
          @error('confirmPassword')
              <small class=" text-danger">{{$message}}</small>
          @enderror

           </div>

           <div>
               <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                   <span id="payment-button-amount">Create</span>
                   <span id="payment-button-sending" style="display:none;">Sending…</span>
                   <i class=" zmdi zmdi-key"></i>
               </button>
           </div>
       </form>

</div>

@endsection
