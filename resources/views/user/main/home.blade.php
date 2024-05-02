@extends('user.layout.master')
@section('context')
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="price-all">
                        <label class="custom-control-label" for="price-all">All Price</label>
                        <span class="badge border font-weight-normal">1000</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-1">
                        <label class="custom-control-label" for="price-1">$0 - $100</label>
                        <span class="badge border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-2">
                        <label class="custom-control-label" for="price-2">$100 - $200</label>
                        <span class="badge border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-3">
                        <label class="custom-control-label" for="price-3">$200 - $300</label>
                        <span class="badge border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="price-4">
                        <label class="custom-control-label" for="price-4">$300 - $400</label>
                        <span class="badge border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" id="price-5">
                        <label class="custom-control-label" for="price-5">$400 - $500</label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                </form>
            </div>
            <!-- Price End -->

            <!-- Category Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Category</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class=" custom-control custom-checkbox  d-flex align-items-center justify-content-between mb-3">
                        {{-- <input type="checkbox" class="custom-control-input" checked id="color-all"> --}}
                        <a  for="price-all" href="{{route('user#home', "all")}}">All Categories  ({{count($categories)}})</a>
                        {{-- <span class="badge border font-weight-normal">1000</span> --}}
                    </div>


                    @foreach ($categories as $category)
                    <div class=" custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        {{-- <input type="text" class="" id='{{$category->category_id}}category' > --}}
                        <a class=" text-black-50" href="{{route('user#home', $category->category_id)}}"  >{{$category->name}}</a>

                    </div>
                    @endforeach

                </form>
            </div>
            <!-- Color End -->

            <!-- Size Start -->
            {{-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by size</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" checked id="size-all">
                        <label class="custom-control-label" for="size-all">All Size</label>
                        <span class="badge border font-weight-normal">1000</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-1">
                        <label class="custom-control-label" for="size-1">XS</label>
                        <span class="badge border font-weight-normal">150</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-2">
                        <label class="custom-control-label" for="size-2">S</label>
                        <span class="badge border font-weight-normal">295</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-3">
                        <label class="custom-control-label" for="size-3">M</label>
                        <span class="badge border font-weight-normal">246</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="size-4">
                        <label class="custom-control-label" for="size-4">L</label>
                        <span class="badge border font-weight-normal">145</span>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-control-input" id="size-5">
                        <label class="custom-control-label" for="size-5">XL</label>
                        <span class="badge border font-weight-normal">168</span>
                    </div>
                </form>
            </div> --}}
            <div class="">
                <button class="btn btn btn-warning w-100">Order</button>
            </div>
            <!-- Size End -->
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12  pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <a href="{{route("cartPage")}}" type="button" class="btn  btn-dark position-relative">
                                <i class="  fs-3 fa fa-cart-plus "></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
{{$total}}
                                  <span class="visually-hidden"></span>
                                </span>

                              </a>
                              <a href="{{route("user#orderPage")}}" type="button" class="btn ms-3 btn-dark position-relative">
                                <i class=" ms-3 fs-3 fa fa-history "></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
{{$orderTotal}}
                                  <span class="visually-hidden"></span>
                                </span>

                              </a>
                            {{-- <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button> --}}
                        </div>
                        <div class="ml-2">
                            <div class="btn-group">
                               <select name="sorting" id="sorting" class="form-control">
               <option value="">Sorting the pizza</option>
                                <option value="desc">Descending</option>
                                <option value="asc">Ascending</option>
                                <option value="popularity">Popularity</option>
                                <option value="Price">Price</option>
                               </select>
                            </div>
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <div class=" row col-12" id="container">

@if ($data->total() === 0)
    <h2 class=" text-center ps-4 my-4 shadow-md">There is no Products</h2>
@endif

                @foreach ($data as $each)
                <a  href="{{route("user#directInfo", $each->product_id)}}" class="">
                    <div class="col-lg-4  col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" style=" height: 300px" src="{{asset('storage/'.$each->product_img)}}" alt="">
                                 <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    {{-- <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a> --}}
                                    <a class="btn btn-outline-dark btn-square" href="{{route("user#directInfo", $each->product_id)}}"><i class="fa fa-info"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{strtoupper($each->name)}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{$each->price}} kyats</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
            <div>
                {{$data->links()}}
            </div>
    </div>
</div>
@endsection
@section('jqueryContext')
<script>
$(document).ready(function(){
$("#sorting").change(function(){
    // console.log($("#sorting").val())
    if($("#sorting").val()=== "desc"){
        $.ajax({
            type: "get",
            url: "/user/jquery/pizza",
            data: {'status': "desc"},
            dataType: "json",
            success: function(response){
                console.log(response);


                $list = '';
             for( $i=0; $i< response.length; $i++){

$list += `
<a href="detail.html" class="">
                    <div class="col-lg-4  col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" style=" height: 300px" src="{{asset('storage/${response[$i].product_img}')}}" alt="">
                                 <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-info"></i></a>

                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name.toUpperCase()}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>${response[$i].price} kyats</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
`;
$("#container").html($list);
             }



            }
        })
    }
    else if($("#sorting").val()=== "asc"){
        $.ajax({
            type: "get",
            url: "/user/jquery/pizza",
            data: {'status': "asc"},
            dataType: "json",
            success: function(response){
                console.log(response);
                $list = '';
             for( $i=0; $i< response.length; $i++){

$list += `
<a href="detail.html" class="">
                    <div class="col-lg-4  col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" style=" height: 300px" src="{{asset('storage/${response[$i].product_img}')}}" alt="">
                                 <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-info"></i></a>

                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5> kyats</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
`;
$("#container").html($list);
             }

            }
        })
    }
})
})

</script>
@endsection
