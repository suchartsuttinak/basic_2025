@extends('frontend.main.main_recipient')

@section('content')
<div class="container">
    <h4 class="mb-4 pt-1 text">แบบรายงานสอบข้อเท็จจริงเบื้องต้น</h4>

    @if($factFinding)
        <!-- ข้อมูลผู้รับ -->
        <div class="card mb-4">
        <div class="card-header">ข้อมูลผู้รับ</div>


            <div class="card-body row">
                <div class="col-md-6 mb-2"><strong>ชื่อผู้รับ:</strong> {{ $recipients->full_name ?? '-' }}</div>
                <div class="col-md-6 mb-2"><strong>รหัสผู้รับ:</strong> {{ $recipients->id }}</div>
            </div>
        </div>

        <!-- ข้อมูลการสอบ -->
        <div class="card mb-4">
            <div class="card-header">ข้อมูลการสอบข้อเท็จจริง</div>
            <div class="card-body row">
                <div class="col-md-4 mb-2"><strong>วันที่สอบ:</strong> {{ $factFinding->date }}</div>
                <div class="col-md-4 mb-2"><strong>ผู้สอบข้อเท็จจริง:</strong> {{ $factFinding->fact_name }}</div>
                <div class="col-md-4 mb-2"><strong>ผู้บันทึก:</strong> {{ $factFinding->recorder }}</div>
            </div>
        </div>

      <!-- เอกสารทางราชการ -->
                <div class="card mb-4">
                    <div class="card-header">เอกสารทางราชการ (เลือกตามรายการ)</div>
                    <div class="card-body row">
                        @php
                            // รายการเอกสารมาตรฐานที่ต้องแสดง
                            $docList = [
                                'สูติบัตร',
                                'บัตรประชาชน',
                                'ทะเบียนบ้าน',
                                'หนังสือนำส่ง',
                                'เอกสารการศึกษา',
                                'บัตรทอง',
                                'ผลตรวจสุขภาพ',
                                'สมุดบันทึกตรวจสุขภาพแม่และเด็ก',
                                'เอกสารทางการแพทย์',
                                'หนังสือรับรองการเกิด (ทร.1/1)',
                                'บันทึกประจำวันเกี่ยวกับคดี',
                                'หนังสือยินยอมบิดา/มารดา',
                            ];

                            // ดึงชื่อเอกสารที่ผู้รับมี (normalize)
                            $userDocs = collect($documents)->map(function($d) {
                                return trim($d->document->document_name ?? $d->document_name ?? '');
                            })->filter()->map(fn($s) => mb_strtolower($s, 'UTF-8'))->toArray();
                        @endphp

                        @foreach($docList as $index => $label)
                            @php
                                $normalized = mb_strtolower(trim($label), 'UTF-8');
                                $checked = in_array($normalized, $userDocs);
                            @endphp
                            <div class="col-md-6 mb-2">
                                {{ $checked ? '☑' : '☐' }} {{ $label }}
                            </div>
                        @endforeach
                    </div>
                </div>

        <!-- ลักษณะภายนอก -->
        <div class="card mb-4">
            <div class="card-header">ลักษณะของผู้เข้ารับการสงเคราะห์</div>
            <div class="card-body row">
                <div class="col-md-6 mb-2"><strong>รูปร่างลักษณะ:</strong> {{ $factFinding->appearance }}</div>
                <div class="col-md-6 mb-2"><strong>สีผิว:</strong> {{ $factFinding->skin }}</div>
                <div class="col-md-6 mb-2"><strong>ตำหนิ/แผลเป็น:</strong> {{ $factFinding->scar }}</div>
                <div class="col-md-6 mb-2"><strong>ความพิการ:</strong> {{ $factFinding->disability }}</div>
            </div>
        </div>

        <!-- ประวัติสุขภาพ -->
        <div class="card mb-4">
            <div class="card-header">ประวัติสุขภาพ</div>
            <div class="card-body row">
                <div class="col-md-4 mb-2"><strong>โรคประจำตัว:</strong> {{ $factFinding->sick === 'yes' ? 'มี' : 'ไม่มี' }}</div>
                <div class="col-md-8 mb-2"><strong>รายละเอียด:</strong> {{ $factFinding->sick_detail }}</div>
                <div class="col-md-6 mb-2"><strong>การรักษา:</strong> {{ $factFinding->treatment }}</div>
                <div class="col-md-6 mb-2"><strong>สถานที่รักษา:</strong> {{ $factFinding->hospital }}</div>
            </div>
        </div>

        <!-- ภาวะโภชนาการ -->
        <div class="card mb-4">
            <div class="card-header">ภาวะโภชนาการ (ปัจจุบัน)</div>
            <div class="card-body row">
                <div class="col-md-6 mb-2"><strong>น้ำหนัก:</strong> {{ $factFinding->weight }} กิโลกรัม</div>
                <div class="col-md-6 mb-2"><strong>ส่วนสูง:</strong> {{ $factFinding->height }} เซนติเมตร</div>
            </div>
        </div>

        <!-- สุขภาพร่างกาย -->
        <div class="card mb-4">
            <div class="card-header">สุขภาพร่างกาย</div>
            <div class="card-body row">
                <div class="col-md-4 mb-2"><strong>ความสะอาดตามร่างกาย:</strong> {{ $factFinding->hygiene }}</div>
                <div class="col-md-4 mb-2"><strong>สุขภาพช่องปาก:</strong> {{ $factFinding->oral_health }}</div>
                <div class="col-md-4 mb-2"><strong>การบาดเจ็บ:</strong> {{ $factFinding->injury }}</div>
            </div>
        </div>

        <!-- ประวัติความเป็นมา -->
        <div class="card mb-4">
            <div class="card-header">ประวัติความเป็นมา</div>
            <div class="card-body">
                <p>{{ $factFinding->case_history }}</p>
            </div>
        </div>

        <!-- หลักฐานเพิ่มเติม -->
        <div class="card mb-4">
            <div class="card-header">หลักฐานเพิ่มเติม</div>
            <div class="card-body">
                <p>{{ $factFinding->evidence }}</p>
            </div>
        </div>
    @else
        <p class="alert alert-warning">ไม่พบข้อมูล Fact Finding</p>
    @endif
</div>
@endsection