@extends('admin.admin_master')
@section('admin')

<!-- show image javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                       
                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0">Edit Warehouse</h4>
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
                                    <h5 class="card-title mb-0">Edit Warehouse</h5>
                                </div><!-- end card header -->

                        <div class="card-body">
                            <form action="{{route('update.warehouse')}}" method="POST" 
                                    enctype="multipart/form-data" class="row g-3">
                                @csrf

                                <!-- ส่ง id ไปด้วย -->
                            <input type="hidden" name="id" value="{{$warehouse->id}}">

                         <div class="col-md-6">
                        <label for="name" class="form-label">Warehouse Name</label>
                        <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{$warehouse->name}}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Warehouse Email</label>
                        <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{$warehouse->email}}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">Warehouse Phone</label>
                        <input type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ $warehouse->phone }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="city" class="form-label">Warehouse City</label>
                        <input type="text" name="city" id="city"
                                class="form-control @error('city') is-invalid @enderror"
                                value="{{ $warehouse->city }}">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Update form</button>
                    </div>
                </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
      </div> <!-- container-fluid -->
 </div>     
@endsection