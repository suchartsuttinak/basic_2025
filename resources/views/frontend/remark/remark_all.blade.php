@extends('frontend.main.main_recipient')

@section('content')
<div class="content">
    <div class="container-fluid px-0">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
             <h6 class="fs-18 text-black">{{ $recipients->full_name }}: อายุ {{ $recipients->age}} ปี </h6>
         </div>
            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <a href="{{ route('remark.add', $recipients->id) }}" class="btn btn-primary">เพิ่มข้อมูล</a>
                </ol>
            </div>
        </div>

        <!-- Datatables -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Remark List</h5>
                    </div>

                    <div class="card-body ">
                        <table id="datatable" class=" table table-bordered dt-responsive table-responsive nowrap ">
                            <thead>
                               
                                <tr>
                                    <th>วันที่</th>
                                    <th>การช่วยเหลือ /ติดตามผล</th>
                                    <th>หมายเหตุ</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>                            
                            </thead>
                           <tbody>
                            @foreach ($remarks as $key => $remark)
                                <tr>
                                <td>{{ $remark->date }}</td>
                                <td style="text-align: left;">{{ $remark->remark_name }}</td>
                            <td style="text-align: left;">{{ $remark->remark_description }}</td>

                                <td class="text-center">
                                    <!-- ปุ่มแก้ไข -->
                                    <a title="Edit" href="#" class="btn btn-success btn-icon">
                                    <span class="mdi mdi-pencil"></span>
                                    </a>

                                    <!-- ปุ่มลบ -->
                                    <a title="Delete" href="#" class="btn btn-danger btn-icon" id="delete">
                                    <span class="mdi mdi-trash-can-outline"></span>
                                    </a>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div> <!-- content -->
@endsection