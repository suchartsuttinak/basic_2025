@extends('admin.admin_master')
@section('admin')

<div class="content">
    <div class="container-fluid">

        {{-- Header --}}
        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Recipient Tables</h4>
            </div>
            <div class="text-end">
                <a href="{{ route('recipient.add') }}" class="btn btn-secondary">Add Recipient</a>
            </div>
        </div>

        {{-- DataTable --}}
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Recipient List</h5>
                    </div>

        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap w-100">
                <thead class="table-primary">
                    <tr>
                        <th>ลำดับ</th>
                        <th>ภาพ</th>
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
                    @foreach ($recipients as $key => $recip)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                              <!-- ดึงภาพ -->
                             <td>
                               <img src="{{ $recip->image ? asset('upload/recipient_images/'.$recip->image) 
                               : asset('upload/no_image.jpg') }}"
                                style="height: 40px; width: 40px; object-fit: cover;">
                            </td>
                            <td>{{ $recip->first_name }} {{ $recip->last_name }}</td>
                             <td>{{ $recip->gender_text }}</td>

                            {{-- <td>{{ \Carbon\Carbon::parse($client->birth_date)->format('d/m/Y') }}</td>> --}}
                            <td>{{ \App\Helpers\ThaiDateHelper::formatThaiDate($recip->birth_date) }}</td>
                            <td>{{ $recip->address }}</td>
                            <td>{{ $recip->phone }}</td>
                            <td>
                                @if($recip->problems->isNotEmpty())
                                    <ul class="mb-0 ps-3">
                                        @foreach($recip->problems as $problem)
                                            <li>{{ $problem->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">ไม่มีข้อมูล</span>
                                @endif
                            </td>
                            <td>
                                <a title="Edit" href="{{ route('recipient.edit', $recip->id) }}" 
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

<!-- จังหวัด อำเภอ ตําบล รหัสไปรษณีย์ -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $('#province').on('change', function () {
        let province_id = $(this).val();
        console.log("Selected province ID:", province_id); // ✅ ตรวจค่าที่ส่ง

        $.get('/get-districts/' + province_id, function (data) {
            console.log("Districts loaded:", data); // ✅ ตรวจ response

            $('#district').empty().append('<option value="">--เลือกอำเภอ--</option>');
            $.each(data, function (key, value) {
                $('#district').append('<option value="' + value.id + '">' + value.dist_name + '</option>');
            });
            $('#subdistrict').empty().append('<option value="">--เลือกตำบล--</option>');
            $('#zipcode').val('');
        });
    });


    $('#district').on('change', function () {
        let district_id = $(this).val();
        $.get('/get-subdistricts/' + district_id, function (data) {
            $('#subdistrict').empty().append('<option value="">--เลือกตำบล--</option>');
            $.each(data, function (key, value) {
                $('#subdistrict').append('<option value="' + value.id + '">' + value.subd_name + '</option>');
            });
            $('#zipcode').val('');
        });
    });

    $('#subdistrict').on('change', function () {
        let subdistrict_id = $(this).val();
        $.get('/get-zipcode/' + subdistrict_id, function (data) {
            $('#zipcode').val(data.zipcode);
        });
    });
});
</script>
<!-- จังหวัด อำเภอ ตําบล รหัสไปรษณีย์ -->


@endsection