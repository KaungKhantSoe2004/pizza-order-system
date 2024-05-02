@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 offset-8">
                            <a href="{{route('product#list')}}"><button class="btn bg-dark text-white my-3">back</button></a>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Create Your Product</h3>
                                </div>
                                <hr>
                                <form action="{{route('product#edit')}}" enctype="multipart/form-data" method="post" novalidate="novalidate">
                                 @csrf

                                 <input value="{{old("product_id", $data->product_id)}}" type="hidden" class="form-control" name="product_id"  >

                                 <div class="form-group">
<div class=" text-center form-group">
    <img src="{{asset('storage/'.$data->product_img)}}" style=" width: 200px; height: 200px" alt="">
</div>
                                    <label for="cc-payment" class="control-label mb-1">Product Img</label>
<input type="file" class=" form-control @error('productImg') is-invalid  @enderror" name="productImg" placeholder="Enter Product Img">

                               @error('productImg')
                                   <small class=" text-danger">{{$message}}</small>
                               @enderror
                                </div>

                                 <div class="form-group">

                                        <label for="cc-payment" class="control-label mb-1">Name</label>

                                        <input value="{{old('productName', $data->name)}}"  id="cc-pament" name="productName" type="text" class="form-control @error('productName') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="Edit pizza name">
                                   @error('productName')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="cc-payment" class="control-label mb-1">Price</label>

                                        <input  id="cc-pament" value="{{old('productPrice',$data->price)}}" name="productPrice" type="text" class="form-control @error('productPrice') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="Edit pizza price">
                                   @error('productPrice')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="cc-payment" class="control-label mb-1">Waiting Time</label>

                                        <input  id="cc-pament" value="{{old('productWaitingTime', $data->waiting_time)}}" name="productWaitingTime" type="text" class="form-control @error('productWaitingTime') is-invalid  @enderror" aria-required="true" aria-invalid="false" placeholder="Edit pizza waiting time">
                                   @error('productWaitingTime')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>

                                    <div class="form-group">

                                        <label for="cc-payment" class="control-label mb-1">Cateogry</label>

                                       <select class=" form-select" name="categoryId" id="">
                                        <option value="">Choose Cateogry</option>
                                    @foreach ($categoryData as $category)
                                     <option @if ($category->category_id === $data->category_id)
                                        selected
                                     @endif value="{{$category->category_id}}">{{$category->name}}</option>
                                    @endforeach
                                       </select>
                                   @error("categoryId")
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>


                                    <div class="form-group">

                                        <label for="cc-payment" class="control-label mb-1">Description</label>
                                       <textarea class=" form-control" name="productDescription" id="" cols="30" rows="10">{{old("productDescription",$data->description)}}</textarea>
                                   @error('productDescription')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>


                                    <div class="form-group">

                                        <label for="cc-payment" class="control-label mb-1">View Count</label>
                                      <input type="text" name="viewCount" class=" form-control" placeholder="View Count" disabled value="{{old('viewCount',$data->view_count)}}">
                                   @error('viewCount')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>
                                    <div class="form-group">

                                        <label for="cc-payment" class="control-label mb-1">Created At</label>
                                      <input type="text" name="createdAt" class=" form-control" placeholder="Created At" disabled value="{{old('createdAt',$data->created_at->format('d/M/Y'))}}">
                                   @error('createdAt')
                                       <small class=" text-danger">{{$message}}</small>
                                   @enderror
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Update</span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                            <i class="zmdi zmdi-edit"></i>

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
