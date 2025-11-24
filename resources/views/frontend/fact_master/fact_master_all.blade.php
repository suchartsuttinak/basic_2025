@extends('frontend.main.main_recipient')

@section('content')
<div class="container">
    <h3 class="mb-4">รายงานข้อมูล Fact Finding</h3>

    @if($factFinding)
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                ข้อมูลผู้รับ
            </div>
            <div class="card-body">
                <p><strong>ชื่อผู้รับ:</strong> {{ $recipients->full_name ?? '-' }}</p>
                <p><strong>รหัสผู้รับ:</strong> {{ $recipients->id }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                รายละเอียดการตรวจสอบ
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ชื่อผู้สอบ</th>
                        <td>{{ $factFinding->fact_name }}</td>
                    </tr>
                    <tr>
                        <th>วันที่</th>
                        <td>{{ $factFinding->date }}</td>
                    </tr>
                    <tr>
                        <th>รูปลักษณะภายนอก</th>
                        <td>{{ $factFinding->appearance }}</td>
                    </tr>
                    <tr>
                        <th>สีผิว</th>
                        <td>{{ $factFinding->skin }}</td>
                    </tr>
                    <tr>
                        <th>ลักษณะแผลเป็น</th>
                        <td>{{ $factFinding->scar }}</td>
                    </tr>
                    <tr>
                        <th>ความพิการ</th>
                        <td>{{ $factFinding->disability }}</td>
                    </tr>
                    <tr>
                        <th>ป่วย</th>
                        <td>{{ $factFinding->sick === 'yes' ? 'ป่วย' : 'ไม่ป่วย' }}</td>
                    </tr>
                    <tr>
                        <th>รายละเอียดการป่วย</th>
                        <td>{{ $factFinding->sick_detail }}</td>
                    </tr>
                    <tr>
                        <th>การรักษา</th>
                        <td>{{ $factFinding->treatment }}</td>
                    </tr>
                    <tr>
                        <th>โรงพยาบาล</th>
                        <td>{{ $factFinding->hospital }}</td>
                    </tr>
                    <tr>
                        <th>น้ำหนัก (kg)</th>
                        <td>{{ $factFinding->weight }}</td>
                    </tr>
                    <tr>
                        <th>ส่วนสูง (cm)</th>
                        <td>{{ $factFinding->height }}</td>
                    </tr>
                    <tr>
                        <th>ความสะอาด</th>
                        <td>{{ $factFinding->hygiene }}</td>
                    </tr>
                    <tr>
                        <th>สุขภาพช่องปาก</th>
                        <td>{{ $factFinding->oral_health }}</td>
                    </tr>
                    <tr>
                        <th>การบาดเจ็บ</th>
                        <td>{{ $factFinding->injury }}</td>
                    </tr>
                    <tr>
                        <th>ประวัติความเป็นมา</th>
                        <td>{{ $factFinding->case_history }}</td>
                    </tr>
                    <tr>
                        <th>ผู้บันทึก</th>
                        <td>{{ $factFinding->recorder }}</td>
                    </tr>
                    <tr>
                        <th>หลักฐาน</th>
                        <td>{{ $factFinding->evidence }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                เอกสารที่เกี่ยวข้อง
            </div>
            <div class="card-body">
                @if(count($documents) > 0)
                    <ul>
                        @foreach($documents as $doc)
                            <li>{{ $doc->document->document_name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>ไม่มีเอกสารที่เกี่ยวข้อง</p>
                @endif
            </div>
        </div>
    @else
        <p class="alert alert-warning">ไม่พบข้อมูล Fact Finding</p>
    @endif
</div>

@endsection