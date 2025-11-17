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
        Schema::create('recipient_problem', function (Blueprint $table) {
            $table->bigIncrements('id'); // primary key ของ pivot table

            // foreign keys
            $table->unsignedBigInteger('recipient_id'); // FK ไปยัง recipients
            $table->unsignedBigInteger('problem_id');   // FK ไปยัง problems

            // กำหนดความสัมพันธ์
            $table->foreign('recipient_id')
                  ->references('id')->on('recipients')
                  ->onDelete('cascade');

            $table->foreign('problem_id')
                  ->references('id')->on('problems')
                  ->onDelete('cascade');

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipient_problem');
    }
};
