@extends('admin.admin_master')
@section('admin')


 <!-- Validation error -->
        @if ($errors->any())
    <div class="alert alert-danger">
                <strong>เกิดข้อผิดพลาด!</strong> กรุณาตรวจสอบข้อมูลที่กรอก:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>  
        @endif

            <div class="container-fluid">
                <div class="card shadow-sm">
                    <div class="card-header bg-general text-primary ">
                        <h4 class="mb-0 ">ข้อมูลผู้รับบริการ</h4>                 
                    </div>
                 </div>

        <div class="card-body">
            <form id="myForm" action="{{ route('recipient.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                <div class=" form-group col-md-2 mb-3">
                    <label for="register_number" class="form-label">เลขทะเบียน</label>
                    <input type="text" name="register_number" class="form-control"
                      value="{{ old('register_number') }}">   
                </div>

                 <div class="form-group col-md-4 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="title_id">คำนำหน้าชื่อ : <span class="text-danger">*</span></label>
                            <select name="title_id" id="title_id" class="form-control form-select">
                                <option value="">--เลือกคำนำหน้าชื่อ--</option>
                                @foreach ($titles as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('title_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->title_name }}
                                    </option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>

                    <!-- Gender redio button -->
                    <div class="form-group col-md-4 mb-3">
                        <label class="form-label d-block">เพศ : <span class="text-danger">*</span></label>
                        <div class="form-check form-check-inline">        
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" 
                            value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required
                             value="{{ old('gender') }}">
                            <label class="form-check-label" for="genderMale">ชาย</label>
                        </div>
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" 
                            value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                            
                            <label class="form-check-label" for="genderFemale">หญิง</label>
                        </div>
                    </div>
                    <!--End Gender redio button -->
                    
                    <div class="col-md-4 mb-3">
                            <label for="nick_name" class="form-label">ชื่อเล่น</label>
                            <input type="text" name="nick_name" class="form-control">
                        </div>
                    
                    <div class="form-group col-md-4 mb-3">
                        <label for="first_name" class="form-label">ชื่อ : <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" class="form-control" required
                         value="{{ old('first_name') }}">
                    </div>
                    
                    <div class=" form-group col-md-4 mb-3">
                        <label for="last_name" class="form-label">นามสกุล : <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" class="form-control" required
                         value="{{ old('last_name') }}">
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="id_card" class="form-label">เลขประจําตัวประชาชน</label>
                        <input type="text" name="id_card" class="form-control" required
                         value="{{ old('id_card') }}">
                          @error('id_card')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                    </div>

        
                    <div class="form-group col-md-4 mb-3">
                        <label for="birth_date" class="form-label">วันเกิด</label>
                        <input type="date" name="birth_date" id="birth_date" class="form-control" required
                         value="{{ old('birth_date') }}">
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="national_id">สัญชาติ : <span class="text-danger">*</span></label>
                            <select name="national_id" id="national_id" class="form-control form-select">
                                <option value="">--เลือกสัญชาติ--</option>
                                @foreach ($nations as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('national_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nation_name }}
                                    </option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>

                     <div class="form-group col-md-3 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="religion_id">ศาสนา : <span class="text-danger">*</span></label>
                                <select name="religion_id" id="religion_id" class="form-control form-select">
                                    <option value="">--เลือกศาสนา--</option>
                                    @foreach ($religions as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('religion_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->religion_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                     <div class="form-group col-md-3 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="marital_id">สถานะ : <span class="text-danger">*</span></label>
                                <select name="marital_id" id="marital_id" class="form-control form-select">
                                    <option value="">--สถานะการสมรส--</option>
                                    @foreach ($maritals as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('marital_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->marital_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                  <div class="form-group col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="occupation_id">อาชีพ : <span class="text-danger">*</span></label>
                            <select name="occupation_id" id="occupation_id" class="form-control form-select">
                                <option value="">--อาชีพ--</option>
                                @foreach ($occupations as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('occupation_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->occupation_name }}
                                    </option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>

                     <div class="form-group col-md-3 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="income_id">รายได้ : <span class="text-danger">*</span></label>
                                <select name="income_id" id="income_id" class="form-control form-select">
                                    <option value="">--รายได้เฉลี่ย--</option>
                                    @foreach ($incomes as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('income_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->income_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                    <div class="form-group col-md-6 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="education_id">การศึกษา : <span class="text-danger">*</span></label>
                                <select name="education_id" id="education_id" class="form-control form-select">
                                    <option value="">--ระดับการศึกษา--</option>
                                    @foreach ($educations as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('education_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->educat_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                    <div class="col-md-6 mb-3">
                            <label for="scholl" class="form-label">ชื่อโรงเรียน</label>
                            <input type="text" name="scholl" id="scholl" 
                                class="form-control" 
                                value="{{ old('scholl') }}" required>
                            @error('scholl')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    <div class="col-md-4 mb-3">
                            <label for="address" class="form-label">ที่อยู่</label>
                            <input type="text" name="address" id="address" 
                                class="form-control" 
                                value="{{ old('address') }}" required>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="province">จังหวัด : <span class="text-danger">*</span></label>
                                <select name="province_id" id="province" class="form-control">
                                    <option value="">--เลือกจังหวัด--</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}" 
                                            {{ old('province_id') == $province->id ? 'selected' : '' }}>
                                            {{ $province->prov_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                <div class="form-group col-md-4 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="district">อำเภอ : <span class="text-danger">*</span></label>
                            <select name="district_id" id="district" class="form-control form-select">
                                <option value="">--เลือกอำเภอ--</option>
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}" 
                                        {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                        {{ $district->dist_name }}
                                    </option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>

                <div class="form-group col-md-4 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="subdistrict">ตำบล : <span class="text-danger">*</span></label>
                            <select name="sub_district_id" id="subdistrict" class="form-select" required>
                                <option value="">-- เลือกตำบล --</option>
                                @foreach($sub_districts as $subdistrict)
                                    <option value="{{ $subdistrict->id }}" 
                                        {{ old('sub_district_id', $recipient->sub_district_id ?? '') == $subdistrict->id ? 'selected' : '' }}>
                                        {{ $subdistrict->subdist_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sub_district_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            
                        </div>
                    </div>


















                    

                   <div class="col-md-4 mb-3">
                            <label for="zipcode" class="form-label">รหัสไปรษณีย์</label>
                            <input type="text" name="zipcode" id="zipcode" 
                                class="form-control" 
                                value="{{ old('zipcode') }}">
                            @error('zipcode')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                     <div class="col-md-4 mb-3">
                            <label for="phone" class="form-label">โทรศัพท์</label>
                            <input type="text" name="phone" id="phone" 
                                class="form-control" 
                                value="{{ old('phone') }}" required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                     <div class="form-group col-md-3 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="target_id">กลุ่มเป้าหมาย : <span class="text-danger">*</span></label>
                                <select name="target_id" id="target_id" class="form-control form-select">
                                    <option value="">--กลุ่มเป้าหมาย--</option>
                                    @foreach ($targets as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('target_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->target_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                     <div class="form-group col-md-3 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="contact_id">วิธีการติดต่อ : <span class="text-danger">*</span></label>
                                <select name="contact_id" id="contact_id" class="form-control form-select">
                                    <option value="">--การติดต่อ--</option>
                                    @foreach ($contacts as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('contact_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->contact_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                    <div class="form-group col-md-3 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="project_id">หน่วยงาน : <span class="text-danger">*</span></label>
                                <select name="project_id" id="project_id" class="form-control form-select">
                                    <option value="">--หน่วยงาน--</option>
                                    @foreach ($projects as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('project_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->project_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                    <div class="form-group col-md-3 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="house_id">สถานที่พักอาศัย : <span class="text-danger">*</span></label>
                                <select name="house_id" id="house_id" class="form-control form-select">
                                    <option value="">--สถานที่พัก--</option>
                                    @foreach ($houses as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('house_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->house_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                     <div class="form-group col-md-4 mb-3">
                            <div class="form-group w-100">
                                <label class="form-label" for="status_id">สถานะผู้เข้ารับ : <span class="text-danger">*</span></label>
                                <select name="status_id" id="status_id" class="form-control form-select">
                                    <option value="">--สถานะผู้เข้ารับ--</option>
                                    @foreach ($statuses as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('status_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->status_name }}
                                        </option>
                                    @endforeach
                                </select>                   
                            </div>
                        </div>

                     <div class="form-group col-md-4 mb-3">
                            <label for="arrival_date" class="form-label">วันที่รับเข้า</label>
                            <input type="date" name="arrival_date" id="arrival_date" 
                                class="form-control" 
                                value="{{ old('arrival_date') }}">
                            @error('arrival_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    <div class="col-md-4 mb-3">
                        <label for="case_resident" class="form-label">สถานะอยู่อาศัย</label>
                            <select name="case_resident" class="form-select" required>
                                <option value="">-- เลือกสถานะ --</option>
                                <option value="Active" selected>อยู่อาศัย</option>
                                <option value="Inactive">ไม่อยู่อาศัย</option>
                            </select>
                        </div>

                       <!-- Image -->
                            <div class="col-md-4">
                                <label for="image" class="form-label">อัปโหลดรูป</label>
                                <input class="form-control" type="file" name="image" id="image">
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">ภาพถ่าย</label>
                                <img id="showImage" 
                                    src="{{ !empty($profileData->image) ? asset($profileData->image) : asset('upload/no_image.jpg') }}"
                                    class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
                            </div>
                            <!-- Image -->

                    <div class="col-md-12 mb-3">
                        <label class="form-label">ปัญหาที่พบ <span class="text-danger">* (เลือกได้มากกว่า 1 รายการ)</span></label>
                        <div class="row">
                            @foreach($problems as $problem)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" 
                                        name="problems[]" value="{{ $problem->id }}" id="problem{{ $problem->id }}">
                                        <label  class="form-check-label" for="problem{{ $problem->id }}">
                                            {{ $problem->name }}
                                        </label>
                                    </div>
                                </div>        
                            @endforeach
                            
                        </div>           
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


        <!-- validation -->
         <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                register_number: {
                    required : true,
                }, 
                title_id: {
                    required : true,
                }, 
                gender: {
                    required : true,
                }, 
                first_name: {
                    required : true,
                }, 
                last_name: {
                    required : true,
                }, 
                id_card: {
                    required : true,
                }, 
                birth_date: {
                    required : true,
                }, 
                national_id: {
                    required : true,
                }, 
                religion_id: {
                    required : true,
                }, 
                marital_id: {
                    required : true,
                }, 
                occupation_id: {
                    required : true,
                }, 
                income_id: {
                    required : true,
                }, 
                education_id: {
                    required : true,
                }, 
                province_id: {
                    required : true,
                }, 
                district_id: {
                    required : true,
                }, 
                sub_district_id: {
                    required : true,
                }, 
                target_id: {
                    required : true,
                }, 
                contact_id: {
                    required : true,
                }, 
                project_id: {
                    required : true,
                }, 
                house_id: {
                    required : true,
                }, 
                status_id: {
                    required : true,
                }, 
                arrival_date: {
                    required : true,
                }, 
                problems: {
                    required : true,
                }, 
            },
            messages :{
                 register_number: {
                    required : 'กรุณากรอกเลขทะเบียน',
                }, 
                title_id: {
                    required : 'กรุณากรอกคํานําหน้าชื่อ',
                }, 
                 gender: {
                    required : 'กรุณาเลือกเพศ',
                }, 
                 first_name: {
                    required : 'กรุณากรอกชื่อ',
                }, 
                 last_name: {
                    required : 'กรุณากรอกนามสกุล',
                }, 
                 id_card: {
                    required : 'กรุณากรอกเลขประจําตัวประชาชน',
                }, 
                 birth_date: {
                    required : 'กรุณากรอกวันเกิด',
                }, 
                 national_id: {
                    required : 'กรุณาเลือกสัญชาติ',
                }, 
                 marital_id: {
                    required : 'กรุณาเลือกสถานภาพสมรส',
                }, 
                 occupation_id: {
                    required : 'กรุณาเลือกอาชีพ',
                }, 
                 income_id: {
                    required : 'กรุณาเลือกรายได้',
                }, 
                 education_id: {
                    required : 'กรุณาเลือกการศึกษา',
                }, 
                 province_id: {
                    required : 'กรุณาเลือกจังหวัด',
                }, 
                 district_id: {
                    required : 'กรุณาเลือกอำเภอ',
                }, 
                 sub_district_id: {
                    required : 'กรุณาเลือกตําบล',
                }, 
                 target_id: {
                    required : 'กรุณาเลือกกลุ่มเป้าหมาย',
                }, 
                 contact_id: {
                    required : 'กรุณาเลือกการติดต่อ',
                }, 
                 house_id: {
                    required : 'กรุณาเลือกสถานที่พักอาศัย',
                }, 
                 status_id: {
                    required : 'กรุณาเลือกสถานะ',
                }, 
                 arrival_date: {
                    required : 'กรุณาเลือกวันที่รับเข้า',
                }, 
                 problems: {
                    required : 'กรุณาเลือกปัญหา',
                }, 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });  
</script>

@endsection

        





