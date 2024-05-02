@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 offset-8">
                            <a href="{{route('product#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Create Your Product</h3>
                                </div>
                                <hr>
                                <form enctype="multipart/form-data" action='{{route("product#create")}}' method="post" novalidate="novalidate">
                                 @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Name</label>
                                        <input value="{{old('productName')}}" id="cc-pament" name="productName" type="text" class="@error('productName') is-invalid  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Pizza Name">
                                   @error('productName')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Price</label>
                                        <input value="{{old('productPrice')}}" id="cc-pament" name="productPrice" type="text" class="@error('productName') is-invalid  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Pizza Price">
                                   @error('productPrice')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Waiting Time</label>
                                        <input value="{{old('waitingTime')}}" id="cc-pament" name="waitingTime" type="text" class="@error('waitingTime') is-invalid  @enderror form-control" aria-required="true" aria-invalid="false" placeholder="Enter pizza Waiting Time">
                                   @error('waitingTime')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Product Img</label>
                                     <input type="file" class=" form-control"   name="productImg">
                                   @error('productImg')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Description</label>
                                      <textarea name="productDescription" id="" cols="20" placeholder="Enter Your pizza description" class=" form-control" rows="10">{{old("productDescription")}}</textarea>
                                   @error('productDescription')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Category</label>
                                      <select class=" form-select" name="productCategory" id="">
                                        <option value="">Choose your category</option>
                                        @foreach ($categories as $eachCategory)
                                            <option value={{$eachCategory->category_id}}>{{$eachCategory->name}}</option>
                                        @endforeach
                                      </select>
                                   @error('productCategory')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>




                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Create</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            <i class="fa-solid fa-circle-right"></i>
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
