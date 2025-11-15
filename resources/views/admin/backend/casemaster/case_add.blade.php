@extends('admin.admin_master')
@section('admin')

<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">บันทึกข้อมูลผู้รับบริการ</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('client.store') }}" method="POST">
                @csrf
                 <div class="row">
                 <div class="col-md-6 mb-3">
                        <label for="title_name" class="form-label">คํานําหน้าชื่อ</label>
                        <select name="title_name" class="form-select" required>
                            <option value="">-- เลือกคํานําหน้าชื่อ --</option>
                            <option value="Mr">นาย</option>
                            <option value="Mrs">นาง</option>
                            <option value="Miss">นางสาว</option>
                        </select>
                    </div>

                        <!-- Gender redio button -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label d-block">เพศ</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" 
                            value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="genderMale">ชาย</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" 
                            value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="genderFemale">หญิง</label>
                        </div>
                    </div>
                     <!--End Gender redio button -->

                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">ชื่อ</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>

                 

                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">นามสกุล</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="code_number" class="form-label">เลขประจําตัว</label>
                        <input type="text" name="code_number" class="form-control" required>
                    </div>

                    {{-- <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">เพศ</label>
                        <select name="gender" class="form-select" required>
                            <option value="">-- เลือกเพศ --</option>
                            <option value="male">ชาย</option>
                            <option value="female">หญิง</option>
                            <option value="other">อื่น ๆ</option>
                        </select>
                    </div> --}}
        
                    <div class="col-md-6 mb-3">
                        <label for="birth_date" class="form-label">วันเกิด</label>
                        <input type="date" name="birth_date" id="birth_date" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">อีเมล</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                     <div class="col-md-6 mb-3">
                        <label for="sup_phone" class="form-label">เบอร์โทร</label>
                        <input type="text" name="sup_phone" id="sup_phone" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>

               <div class="col-md-6 mb-3">
                  <div class="form-group w-100">
                     <label class="form-label" for="formBasic">จังหวัด : <span class="text-danger">*</span></label>
                   <select name="province_id" id="province" class="form-control">
                    <option value="">--เลือกจังหวัด--</option>
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->prov_name }}</option>
                    @endforeach
                    </select>
                                
                  </div>
               </div>

               <div class="col-md-6 mb-3">
                  <div class="form-group w-100">
                     <label class="form-label" for="formBasic">อำเภอ : <span class="text-danger">*</span></label>
                     <select name="district_id" id="district" class="form-control form-select">
                        <option value="">--เลือกอําเภอ--</option>             
                     </select>                   
                  </div>
               </div>

               <div class="col-md-6 mb-3">
                  <div class="form-group w-100">
                     <label class="form-label" for="formBasic">ตําบล : <span class="text-danger">*</span></label>
                  <select name="sub_district_id" id="subdistrict" class="form-control form-select">
                        <option value="{{ old('subdistrict_id') }}">--เลือกตําบล--</option>
                       
                     </select>                   
                  </div>
               </div>

                    <div class="col-md-6 mb-3">
                        <label for="zipcode" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control">
                    </div>

                      <div class="col-md-6 mb-3">
                        <label for="contact_name" class="form-label">ชื่อผู้ติดต่อ</label>
                        <input type="text" name="contact_name" id="contact_name" class="form-control">
                    </div>

                      <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">สถานะ</label>
                        <input type="text" name="status" id="status" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">เบอร์โทร</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

         
                    <div class="col-md-12 mb-3">
                        <label class="form-label">ปัญหาที่พบ</label>
                        <div class="row">
                            @foreach($problems as $problem)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="problems[]" value="{{ $problem->id }}" id="problem{{ $problem->id }}">
                                        <label class="form-check-label" for="problem{{ $problem->id }}">
                                            {{ $problem->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                </div>
            </form>
        </div>
    </div>
</div>



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



