@extends('frontend.main.main_recipient')

@section('content')

        <style>
            body {
                font-family: 'TH Sarabun New', sans-serif;
                font-size: 18px;
                line-height: 1.8;
            }
            .report-container {
                padding: 30px;
                position: relative;
            }
            .report-title {
                text-align: center;
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 30px;
            }
            .report-photo {
                position: absolute;
                top: 90px;
                right: 30px;
                width: 150px;
                height: 170px;
                object-fit: cover;
                border: 1px solid #ccc;
            }
            .report-section {
                display: flex;
                flex-wrap: wrap;
                margin-bottom: 12px;
            }
            .report-section .label {
                font-weight: bold;
                margin-right: 6px;
            }
            .report-section .item {
                margin-right: 20px;
                display: flex;
            }
            .problem-list {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 8px 16px;
                margin-top: 10px;.
                margin-bottom: 20px;
            }
            .problem-item {
                display: flex;
                align-items: center;
                font-size: 18px;
            }
            .problem-item .checkbox {
                font-size: 20px;
                margin-right: 8px;
                color: #333;
            }
        </style>
        <div class="report-container">
            <div class="report-title">ข้อมูลพื้นผู้รับการสงเคราะห์</div>

            {{-- รูปภาพ --}}
                <div class="report-section">
            <img src="{{ !empty($recipients->image) 
                ? asset('upload/recipient_images/'.$recipients->image) 
                : asset('upload/no_image.jpg') }}" 
                alt="logo" class="report-photo">
                </div>
     
            {{-- เลขทะเบียน / ชื่อเล่น --}}
            <div class="report-section">
                <div class="item"><span class="label">เลขทะเบียน:</span> {{ $recipients->register_number }}</div>
            </div>

            {{-- ชื่อเล่น --}}
            <div class="report-section"> 
                <div class="item"><span class="label">ชื่อเล่น:</span> {{ $recipients->nick_name }}</div>
            </div>

            {{-- ชื่อ-นามสกุล / อายุ / เพศ --}}
            <div class="report-section">
                <div class="item"><span class="label">ชื่อ-นามสกุล:</span> {{ optional($recipients->title)->name }} {{ $recipients->full_name }} </div>
                <div class="item"><span class="label">อายุ:</span> {{ $recipients->age }} ปี</div>
                {{-- <div class="item"><span class="label">เพศ:</span> {{ $recipients->gender == 'male' ? 'ชาย' : 'หญิง' }}</div> --}}
            </div>

            {{-- วันเกิด  --}}
            <div class="report-section">
                <div class="item"><span class="label">วัน เดือน ปี เกิด:</span> {{ $recipients->birth_date ? \Carbon\Carbon::parse($recipients->birth_date)->format('d/m/Y') : '-' }}</div>
            </div>

            {{-- เชื้อชาติ / ศาสนา / สถานภาพสมรส --}}
            <div class="report-section">
                <div class="item"><span class="label">เชื้อชาติ:</span> {{ optional($recipients->national)->nation_name ?? '-' }}</div>
                <div class="item"><span class="label">ศาสนา:</span> {{ optional($recipients->religion)->religion_name ?? '-' }}</div>
                <div class="item"><span class="label">สถานภาพสมรส:</span> {{ optional($recipients->marital)->marital_name ?? '-' }}</div>
            </div>

            {{-- บัตรประชาชน / วันที่รับเข้า  --}}
            <div class="report-section">
                <div class="item"><span class="label">เลขประจำตัวประชาชน:</span> {{ $recipients->id_card }}</div>
                <div class="item"><span class="label">วันที่รับเข้า:</span> {{ $recipients->arrival_date ? \Carbon\Carbon::parse($recipients->arrival_date)->format('d/m/Y') : '-' }}</div>
            </div>
            {{-- กลุ่มเป้าหมาย --}}
            <div class="report-section">
                <div class="item"><span class="label">กลุ่มเป้าหมาย:</span> {{ optional($recipients->target)->target_name ?? '-' }}</div>
            </div>

            {{-- ที่อยู่ หมู่ที่ ตรอก/ซอย ถนน หมู่บ้าน --}}
            <div class="report-section">
                <div class="item"><span class="label">ที่อยู่เลขที่:</span> {{ $recipients->address }}</div>
                <div class="item"><span class="label">หมู่ที่:</span> {{ $recipients->moo }}</div>
                <div class="item"><span class="label">ตรอก/ซอย:</span> {{ $recipients->soi }}</div>
                <div class="item"><span class="label">ถนน:</span> {{ $recipients->road }}</div>
                <div class="item"><span class="label">หมู่บ้าน:</span> {{ $recipients->village }}</div>
            </div>

            {{-- จังหวัด อําเภอ ตําบล --}}
            <div class="report-section">
                <div class="item"><span class="label">ตำบล:</span> {{ optional($recipients->sub_district)->subd_name ?? '-' }}</div>
                <div class="item"><span class="label">อำเภอ:</span> {{ optional($recipients->district)->dist_name ?? '-' }}</div>
                <div class="item"><span class="label">จังหวัด:</span> {{ optional($recipients->province)->prov_name ?? '-' }}</div>
            </div>

            {{-- รหัสไปรษณีย์ โทรศัพท์ --}}
            <div class="report-section">
                <div class="item"><span class="label">รหัสไปรษณีย์:</span> {{ $recipients->zipcode }}</div>
                <div class="item"><span class="label">โทรศัพท์:</span> {{ $recipients->phone }}</div>
            </div>

            {{-- การศึกษา --}}
            <div class="report-section">
                <div class="item"><span class="label">ระดับการศึกษา:</span> {{ optional($recipients->education)->educat_name ?? '-' }}</div>
                <div class="item"><span class="label">สถานศึกษา:</span> {{ $recipients->scholl }}</div>
            </div>

            {{-- อาชีพ / รายได้  --}}
            <div class="report-section">
                <div class="item"><span class="label">อาชีพ:</span> {{ optional($recipients->occupation)->occupation_name ?? '-' }}</div>
                <div class="item"><span class="label">รายได้เฉลี่ย:</span> {{ optional($recipients->income)->income_name ?? '-' }} บาท/เดือน</div>
            </div>

            {{-- สถานะ --}}
            <div class="report-section">
                <div class="item"><span class="label">สถานะ:</span> {{ optional($recipients->status)->status_name ?? '-' }}</div>
            </div>

            {{-- โครงการ / ผู้ติดต่อ / บ้าน --}}
            <div class="report-section">
                <div class="item"><span class="label">โครงการ:</span> {{ optional($recipients->project)->project_name ?? '-' }}</div>
                <div class="item"><span class="label">ผู้ติดต่อ/นำส่ง:</span> {{ optional($recipients->contact)->contact_name ?? '-' }}</div>
                <div class="item"><span class="label">บ้านพัก:</span> {{ optional($recipients->house)->house_name ?? '-' }}</div>
            </div>

            {{-- ปัญหา --}}
            <div class="report-section">
                <span class="label">ปัญหา:</span>
            </div>
            <div class="problem-list">
                @php
                    $allProblems = [
                        'เร่ร่อน','ถูกทอดทิ้ง','ถูกเลี้ยงดูไม่เหมาะสม','ถูกทารุณกรรม','ถูกกระทำความรุนแรงในครอบครัว',
                        'ถูกแสวงหาประโยชน์','เหยื่อค้ามนุษย์','กำพร้าบิดา','กำพร้ามารดา','ปัญหาความประพฤติ',
                        'ครอบครัวแตกแยก','บิดา/มารดาถูกต้องโทษ','ถูกล่อลวง','ถูกกระทำทารุณกรรมทางเพศ',
                        'ตั้งครรภ์ไม่พึงประสงค์','อยู่ในสภาวะยากลำบาก','ไม่มีสถานะทางทะเบียน',
                    ];
                    $selected = $recipients->problems->pluck('name')->toArray();
                @endphp

                @foreach($allProblems as $problem)
                    <div class="problem-item">
                        <span class="checkbox">
                            {{ in_array($problem, $selected) ? '☑' : '☐' }}
                        </span>
                        <span>{{ $problem }}</span>
                    </div>
                @endforeach
            </div>

        </div>

@endsection