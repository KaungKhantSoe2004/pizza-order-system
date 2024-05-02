@extends('user.layout.master')
@section('context')



<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 offset-2 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Date</th>
                        <th>Order Id</th>
                        <th>Order Code</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
@foreach ($orders as $eachOrder)
    <tr>
      <td>{{date("M/j/Y", strtotime($eachOrder->created_at))}}
      </td>
      <td id="orderId">{{$eachOrder->order_id}}</td>
      <td>{{$eachOrder->order_code}}</td>
      <td>{{$eachOrder->total_price}}</td>
      <td>
        @if ($eachOrder->status === 0)
          <div class=" text-warning">
            <i class=" fa fa-clock"></i>
            Pending....</div>
        @elseif($eachOrder->status === 1)
<div class=" text-success">
    <i class=" fa fa-flag"></i>
    Success</div>
@elseif($eachOrder->status=== 2)
<div class=" text-danger">
    <i class=" fa fa-info-circle"></i>
    Rejected</div>
        @endif
      </td>
      <td>
        <button id="deleteOrder" class=" btn btn-danger">
            <i class=" fas fa-trash "></i>
        </button>
      </td>
    </tr>
@endforeach
                </tbody>
            </table>
            <div class=" mt-4" >
                {{$orders->links()}}
            </div>
        </div>

    </div>
</div>
<!-- Cart End -->

@endsection
@section('jqueryContext')
   <script>
    $(document).ready(function(){
      $("#deleteOrder").click(function(){
let id = $(this).parents('tr').find("#orderId").text() *1;
$.ajax({
    type:"get",
    url:"/user/jquery/deleteOrder",
    data:{
        id
    },
    dataType:"json",
    success: function(response){
console.log(response)
window.location.reload()
    }

})
      })
    })
    </script>
@endsection

