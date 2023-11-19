@extends('templates.layout')
@section('content')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height rounded">
                        <div class="newrealease-contens">
                            <ul id="newrealease-slider" class="list-inline p-0 m-0 d-flex align-items-center">
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="https://image.freepik.com/free-psd/bookstore-ad-poster-template_23-2148680422.jpg"
                                            class="img-fluid w-100 rounded" alt="">
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="https://image.freepik.com/free-psd/bookstore-ad-template-poster_23-2148680424.jpg"
                                            class="img-fluid w-100 rounded" alt="">
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="https://th.bing.com/th/id/OIP.wsa5sKDxPi4YsVnts69ISAHaHa?pid=ImgDet&w=203&h=203&c=7&dpr=1.3" class="img-fluid w-100 rounded"
                                            alt="">
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="https://th.bing.com/th/id/OIP.z4rfNFEKVaVoxjdDbAB5rgHaHa?pid=ImgDet&w=203&h=203&c=7&dpr=1.3" class="img-fluid w-100 rounded"
                                            alt="">
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="https://th.bing.com/th/id/OIP.zp_Y70ux69n60LOmJ70TTQHaHa?pid=ImgDet&w=203&h=203&c=7&dpr=1.3" class="img-fluid w-100 rounded"
                                            alt="">
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="https://th.bing.com/th/id/OIP.2b-P5BR1SM6xairvy5QsJgHaHa?pid=ImgDet&w=203&h=203&c=7&dpr=1.3" class="img-fluid w-100 rounded"
                                            alt="">
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="https://th.bing.com/th/id/OIP.NXBUIm5KMc5mMt1BxE0QTQHaHa?pid=ImgDet&w=203&h=203&c=7&dpr=1.3" class="img-fluid w-100 rounded"
                                            alt="">
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="https://th.bing.com/th/id/OIP.anmXSInJNHbvAXzEER-zFgAAAA?pid=ImgDet&w=203&h=203&c=7&dpr=1.3" class="img-fluid w-100 rounded"
                                            alt="">
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="https://th.bing.com/th/id/OIP.AniBy4CSUAv0_xI5rNG93wHaHa?pid=ImgDet&w=203&h=203&c=7&dpr=1.3" class="img-fluid w-100 rounded"
                                            alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                            <div class="iq-header-title">
                                <h4 class="card-title mb-0">Browse Books</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{ route('category') }}" class="btn btn-sm btn-primary view-more">View More</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">

                                @foreach ($books as $book)
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div
                                            class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                            <div class="iq-card-body p-0">
                                                <div class="d-flex align-items-center">
                                                    <div class="col-6 p-0 position-relative image-overlap-shadow">
                                                        <a href="javascript:void();"><img style="height: 180px"
                                                                class="img-fluid rounded w-100"
                                                                src="{{ $book->image ? '' . Storage::url($book->image) : '' }}"
                                                                alt="books-img"></a>
                                                        <div class="view-book">
                                                            <a href="{{ route('bookdetail', ['id'=>$book->id]) }}"
                                                                class="btn btn-sm btn-white">View Book</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-2">
                                                            <h6 class="mb-1">{{ $book->bookName }}</h6>
                                                            <p class="font-size-13 line-height mb-1">
                                                                {{ $book->author_name }}</p>
                                                            <div class="d-block line-height">
                                                                <span class="font-size-11 text-warning">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="price d-flex align-items-center">
                                                            {{-- <span class="pr-1 old-price"></span> --}}
                                                            <h6><b>{{ number_format($book->price) }} đ</b></h6>
                                                        </div>
                                                        <div class="iq-product-action mt-2">
                                                            <a onclick="add({{ $book->id }})" href="javascript:"><i
                                                                    class="ri-shopping-cart-2-fill text-primary"></i></a>
                                                            <a href="javascript:void();" class="ml-2"><i
                                                                    class="ri-heart-fill text-danger"></i></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between mb-0">
                            <div class="iq-header-title">
                                <h4 class="card-title">Featured Books</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row align-items-center">
                                <div class="col-sm-5 pr-0">
                                    <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                            src="{{ ''.Storage::url('page-img/featured-book.png') }}" alt=""></a>
                                </div>
                                <div class="col-sm-7 mt-3 mt-sm-0">
                                    <h4 class="mb-2">Casey Christie night book into find...</h4>
                                    <p class="mb-2">Author: Gheg origin</p>
                                    <div class="mb-2 d-block">
                                        <span class="font-size-12 text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                    <span class="text-dark mb-3 d-block">Lorem Ipsum is simply dummy test in find a of the
                                        printing and typeset ing industry into end.</span>
                                    <button type="submit" class="btn btn-primary learn-more">Learn More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between mb-0">
                            <div class="iq-header-title">
                                <h4 class="card-title">Featured Writer</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <ul class="list-inline row mb-0 align-items-center iq-scrollable-block">
                                @foreach ($authors as $author )
                                    <li class="col-sm-6 d-flex mb-3 align-items-center">
                                        <div class="icon iq-icon-box mr-3">
                                            <a href="javascript:void();"><img class="img-fluid avatar-60 rounded-circle"
                                                    src="{{ $author->image ? ''.Storage::url($author->image) : '' }}" alt="author-img"></a>
                                        </div>
                                        <div class="mt-1">
                                            <h6>{{ $author->name }}</h6>
                                            @php
                                                $publicBook = rand(1, 50);
                                            @endphp
                                            <p class="mb-0 text-primary">Publish Books: <span class="text-body">{{ $publicBook }}</span>
                                            </p>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                       <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                          <div class="iq-header-title">
                             <h4 class="card-title mb-0">Favorite Reads</h4>
                          </div>
                          <div class="iq-card-header-toolbar d-flex align-items-center">
                             <a href="category.html" class="btn btn-sm btn-primary view-more">View More</a>
                          </div>
                       </div>
                       <div class="iq-card-body favorites-contens">
                          <ul id="favorites-slider" class="list-inline p-0 mb-0 row">
                           @foreach ($favorite as $item )
                           <li class="col-md-3">
                               <div class="d-flex justify-content-between align-items-center">
                                  <div class="col-5 p-0 position-relative">
                                     <a href="javascript:void();">
                                        <img src="{{ $item->image ? ''.Storage::url($item->image) : '' }}" class="img-fluid rounded w-100" alt="book-img">
                                     </a>
                                  </div>
                                  <div class="col-7">
                                     <h5 class="mb-2">{{ $item->bookName }}</h5>
                                     <p class="mb-2">Author : {{ $item->author_name }}</p>
                                     <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                        <span>Reading</span>
                                        @php
                                            $dataPercent = rand(50, 100);
                                        @endphp
                                        <span class="mr-4">{{ $dataPercent }}%</span>
                                     </div>
                                     <div class="iq-progress-bar-linear d-inline-block w-100">
                                        <div class="iq-progress-bar iq-bg-primary">
                                           <span class="bg-primary" data-percent="{{ $dataPercent }}"></span>
                                        </div>
                                     </div>
                                     <a href="{{ route('bookdetail', ['id'=>$item->id]) }}" class="text-dark">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                  </div>
                               </div>
                            </li>
                           @endforeach

                          </ul>
                       </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection

