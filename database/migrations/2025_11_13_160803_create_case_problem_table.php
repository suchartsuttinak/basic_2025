<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('case_problem', function (Blueprint $table) {
    //         $table->unsignedBigInteger('case_id');
    //         $table->unsignedBigInteger('problem_id');
    //         $table->text('note')->nullable(); // ถ้ามีรายละเอียดเพิ่มเติมของปัญหา
    //         $table->timestamps();

    //         $table->primary(['case_id', 'problem_id']);
    //         $table->foreign('case_id')->references('id')->on('case_master')->onDelete('cascade');
    //         $table->foreign('problem_id')->references('id')->on('problem')->onDelete('cascade');


    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_problem');
    }
};
