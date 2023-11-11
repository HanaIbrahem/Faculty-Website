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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Science');
            $table->string('name_ku')->default('زانست')->charset('utf8mb4');

            $table->string('title')->default('Faculty of Science');
            $table->string('title_ku')->default('فاکەڵتی زانست')->charset('utf8mb4');
            
            $table->string('image')->nullable();
            $table->string('cover')->nullable();
            $table->string('logo')->nullable();
            $table->longText('description')->default('about faculty of Scince');
            $table->longText('description_ku')->default('دەربارەی فاکەڵتی زانست')->charset('utf8mb4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
