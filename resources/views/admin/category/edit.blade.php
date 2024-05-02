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
                                    {{-- <h3 class="text-center title-2">Create Your Category</h3> --}}
                                </div>
                                <hr>
                                <form action={{route("editCategory")}} method="post" novalidate="novalidate">
                                 @csrf
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Name</label>
                                        <input type="hidden" name="category_id"  value="{{old("categoryId", $updatableCategory->category_id)}}" >
                                        <input value="{{old("categoryName", $updatableCategory->name)}}"  id="cc-pament" name="categoryName" type="text" class="   form-control" aria-required="true" aria-invalid="false" placeholder="Seafood...">
                                   @error('categoryName')
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
