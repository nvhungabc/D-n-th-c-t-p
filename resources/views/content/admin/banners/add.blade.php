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
                                  <h4 class="card-title">Add Banner Image</h4>
                               </div>
                            </div>
                            <div class="iq-card-body">
                               <form action="{{ route('addBanners') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label>Banner Image:</label>
                                        <div class="col-md-9 col-sm-8">
                                            <div class="row d-flex">
                                                <div class="col-xs-6">
                                                    <img id="mat_truoc_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                                                            style="max-width: 500px; height: 500px; margin-bottom: 10px;" class="img-fluid"/>
                                                    <input multiple type="file" name="images[]" accept="image/*" class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                                                </div>
                                            </div>
                                        </div>
                                        @error('image')
                                        <p style="color: red">{{ $message }}</p>
                                        @enderror

                                    </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
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
