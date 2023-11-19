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
                                  <h4 class="card-title">Author Lists</h4>
                               </div>
                               <div class="iq-card-header-toolbar d-flex align-items-center">
                                  <a href="{{ route('addAuthor') }}" class="btn btn-primary">Add New Author</a>
                               </div>
                            </div>
                            <div class="iq-card-body">
                               <div class="table-responsive">
                                  <table class="data-tables table table-striped table-bordered" style="width:100%">
                                     <thead>
                                        <tr>
                                           <th style="width: 5%;">No</th>
                                           <th style="width: 5%;">Avatar</th>
                                           <th style="width: 20%;">Author Name</th>
                                           <th style="width: 20%;">Author Email</th>
                                           <th style="width: 40%%;">Author Description</th>
                                           <th style="width: 10%;">Action</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                        @foreach ($authors as $author )
                                            <tr>
                                                <td>{{ $author->id }}</td>
                                                <td>
                                                <img src="{{ $author->image ? ''.Storage::url($author->image): ''}}" class="img-fluid avatar-50 rounded" alt="author-profile">
                                                </td>
                                                <td>{{ $author->name }}</td>
                                                <td>{{ $author->email }}</td>
                                                <td>
                                                <p class="mb-0">{{ $author->description }}</p>
                                                </td>
                                                <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('editAuthor', ['id'=>$author->id]) }}"><i class="ri-pencil-line"></i></a>
                                                    <a onclick="return confirm('Chắc chắn xóa?')" class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{ route('removeAuthor', ['id'=>$author->id]) }}"><i class="ri-delete-bin-line"></i></a>
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
