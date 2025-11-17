<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->bigIncrements('id'); // รหัสผู้รับ
            $table->string('register_number')->unique(); // เลขทะเบียนแฟ้มประวัติ
            $table->enum('title_name', ['Mr', 'Mrs', 'Miss']); // คำนำหน้าชื่อ
            $table->string('nick_name')->nullable(); // ชื่อเล่น
            $table->string('first_name'); // ชื่อ
            $table->string('last_name'); // นามสกุล
            $table->enum('gender', ['male', 'female']); // เพศ
            $table->date('BirthDate')->nullable(); // วัน เดือน ปีเกิด
            $table->string('IdCardNum', 13)->unique(); // เลขประจำตัวประชาชน

            $table->unsignedBigInteger('national_id'); // สัญชาติ
            $table->unsignedBigInteger('ligion_id'); // ศาสนา
            $table->unsignedBigInteger('marital_id'); // สถานะภาพการสมรส
            $table->unsignedBigInteger('occupation_id'); // อาชีพ
            $table->unsignedBigInteger('income_id')->nullable(); // รายได้เฉลี่ย
            $table->unsignedBigInteger('education_id'); // ระดับการศึกษา
            $table->unsignedBigInteger('scholl')->nullable(); // โรงเรียน

            $table->string('address')->nullable(); // ที่อยู่ปัจจุบัน
            $table->unsignedBigInteger('province_id')->nullable(); // จังหวัด
            $table->unsignedBigInteger('district_id')->nullable(); // อำเภอ
            $table->unsignedBigInteger('sup_disdrict_id')->nullable(); // ตำบล
            $table->unsignedInteger('zipcode')->nullable(); // รหัสไปรษณีย์
            $table->string('phone', 20)->nullable(); // เบอร์โทรศัพท์
            $table->date('arrival_date'); // วันที่รับเข้า

            $table->unsignedBigInteger('target_id'); // กลุ่มเป้าหมาย
            $table->unsignedBigInteger('contact_id'); // วิธีการติดต่อ
            $table->unsignedBigInteger('project_id'); // หน่วยงาน
            $table->string('image')->nullable(); // รูปภาพ
            $table->unsignedBigInteger('house_id')->nullable(); // รหัสบ้าน

            $table->unsignedBigInteger('status_id')->nullable(); // สถานะผู้เข้ารับ
            $table->enum('case_resident', ['Active', 'Not Active'])->default('Active'); // สถานะการอยู่อาศัย

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipients');
    }
};
