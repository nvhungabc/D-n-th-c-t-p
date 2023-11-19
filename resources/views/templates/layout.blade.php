<!doctype html>
<html lang="en">

<!-- Mirrored from templates.iqonic.design/booksto/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2023 07:54:13 GMT -->
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Booksto - Responsive Bootstrap 4 Admin Dashboard Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      @livewireStyles
   </head>
   <body>
      <!-- loader Start -->
      {{-- <div id="loading">
         <div id="loading-center">
         </div>
      </div> --}}
      <!-- loader END -->

      <!-- Wrapper Start -->
      <div class="wrapper">
        @include('templates.sidebar')
        @include('templates.navbar')
        @include('templates.alert')
        @yield('content')
      </div>
      <!-- Wrapper END -->

      <!-- Footer -->
      <footer class="iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                     <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2023 <a href="#">Bookstore</a> All Rights Reserved.
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/popper.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <!-- Appear JavaScript -->
      <script src="{{asset('js/jquery.appear.js')}}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{asset('js/countdown.min.js')}}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{asset('js/waypoints.min.js')}}"></script>
      <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
      <!-- Wow JavaScript -->
      <script src="{{asset('js/wow.min.js')}}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{asset('js/apexcharts.js')}}"></script>
      <!-- Slick JavaScript -->
      <script src="{{asset('js/slick.min.js')}}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{asset('js/select2.min.js')}}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{asset('js/owl.carousel.min.js')}}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{asset('js/smooth-scrollbar.js')}}"></script>
      <!-- lottie JavaScript -->
      <script src="{{asset('js/lottie.js')}}"></script>
      <!-- am core JavaScript -->
      <script src="{{asset('js/core.js')}}"></script>
      <!-- am charts JavaScript -->
      <script src="{{asset('js/charts.js')}}"></script>
      <!-- am animated JavaScript -->
      <script src="{{asset('js/animated.js')}}"></script>
      <!-- am kelly JavaScript -->
      <script src="{{asset('js/kelly.js')}}"></script>
      <!-- am maps JavaScript -->
      <script src="{{asset('js/maps.js')}}"></script>
      <!-- am worldLow JavaScript -->
      <script src="{{asset('js/worldLow.js')}}"></script>
      <!-- Raphael-min JavaScript -->
      <script src="{{asset('js/raphael-min.js')}}"></script>
      <!-- Morris JavaScript -->
      <script src="{{asset('js/morris.js')}}"></script>
      <!-- Morris min JavaScript -->
      <script src="{{asset('js/morris.min.js')}}"></script>
      <!-- Flatpicker Js -->
      <script src="{{asset('js/flatpickr.js')}}"></script>
      <!-- Style Customizer -->
      <script src="{{asset('js/style-customizer.js')}}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{asset('js/chart-custom.js')}}"></script>
      <!-- Custom JavaScript -->
      <script src="{{asset('js/custom.js')}}"></script>

      {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script> --}}

      <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

      @livewireScripts

      {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script> --}}

    @yield('script')

    <script>
        function add(id){
            $.ajax({
                url: "{{ route('Cart.add') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(response){
                    console.log(response);
                    $("#mini-cart").html(response)
                    alertify.success('Thêm sản phẩm thành công!');
                }
            })
        }

        function removeMiniCart(id){
            $.ajax({
                url: "{{ route('Cart.remove') }}",
                method: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function(response){
                    console.log(response);
                    $("#mini-cart").html(response)
                    alertify.success('Xóa sản phẩm thành công');
                }
            })
        }

        window.onload = function(){
            let getSession = sessionStorage.getItem("success");
            if(getSession != null){
                alertify.success(`${getSession}`);
                sessionStorage.removeItem("success");
            }
        }

        //Search
        function categories(){
            let cate_id = $("#categories").val()
                // console.log(cate_id);
            $.ajax({
                url: "{{ route('Client.search') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    cate_id: cate_id
                },
                success: function(response){
                    console.log(response);
                    $("#result-search").html(response)
                    $("#input-search").val('');
                }
            });
        }
        function searchBook(){
            let inputValue = document.querySelector("#input-search").value;
            $.ajax({
                url: "{{ route('Client.search') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    search: inputValue
                },
                success: function(response){
                    console.log(response);
                    $("#result-search").html(response);
                    $("#input-search").val('');
                }
            })
        }
    </script>
   </body>

<!-- Mirrored from templates.iqonic.design/booksto/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2023 07:55:23 GMT -->
</html>
