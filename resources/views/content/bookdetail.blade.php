@extends('templates.layout')
@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-header d-flex justify-content-between align-items-center">
                   <h4 class="card-title mb-0">Books Description</h4>
                </div>
                <div class="iq-card-body pb-0">
                   <div class="description-contens align-items-top row">
                      <div class="col-md-6">
                         <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body p-0">
                               <div class="row align-items-center">
                                  {{-- <div class="col-3">
                                     <ul id="description-slider-nav" class="list-inline p-0 m-0  d-flex align-items-center">
                                        <li>
                                           <a href="javascript:void(0);">
                                           <img src="{{ ''.Storage::url($book->image) }}" class="img-fluid rounded w-100" alt="">
                                           </a>
                                        </li>
                                        <li>
                                           <a href="javascript:void(0);">
                                           <img src="images/book-dec/02.jpg" class="img-fluid rounded w-100" alt="">
                                           </a>
                                        </li>
                                        <li>
                                           <a href="javascript:void(0);">
                                           <img src="images/book-dec/03.jpg" class="img-fluid rounded w-100" alt="">
                                           </a>
                                        </li>
                                        <li>
                                           <a href="javascript:void(0);">
                                           <img src="images/book-dec/04.jpg" class="img-fluid rounded w-100" alt="">
                                           </a>
                                        </li>
                                        <li>
                                           <a href="javascript:void(0);">
                                           <img src="images/book-dec/05.jpg" class="img-fluid rounded w-100" alt="">
                                           </a>
                                        </li>
                                        <li>
                                           <a href="javascript:void(0);">
                                           <img src="images/book-dec/06.jpg" class="img-fluid rounded w-100" alt="">
                                           </a>
                                        </li>
                                     </ul>
                                  </div> --}}
                                  <div class="col-12">
                                     <ul id="description-slider" class="list-inline p-0 m-0  d-flex align-items-center">
                                        <li>
                                           <a href="javascript:void(0);">
                                           <img width="100%" src="{{ ''.Storage::url($book->image) }}" class="img-fluid rounded" alt="">
                                           </a>
                                        </li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-md-6">
                         <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body p-0">

                                <h3 class="mb-3">{{ $book->bookName }}</h3>
                                <div class="price d-flex align-items-center font-weight-500 mb-2">
                                    {{-- <span class="font-size-20 pr-2 old-price">$99</span> --}}
                                    <span class="font-size-24 text-dark">{{ number_format($book->price)}} đ</span>
                                </div>
                                <div class="mb-3 d-block">
                                    <span class="font-size-20 text-warning">
                                    <i class="fa fa-star mr-1"></i>
                                    <i class="fa fa-star mr-1"></i>
                                    <i class="fa fa-star mr-1"></i>
                                    <i class="fa fa-star mr-1"></i>
                                    <i class="fa fa-star"></i>
                                    </span>
                                </div>
                                <span class="text-dark mb-4 pb-4 iq-border-bottom d-block">{{ $book->description }}</span>

                                <div class="text-primary mb-4">Category: <span class="text-body">{{ $book->cate_name }}</span></div>

                                <div class="text-primary mb-4">Author: <span class="text-body">{{ $book->name }}</span></div>
                                <a onclick="add({{ $book->id }})" href="javascript:" type="submit" class="btn btn-primary view-more mr-2">Add To Cart</a>

                               <div class="mb-3 mt-5">
                                  <a href="#" class="text-body text-center"><span class="avatar-30 rounded-circle bg-primary d-inline-block mr-2"><i class="ri-heart-fill"></i></span><span>Add to Wishlist</span></a>
                               </div>
                               <div class="iq-social d-flex align-items-center mt-5">
                                  <h5 class="mr-2">Share:</h5>
                                  <ul class="list-inline d-flex p-0 mb-0 align-items-center">
                                     <li>
                                        <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                     </li>
                                     <li>
                                        <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                     </li>
                                     <li>
                                        <a href="#" class="avatar-40 rounded-circle bg-primary mr-2 youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                     </li>
                                     <li >
                                        <a href="#" class="avatar-40 rounded-circle bg-primary pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                     </li>
                                  </ul>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>

          <div class="col-lg-12">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                  <div class="iq-header-title">
                     <h4 class="card-title mb-0">Review</h4>
                  </div>
               </div>
               <div class="iq-card-body single-similar-contens d-flex">
                    <div class="user-qustion-area col-md-6" id="id-comment">
                        @include('content.list-comment')
                    </div>

                    <div {{ Auth::user() ? '' : 'hidden' }} class="col-md-6">
                        <div class="load-moer-btn">
                           <h6 class="primary-btn3">Hello {{ Auth::user() ? Auth::user()->full_name : '' }}, comment here...!</h6>
                       </div>
                        <form class="mt-3" style="border: 1px solid greenyellow; border-radius: 10px">
                            <div class="form-inner">
                                <input type="text" hidden id="book_id" value="{{ $book->id }}">
                                <textarea required id="textComment" style="width: 100%; position: relative; border: none;  " placeholder="Ask your question..."></textarea>
                                <button onclick="btnComment()" type="button" style="position: absolute; top: 60px; right: 30px; border: none; border-radius: 50px">
                                    <svg  xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 14 14">
                                        <path
                                            d="M13.8697 0.129409C13.9314 0.191213 13.9736 0.269783 13.991 0.355362C14.0085 0.44094 14.0004 0.529754 13.9678 0.610771L8.78063 13.5781C8.73492 13.6923 8.65859 13.7917 8.56003 13.8653C8.46148 13.9389 8.34453 13.9839 8.22206 13.9954C8.09958 14.0068 7.97633 13.9842 7.86586 13.9301C7.75539 13.876 7.66199 13.7924 7.59594 13.6887L4.76304 9.23607L0.310438 6.40316C0.206426 6.33718 0.122663 6.24375 0.0683925 6.13318C0.0141218 6.02261 -0.00854707 5.89919 0.00288719 5.77655C0.0143215 5.65391 0.0594144 5.53681 0.13319 5.43817C0.206966 5.33954 0.306557 5.2632 0.420973 5.21759L13.3883 0.0322452C13.4694 -0.000369522 13.5582 -0.00846329 13.6437 0.00896931C13.7293 0.0264019 13.8079 0.0685926 13.8697 0.1303V0.129409ZM5.65267 8.97578L8.11385 12.8427L12.3329 2.29554L5.65267 8.97578ZM11.7027 1.66531L1.1555 5.88436L5.02333 8.34466L11.7027 1.66531Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        <p id="error-comment" style="color: red"></p>
                    </div>

                    <div {{ Auth::user() ? 'hidden' : '' }} class="col-md-6">
                        <a style="width: 100%" class="btn btn-primary" href="{{ route('login') }}">Sign in to join a comment</a>
                    </div>
               </div>
            </div>
         </div>

          <div class="col-lg-12">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                   <div class="iq-header-title">
                      <h4 class="card-title mb-0">Similar Books</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="category.html" class="btn btn-sm btn-primary view-more">View More</a>
                   </div>
                </div>
                <div class="iq-card-body single-similar-contens">
                   <ul id="single-similar-slider" class="list-inline p-0 mb-0 row">
                        @foreach ($allBook as $books)
                        @if ($books->author_id === $book->author_id || $books->category_id === $book->category_id)
                            @if ($books->id != $book->id)
                                <li class="col-md-3">
                                    <div class="row align-items-center">
                                    <div class="col-5">
                                        <div class="position-relative image-overlap-shadow">
                                            <a href="javascript:void();"><img width="100%" height="100px" class="img-fluid rounded" src="{{ ''.Storage::url($books->image) }}" alt=""></a>
                                            <div class="view-book">
                                                <a href="{{ route('bookdetail', ['id'=>$books->id]) }}" class="btn btn-sm btn-white">View Book</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7 pl-0">
                                        <h6 class="mb-2">{{ $books->bookName }}</h6>
                                        <p class="text-body">Category: {{ $book->cate_name }} </p>
                                        <p class="text-body">Author: {{ $book->name }} </p>
                                        <a href="{{ route('bookdetail', ['id'=>$books->id]) }}" class="text-dark" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                    </div>
                                    </div>
                                </li>

                                <li class="col-md-3">
                                    <div class="row align-items-center">
                                    <div class="col-5">
                                        <div class="position-relative image-overlap-shadow">
                                            <a href="javascript:void();"><img width="100%" height="100px" class="img-fluid rounded" src="{{ ''.Storage::url($books->image) }}" alt=""></a>
                                            <div class="view-book">
                                                <a href="{{ route('bookdetail', ['id'=>$books->id]) }}" class="btn btn-sm btn-white">View Book</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7 pl-0">
                                        <h6 class="mb-2">{{ $books->bookName }}</h6>
                                        <p class="text-body">Category: {{ $book->cate_name }} </p>
                                        <p class="text-body">Author: {{ $book->name }} </p>
                                        <a href="{{ route('bookdetail', ['id'=>$books->id]) }}" class="text-dark" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                    </div>
                                    </div>
                                </li>
                            @endif
                        @endif
                        @endforeach
                   </ul>
                </div>
             </div>
          </div>
          <div class="col-lg-12">
             <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 trendy-detail">
                   <div class="iq-header-title">
                      <h4 class="card-title mb-0">Trendy Books</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="category.html" class="btn btn-sm btn-primary view-more">View More</a>
                   </div>
                </div>
                <div class="iq-card-body trendy-contens">
                   <ul id="trendy-slider" class="list-inline p-0 mb-0 row">
                      <li class="col-md-3">
                         <div class="d-flex align-items-center">
                            <div class="col-5 p-0 position-relative image-overlap-shadow">
                               <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/01.jpg" alt=""></a>
                               <div class="view-book">
                                  <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                               </div>
                            </div>
                            <div class="col-7">
                               <div class="mb-2">
                                  <h6 class="mb-1">The Word Books Day..</h6>
                                  <p class="font-size-13 line-height mb-1">Paul Molive</p>
                                  <div class="d-block">
                                     <span class="font-size-13 text-warning">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     </span>
                                  </div>
                               </div>
                               <div class="price d-flex align-items-center">
                                  <span class="pr-1 old-price">$99</span>
                                  <h6><b>$89</b></h6>
                               </div>
                               <div class="iq-product-action">
                                  <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                  <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                               </div>
                            </div>
                         </div>
                      </li>
                      <li class="col-md-3">
                         <div class="d-flex align-items-center">
                            <div class="col-5 p-0 position-relative image-overlap-shadow">
                               <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/02.jpg" alt=""></a>
                               <div class="view-book">
                                  <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                               </div>
                            </div>
                            <div class="col-7">
                               <div class="mb-2">
                                  <h6 class="mb-1">The catcher in the Rye</h6>
                                  <p class="font-size-13 line-height mb-1">Anna Sthesia</p>
                                  <div class="d-block">
                                     <span class="font-size-13 text-warning">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     </span>
                                  </div>
                               </div>
                               <div class="price d-flex align-items-center">
                                  <span class="pr-1 old-price">$89</span>
                                  <h6><b>$79</b></h6>
                               </div>
                               <div class="iq-product-action">
                                  <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                  <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                               </div>
                            </div>
                         </div>
                      </li>
                      <li class="col-md-3">
                         <div class="d-flex align-items-center">
                            <div class="col-5 p-0 position-relative image-overlap-shadow">
                               <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/03.jpg" alt=""></a>
                               <div class="view-book">
                                  <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                               </div>
                            </div>
                            <div class="col-7">
                               <div class="mb-2">
                                  <h6 class="mb-1">Little Black Book</h6>
                                  <p class="font-size-13 line-height mb-1">Monty Carlo</p>
                                  <div class="d-block">
                                     <span class="font-size-13 text-warning">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     </span>
                                  </div>
                               </div>
                               <div class="price d-flex align-items-center">
                                  <span class="pr-1 old-price">$100</span>
                                  <h6><b>$89</b></h6>
                               </div>
                               <div class="iq-product-action">
                                  <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                  <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                               </div>
                            </div>
                         </div>
                      </li>
                      <li class="col-md-3">
                         <div class="d-flex align-items-center">
                            <div class="col-5 p-0 position-relative image-overlap-shadow">
                               <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/04.jpg" alt=""></a>
                               <div class="view-book">
                                  <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                               </div>
                            </div>
                            <div class="col-7">
                               <div class="mb-2">
                                  <h6 class="mb-1">Take The Risk Book</h6>
                                  <p class="font-size-13 line-height mb-1">Smith goal</p>
                                  <div class="d-block">
                                     <span class="font-size-13 text-warning">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     </span>
                                  </div>
                               </div>
                               <div class="price d-flex align-items-center">
                                  <span class="pr-1 old-price">$120</span>
                                  <h6><b>$99</b></h6>
                               </div>
                               <div class="iq-product-action">
                                  <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                  <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                               </div>
                            </div>
                         </div>
                      </li>
                      <li class="col-md-3">
                         <div class="d-flex align-items-center">
                            <div class="col-5 p-0 position-relative image-overlap-shadow">
                               <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/05.jpg" alt=""></a>
                               <div class="view-book">
                                  <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                               </div>
                            </div>
                            <div class="col-7">
                               <div class="mb-2">
                                  <h6 class="mb-1">The Raze Night Book </h6>
                                  <p class="font-size-13 line-height mb-1">Paige Turner</p>
                                  <div class="d-block">
                                     <span class="font-size-13 text-warning">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     </span>
                                  </div>
                               </div>
                               <div class="price d-flex align-items-center">
                                  <span class="pr-1 old-price">$150</span>
                                  <h6><b>$129</b></h6>
                               </div>
                               <div class="iq-product-action">
                                  <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                  <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                               </div>
                            </div>
                         </div>
                      </li>
                      <li class="col-md-3">
                         <div class="d-flex align-items-center">
                            <div class="col-5 p-0 position-relative image-overlap-shadow">
                               <a href="javascript:void();"><img class="img-fluid rounded w-100" src="images/trendy-books/06.jpg" alt=""></a>
                               <div class="view-book">
                                  <a href="book-page.html" class="btn btn-sm btn-white">View Book</a>
                               </div>
                            </div>
                            <div class="col-7">
                               <div class="mb-2">
                                  <h6 class="mb-1">Find the Wave Book..</h6>
                                  <p class="font-size-13 line-height mb-1">Barb Ackue</p>
                                  <div class="d-block">
                                     <span class="font-size-13 text-warning">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     </span>
                                  </div>
                               </div>
                               <div class="price d-flex align-items-center">
                                  <span class="pr-1 old-price">$120</span>
                                  <h6><b>$100</b></h6>
                               </div>
                               <div class="iq-product-action">
                                  <a href="javascript:void();"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                  <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                               </div>
                            </div>
                         </div>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection

@section('script')
<script>
    function btnComment(){
        let textComment = document.querySelector("#textComment").value
        let book_id = document.querySelector("#book_id").value
        $.ajax({
            url: "{{ route('pushComment') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                book_id: book_id,
                textComment: textComment
            },
            error: function(){
                $("#error-comment").html('Please enter a comment!');
            },
            success: function(response){
                // console.log(response);
                $("#textComment").val('');
                $("#error-comment").html('');
                $("#id-comment").html(response);
                // window.location.reload()
            }
        });
    }
</script>
@endsection
