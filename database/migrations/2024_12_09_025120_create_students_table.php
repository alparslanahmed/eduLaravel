<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('parent_id')->constrained('student_parents');
            $table->foreignId('class_room_id')->constrained('class_rooms');
            $table->foreignId('grade_id')->constrained('grades');
            $table->foreignId('campus_id')->constrained('campuses');
            $table->foreignId('school_id')->constrained('schools');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
