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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rool');
            $table->text('description');
            $table->string('name_ku')->charset('utf8mb4');
            $table->string('rool_ku')->charset('utf8mb4');
            $table->text('description_ku')->charset('utf8mb4');
            $table->string('image');
            $table->enum('pin',['no','yes'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
