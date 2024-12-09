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
        Schema::table('grades', function (Blueprint $table) {
            $table->foreignId('school_id')->constrained('schools');
            $table->foreignId('campus_id')->constrained('campuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->dropForeign(['school_id']);
            $table->dropForeign(['campus_id']);
            $table->dropColumn('school_id');
            $table->dropColumn('campus_id');
        });
    }
};
