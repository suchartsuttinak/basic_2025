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
          Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->integer('dist_code')->nullable()->comment('รหัสอำเภอ');
            $table->string('dist_name')->comment('ชื่ออำเภอ');
            $table->text('dist_desc')->nullable()->comment('รายละเอียดเพิ่มเติม');
            $table->boolean('dist_status')->default(true)->comment('สถานะ true=ใช้งาน, false=ยกเลิก');
            $table->foreignId('province_id')->references('id')->on('provinces')->onDelete('cascade')->comment('รหัสจังหวัด');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};