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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('name_ku')->charset('utf8mb4');;
            $table->text('description_ku')->charset('utf8mb4');;
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->enum('type',['bachelor','doctoral','master','diploma']);
            $table->string('image');
            $table->string('cts');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
