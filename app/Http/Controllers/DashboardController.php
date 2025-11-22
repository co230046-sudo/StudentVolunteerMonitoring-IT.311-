<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with student statistics
     */
    public function index()
    {
        // Get gender statistics from the students table
        $maleCount = Student::where('gender', 'Male')->count();
        $femaleCount = Student::where('gender', 'Female')->count();
        $totalStudents = Student::count();

        // Calculate other useful statistics
        $genderData = [
            'male' => $maleCount,
            'female' => $femaleCount,
            'total' => $totalStudents
        ];

        return view('dashboard', compact('genderData'));
    }
}
