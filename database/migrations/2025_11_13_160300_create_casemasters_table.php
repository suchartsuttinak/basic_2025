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
        Schema::create('casemasters', function (Blueprint $table) {
             $table->id();
            $table->string('title_name')->nullable()->comment('คำนำหน้าชื่อ');
            $table->string('first_name')->comment('ชื่อ');
            $table->string('Last_name')->comment('นามสกุล');
            $table->string('code_number')->nullable()->comment('เลขประชาชน');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('birth_date');
            $table->string('email')->nullable()->comment('อีเมล์');
            $table->string('sup_phone')->nullable()->comment('เบอร์โทรศัพท์');
            $table->string('sup_address')->comment('ทีอยู่');
            $table->foreignId('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreignId('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreignId('sub_district_id')->references('id')->on('sub_districts')->onDelete('cascade');
            $table->string('sup_zip_code')->comment('รหัสไปรษณีย์');
            $table->string('sup_contact_name')->comment('ผู้ติดต่อ');
            $table->string('sup_contact_phone')->comment('เบอร์โทรผู้ติดต่อ');
            $table->boolean('sup_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casemasters');
    }
};
