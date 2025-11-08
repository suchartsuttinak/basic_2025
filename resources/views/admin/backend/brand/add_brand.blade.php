@extends('admin.admin_master')
@section('admin')

<!-- show image javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                       
    <!-- Start Content-->
    <div class="container-fluid">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Brand</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Form Validation</li>
                </ol>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Brand</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <form action="{{route('store.brand')}}" method="POST" 
                              enctype="multipart/form-data" class="row g-3">
                            @csrf
                            <div class="col-md-12">
                                <label for="name" class="form-label">Brand name</label>
                                <input type="text" class="form-control" name = "name">
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Brand Image</label>
                              <input class="form-control" type="file"
                                        name="image" id="image">
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">Brand Image</label>
                                <img id="showImage" src="{{ !empty($profileData->photo) ? url('upload/user_images/' 
                                . $profileData->photo) : url('upload/no_image.jpg') }}"
                                class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
      </div> <!-- container-fluid -->
 </div>
  
        <!-- show image -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
        <!-- end show image -->
@endsection