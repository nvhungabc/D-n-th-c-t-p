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
                          <h4 class="card-title">Book Lists</h4>
                       </div>
                       <div class="iq-card-header-toolbar d-flex align-items-center">
                          <a href="{{ route('addBooks') }}" class="btn btn-primary">Add New book</a>
                       </div>
                    </div>
                    <div class="iq-card-body">
                       <div class="table-responsive">
                          <table class="data-tables table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 3%;">No</th>
                                    <th style="width: 12%;">Book Image</th>
                                    <th style="width: 15%;">Book Name</th>
                                    <th style="width: 15%;">Book Category</th>
                                    <th style="width: 15%;">Book Author</th>
                                    <th style="width: 20%;">Book Description</th>
                                    <th style="width: 10%;">Book Price</th>
                                    <th style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book )
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>
                                            <img class="img-fluid rounded" src="{{ $book->image ? ''.Storage::url($book->image) : "" }}" alt="book-image">
                                        </td>
                                        <td>{{ $book->bookName }}</td>
                                        <td>{{ $book->categoryName }}</td>
                                        <td>{{ $book->authorName }}</td>
                                        <td>
                                        <p class="mb-0">{{ $book->description }}</p>
                                        </td>
                                        <td>{{ number_format($book->price) }}</td>
                                        <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('editBooks',['id'=>$book->id]) }}"><i class="ri-pencil-line"></i></a>
                                            <a onclick="return confirm('Chắc chắn xóa?')" class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{ route('removeBook',['id'=>$book->id]) }}"><i class="ri-delete-bin-line"></i></a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
@endsection
