<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        // Personal Information
        'first_name',
        'last_name',
        'student_id',
        'gender',
        'date_of_birth',
        'nationality',
        'photo_path',
        
        // Academic & Enrollment Information
        'course',
        'academic_advisor',
        'year_level',
        'academic_status',
        'start_date',
        'expected_graduation_date',
        
        // Contact Information
        'email',
        'phone',
        'address',
        'emergency_contact_name',
        'emergency_contact_phone',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'start_date' => 'date',
        'expected_graduation_date' => 'date',
    ];

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Accessor for formatted year level
    public function getFormattedYearLevelAttribute()
    {
        return $this->year_level;
    }

    // Scope for filtering by course
    public function scopeByCourse($query, $course)
    {
        return $query->where('course', $course);
    }

    // Scope for filtering by academic status
    public function scopeByAcademicStatus($query, $status)
    {
        return $query->where('academic_status', $status);
    }

    // Scope for filtering by year level
    public function scopeByYearLevel($query, $yearLevel)
    {
        return $query->where('year_level', $yearLevel);
    }
}
