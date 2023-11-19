@if (count($books) > 0)
<div class="iq-card-body">
    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 trendy-detail">
        <div class="iq-header-title">
           <h4 class="card-title mb-0">All Books</h4>
        </div>
        <div class="iq-dropdown">
            <div class="form-group mb-0">
                <select onchange="categories()" id="categories" class="form-control form-search-control bg-white border-0">
                    <option selected value="0" disabled>Filter by Category</option>
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
@else
<h6>Found no match for your search!</h6>
@endif
