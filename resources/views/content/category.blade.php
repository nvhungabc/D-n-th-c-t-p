@extends('templates.layout')
@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
             <div class="iq-card-transparent mb-0">
                <div class="d-block text-center">
                   {{-- <h2 class="mb-3">Search Books by Author name, Category, Book Name,...</h2> --}}
                   <div class="w-100 iq-search-filter justify-content-center">
                      <ul class="list-inline p-0 m-0 row justify-content-center search-menu-options">
                         <li class="search-menu-opt">
                            <div class="iq-search-bar search-book d-flex align-items-center">
                               <form style="width: 500px" action="#" class="searchbox">
                                  <input onchange="searchBook()" id="input-search" type="text" class="text search-input" placeholder="Search by Author, Category, Book Name,...">
                                  <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                               </form>
                               <button type="button" class="btn btn-primary search-data ml-2">Search</button>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>

             <div class="iq-card" id="result-search">
                <div class="iq-card-body">
                    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 trendy-detail">
                        <div class="iq-header-title">
                           <h4 class="card-title mb-0">All Books</h4>
                        </div>
                        <div class="iq-dropdown">
                            <div class="form-group mb-0">
                                <select onchange="categories()" id="categories" class="form-control form-search-control bg-white border-0">
                                    <option selected disabled>Filter by Category</option>
                                    <option value="0">All</option>
                                    @foreach ($categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                     </div>

                   <div class="row mt-3">
                    @foreach ($books as $book )
                      <div class="col-sm-6 col-md-4 col-lg-3">
                         <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                            <div class="iq-card-body p-0">
                               <div class="d-flex align-items-center">
                                  <div class="col-6 p-0 position-relative image-overlap-shadow">
                                     <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ $book->image ? ''.Storage::url($book->image) : '' }}" alt="book-img"></a>
                                     <div class="view-book">
                                        <a href="{{ route('bookdetail', ['id'=>$book->id]) }}" class="btn btn-sm btn-white">View Book</a>
                                     </div>
                                  </div>
                                  <div class="col-6">
                                     <div class="mb-2">
                                        <h6 class="mb-1">{{ $book->bookName }}</h6>
                                        <p class="font-size-13 line-height mb-1">Author: {{ $book->author_name }}</p>
                                        <p class="font-size-13 line-height mb-1">Category: {{ $book->cate_name }}</p>
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
                                        {{-- <span class="pr-1 old-price">$99</span> --}}
                                        <h6><b>{{ number_format($book->price) }} đ</b></h6>
                                     </div>
                                     <div class="iq-product-action">
                                        <a onclick="add({{ $book->id }})" href="javascript:"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                        <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
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
                    @foreach ($trendy as $item )
                    <li class="col-md-3">
                        <div class="d-flex align-items-center">
                           <div class="col-5 p-0 position-relative image-overlap-shadow">
                              <a href="javascript:void();"><img class="img-fluid rounded w-100" src="{{ $item->image ? ''.Storage::url($item->image) : '' }}" alt="book-img"></a>
                              <div class="view-book">
                                 <a href="{{ route('bookdetail', ['id'=>$item->id]) }}" class="btn btn-sm btn-white">View Book</a>
                              </div>
                           </div>
                           <div class="col-7">
                              <div class="mb-2">
                                 <h6 class="mb-1">{{ $item->bookName }}</h6>
                                 <p class="font-size-13 line-height mb-1">Category: {{ $item->cate_name }}</p>
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
                                 {{-- <span class="pr-1 old-price">$99</span> --}}
                                 <h6><b>{{ number_format($item->price) }} đ</b></h6>
                              </div>
                              <div class="iq-product-action">
                                <a onclick="add({{ $item->id }})" href="javascript:"><i class="ri-shopping-cart-2-fill text-primary"></i></a>
                                <a href="javascript:void();" class="ml-2"><i class="ri-heart-fill text-danger"></i></a>
                              </div>
                           </div>
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
