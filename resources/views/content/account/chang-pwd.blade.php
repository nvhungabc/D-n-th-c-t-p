<div class="tab-pane fade" id="chang-pwd" role="tabpanel">
    <div class="iq-card">
       <div class="iq-card-header d-flex justify-content-between">
          <div class="iq-header-title">
             <h4 class="card-title">Change Password</h4>
          </div>
       </div>
       <div class="iq-card-body">
          <form method="POST" action="{{ route('changePassword') }}">
              @csrf
             <div class="form-group">
                <label for="npass">New Password:</label>
                <input name="password" type="Password" class="form-control" id="npass" value="">
             </div>
             <div class="form-group">
                <label for="vpass">Verify Password:</label>
                <input name="confirm_password" type="Password" class="form-control" id="vpass" value="">
             </div>
             <button type="submit" class="btn btn-primary mr-2">Submit</button>
             <button type="reset" class="btn iq-bg-danger">Cancel</button>
          </form>
       </div>
    </div>
</div>
