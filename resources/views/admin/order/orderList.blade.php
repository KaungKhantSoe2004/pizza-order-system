
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
<button class=" btn btn-danger" onclick={history.back()}>

    Back</button>


    {{-- <div class="input-group mb-3 col-4 offset-8"> --}}
      <form action="{{route('order#orderListPage')}}" class=" input-group mb-3 col-4 offset-8" method="GET">

        <select class="custom-select" name="status" id="inputGroupSelect02">
            <option value="all" @if (request('status')=== "all")
             selected
            @endif>All</option>
            <option
            @if (request('status')=== "0")
             selected
            @endif
            value=0>Pending</option>
            <option
            @if (request('status')=== "1")
             selected
            @endif
            value=1>Success</option>
            <option
            @if (request('status')=== "2")
             selected
            @endif
            value=2>Reject</option>
          </select>
          <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">
          <input type="submit" value="Filter">
          </label>
          </div>
      </form>
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
    @endif --}}
    @if (session("created"))
    <div class=" col-5 offset-7 alert alert-primary alert-dismissible fade show" role="alert">
       <strong>
           <i class="zmdi zmdi-check me-2 text-danger"></i>
          {{session("created")}}</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
   @endif

   @if (session("deleted"))
   <div class=" col-5 offset-7 alert alert-danger alert-dismissible fade show" role="alert">
      <strong>
          <i class="zmdi zmdi-check me-2 text-danger"></i>
         {{session("deleted")}}</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <h3 class=" text-black-50 text-center my-4">
    <i class=" zmdi zmdi-album "></i>
    Total - ( {{$data->total()}} )</h3>
  <table class=" table table-data2 text-center">

                    <thead class=" bg-black">
                        <tr class="" >
                          <th>Order ID</th>
                          <th>User Name</th>
                          <th>Order Date</th>
                          <th>Order Code</th>
                          <th>Amount</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                        <tr class="spacer"></tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $order)
                        <tr class=" col-12  border border-solid  mt-3">
<input type="hidden" id="hiddenId" value="{{$order->order_id}}">
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->created_at->format('j-F-Y')}}</td>
                            <td><a href="{{route('order#eachOrderPage', [$order->order_code,$order->total_price])}}" class=" text-decoration-none">{{$order->order_code}}</a></td>
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
                        @endforeach








                    </tbody>
                </table>
                <div class=" mt-3">
                    {{$data->appends(request()->query())->links()}}
                </div>



                   @if (count($data)===0)
                       <h1 class=" text-center text-secondary mt-5">There is no Orders here.</h1>
                   @endif
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
</div>
@endsection


@section('jqueryContext')
    <script>
        $(document).ready(function(){
$('.statusChange').change(function(){
    orderId = $(this).parents('tr').find('#hiddenId').val();
    status = $(this).val();
 $.ajax({
    type: 'get',
    url: "/password/order/jquery/changeStatus",
    data: {
        orderId,
status
    },
    dataType: "json",
    success: function(response){
        console.log(response)
    }
 })
})
        })
    </script>
@endsection
