@extends('frontend.main.main_recipient')
  

@section('content')
  <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">{{ $recipients->full_name }}</h4>
                            </div>
            
                            <!-- Modal Add Category -->
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                   <button 
                                    type="button" class="btn btn-primary" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#standard-modal">
                                    Add Category
                                    </button>
                                </ol>
                            </div>
                            <!--End Modal Add Category -->
                        </div>

            <!-- Datatables Table  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h5 class="card-title mb-0"></h5>
                        </div><!-- end card header -->

                        <!-- Category Table -->
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Category Name</th>
                                    <th>Category Slug</th>                                 
                                    <th>Action</th>                                 
                                </tr>
                                </thead>
                                <tbody>
                                        <td></td>
                                        <td></td>
                                        <td></td>           
                                    <td>
                                    <!-- Edit Modal -->
                                      <button class="btn btn-primary btn-sm">บันทึก</button>
                                    <button class="btn btn-danger btn-sm">ยกเลิก</button>
                                    </td>
                                    </tr>
                             
                                </tbody>
                            </table>
                        </div>
                        <!--End Category Table -->
                                </div>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div> <!-- content -->

                   <!-- Form Create Category Modal -->
                    <div class="modal fade" id="standard-modal" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="standard-modalLabel">Product Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="category_name" class="form-label">Product Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name" >                              
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Edit Category Modal -->
                    <div class="modal fade" id="category" tabindex="-1" aria-labelledby="standard-modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="standard-modalLabel">Product Category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                        <form action="" method="POST">
                            @csrf                            
                            <!-- hidden id -->
                            <input type="hidden" name="cat_id" id="cat_id">

                            <div class="form-group col-md-12">
                                <label for="category_name" class="form-label">Product Category Name</label>
                                <input type="text" class="form-control" id="cat" name="category_name" >                              
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm ">Update </button>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
                
      


      
@endsection