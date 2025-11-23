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
        Schema::create('document_factfinding', function (Blueprint $table) {
            $table->id();

            // FK ไปที่ factfindings
            $table->unsignedBigInteger('factfinding_id');
            $table->foreign('factfinding_id')
                  ->references('id')->on('factfindings')
                  ->onDelete('cascade');

            // FK ไปที่ documents
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')
                  ->references('id')->on('documents')
                  ->onDelete('cascade');

            $table->timestamps();

            // ป้องกันการบันทึกซ้ำ
            $table->unique(['factfinding_id', 'document_id']);
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_factfinding');
    }
};
