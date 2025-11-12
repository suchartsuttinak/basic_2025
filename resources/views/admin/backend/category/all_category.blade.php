@extends('admin.admin_master')
@section('admin')
  
        <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Category Tables</h4>
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
                            <h5 class="card-title mb-0">Customer List</h5>
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
                                    @foreach ($category as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->category_name}}</td>
                                        <td>{{$item->category_slug}}</td>           
                                    <td>
                                    <!-- Edit Modal -->
                                    <button 
                                    type="button" class="btn btn-success btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#category"
                                    id="{{ $item->id }}"
                                    onclick="categoryEdit(this.id)">     
                                    แก้ไข
                                    </button>
                                      <!--End Edit Modal -->

                                    <!-- Delete Button -->
                                    <a href="{{ route('delete.category',$item->id) }}"
                                         class="btn btn-danger btn-sm" id="delete">ลบ</a>
                                    </td>
                                    </tr>
                                    @endforeach
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
                        <form action="{{ route('store.category') }}" method="POST">
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
                        <form action="{{ route('update.category') }}" method="POST">
                            @csrf                            
                            <!-- hidden id -->
                            <input type="hidden" name="cat_id" id="cat_id">

                            <div class="form-group col-md-12">
                                <label for="category_name" class="form-label">Product Category Name</label>
                                <input type="text" class="form-control" id="cat" name="category_name" >                              
                            </div>
                            
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update </button>
                            </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    function categoryEdit(id){
                        $.ajax({
                            url: "/edit/category/"+id,
                            type:"GET",
                            dataType:"json",
                            success:function(data){
                                $('#cat').val(data.category_name); 
                                $('#cat_id').val(data.id); 
                            }
                        });
                    }
                </script>

@endsection