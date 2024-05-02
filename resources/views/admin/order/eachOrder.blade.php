
@extends('admin.layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="overview-wrap">
                            <h2 class="title-1">Order List</h2>

                        </div>
                    </div>
                    {{-- <div class="table-data__tool-right">

                       <a href='{{route("product#createPage")}}'>
                        <button  class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>add Products
                        </button>
                       </a>

                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            CSV download
                        </button>
                    </div> --}}
                </div>
                <div class="table-responsive table-responsive-data2">
<button class=" mb-4 btn btn-danger" onclick={history.back()}>

    Back</button>


<div class=" p-3 ">

</div>

    {{-- <div class="input-group mb-3 col-4 offset-8"> --}}

      {{-- </div> --}}

{{-- <div class="  offset-8">
    <form action='{{route("product#list")}}' method="GET">
       <div class=" my-4 d-flex">
        <input type="text" name="key" placeholder=" Search Categories" class=" form-control" value='{{request("key")}}'>
        <button type="submit" class=" btn bg-dark text-white" >
            <i class=" zmdi zmdi-search"></i>
        </button>
       </div>
    </form>
</div> --}}
{{--
@if (request('key')||strlen(request("key")) !==0)
   <h4 class=" my-3">Search Key  :  {{request('key')}}</h4>
@endif --}}

{{-- @if (count($data)!== 0) --}}
{{-- <h3 class=" text-black-50 text-center my-4">
    <i class=" zmdi zmdi-album "></i>
    Total - ( {{$data->total()}} )</h3> --}}
    {{-- @if (request("key"))
      <h4 class="text-black my-3">Search Key: {{request("key")}}</h4>
    @endif
    @if (session("created"))
    <div class=" col-5 offset-7 alert alert-primary alert-dismissible fade show" role="alert">
       <strong>
           <i class="zmdi zmdi-check me-2 text-danger"></i>
          {{session("created")}}</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
   @endif --}}

   {{-- @if (session("deleted"))
   <div class=" col-5 offset-7 alert alert-danger alert-dismissible fade show" role="alert">
      <strong>
          <i class="zmdi zmdi-check me-2 text-danger"></i>
         {{session("deleted")}}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif --}}
  {{-- <h3 class=" text-black-50 text-center my-4">
    <i class=" zmdi zmdi-album "></i>
    Total - ( {{$data->total()}} )</h3> --}}

<div class=" col-5 card">
   <div class=" card-body">

    <h4 class=" mb-4">
        <i class=" zmdi zmdi-account"></i> Name:
<span class=" ms-2"> {{$data[0]->name}}</span>
    </h4>

    <h4 class=" mb-4"><i class=" zmdi zmdi-codepen"></i> Code:
        <span class=" ms-2"> {{$data[0]->order_code}}</span></h4>

<h4 class=" mb-4">
    <i class=" zmdi zmdi-calendar"></i> Date:
<span class=" ms-2"> {{$data[0]->created_at->format('j-F-Y')}}</span>
</h4>

<h4 class=" mb-3"><i class=" zmdi zmdi-money"></i> Total:
    <span class=" ms-2"> {{$allTotal}} Kyats</span></h4>
<small class=" text-danger">!Delivery Fees 3000 kyats is already calculated!</small>

</div>
</div>


  <table class=" table table-data2 text-center">

                    <thead class=" bg-black">
                        <tr class="" >
                          <th>Product Img</th>
                          <th>Order ID</th>
                          <th>User Name</th>
                          <th>Product Name</th>
                          <th>Order Date</th>
                          <th>Quantity</th>
                          <th>Amount</th>
                        </tr>
                        <tr class="spacer"></tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $e)

                         <tr class="col-12 bg-danger border border-solid  mt-3">
                            <td>
                                <img src="{{asset('storage/'.$e->product_img)}}" style=" width: 100px; height: 100px" alt="">
                                </td>
                            <td >{{$e->id}}</td>
                        <td>{{$e->name}}</td>

                        <td>{{$e->products_name}}</td>
                        <td>{{$e->created_at}}</td>
                        <td>{{$e->qty}}</td>
                        <td>{{$e->each_total}}</td>
                        </tr>
                        @endforeach
                        {{-- @foreach ($data as $order)
                        <tr class=" col-12 bg-danger border border-solid  mt-3">
<input type="hidden" id="hiddenId" value="{{$order->order_id}}">
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->created_at->format('F-j-Y')}}</td>
                            <td><a href="#" class=" text-decoration-none">{{$order->order_code}}</a></td>
                            <td class="">{{$order->total_price}}</td>
                            <td><select class="form-select statusChange" aria-label="Default select example">
                                <option @if ($order->status == '0')
                                    selected
                                @endif value="0">Pending</option>
                                <option @if ($order->status == '1')
                                    selected
                                @endif value="1">Accept</option>
                                <option
                                @if ($order->status == '2')
                                    selected
                                @endif
                                value="2">Reject</option>
                              </select>
                              </td>
                            <td></td>
                        </tr>
                        @endforeach --}}








                    </tbody>
                </table>





                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
@endsection



