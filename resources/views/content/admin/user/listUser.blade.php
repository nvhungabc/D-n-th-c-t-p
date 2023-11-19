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
                             <h4 class="card-title">User List</h4>
                          </div>
                       </div>
                       <div class="iq-card-body">
                          <div class="table-responsive">
                             <div class="row justify-content-between">
                                <div class="col-sm-12 col-md-6">
                                   <div id="user_list_datatable_info" class="dataTables_filter">
                                      <form class="mr-3 position-relative">
                                         <div class="form-group mb-0">
                                            <input type="search" class="form-control" id="exampleInputSearch" placeholder="Search" aria-controls="user-list-table">
                                         </div>
                                      </form>
                                   </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                   <div class="user-list-files d-flex float-right">
                                      <a class="iq-bg-primary" href="javascript:void();" >
                                         Print
                                      </a>
                                      <a class="iq-bg-primary" href="javascript:void();">
                                         Excel
                                      </a>
                                      <a class="iq-bg-primary" href="javascript:void();">
                                         Pdf
                                      </a>
                                   </div>
                                </div>
                             </div>
                             <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                   <tr>
                                      <th>Profile</th>
                                      <th>Name</th>
                                      <th>Contact</th>
                                      <th>Email</th>
                                      <th>Role</th>
                                      <th>Status</th>
                                      <th>Join Date</th>
                                      <th>Action</th>
                                   </tr>
                             </thead>
                             <tbody>
                                @foreach ($users as $user )
                                    <tr>
                                        <td class="text-center"><img class="rounded img-fluid avatar-40" src="{{ $user->avatar ? ''.Storage::url($user->avatar) : '' }}" alt="profile"></td>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->phone_number ? $user->phone_number : 'Null' }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role == 0 ? 'User' : 'Admin' }}</td>
                                        <td><span class="badge iq-bg-primary">{{ $user->status == 1 ? "Active" : "Block" }}</span></td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                <a {{ $user->role == 0 ? "" : "hidden" }} onclick="updateRole({{ $user->id }})" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Role Admin" href="javascript:"><i class="ri-user-settings-line"></i></a>
                                                <a {{ $user->role == 1 ? "" : "hidden" }} onclick="updateRole({{ $user->id }})" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Role Admin" href="javascript:"><i class="ri-user-settings-line"></i></a>

                                                <a {{ $user->status == 0 ? "" : "hidden" }} onclick="updateStatus({{ $user->id }})" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Unlock Account" href="javascript:"><i class="ri-lock-unlock-line"></i></a>
                                                <a {{ $user->status == 1 ? "" : "hidden" }} onclick="updateStatus({{ $user->id }})" class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Block Account" href="javascript:"><i class="ri-lock-2-line"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                             </tbody>
                             </table>
                          </div>
                             <div class="row justify-content-between mt-3">
                                <div id="user-list-page-info" class="col-md-6">
                                   <span>Showing 1 to 5 of 5 entries</span>
                                </div>
                                <div class="col-md-6">
                                   <nav aria-label="Page navigation example">
                                      <ul class="pagination justify-content-end mb-0">
                                         <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                         </li>
                                         <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                         <li class="page-item"><a class="page-link" href="#">2</a></li>
                                         <li class="page-item"><a class="page-link" href="#">3</a></li>
                                         <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                         </li>
                                      </ul>
                                   </nav>
                                </div>
                             </div>
                       </div>
                    </div>
              </div>
           </div>
        </div>
     </div>
@endsection

@section('script')
<script>
    function updateStatus(id){
        $.ajax({
            url: "{{ route('Admin.updateUser.status') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
            },
            success: function(response){
                console.log(response.msg);
                alertify.success(`${response.msg}`);
                window.location.reload()
            }
        })
    }

    function updateRole(id){
        $.ajax({
            url: "{{ route('Admin.updateUser.role') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
            },
            success: function(response){
                console.log(response.msg);
                alertify.success(`${response.msg}`);
                window.location.reload()
            }
        })
    }
</script>
@endsection
