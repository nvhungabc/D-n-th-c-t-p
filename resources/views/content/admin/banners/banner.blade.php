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
                      <h4 class="card-title">Banner Lists</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="{{ route('addBanners') }}" class="btn btn-primary">Add New Banner</a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-responsive">
                      <table class="data-tables table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Banner Name</th>
                                <th width="50%">Banner image</th>
                                <th width="15%">Created At</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td>{{ $banner->id }}</td>
                                    <td>{{ $banner->images }}</td>
                                    <td>
                                    <img style="width: 150px;" src="{{ $banner->images ? ''.Storage::url($banner->images) : "" }}" alt="banner-image">
                                    </td>
                                    <td>{{ $banner->created_at }}</td>

                                    <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href=""><i class="ri-pencil-line"></i></a>
                                        <a onclick="return confirm('Chắc chắn xóa?')" class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{ route('removeBanner', ['id'=>$banner->id]) }}"><i class="ri-delete-bin-line"></i></a>
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
