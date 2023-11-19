@extends('templates.layout')
@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid checkout-content">
       <div class="row">
          <div id="cart" class="card-block show p-0 col-12">
             <div class="row align-item-center">
                <div class="col-lg-8">
                   <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                         <div class="iq-header-title">
                            <h4 class="card-title">Shopping Cart</h4>
                         </div>
                      </div>
                      <div class="iq-card-body" id="list-cart-checkout">

                        @include('content.list-cart-checkout')

                      </div>
                   </div>
                </div>
                <div class="col-lg-4">
                   <div {{ $cart->getTotalPrice() > 0 ? '' : 'hidden' }} class="iq-card">
                      <div class="iq-card-body">
                         <p>Options</p>
                         <div class="d-flex justify-content-between">
                            <span>Coupons</span>
                            <span><a href="#"><strong>Apply</strong></a></span>
                         </div>
                         <hr>
                         <p><b>Price Details</b></p>
                         <div class="d-flex justify-content-between mb-1">
                            {{-- <span>Total MRP</span> --}}
                            {{-- <span>{{ number_format($cart->getTotalPrice()) }}</span> --}}
                         </div>
                         {{-- <div class="d-flex justify-content-between mb-1">
                            <span>Bag Discount</span>
                            <span class="text-success">-20$</span>
                         </div> --}}
                         {{-- <div class="d-flex justify-content-between mb-1">
                            <span>Estimated Tax</span>
                            <span>$15</span>
                         </div> --}}
                         <div class="d-flex justify-content-between mb-1">
                            <span>EMI Eligibility</span>
                            <span><a href="#">Details</a></span>
                         </div>
                         <div class="d-flex justify-content-between">
                            <span>Delivery Charges</span>
                            <span class="text-success">Free</span>
                         </div>
                         <hr>
                         <div class="d-flex justify-content-between">
                            <span class="text-dark"><strong>Total</strong></span>
                            <span class="text-dark"><strong>{{ number_format($cart->getTotalPrice()) }} đ</strong></span>
                         </div>
                         <div {{ Auth::user() ? '' : "hidden" }}>
                            <a id="place-order" href="javascript:void();" class="btn btn-primary d-block mt-3 next">Place order</a>
                         </div>
                         <div {{ Auth::user() ? 'hidden' : '' }}>
                            <a href="{{ route('login') }}" class="btn btn-primary d-block mt-3 next">Please log in to make a purchase</a>
                         </div>
                      </div>
                   </div>
                   <div class="iq-card ">
                      <div class="card-body iq-card-body p-0 iq-checkout-policy">
                         <ul class="p-0 m-0">
                            <li class="d-flex align-items-center">
                               <div class="iq-checkout-icon">
                                  <i class="ri-checkbox-line"></i>
                               </div>
                               <h6>Security policy (Safe and Secure Payment.)</h6>
                            </li>
                            <li class="d-flex align-items-center">
                               <div class="iq-checkout-icon">
                                  <i class="ri-truck-line"></i>
                               </div>
                               <h6>Delivery policy (Home Delivery.)</h6>
                            </li>
                            <li class="d-flex align-items-center">
                               <div class="iq-checkout-icon">
                                  <i class="ri-arrow-go-back-line"></i>
                               </div>
                               <h6>Return policy (Easy Retyrn.)</h6>
                            </li>
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div id="address" class="card-block p-0 col-12">
             <div class="row align-item-center">
                <div class="col-lg-12">
                   <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Add Address</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <form method="post" action="{{ route('payment') }}">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Full Name: *</label>
                                            <input value="{{ Auth::user() ? Auth::user()->full_name : '' }}" type="text" class="form-control" name="fname" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mobile Number: *</label>
                                            <input type="text" class="form-control" name="phone" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address: *</label>
                                            <input type="text" class="form-control" name="address" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row align-item-center">
                                        <div class="col-lg-7">
                                           <div class="iq-card">
                                              <div class="iq-card-header d-flex justify-content-between">
                                                 <div class="iq-header-title">
                                                    <h4 class="card-title">Payment Options</h4>
                                                 </div>
                                              </div>
                                              <div class="iq-card-body">
                                                 <div class="card-lists">
                                                    <div class="form-group">
                                                       <div class="custom-control custom-radio">
                                                          <input required value="vnpay" type="radio" id="credit" name="payment" class="custom-control-input">
                                                          <label class="custom-control-label" for="credit"> VNPAY</label>
                                                       </div>

                                                       {{-- <div class="custom-control custom-radio">
                                                          <input type="radio" id="netbaking" name="customRadio" class="custom-control-input">
                                                          <label class="custom-control-label" for="netbaking"> Net Banking</label>
                                                       </div>
                                                       <div class="custom-control custom-radio">
                                                          <input type="radio" id="emi" name="emi" class="custom-control-input">
                                                          <label class="custom-control-label" for="emi"> EMI (Easy Installment)</label>
                                                       </div> --}}
                                                       <div class="custom-control custom-radio">
                                                          <input required value="cod" type="radio" id="cod" name="payment" class="custom-control-input">
                                                          <label class="custom-control-label" for="cod"> Cash On Delivery</label>
                                                       </div>
                                                    </div>
                                                 </div>
                                                 <hr>
                                              </div>
                                           </div>
                                        </div>
                                        <div class="col-lg-5">
                                           <div class="iq-card">
                                              <div class="iq-card-body">
                                                 <h4 class="mb-2">Price Details</h4>
                                                 <div class="d-flex justify-content-between">
                                                    <span>Price {{ $cart->getTotalQuantity() }} Items</span>
                                                    <span><strong>{{ number_format($cart->getTotalPrice()) }} đ</strong></span>
                                                 </div>
                                                 <div class="d-flex justify-content-between">
                                                    <span>Delivery Charges</span>
                                                    <span class="text-success">Free</span>
                                                 </div>
                                                 <hr>
                                                 <div class="d-flex justify-content-between">
                                                    <span>Amount Payable</span>
                                                    <span><strong>{{ number_format($cart->getTotalPrice()) }} đ</strong></span>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success ml-3" style="width: 200px">Continue</button>
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

@section('script')
<script type="text/javascript">

    function removeCartCheckout(key){
        $.ajax({
            url: "{{ route('Cart.remove') }}",
            method: "DELETE",
            data: {
                _token: "{{ csrf_token() }}",
                id_key: key
            },
            success: function(response){
                // console.log(response);
                $("#list-cart-checkout").html(response);
                window.location.reload()
                alertify.success('Xóa sản phẩm thành công');
            }
        })
    }

    $("#btn-plus").click(function(e){
        e.preventDefault()
        let productID = $("#productID").val();
        let quantity = $("#quantity").val();
        let price = $("#price").val()
        let toltalPrice = (price * (++quantity))
        $("#totalPrice").html(toltalPrice + ' đ')

        $.ajax({
            url: "{{ route('Cart.update') }}",
            method: "patch",
            data: {
                _token: "{{ csrf_token() }}",
                id: productID,
                quantity: quantity
            },
            success: function(response){
                // console.log(response);
                window.location.reload()
            }
        })
    });

    $("#btn-minus").click(function(e){
        e.preventDefault()
        let productID = $("#productID").val();
        let quantity = $("#quantity").val();
        let price = $("#price").val()
        let toltalPrice = (price * (--quantity))
        $("#totalPrice").html(toltalPrice + ' đ')

        $.ajax({
            url: "{{ route('Cart.update') }}",
            method: "patch",
            data: {
                _token: "{{ csrf_token() }}",
                id: productID,
                quantity: quantity
            },
            success: function(response){
                // console.log(response);
                window.location.reload()
            }
        })
    })
</script>
@endsection
