@extends('admin.admin_master')
@section('admin')

            <div class="container-fluid">
                <div class="card shadow-sm">
                    <div class="card-header bg-general text-primary ">
                        <h4 class="mb-0 ">ข้อมูลผู้รับบริการ</h4>
                      
                    </div>
                 </div>

        <div class="card-body">
            <form action="{{ route('recipient.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                <div class="col-md-2 mb-3">
                    <label for="register_number" class="form-label fw-bold">เลขทะเบียน</label>
                    <input type="text" name="register_number" id="register_number" 
                        class="form-control"
                        value="{{ old('register_number', $recipient->register_number) }}"
                        placeholder="กรอกเลขทะเบียน">
                    @error('register_number')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="title_name" class="form-label">คํานําหน้าชื่อ :
                        <span class="text-danger">*</span>
                    </label>
                    <select name="title_name" class="form-select" required>
                        <option value="">-- เลือกคํานําหน้าชื่อ --</option>
                        <option value="Mr" {{ old('title_name', $recipient->title_name) == 'Mr' ? 'selected' : '' }}>นาย</option>
                        <option value="Mrs" {{ old('title_name', $recipient->title_name) == 'Mrs' ? 'selected' : '' }}>นาง</option>
                        <option value="Miss" {{ old('title_name', $recipient->title_name) == 'Miss' ? 'selected' : '' }}>นางสาว</option>
                    </select>
                </div>
          
                    <!-- Gender radio button -->
                <div class="col-md-4 mb-3">
                    <label class="form-label d-block">เพศ : <span class="text-danger">*</span></label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderMale"
                            value="male" {{ old('gender', $recipient->gender) == 'male' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="genderMale">ชาย</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderFemale"
                            value="female" {{ old('gender', $recipient->gender) == 'female' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="genderFemale">หญิง</label>
                    </div>
                </div>
                <!-- End Gender radio button -->

                   <div class="col-md-4 mb-3">
                        <label for="nick_name" class="form-label fw-bold">ชื่อเล่น</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="nick_name" id="nick_name" class="form-control"
                                value="{{ old('nick_name', $recipient->nick_name) }}"
                                placeholder="กรอกชื่อเล่น">
                        </div>
                        @error('nick_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                <div class="col-md-4 mb-3">
                    <label for="first_name" class="form-label fw-bold">
                        ชื่อ : <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="first_name" id="first_name" 
                        class="form-control" 
                        value="{{ old('first_name', $recipient->first_name) }}" 
                        placeholder="กรอกชื่อจริง" required>
                    @error('first_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="last_name" class="form-label fw-bold">
                        นามสกุล : <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="last_name" id="last_name" 
                        class="form-control" 
                        value="{{ old('last_name', $recipient->last_name) }}" 
                        placeholder="กรอกนามสกุล" required>
                    @error('last_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                    <div class="col-md-4 mb-3">
                        <label for="id_card" class="form-label fw-bold">เลขประจำตัวประชาชน</label>
                        <input type="text" name="id_card" id="id_card" 
                            class="form-control" 
                            value="{{ old('id_card', $recipient->id_card) }}" 
                            placeholder="กรอกเลขบัตรประชาชน 13 หลัก" required>
                        @error('id_card')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="birth_date" class="form-label fw-bold">วันเกิด</label>
                        <input type="date" name="birth_date" id="birth_date" 
                            class="form-control" 
                            value="{{ old('birth_date', $recipient->birth_date) }}" 
                            required>
                        @error('birth_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="national_id">
                                สัญชาติ : <span class="text-danger">*</span>
                            </label>
                            <select name="national_id" id="national_id" class="form-select" required>
                                <option value="">-- เลือกสัญชาติ --</option>
                                @foreach ($nations as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('national_id', $recipient->national_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nation_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('national_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="religion_id">
                                ศาสนา : <span class="text-danger">*</span>
                            </label>
                            <select name="religion_id" id="religion_id" class="form-select" required>
                                <option value="">-- เลือกศาสนา --</option>
                                @foreach ($religions as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('religion_id', $recipient->religion_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->religion_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('religion_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="marital_id">
                                สถานะ : <span class="text-danger">*</span>
                            </label>
                            <select name="marital_id" id="marital_id" class="form-select" required>
                                <option value="">-- สถานะการสมรส --</option>
                                @foreach ($maritals as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('marital_id', $recipient->marital_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->marital_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('marital_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="occupation_id">
                                อาชีพ : <span class="text-danger">*</span>
                            </label>
                            <select name="occupation_id" id="occupation_id" class="form-select" required>
                                <option value="">-- อาชีพ --</option>
                                @foreach ($occupations as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('occupation_id', $recipient->occupation_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->occupation_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('occupation_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="income_id">
                                รายได้ : <span class="text-danger">*</span>
                            </label>
                            <select name="income_id" id="income_id" class="form-select" required>
                                <option value="">-- รายได้เฉลี่ย --</option>
                                @foreach ($incomes as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('income_id', $recipient->income_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->income_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('income_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                     <div class="col-md-6 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="education_id">
                                การศึกษา : <span class="text-danger">*</span>
                            </label>
                            <select name="education_id" id="education_id" class="form-select" required>
                                <option value="">-- ระดับการศึกษา --</option>
                                @foreach ($educations as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('education_id', $recipient->education_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->educat_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('education_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                     <div class="col-md-6 mb-3">
                        <label for="scholl" class="form-label fw-bold">ชื่อโรงเรียน</label>
                        <input type="text" name="scholl" id="scholl" 
                            class="form-control" 
                            value="{{ old('scholl', $recipient->scholl) }}" 
                            placeholder="กรอกชื่อโรงเรียน" required>
                        @error('scholl')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label fw-bold">ที่อยู่</label>
                        <input type="text" name="address" id="address" 
                            class="form-control" 
                            value="{{ old('address', $recipient->address) }}" 
                            placeholder="กรอกที่อยู่ปัจจุบัน" required>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group w-100">
                        <label class="form-label fw-bold" for="province">
                            จังหวัด : <span class="text-danger">*</span>
                        </label>
                        <select name="province_id" id="province" class="form-select" required>
                            <option value="">-- เลือกจังหวัด --</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province->id }}"
                                    {{ old('province_id', $recipient->province_id) == $province->id ? 'selected' : '' }}>
                                    {{ $province->prov_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('province_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group w-100">
                        <label class="form-label fw-bold" for="district">
                            อำเภอ : <span class="text-danger">*</span>
                        </label>
                        <select name="district_id" id="district" class="form-select" required>
                            <option value="">-- เลือกอำเภอ --</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}"
                                    {{ old('district_id', $recipient->district_id) == $district->id ? 'selected' : '' }}>
                                    {{ $district->dist_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('district_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

               <div class="col-md-6 mb-3">
                    <div class="form-group w-100">
                        <label class="form-label fw-bold" for="subdistrict">
                            ตำบล : <span class="text-danger">*</span>
                        </label>
                        <select name="sub_district_id" id="subdistrict" class="form-select" required>
                            <option value="">-- เลือกตำบล --</option>
                            @foreach($sub_districts as $subdistrict)
                                <option value="{{ $subdistrict->id }}"
                                    {{ old('sub_district_id', $recipient->sub_district_id) == $subdistrict->id ? 'selected' : '' }}>
                                    {{ $subdistrict->subd_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sub_district_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
  

                    <div class="col-md-6 mb-3">
                        <label for="zipcode" class="form-label fw-bold">รหัสไปรษณีย์</label>
                        <input type="text" name="zipcode" id="zipcode" 
                            class="form-control" 
                            value="{{ old('zipcode', $recipient->zipcode) }}" 
                            placeholder="กรอกรหัสไปรษณีย์" required>
                        @error('zipcode')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                     <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label fw-bold">โทรศัพท์</label>
                        <input type="text" name="phone" id="phone" 
                            class="form-control" 
                            value="{{ old('phone', $recipient->phone) }}" 
                            placeholder="กรอกโทรศัพท์" required>
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="target_id">
                                กลุ่มเป้าหมาย : <span class="text-danger">*</span>
                            </label>
                            <select name="target_id" id="target_id" class="form-select" required>
                                <option value="">-- กลุ่มเป้าหมาย --</option>
                                @foreach ($targets as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('target_id', $recipient->target_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->target_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('target_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>          

                     <div class="col-md-6 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="contact_id">
                                การติดต่อ : <span class="text-danger">*</span>
                            </label>
                            <select name="contact_id" id="contact_id" class="form-select" required>
                                <option value="">-- การติดต่อ --</option>
                                @foreach ($contacts as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('contact_id', $recipient->contact_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->contact_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('contact_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="project_id">
                                หน่วยงาน : <span class="text-danger">*</span>
                            </label>
                            <select name="project_id" id="project_id" class="form-select" required>
                                <option value="">-- หน่วยงาน --</option>
                                @foreach ($projects as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('project_id', $recipient->project_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->project_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="house_id">
                                สถานที่พัก : <span class="text-danger">*</span>
                            </label>
                            <select name="house_id" id="house_id" class="form-select" required>
                                <option value="">-- สถานที่พัก --</option>
                                @foreach ($houses as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('house_id', $recipient->house_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->house_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('house_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                     <div class="col-md-6 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label fw-bold" for="status_id">
                                สถานะผู้เข้ารับ : <span class="text-danger">*</span>
                            </label>
                            <select name="status_id" id="status_id" class="form-select" required>
                                <option value="">-- สถานะผู้เข้ารับ --</option>
                                @foreach ($statuses as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('status_id', $recipient->status_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->status_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                        <div class="col-md-6 mb-3">
                            <label for="arrival_date" class="form-label fw-bold">วันที่รับเข้า</label>
                            <input type="date" name="arrival_date" id="arrival_date" 
                                class="form-control" 
                                value="{{ old('arrival_date', $recipient->arrival_date) }}" 
                                required>
                            @error('arrival_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                   <div class="col-md-6 mb-3">
                        <label for="case_resident" class="form-label fw-bold">สถานะอยู่อาศัย</label>
                        <select name="case_resident" id="case_resident" class="form-select" required>
                            <option value="">-- เลือกสถานะ --</option>
                            <option value="Active" {{ old('case_resident', $recipient->case_resident) == 'Active' ? 'selected' : '' }}>อยู่อาศัย</option>
                            <option value="Inactive" {{ old('case_resident', $recipient->case_resident) == 'Inactive' ? 'selected' : '' }}>ไม่อยู่อาศัย</option>
                            
                        </select>
                        @error('case_resident')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                       <!-- Image -->
                            <div class="col-md-6">
                                <label for="image" class="form-label">อัปโหลดรูป</label>
                                <input class="form-control" type="file" name="image" id="image">
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">ภาพถ่าย</label>
                                <img id="showImage" 
                                    src="{{ $recipient->image ? asset('upload/recipient_images/'.$recipient->image) 
                                     : asset('upload/no_image.jpg') }}"
                                    class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
                            </div>
                            <!-- Image -->

                   <div class="col-md-12 mb-3">
    <label class="form-label fw-bold">
        ปัญหาที่พบ <span class="text-danger">* (เลือกได้มากกว่า 1 รายการ)</span>
    </label>
    <div class="row">
        @foreach($problems as $problem)
            <div class="col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                        name="problems[]" value="{{ $problem->id }}"
                        id="problem{{ $problem->id }}"
                        {{ in_array($problem->id, old('problems', $recipient->problems->pluck('id')->toArray())) ? 'checked' : '' }}>
                    <label class="form-check-label" for="problem{{ $problem->id }}">
                        {{ $problem->name }}
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    @error('problems')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



                            <div div class="text-end">
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



