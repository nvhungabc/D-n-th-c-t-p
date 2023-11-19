<ul class="list-inline p-0 m-0">
    @if ($cart->getItems() != [])
        @foreach ($cart->getItems() as $key => $value )
            <li class="checkout-product">
                <div class="row align-items-center">
                    <div class="col-sm-2">
                        <span class="checkout-product-img">
                        <a href="javascript:void();"><img class="img-fluid rounded" src="{{ $value['image'] ? ''.Storage::url($value['image']) : '' }}" alt=""></a>
                        </span>
                    </div>
                    <div class="col-sm-4">
                        <div class="checkout-product-details">
                            <h5>{{ $value['product_name'] }}</h5>
                            <p class="text-success">In stock</p>
                            <div class="price">
                            <h5>{{ number_format($value['price']) }} đ</h5>
                            <input type="number" hidden id="price" value="{{ $value['price'] }}">
                            <input type="text" hidden id="productID" value="{{ $key }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-10">
                            <div class="row align-items-center mt-2">
                                <div class="col-sm-7 col-md-6">
                                    <button type="button" class="fa fa-minus qty-btn" id="btn-minus"></button>
                                    <input type="text" id="quantity" value="{{ $value['quantity'] }}">
                                    <button type="button" class="fa fa-plus qty-btn" id="btn-plus"></button>
                                </div>
                                <div class="col-sm-5 col-md-6">
                                    <h5 id="totalPrice" class="product-price">{{ number_format($value['quantity'] * $value['price']) }} đ</h5>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-2">
                                <a href="javascript:" id="cart_remove" onclick="removeCartCheckout({{ $key }})" class="btn text-dark font-size-20"><i class="ri-delete-bin-7-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    @else
        <button onclick="window.location.href='category'" class="btn btn-success mt-4">Empty Cart... <b>Shopping Now!</b></button>
    @endif
</ul>
