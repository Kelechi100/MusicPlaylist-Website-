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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->foreignID('student_id');
            $table->string('name', 256);
            $table->integer('year');
            $table->text('description')->nullable();
            $table->decimal('grades',8,2)->nullable();
            $table->string('image',256)-> nullable();
            $table->boolean('display');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
