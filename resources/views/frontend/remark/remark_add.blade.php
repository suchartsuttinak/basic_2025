@extends('frontend.main.main_recipient')
@section('content')
 
  <div class="d-flex justify-content-end">
  <div class="container-fluid" style="max-width: 1600px;">


  <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
    <div class="flex-grow-1">
      <h5 class="fs-18 fw-semibold m-0">การดำเนินการช่วยเหลือ/ติดตามผล</h5>
    </div>
    <div class="text-end">
      <ol class="breadcrumb m-0 py-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
        <li class="breadcrumb-item active">Form Validation</li>
      </ol>
    </div>
  </div>

  <!-- Form Validation -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
       

        <div class="card-body">
          <form id="myForm" action="{{route('store.remark')}}" method="POST" class="row g-3">
            @csrf

            <!-- ส่ง id ไปด้วย -->
            <input type="hidden" name="recipient_id" value="{{$recipients->id}}">
            <!-- วันที่ -->

           <div class="col-12 col-md-2 mb-3">
              <label for="date" class="form-label fw-semibold text-dark">วันที่บันทึก</label>
              <input type="date" name="date" id="date"
                    class="form-control form-control-sm bg-white border border-secondary rounded-3 shadow-sm px-3"
                    value="">
            </div>

            <!-- Remark Name -->
            <div class="form-group col-12">
              <label for="remark_name" class="form-label">การดำเนินการ/ติดตามผล</label>
              <textarea name="remark_name" id="remark_name"
                        class="form-control bg-white border rounded shadow-sm"
                        rows="2"  required></textarea>
            </div>

            <!-- Remark Detail -->
            <div class="form-group col-12">
              <label for="remark_description" class="form-label">รายละเอียดเพิ่มเติม</label>
              <textarea name="remark_description" id="remark_description"
                        class="form-control bg-white border rounded shadow-sm"
                        rows="3" required></textarea>
            </div>

            <!-- ปุ่ม -->
            <div class="col-12">
              <button class="btn btn-primary btn-lg px-4 py-2  fw-semibold shadow-sm" type="submit">
                บันทึก
              </button>
            </div>
          </form>
        </div> <!-- end card-body -->
      </div> <!-- end card -->
    </div> <!-- end col -->
  </div> <!-- end row -->
</div> <!-- end container-fluid -->
</div>
      
@endsection