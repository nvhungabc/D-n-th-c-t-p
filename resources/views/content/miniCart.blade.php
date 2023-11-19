<li class="nav-item nav-icon dropdown">
    <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
    <i class="ri-shopping-cart-2-line"></i>
    <span class="badge badge-danger count-cart rounded-circle">{{ $cart->getTotalQuantity() }}</span>
    </a>
    <div class="iq-sub-dropdown">
    <div class="iq-card shadow-none m-0">
        <div class="iq-card-body p-0 toggle-cart-info">
            <div class="bg-primary p-3">
                <h5 class="mb-0 text-white">All Carts<small class="badge  badge-light float-right pt-1">{{ $cart->getTotalQuantity() }}</small></h5>
            </div>
            @foreach ($cart->getItems() as $item )
                <div class="iq-sub-card">
                    <div class="media align-items-center">
                    <div class="">
                        <img class="rounded" src="{{ $item['image'] ? ''.Storage::url($item['image']) : '' }}" alt="">
                    </div>
                    <div class="media-body ml-3">
                        <h6 class="mb-0 "> {{ number_format($item['price']) }} đ</h6>
                        <p class="mb-0"> x{{ $item['quantity'] }}</p>
                        <b class="mb-0">{{ $item['product_name'] }}</b>
                    </div>
                    <a onclick="removeMiniCart({{ $item['productID'] }})" href="javascript:" class="btn btn-danger mr-2"><i class="ri-close-fill"></i>
                    </a>
                    </div>
                </div>
            @endforeach
            <div class="media-body ml-3 mt-3">
                <h6 class="mb-0 ">Total:  {{ number_format($cart->getTotalPrice()) }} đ</h6>
            </div>


            <div class="d-flex align-items-center text-center p-3">
                <a class="btn btn-primary mr-2 iq-sign-btn" href="{{ route('Cart.index') }}" role="button">View Cart</a>
                <a class="btn btn-primary iq-sign-btn" href="{{ route('Cart.index') }}" role="button">Shop now</a>
            </div>
        </div>
    </div>
    </div>
</li>
