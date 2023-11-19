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
                      <h4 class="card-title">Comment List</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-responsive">
                      <table class="data-tables table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">User Name</th>
                                <th width="20%">Book</th>
                                <th width="30%">Content</th>
                                <th width="15%">Creation Date</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $key => $comment )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $comment->full_name }}</td>
                                <td>
                                    <p>Tên sách: {{ $comment->bookName }}</p>
                                    <p>Link sách: <a href="{{ route('bookdetail', ['id'=>$comment->book_id]) }}">{{ route('bookdetail', ['id'=>$comment->book_id]) }}</a></p>
                                </td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a {{ $comment->status == 0 ? "hidden" : "" }} class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hide Comment" href="{{ route('Admin.actionComment', ['id'=>$comment->id]) }}"><i class="ri-chat-delete-fill"></i></a>
                                     <a {{ $comment->status == 1 ? "hidden" : "" }} class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Public Comment" href="{{ route('Admin.actionComment', ['id'=>$comment->id]) }}"><i class="ri-chat-check-fill"></i></a>
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
