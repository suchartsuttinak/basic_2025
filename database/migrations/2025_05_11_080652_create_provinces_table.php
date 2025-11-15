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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->integer('prov_code')->nullable()->comment('รหัสจังหวัด');
            $table->string('prov_name')->comment('ชื่อจังหวัด');
            $table->text('prov_desc')->nullable()->comment('รายละเอียดเพิ่มเติม');
            $table->boolean('prov_status')->default(true)->comment('สถานะ true=ใช้งาน, false=ยกเลิก');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};