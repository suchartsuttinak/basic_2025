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
                    <label for="register_number" class="form-label">เลขทะเบียน</label>
                    <input type="text" name="register_number" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                        <label for="title_name" class="form-label">คํานําหน้าชื่อ : 
                        <span class="text-danger">*</span></label>
                        <select name="title_name" class="form-select" required>
                            <option value="">-- เลือกคํานําหน้าชื่อ --</option>
                            <option value="Mr">นาย</option>
                            <option value="Mrs">นาง</option>
                            <option value="Miss">นางสาว</option>
                        </select>
                    </div>
                    
                    
                    <!-- Gender redio button -->
                    <div class="col-md-4 mb-3">
                        <label class="form-label d-block">เพศ : <span class="text-danger">*</span></label>
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
                    
                    <div class="col-md-4 mb-3">
                            <label for="nick_name" class="form-label">ชื่อเล่น</label>
                            <input type="text" name="nick_name" class="form-control">
                        </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="first_name" class="form-label">ชื่อ : <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                        <label for="last_name" class="form-label">นามสกุล : <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="id_card" class="form-label">เลขประจําตัวประชาชน</label>
                        <input type="text" name="id_card" class="form-control" required>
                    </div>

        
                    <div class="col-md-4 mb-3">
                        <label for="birth_date" class="form-label">วันเกิด</label>
                        <input type="date" name="birth_date" id="birth_date" class="form-control" required>
                    </div>

                     <div class="col-md-4 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="formBasic">สัญชาติ : <span class="text-danger">*</span></label>
                            <select name="national_id" id="national_id" class="form-control form-select">
                                <option value="">--เลือกสัญชาติ--</option>
                                @foreach ($nations as $item)
                                <option value="{{ $item->id }}">{{ $item->nation_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="formBasic">ศาสนา : <span class="text-danger">*</span></label>
                            <select name="religion_id" id="religion_id" class="form-control form-select">
                                <option value="">--เลือกสัญชาติ--</option>
                                @foreach ($religions as $item)
                                <option value="{{ $item->id }}">{{ $item->religion_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="formBasic">สถานะ : <span class="text-danger">*</span></label>
                            <select name="marital_id" id="marital_id" class="form-control form-select">
                                <option value="">--สถานะการสมรส--</option>
                                @foreach ($maritals as $item)
                                <option value="{{ $item->id }}">{{ $item->marital_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="formBasic">อาชีพ : <span class="text-danger">*</span></label>
                            <select name="occupation_id" id="occupation_id" class="form-control form-select">
                                <option value="">--อาชีพ--</option>
                                @foreach ($occupations as $item)
                                <option value="{{ $item->id }}">{{ $item->occupation_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="formBasic">รายได้ : <span class="text-danger">*</span></label>
                            <select name="income_id" id="income_id" class="form-control form-select">
                                <option value="">--รายได้เฉลี่ย--</option>
                                @foreach ($incomes as $item)
                                <option value="{{ $item->id }}">{{ $item->income_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>

                     <div class="col-md-6 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="formBasic">การศึกษา : <span class="text-danger">*</span></label>
                            <select name="education_id" id="education_id" class="form-control form-select">
                                <option value="">--ระดับการศึกษา--</option>
                                @foreach ($educations as $item)
                                <option value="{{ $item->id }}">{{ $item->educat_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>  

                     <div class="col-md-6 mb-3">
                        <label for="school" class="form-label">ชื่อโรงเรียน</label>
                        <input type="text" name="scholl" id="scholl" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>

               <div class="col-md-4 mb-3">
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

               <div class="col-md-4 mb-3">
                  <div class="form-group w-100">
                     <label class="form-label" for="formBasic">อำเภอ : <span class="text-danger">*</span></label>
                     <select name="district_id" id="district" class="form-control form-select">
                        <option value="">--เลือกอําเภอ--</option>             
                     </select>                   
                  </div>
               </div>

               <div class="col-md-4 mb-3">
                  <div class="form-group w-100">
                     <label class="form-label" for="formBasic">ตําบล : <span class="text-danger">*</span></label>
                  <select name="sub_district_id" id="subdistrict" class="form-control form-select">
                        <option value="{{ old('subdistrict_id') }}">--เลือกตําบล--</option>
                       
                     </select>                   
                  </div>
               </div>

                    <div class="col-md-4 mb-3">
                        <label for="zipcode" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control">
                    </div>     

                     <div class="col-md-4 mb-3">
                        <label for="phone" class="form-label">โทรศัพท์</label>
                        <input type="text" name="phone" id="phone" class="form-control" required>
                    </div>

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="target">กลุ่มเป้าหมาย : <span class="text-danger">*</span></label>
                            <select name="target_id" id="target_id" class="form-control form-select">
                                <option value="">--กลุ่มเป้าหมาย--</option>
                                @foreach ($targets as $item)
                                <option value="{{ $item->id }}">{{ $item->target_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>  

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="target">วิธีการติดต่อ : <span class="text-danger">*</span></label>
                            <select name="contact_id" id="contact_id" class="form-control form-select">
                                <option value="">--การติดต่อ--</option>
                                @foreach ($contacts as $item)
                                <option value="{{ $item->id }}">{{ $item->contact_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>  

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="target">หน่วยงาน : <span class="text-danger">*</span></label>
                            <select name="project_id" id="project_id" class="form-control form-select">
                                <option value="">--หน่วยงาน--</option>
                                @foreach ($projects as $item)
                                <option value="{{ $item->id }}">{{ $item->project_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>  

                     <div class="col-md-3 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="target">สถานที่พักอาศัย : <span class="text-danger">*</span></label>
                            <select name="house_id" id="house_id" class="form-control form-select">
                                <option value="">--สถานที่พัก--</option>
                                @foreach ($houses as $item)
                                <option value="{{ $item->id }}">{{ $item->house_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>  

                     <div class="col-md-4 mb-3">
                        <div class="form-group w-100">
                            <label class="form-label" for="target">สถานะผู้เข้ารับ : <span class="text-danger">*</span></label>
                            <select name="status_id" id="status_id" class="form-control form-select">
                                <option value="">--สถานะผู้เข้ารับ--</option>
                                @foreach ($statuses as $item)
                                <option value="{{ $item->id }}">{{ $item->status_name }}</option>
                                @endforeach
                            </select>                   
                        </div>
                    </div>  

                      <div class="col-md-4 mb-3">
                        <label for="arrival_date" class="form-label">วันที่รับเข้า</label>
                        <input type="date" name="arrival_date" id="arrival_date" class="form-control">
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

@endsection



