@extends('frontend.main.main_recipient')
  
@section('content')
<form method="POST" action="">
    @csrf
    {{-- ที่อยู่บิดา --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">ที่อยู่บิดา</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="father_title">คำนำหน้าชื่อ</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_fname">บิดาชื่อ</label>
                    <input type="text" class="form-control" name="fname">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_lname">นามสกุล</label>
                    <input type="text" class="form-control" name="lname">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_age">อายุ (ปี)</label>
                    <input type="number" class="form-control" name="age">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="occupation">อาชีพ</label>
                    <input type="text" class="form-control" name="occupation">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="income">รายได้เฉลี่ย (บาท/เดือน)</label>
                    <input type="number" class="form-control" name="income">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="idcard">เลขประจำตัวประชาชน</label>
                    <input type="text" class="form-control" name="idcard">
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 mb-3">
                    <label>เลขที่</label>
                    <input type="text" class="form-control" name="address_no">
                </div>
                <div class="col-md-2 mb-3">
                    <label>หมู่ที่</label>
                    <input type="text" class="form-control" name="moo">
                </div>
                <div class="col-md-2 mb-3">
                    <label>ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="soi">
                </div>
                <div class="col-md-2 mb-3">
                    <label>ถนน</label>
                    <input type="text" class="form-control" name="road">
                </div>
                <div class="col-md-2 mb-3">
                    <label>หมู่บ้าน</label>
                    <input type="text" class="form-control" name="village">
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>จังหวัด</label>
                    <input type="text" class="form-control" name="province_id">
                </div>

                 <div class="col-md-4 mb-3">
                    <label>อำเภอ/เขต</label>
                    <input type="text" class="form-control" name="district_id">
                </div>

                 <div class="col-md-4 mb-3">
                    <label>ตำบล/แขวง</label>
                    <input type="text" class="form-control" name="sub_district_id">
                </div>

                <div class="col-md-2 mb-3">
                    <label>รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" name="zipcode">
                </div>
            </div>


            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>โทรศัพท์</label>
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
        </div>
    </div>

    {{-- ปุ่มแสดงฟอร์มอื่น ๆ --}}
    <div class="mb-4">
        <button type="button" class="btn btn-outline-success" onclick="toggleSection('mother')">+ ที่อยู่มารดา</button>
        <button type="button" class="btn btn-outline-info" onclick="toggleSection('spouse')">+ ที่อยู่สามี/ภรรยา</button>
        <button type="button" class="btn btn-outline-warning" onclick="toggleSection('relative')">+ ที่อยู่ญาติ</button>
    </div>

    {{-- ที่อยู่มารดา --}}
    <div id="section-mother" class="card mb-4 d-none">
        <div class="card-header bg-success text-white">ที่อยู่มารดา</div>
        <div class="card-body">
          <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="father_title">คำนำหน้าชื่อ</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_fname">บิดาชื่อ</label>
                    <input type="text" class="form-control" name="fname">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_lname">นามสกุล</label>
                    <input type="text" class="form-control" name="lname">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_age">อายุ (ปี)</label>
                    <input type="number" class="form-control" name="age">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="occupation">อาชีพ</label>
                    <input type="text" class="form-control" name="occupation">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="income">รายได้เฉลี่ย (บาท/เดือน)</label>
                    <input type="number" class="form-control" name="income">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="idcard">เลขประจำตัวประชาชน</label>
                    <input type="text" class="form-control" name="idcard">
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 mb-3">
                    <label>เลขที่</label>
                    <input type="text" class="form-control" name="address_no">
                </div>
                <div class="col-md-2 mb-3">
                    <label>หมู่ที่</label>
                    <input type="text" class="form-control" name="moo">
                </div>
                <div class="col-md-2 mb-3">
                    <label>ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="soi">
                </div>
                <div class="col-md-2 mb-3">
                    <label>ถนน</label>
                    <input type="text" class="form-control" name="road">
                </div>
                <div class="col-md-2 mb-3">
                    <label>หมู่บ้าน</label>
                    <input type="text" class="form-control" name="village">
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>จังหวัด</label>
                    <input type="text" class="form-control" name="province_id">
                </div>

                 <div class="col-md-4 mb-3">
                    <label>อำเภอ/เขต</label>
                    <input type="text" class="form-control" name="district_id">
                </div>

                 <div class="col-md-4 mb-3">
                    <label>ตำบล/แขวง</label>
                    <input type="text" class="form-control" name="sub_district_id">
                </div>

                <div class="col-md-2 mb-3">
                    <label>รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" name="zipcode">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>โทรศัพท์</label>
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
        </div>
    </div>


    {{-- ที่อยู่สามี/ภรรยา --}}
    <div id="section-spouse" class="card mb-4 d-none">
        <div class="card-header bg-info text-white">ที่อยู่สามี/ภรรยา</div>
        <div class="card-body">
              <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="father_title">คำนำหน้าชื่อ</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_fname">บิดาชื่อ</label>
                    <input type="text" class="form-control" name="fname">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_lname">นามสกุล</label>
                    <input type="text" class="form-control" name="lname">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_age">อายุ (ปี)</label>
                    <input type="number" class="form-control" name="age">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="occupation">อาชีพ</label>
                    <input type="text" class="form-control" name="occupation">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="income">รายได้เฉลี่ย (บาท/เดือน)</label>
                    <input type="number" class="form-control" name="income">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="idcard">เลขประจำตัวประชาชน</label>
                    <input type="text" class="form-control" name="idcard">
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 mb-3">
                    <label>เลขที่</label>
                    <input type="text" class="form-control" name="address_no">
                </div>
                <div class="col-md-2 mb-3">
                    <label>หมู่ที่</label>
                    <input type="text" class="form-control" name="moo">
                </div>
                <div class="col-md-2 mb-3">
                    <label>ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="soi">
                </div>
                <div class="col-md-2 mb-3">
                    <label>ถนน</label>
                    <input type="text" class="form-control" name="road">
                </div>
                <div class="col-md-2 mb-3">
                    <label>หมู่บ้าน</label>
                    <input type="text" class="form-control" name="village">
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>จังหวัด</label>
                    <input type="text" class="form-control" name="province_id">
                </div>

                 <div class="col-md-4 mb-3">
                    <label>อำเภอ/เขต</label>
                    <input type="text" class="form-control" name="district_id">
                </div>

                 <div class="col-md-4 mb-3">
                    <label>ตำบล/แขวง</label>
                    <input type="text" class="form-control" name="sub_district_id">
                </div>

                <div class="col-md-2 mb-3">
                    <label>รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" name="zipcode">
                </div>
            </div>


            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>โทรศัพท์</label>
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>
        </div>
    </div>

    {{-- ที่อยู่ญาติ --}}
    <div id="section-relative" class="card mb-4 d-none">
        <div class="card-header bg-warning text-dark">ที่อยู่ญาติ</div>
        <div class="card-body">
              <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="father_title">คำนำหน้าชื่อ</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_fname">บิดาชื่อ</label>
                    <input type="text" class="form-control" name="fname">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_lname">นามสกุล</label>
                    <input type="text" class="form-control" name="lname">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="father_age">อายุ (ปี)</label>
                    <input type="number" class="form-control" name="age">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="occupation">อาชีพ</label>
                    <input type="text" class="form-control" name="occupation">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="income">รายได้เฉลี่ย (บาท/เดือน)</label>
                    <input type="number" class="form-control" name="income">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="idcard">เลขประจำตัวประชาชน</label>
                    <input type="text" class="form-control" name="idcard">
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 mb-3">
                    <label>เลขที่</label>
                    <input type="text" class="form-control" name="address_no">
                </div>
                <div class="col-md-2 mb-3">
                    <label>หมู่ที่</label>
                    <input type="text" class="form-control" name="moo">
                </div>
                <div class="col-md-2 mb-3">
                    <label>ตรอก/ซอย</label>
                    <input type="text" class="form-control" name="soi">
                </div>
                <div class="col-md-2 mb-3">
                    <label>ถนน</label>
                    <input type="text" class="form-control" name="road">
                </div>
                <div class="col-md-2 mb-3">
                    <label>หมู่บ้าน</label>
                    <input type="text" class="form-control" name="village">
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>จังหวัด</label>
                    <input type="text" class="form-control" name="province_id">
                </div>

                 <div class="col-md-4 mb-3">
                    <label>อำเภอ/เขต</label>
                    <input type="text" class="form-control" name="district_id">
                </div>

                 <div class="col-md-4 mb-3">
                    <label>ตำบล/แขวง</label>
                    <input type="text" class="form-control" name="sub_district_id">
                </div>

                <div class="col-md-2 mb-3">
                    <label>รหัสไปรษณีย์</label>
                    <input type="text" class="form-control" name="zipcode">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>โทรศัพท์</label>
                    <input type="text" class="form-control" name="phone">
                </div>
            </div>

        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">จัดเก็บ</button>
        <button type="reset" class="btn btn-secondary">เคลียร์</button>
    </div>
</form>

{{-- JavaScript สำหรับ toggle --}}
<script>
    function toggleSection(section) {
        const el = document.getElementById('section-' + section);
        el.classList.toggle('d-none');
    }
</script>
     
@endsection