@extends('admin.admin_master')
@section('admin')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">บันทึกข้อมูลผู้รับบริการ</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('client.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">ชื่อ</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">นามสกุล</label>
                        <input type="text" name="last_name" class="form-control" required>
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
                        <label for="birth_date" class="form-label">วันเกิด</label>
                        <input type="date" name="birth_date" id="birth_date" class="form-control" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <input type="text" name="address" class="form-control" required>
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

@endsection