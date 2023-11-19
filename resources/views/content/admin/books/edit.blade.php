@extends('templates.layout')
@section('content')
             <!-- Page Content  -->
             <div id="content-page" class="content-page">
                <div class="container-fluid">
                   <div class="row">
                      <div class="col-sm-12">
                         <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                               <div class="iq-header-title">
                                  <h4 class="card-title">Edit Book</h4>
                               </div>
                            </div>
                            <div class="iq-card-body">
                               <form action="{{ route('editBooks',['id'=>$book->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                  <div class="form-group">
                                     <label>Book Name:</label>
                                     <input value="{{ $book->bookName }}" name="bookName" type="text" class="form-control">
                                     @error('bookName')
                                        <p style="color: red">{{ $message }}</p>
                                     @enderror
                                  </div>
                                  <div class="form-group">
                                     <label>Book Category:</label>
                                     <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                        <option disabled="">Book Category</option>
                                        <option value="{{ $book->category_id }}" selected>{{ $book->cate_name }}</option>
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                     </select>
                                     @error('category_id')
                                        <p style="color: red">{{ $message }}</p>
                                     @enderror
                                  </div>
                                  <div class="form-group">
                                     <label>Book Author:</label>
                                     <select name="author_id" class="form-control" id="exampleFormControlSelect2">
                                        <option disabled="">Book Author</option>
                                        <option value="{{ $book->author_id }}" selected="" >{{ $book->author_name }}</option>
                                        @foreach ($authors as $author )
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                     </select>
                                     @error('author_id')
                                        <p style="color: red">{{ $message }}</p>
                                     @enderror
                                  </div>
                                  <div class="form-group">
                                    <label>Book Image:</label>
                                    <div class="col-md-9 col-sm-8">
                                       <div class="row d-flex">
                                           <div class="col-xs-6">
                                               <img id="mat_truoc_preview" src="{{ $book->image ? ''.Storage::url($book->image) : '' }}" alt="your image"
                                                    style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                               <input type="file" name="image" accept="image/*" class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                                           </div>
                                       </div>
                                   </div>
                                   @error('image')
                                    <p style="color: red">{{ $message }}</p>
                                    @enderror

                                 </div>
                                  <div class="form-group">
                                     <label>Book Price:</label>
                                     <input value="{{ $book->price }}" name="price" type="text" class="form-control">
                                     @error('price')
                                        <p style="color: red">{{ $message }}</p>
                                     @enderror
                                  </div>
                                  <div class="form-group">
                                    <label>Book Description:</label>
                                    <textarea name="description" class="form-control" rows="4">{{ $book->description }}</textarea>
                                     @error('description')
                                     <p style="color: red">{{ $message }}</p>
                                    @enderror
                                    </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                  <button type="reset" class="btn btn-danger">Reset</button>
                               </form>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
@endsection

@section('script')
    <script>
        $(function(){
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_truoc").change(function () {
                readURL(this, '#mat_truoc_preview');
            });

        });
    </script>
@endsection
