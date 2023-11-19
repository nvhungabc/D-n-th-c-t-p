<!doctype html>
<html lang="en">


<head>
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
   </head>
   <body>

      <div id="loading">
         <div id="loading-center">
         </div>
      </div>

        <section class="sign-in-page">
            <div class="container p-0">
                <div class="row no-gutters height-self-center">
                  <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                      <div class="col-sm-12 sign-in-page-data">
                          <div class="sign-in-from bg-primary rounded">
                              <h3 class="mb-0 text-center text-white">Sign Up</h3>
                              <p class="text-center text-white">Enter your email address and password to access admin panel.</p>
                              <form method="POST" action="{{ route('register') }}" class="mt-4 form-text">
                                @csrf
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Your Full Name</label>
                                      <input name="fullName" type="text" class="form-control mb-0" id="exampleInputEmail1" placeholder="Your Full Name" required>
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputEmail2">Email address</label>
                                      <input name="email" type="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email" required>
                                      @error('email')
                                        <p style="color: red">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                      <input name="password" type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password" required>
                                  </div>
                                  <div class="d-inline-block w-100">
                                      <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                                          <label class="custom-control-label" for="customCheck1">I accept <a href="#" class="text-light">Terms and Conditions</a></label>
                                      </div>
                                  </div>
                                  <div class="sign-info text-center">
                                      <button type="submit" class="btn btn-white d-block w-100 mb-2">Sign Up</button>
                                      <span class="text-dark d-inline-block line-height-2">Already Have Account ? <a href="{{ route('login') }}" class="text-white">Log In</a></span>
                                  </div>
                              </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </section>
      <script src="{{asset('js/jquery.min.js')}}"></script>
      <script src="{{asset('js/popper.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
 
      <script src="{{asset('js/jquery.appear.js')}}"></script>
   
      <script src="{{asset('js/countdown.min.js')}}"></script>
    
      <script src="{{asset('js/waypoints.min.js')}}"></script>
      <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
   
      <script src="{{asset('js/wow.min.js')}}"></script>
    
      <script src="{{asset('js/apexcharts.js')}}"></script>
    
      <script src="{{asset('js/slick.min.js')}}"></script>
     
      <script src="{{asset('js/select2.min.js')}}"></script>

      <script src="{{asset('js/owl.carousel.min.js')}}"></script>

      <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
  
      <script src="{{asset('js/smooth-scrollbar.js')}}"></script>
   
      <script src="{{asset('js/lottie.js')}}"></script>
      
      <script src="{{asset('js/core.js')}}"></script>

      <script src="{{asset('js/charts.js')}}"></script>
   
      <script src="{{asset('js/animated.js')}}"></script>
 
      <script src="{{asset('js/kelly.js')}}"></script>
    
      <script src="{{asset('js/maps.js')}}"></script>
   
      <script src="{{asset('js/worldLow.js')}}"></script>
    
      <script src="{{asset('js/raphael-min.js')}}"></script>
  
      <script src="{{asset('js/morris.js')}}"></script>
 
      <script src="{{asset('js/morris.min.js')}}"></script>

      <script src="{{asset('js/flatpickr.js')}}"></script>
  
      <script src="{{asset('js/style-customizer.js')}}"></script>
 
      <script src="{{asset('js/chart-custom.js')}}"></script>
      
      <script src="{{asset('js/custom.js')}}"></script>


      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
 
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
      
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script>
        window.onload = function(){
            let getSession = sessionStorage.getItem("success");
            if(getSession != null){
                alertify.success(`${getSession}`);
                sessionStorage.removeItem("success");
            }
        }
    </script>
</body>
</html>

