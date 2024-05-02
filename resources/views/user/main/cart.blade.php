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
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                @foreach ($data as $each)
                <tr>
                    <input type="hidden" id="cartId" value="{{$each->cart_id}}">
                    <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;">{{$each->name}}</td>
                    <td class="align-middle">{{$each->price}} kyats</td>
                    <input type="hidden" value="{{$each->price}}" id="hiddenPrice">
                    <input type="hidden" id="hiddenProduct" value="{{$each->product_id}}">
                    <td class="align-middle">
                        <div class="input-group quantity mx-auto" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary btn-minus" >
                                <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" id="qty" value="{{$each->qty}}">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </td>
                    <input type="hidden" id="miniTotal" value="{{$each->qty * $each->price}}">
                    <td class="align-middle" id="total">{{$each->qty * $each->price}} kyats</td>
                    <td class="align-middle"><button class="btn btn-sm removeBtn btn-danger"><i class="fa fa-times"></i></button></td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <input type="hidden" id="summary" value="{{$total}}">
                        <h6 id="subTotal">{{$total }}Kyats</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">3000 kyats</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 id="allTotal">{{$total + 3000}} kyats</h5>
                    </div>

                    <button class="btn btn-block btn-primary font-weight-bold my-3 py-3 order-btn">Order</button>
                    <button class="btn btn-block btn-danger font-weight-bold my-3 py-3 clear-btn">Clear Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->

@endsection

@section('jqueryContext')
  <script>

    $(document).ready(function(){
$('.btn-plus').click(function(){
    let parents = $(this).parents("tr");
let qty = parents.find('#qty');
let price = parents.find('#hiddenPrice').val();
let totaNode = parents.find('#total');
let immaTotalPrice = Number(Number(qty.val()) * Number(price) ) ;


totaNode.html(immaTotalPrice + "kyats");
let summary = Number($('#summary').val());

sum = summary + Number(price);
$("#summary").val(sum);
console.log($('#summary').val())
$('#subTotal').html(sum + "kyats");
$("#allTotal").html(sum+ 3000 +"kyats")
})

$('.btn-minus').click(function(){
    let parents = $(this).parents("tr");

let qty = parents.find('#qty');
let price = parents.find('#hiddenPrice').val();
let totaNode = parents.find('#total');
let summary = Number($("#summary").val());

min = summary - Number(price);
console.log(min, "is min")
$("#summary").val(min);
console.log($('#summary').val())

totaNode.html(Number(qty.val()) * Number(price) + "kyats" );
$('#subTotal').html(min + "kyats");
$("#allTotal").html(min+ 3000 +"kyats")
})


$(".removeBtn").click(function(){
    let total = Number( $(this).parents('tr').find("#miniTotal").val());
    $(this).parents('tr').remove();
    let summary = Number($('#summary').val());
    console.log(summary, total)
    let sum = summary - total;
    $('#subTotal').html(sum + "kyats");
$("#allTotal").html(sum+ 3000 +"kyats");
$("#summary").val(sum);
  cart_id =   $(this).parents('tr').find("#cartId").val();
  $.ajax({
    type: "get",
    url: "/user/jquery/eachCartRemove",
    data: {cart_id : cart_id},
    dataType: "json",
    success: function(response){
        console.log(response)
    }
  })
})


$(".order-btn").click(function(){
    let orderCode =Math.floor(Math.random() * 1000001) ;
    let arr = [];
$("table tbody tr").each(function(index, row){
 let eachTotal = $(row).find("#total").html().replace("kyats", "");
let qty =$(row).find("#qty").val();
let productId = $(row).find('#hiddenProduct').val();
arr.push({
 "order_code":orderCode,
   "each_total": eachTotal,
  "qty":qty,
  "product_id":productId
})

})
const obj =Object.assign({},arr);

$.ajax({
    type: 'get',
    url: "/user/jquery/order",
    data: obj,
    dataType: "json",
    success: function(response){
if(response.status === "true"){
    window.location.href = 'http://127.0.0.1:8000/user/home';
}
    }
})
console.log(obj);
})


$('.clear-btn').click(function(){
$('tbody tr').remove();
$("#summary").val(0);
$("#subTotal").html("0 Kyat");
$('#allTotal').html("3000 kyats");
$.ajax({
    type: "get",
    url: "/user/jquery/clearCart",
dataType: "json",
success: function(response){
    console.log(response)
}
})
})

    })
    </script>
@endsection
