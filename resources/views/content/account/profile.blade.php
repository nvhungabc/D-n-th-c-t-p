@extends('templates.layout')
@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
             <div class="iq-card">
                <div class="iq-card-body p-0">
                   <div class="iq-edit-list">
                      <ul class="iq-edit-profile d-flex nav nav-pills">
                         <li class="col-md-3 p-0">
                            <a class="nav-link active" data-toggle="pill" href="#personal-information">
                               Personal Information
                            </a>
                         </li>
                         <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                               Change Password
                            </a>
                         </li>

                         <li class="col-md-3 p-0">
                            <a class="nav-link" data-toggle="pill" href="#manage-contact">
                               Manage Contact
                            </a>
                         </li>

                         <li class="col-md-3 p-0">
                            <a onclick="orderTracking()" class="nav-link" data-toggle="pill" href="#order-tracking">
                               Order Tracking
                            </a>
                         </li>

                      </ul>
                   </div>
                </div>
             </div>
          </div>

          <div class="col-lg-12">
             <div class="iq-edit-list-data">
                <div class="tab-content">

                   @include('content.account.person-profile')

                   @include('content.account.chang-pwd')

                   <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                      <div class="iq-card">
                         <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                               <h4 class="card-title">Manage Contact</h4>
                            </div>
                         </div>
                         <div class="iq-card-body">
                            <form>
                               <div class="form-group">
                                  <label for="cno">Contact Number:</label>
                                  <input type="text" class="form-control" id="cno" value="{{ Auth::user()->phone_number }}">
                               </div>
                               <div class="form-group">
                                  <label for="email">Email:</label>
                                  <input type="text" class="form-control" id="email" value="{{ Auth::user()->email }}">
                               </div>
                               <div class="form-group">
                                  <label for="url">Url:</label>
                                  <input type="text" class="form-control" id="url" value="" placeholder="Socail media">
                               </div>
                            </form>
                         </div>
                      </div>
                   </div>

                   @include('content.account.order-tracking')
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection

@section('script')
<script>
    function orderTracking(){
        $.ajax({
            url: "{{ route('orderTracking') }}",
            type: "GET"
        }).done(function(response){
            document.querySelector("tbody").innerHTML = response.map((order, index)=>{
                let status = '';
                if(order.status == 0){
                    status = "Chờ cửa hàng xác nhận";
                }else if(order.status == 1){
                    status = "Đơn hàng đã được chuẩn bị và đợi đơn vị vận chuyển";
                }else{
                    status = "Hoàn thành";
                }
                return `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${order.order_id}</td>
                        <td>${order.created_at}</td>
                        <td>${order.order_detail[index].product_name}</td>
                        <td>${order.total_price} đ</td>
                        <td>${order.payment == 1 ? 'Đã thanh toán' : 'Chưa thanh toán'}</td>
                        <td>${status}</td>
                    </tr>
                `
            }).join('');
        })
    }

</script>
@endsection
