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
                                  <h4 class="card-title">Edit Categories</h4>
                               </div>
                            </div>
                            <div class="iq-card-body">
                               <form action="{{ route('editCategory',['id'=>$category->id]) }}" method="post">
                                @csrf
                                  <div class="form-group">
                                     <label>Category Name:</label>
                                     <input value="{{ $category->name }}" name="name" type="text" class="form-control">
                                     @error('name')
                                         <p style="color: red">{{ $message }}</p>
                                     @enderror
                                  </div>
                                  <div class="form-group">
                                     <label>Category Description:</label>
                                     <textarea name="description" class="form-control" placeholder="Optional" rows="4">{{ $category->description }}</textarea>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Save</button>
                                  {{-- <button type="reset" class="btn btn-danger">Reset</button> --}}
                               </form>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
@endsection
