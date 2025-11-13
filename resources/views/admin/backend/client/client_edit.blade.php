@extends('admin.admin_master')
@section('admin')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">แก้ไขข้อมูลผู้รับบริการ</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('client.update', $client->id) }}" method="POST">
                @csrf
               
                <input type="hidden" name="id" value="{{ $client->id }}">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">ชื่อ</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $client->first_name) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">นามสกุล</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $client->last_name) }}" required>
                    </div>

                    {{-- <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">เพศ</label>
                        <select name="gender" class="form-select" required>
                            <option value="">-- เลือกเพศ --</option>
                            <option value="male" {{ $client->gender == 'male' ? 'selected' : '' }}>ชาย</option>
                            <option value="female" {{ $client->gender == 'female' ? 'selected' : '' }}>หญิง</option>
                            <option value="other" {{ $client->gender == 'other' ? 'selected' : '' }}>อื่น ๆ</option>
                        </select>
                    </div> --}}

                <!-- Gender redio button -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label d-block">เพศ</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale"
                                value="male"
                                {{ old('gender', $client->gender) == 'male' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="genderMale">ชาย</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale"
                                value="female"
                                {{ old('gender', $client->gender) == 'female' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="genderFemale">หญิง</label>
                        </div>
                    </div>
                    <!--End Gender redio button -->

                    <div class="col-md-6 mb-3">
                        <label for="birth_date" class="form-label">วันเกิด</label>
                        <input type="text" name="birth_date" id="birth_date" class="form-control"
                            value="{{ \Carbon\Carbon::parse($client->birth_date)->format('d/m/') . (\Carbon\Carbon::parse($client->birth_date)->year + 543) }}"
                            required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address', $client->address) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">เบอร์โทร</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $client->phone) }}" required>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label class="form-label">ปัญหาที่พบ</label>
                        <div class="row">
                            @foreach($problems as $problem)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="problems[]" value="{{ $problem->id }}"
                                            id="problem{{ $problem->id }}"
                                            {{ in_array($problem->id, $client->problems->pluck('id')->toArray()) ? 'checked' : '' }}>
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

@push('scripts')
<!-- Bootstrap-datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"></script>

<script>
    $(document).ready(function () {
        $('#birth_date').datepicker({
            format: 'dd/mm/yyyy',
            language: 'th',
            thaiyear: true,
            autoclose: true,
            todayHighlight: true
        });
    });
</script>
@endpush