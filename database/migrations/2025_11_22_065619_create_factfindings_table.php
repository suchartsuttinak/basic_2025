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
        Schema::create('factfindings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('fact_name')->nullable()->comment('ชื่อผู้สอบ');
            $table->string('evidence')->nullable()->comment('หลักฐานเพิ่มเติม');
            $table->string('appearance')->nullable()->comment('รูปพรรณสัณฐาน');
            $table->string('skin')->nullable()->comment('สีผิว');
            $table->string('scar')->nullable()->comment('ตำหนิ/แผลเป็น');
            $table->string('disability')->nullable()->comment('ลักษณะความพิการ');
            $table->enum('sick', ['yes', 'no'])->default('no')->comment('ป่วย = yes, ไม่ป่วย = no');
            $table->string('sick_detail')->nullable()->comment('รายละเอียดป่วย');
            $table->string('treatment')->nullable()->comment('การรักษา');
            $table->string('hospital')->nullable()->comment('โรงพยาบาล');
            $table->decimal('weight', 5, 2)->nullable()->comment('น้ำหนัก (kg)');
            $table->decimal('height', 5, 2)->nullable()->comment('ส่วนสูง (cm)');
            $table->string('hygiene')->nullable()->comment('ความสะอาด');
            $table->string('oral_health')->nullable()->comment('สุขภาพช่องปาก');
            $table->string('injury')->nullable()->comment('การบาดเจ็บ/บาดแผล');
            $table->text('case_history')->nullable()->comment('ประวัติความเป็นมา');
            $table->string('recorder')->nullable()->comment('ผู้บันทึก');
            // One-to-One: recipient_id ต้องไม่ซ้ำ
            $table->unsignedBigInteger('recipient_id')->unique();
            $table->foreign('recipient_id')
                  ->references('id')
                  ->on('recipients')
                  ->onDelete('cascade'); // ลบ recipient → factfinding ถูกลบตาม
            // ใช้ boolean แทน string
            $table->boolean('active')->default(true)->comment('สถานะการใช้งาน');
            $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factfindings');
    }
};
