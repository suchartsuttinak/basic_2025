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
        Schema::create('sub_districts', function (Blueprint $table) {
            $table->id();
            $table->integer('subd_code')->nullable()->comment('รหัสตำบล');
            $table->string('subd_name')->comment('ชื่อตำบล');
            $table->text('subd_desc')->nullable()->comment('รายละเอียดเพิ่มเติม');
            $table->boolean('subd_status')->default(true)->comment('สถานะ true=ใช้งาน, false=ยกเลิก');
            $table->integer('subd_zipcode')->comment('รหัสไปรษณีย์');
            $table->foreignId('district_id')->references('id')->on('districts')->onDelete('cascade')->comment('รหัสอำเภอ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_districts');
    }
};