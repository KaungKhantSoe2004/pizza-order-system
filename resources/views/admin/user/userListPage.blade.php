
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
                            <h2 class="title-1">Users List</h2>

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
<button class=" btn btn-danger mb-4" onclick={history.back()}>

    Back</button>


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
    @endif --}}

  {{-- <h3 class=" text-black-50 text-center my-4">
    <i class=" zmdi zmdi-album "></i>
    Total - ( {{$data->total()}} )</h3> --}}
  <table class=" table table-data2 text-center">

                    <thead class=" bg-black">
                        <tr class="" >
                          <th class=" col-3"> Img</th>
                          {{-- <th class=" col-1"> ID</th> --}}
                          <th class=" col-1"> Name</th>
                          <th class=" col-2"> Email</th>
                          <th class=" col-1">Phone</th>
                          <th class=" col-1">Address</th>
                          <th class=" col-1">Gender</th>
                          {{-- <th>Role</th> --}}
<th></th>
                        </tr>
                        <tr class="spacer"></tr>
                    </thead>
                    <tbody class=" col-12">
                        @foreach ($data as $user)
                        <tr class=" col-12 bg-danger border border-solid  mt-3">
                        <td class=" col-3">
                            @if ($user->user_img === null)
                            <img src={{asset("img/account-icon-png-2.jpg")}} style=" width: 90px; height:90px" alt="">
                         @else
                         <img src='{{asset("storage/".$user->user_img)}}'  style=" width: 90px; height:90px"  alt="John Doe" />
                         @endif
                        </td>
                        {{-- <td class=" col-1">{{$user->id}}</td> --}}

                        <td class=" col-1">{{$user->id}}.{{$user->name}}</td>
                        <td class=" " >{{$user->email}}</td>
                        <td class=" col-1"> {{$user->phone}}</td>

                        <td class="  col-1">{{$user->address}}</td>
                        <td class=" col-1">{{$user->gender}}</td>

                        {{-- <td class=" col-3">
                         <input type="hidden" id="hiddenUserId" value="{{$user->id}}">
                            <select class="form-select roleChange" aria-label="Default select example">
                                <option selected value="user">User</option>
                                <option value="admin">Promote to Admin</option>

                              </select>

                        </td> --}}

                        <td class="col-4">


                            <div class="table-data-feature">
                                <input type="hidden" id="hiddenUserId" value="{{$user->id}}">
                                <select class="form-select roleChange me-2 " aria-label="Default select example">
                                    <option selected value="user">User</option>
                                    <option value="admin">Promote to Admin</option>

                                  </select>

                              <a href="{{route('admin#editUserAccount', [$user->id])}}">
                                <button class="item editBtn" id="" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                              </a>


                                <button class="item deleteBtn" data-toggle="tooltip" id="" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>


                            </div>
                            </td>
                        </tr>
                        @endforeach









                    </tbody>
                </table>
                <div class=" mt-3">
                    {{$data->links()}}
                </div>



                   @if (count($data)===0)
                       <h1 class=" text-center text-secondary mt-5">There is no Users here.</h1>
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
// delete Btn
$(".deleteBtn").click(function(){
  let id = $(this).parents('tr').find('#hiddenUserId').val();
$.ajax({
    type:"get",
    url:'/password/user/delete',
    data:{
        id
    },
    dataType:"json",
    success: function(response){
        console.log(response);
        window.location.reload();
    }
})
})

// edit Btn
// $(".editBtn").click(function(){
//     let id = $(this).parents('tr').find('#hiddenUserId').val();
// $.ajax({
//     type:"get",
//     url:'/password/user/edit',
//     data:{
//         id
//     },
//     dataType:"json",
//     success: function(response){
//         console.log(response)
//     }
// })
// })

// role change
      $(document).ready(function(){
   $('.roleChange').change(function(){
  let id =$(this).parents('tr').find('#hiddenUserId').val();
  let role = $(this).val();
  console.log(role)
$.ajax({
    type:"get",
   url:"/password/user/changeRole",
   data:{
id,
role
   },
   dataType:"json",
   success: function(response){

    console.log(response)
    window.location.reload();
   }
   })
   });


      })

    </script>
@endsection
