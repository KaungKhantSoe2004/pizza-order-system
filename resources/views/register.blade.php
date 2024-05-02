@extends('layouts.master')
@section('authenication')
<div class="login-form   " style="margin-bottom: 40px">
    <form action='{{route("register")}}' method='post'>
        @csrf
        <div class="form-group">
            <label>Username</label>
            <input class="au-input au-input--full" type="text" value="{{old('name')}}" name="name" placeholder="Username">
        </div>
     @error('name')
         <small class=" text-danger">{{$message}}</small>
     @enderror
        <div class="form-group">
            <label>Email Address</label>
            <input class="au-input au-input--full" type="email" value="{{old('email')}}" name="email" placeholder="Email">
        </div>
        @error('email')
        <small class=" text-danger">{{$message}}</small>
    @enderror
        <div class="form-group">
            <label>Address</label>
            <input class="au-input au-input--full" type='text' value="{{old('address')}}" name="address" placeholder="Useraddress">
        </div>
        @error('address')
        <small class=" text-danger">{{$message}}</small>
    @enderror
        <div class="form-group">
            <label>Phone</label>
            <input class="au-input au-input--full" type="text" value="{{old('phone')}}" name="phone" placeholder="Userphone">
        </div>
        @error('phone')
        <small class=" text-danger">{{$message}}</small>
    @enderror


    <div class="form-group form-select">
        <label>Gender</label>
        <select  name="gender" id="">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
                </div>
                @error('gender')
                <small class=" text-danger">{{$message}}</small>
            @enderror

        <div class="form-group form-select">
            <label>Password</label>
            <input class="au-input au-input--full " type="password" name="password" placeholder="Password">
        </div>
        @error('password')
        <small class=" text-danger">{{$message}}</small>
    @enderror
        <div class="form-group">
            <label>Password</label>
            <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Confirm Password">
        </div>
        @error('password_confirmation')
        <small class=" text-danger">{{$message}}</small>
    @enderror
        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>

    </form>
    <div class="register-link">
        <p>
            Already have account?
            <a href={{route("auth#loginPage") }}>Sign In</a>
        </p>
    </div>
</div>
@endsection
