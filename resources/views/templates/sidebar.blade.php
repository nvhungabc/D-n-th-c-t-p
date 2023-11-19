<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
       <a href="{{ route('index') }}" class="header-logo">
          <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
          <div class="logo-title">
             <span class="text-primary text-uppercase">Booksto</span>
          </div>
       </a>
       <div class="iq-menu-bt-sidebar">
          <div class="iq-menu-bt align-self-center">
             <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
             </div>
          </div>
       </div>
    </div>
    <div id="sidebar-scrollbar">
       <nav class="iq-sidebar-menu">
          <ul id="iq-sidebar-toggle" class="iq-menu">
             <li class="active active-menu">
                <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Shop</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="dashboard" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                   <li class="active"><a href="{{ route('index') }}"><i class="las la-house-damage"></i>Home</a></li>
                   <li><a href="{{ route('category') }}"><i class="ri-function-line"></i>Store</a></li>
                   <li><a href="{{ route('Cart.index') }}"><i class="ri-shopping-cart-fill"></i>Checkout</a></li>
                  <li><a href="{{ route('wishlist') }}"><i class="ri-heart-line"></i>wishlist</a></li>
                </ul>
             </li>
             <li {{ Session::has('admin') ? '' : 'hidden' }}>
                <a href="#admin" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="ri-admin-line"></i><span>Admin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="admin" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                   <li><a href="{{ route('adminDataboard') }}"><i class="ri-dashboard-line"></i>Dashboard</a></li>
                   <li><a href="{{ route('adminCategory') }}"><i class="ri-list-check-2"></i>Category Lists</a></li>
                   <li><a href="{{ route('adminAuthor') }}"><i class="ri-file-user-line"></i>Authors</a></li>
                   <li><a href="{{ route('adminBooks') }}"><i class="ri-book-2-line"></i>Books</a></li>
                   <li><a href="{{ route('Admin.orders') }}"><i class="ri-shopping-cart-fill"></i>Orders</a></li>
                   <li><a href="{{ route('Admin.comments') }}"><i class="ri-message-3-fill"></i>Comments</a></li>

                   <li><a href="{{ route('adminListUser') }}"><i class="las la-user-tie iq-arrow-left"></i>User Manager</a></li>
                </ul>
             </li>

             <li>
                <a href="#pages" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-file-alt iq-arrow-left"></i><span>Pages</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="pages" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="{{ route('login') }}"><i class="las la-sign-in-alt"></i>Login</a></li>
                    <li><a href="{{ route('register') }}"><i class="ri-login-circle-line"></i>Register</a></li>
                </ul>
             </li>
          </ul>
       </nav>
       <div id="sidebar-bottom" class="p-3 position-relative">
          <div class="iq-card">
             <div class="iq-card-body">
                <div class="sidebarbottom-content">
                   <div class="image"><img src="{{ ''.Storage::url('page-img/side-bkg.png')}}" alt=""></div>
                   <button type="submit" class="btn w-100 btn-primary mt-4 view-more">Become Membership</button>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
<!--End sidebar -->
