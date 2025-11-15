@extends('admin.admin_master')
@section('admin')

<div class="content">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Case Tables</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('case.add') }}" class="btn btn-secondary">Add Case</a>
            </div>
        </div>

        {{-- DataTable --}}
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Case List</h5>
                    </div>

        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap w-100">
                <thead class="table-primary">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เพศ</th>
                        <th>วันเกิด</th>
                        <th>ที่อยู่</th>
                        <th>เบอร์โทร</th>
                        <th>ปัญหา</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cases as $key => $case)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $case->first_name }} {{ $case->last_name }}</td>
                            <td>{{ ucfirst($case->gender) }}</td>
                            {{-- <td>{{ \Carbon\Carbon::parse($client->birth_date)->format('d/m/Y') }}</td>> --}}
                            <td>{{ \App\Helpers\ThaiDateHelper::formatThaiDate($case->birth_date) }}</td>
                            <td>{{ $case->address }}</td>
                            <td>{{ $case->phone }}</td>
                            <td>
                                @if($case->problems->isNotEmpty())
                                    <ul class="mb-0 ps-3">
                                        @foreach($case->problems as $problem)
                                            <li>{{ $problem->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">ไม่มีข้อมูล</span>
                                @endif
                            </td>
                            <td>
                                <a title="Edit" href="" 
                                    class="btn btn-success btn-sm">
                                    <span class="mdi mdi-book-edit-outline mdi-18px"></span>
                                </a>
                               <a title="Delete" href="" 
                                    class="btn btn-danger btn-sm" id="delete">
                                    <span class="mdi mdi-trash-can-outline mdi-18px"></span>
                        </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- end card-body -->

                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- end container-fluid -->
</div> <!-- end content -->


@endsection