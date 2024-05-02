@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 offset-8">
                            <a href="{{route('category#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Change Your Passowrd</h3>
                                </div>
                                <hr>
                                <form action={{route("changePassword")}} method="post" novalidate="novalidate">
                                 @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Old Password</label>
                                        <input  id="cc-pament" name="oldPassword" type="password" class="@error('oldPassword') 'is-invalid'  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Old Passowrd">
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
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
