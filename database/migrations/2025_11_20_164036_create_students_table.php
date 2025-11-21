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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            
            // Personal Information
            $table->string('first_name');
            $table->string('last_name');
            $table->string('student_id')->unique();
            $table->enum('gender', ['Male', 'Female', 'Prefer not to say']);
            $table->date('date_of_birth');
            $table->string('nationality');
            $table->string('photo_path')->nullable();
            
            // Academic & Enrollment Information
            $table->string('course');
            $table->string('academic_advisor')->nullable();
            $table->enum('year_level', ['1st Year', '2nd Year', '3rd Year', '4th Year']);
            $table->enum('academic_status', ['Regular', 'Probationary', 'Leave of Absence']);
            $table->date('start_date');
            $table->date('expected_graduation_date')->nullable();
            
            // Contact Information
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('address');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_phone');
            
            $table->timestamps();
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
