<div class="tab-pane fade active show" id="personal-information" role="tabpanel">
    <div class="iq-card">

       <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
             <h4 class="card-title">Personal Information</h4>
          </div>
       </div>
       <div class="iq-card-body">
          <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
             <div class="form-group row align-items-center">
                <div class="col-md-12">
                   <div class="profile-img-edit">
                      <img width="100px" class="profile-pic" src="{{ Auth::user()->avatar ? ''.Storage::url(Auth::user()->avatar) : 'images/user/11.png' }}" alt="profile-pic">
                      <div class="p-image">
                         <i class="ri-pencil-line upload-button"></i>
                         <input name="avatar" class="file-upload" type="file" accept="image/*"/>
                      </div>
                   </div>
                </div>
             </div>
             <div class=" row align-items-center mt-5">
                <div class="form-group col-sm-6">
                   <label for="fname">Full Name:</label>
                   <input name="full_name" type="text" class="form-control" value="{{ Auth::user()->full_name }}">
                </div>

                <div class="form-group col-sm-6">
                    <label for="fname">Email:</label>
                    <input name="email" type="email" class="form-control" value="{{ Auth::user()->email }}">
                 </div>

                <div class="form-group col-sm-6">
                    <label for="fname">Phone Number:</label>
                    <input name="phone_number" type="text" class="form-control" value="{{ Auth::user()->phone_number}}">
                </div>
             </div>
             <button type="submit" class="btn btn-primary mr-2">Save</button>
             <button type="reset" class="btn iq-bg-danger">Cancel</button>
          </form>
       </div>
    </div>
 </div>
