@extends('admin.admin_master')
@section('admin')

<div class="content">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Client Tables</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('client.add') }}" class="btn btn-secondary">Add Client</a>
            </div>
        </div>

        {{-- DataTable --}}
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Client List</h5>
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
                    @foreach ($clients as $key => $client)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                            <td>{{ ucfirst($client->gender) }}</td>
                            {{-- <td>{{ \Carbon\Carbon::parse($client->birth_date)->format('d/m/Y') }}</td>> --}}
                            <td>{{ \App\Helpers\ThaiDateHelper::formatThaiDate($client->birth_date) }}</td>
                            <td>{{ $client->address }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>
                                @if($client->problems->isNotEmpty())
                                    <ul class="mb-0 ps-3">
                                        @foreach($client->problems as $problem)
                                            <li>{{ $problem->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">ไม่มีข้อมูล</span>
                                @endif
                            </td>
                            <td>
                                <a title="Edit" href="{{ route('client.edit', $client->id) }}" 
                                    class="btn btn-success btn-sm">
                                    <span class="mdi mdi-book-edit-outline mdi-18px"></span>
                                </a>
                               <a title="Delete" href="{{ route('client.delete', $client->id) }}" 
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

{{-- DataTables Script --}}
{{-- @push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            language: {
                search: "ค้นหา:",
                lengthMenu: "แสดง _MENU_ รายการ",
                info: "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                paginate: {
                    first: "หน้าแรก",
                    last: "หน้าสุดท้าย",
                    next: "ถัดไป",
                    previous: "ก่อนหน้า"
                },
                zeroRecords: "ไม่พบข้อมูลที่ตรงกัน",
            }
        });
    });
</script>
@endpush --}}



@endsection