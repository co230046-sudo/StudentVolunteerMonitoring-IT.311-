<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc')
            ->paginate(10);
        
        return view('studentRecord', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addStudent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Personal Information
            'firstName' => 'required|string|min:2|max:255',
            'lastName' => 'required|string|min:2|max:255',
            'studentId' => 'required|string|unique:students,student_id|max:255',
            'gender' => 'required|in:Male,Female,Prefer not to say',
            'dob' => 'required|date|before:-16 years|after:-50 years',
            'nationality' => 'required|string|min:2|max:255',
            'photoUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            // Academic & Enrollment Information
            'course' => 'required|string|max:255',
            'advisor' => 'nullable|string|max:255',
            'yearLevel' => 'required|in:1st Year,2nd Year,3rd Year,4th Year',
            'academicStatus' => 'required|in:Regular,Probationary,Leave of Absence',
            'startDate' => 'required|date|before_or_equal:today|after:1990-01-01',
            'expectedGrad' => 'nullable|date|after:startDate|before:2030-12-31',
            
            // Contact Information
            'email' => ['required', 'email', 'unique:students,email', 'max:255', 'regex:/^[a-zA-Z0-9._%+-]+@(adzu\.edu\.ph|gmail\.com|yahoo\.com|outlook\.com|hotmail\.com)$/'],
            'phone' => ['required', 'string', 'regex:/^09\d{9}$/', 'size:11'],
            'address' => 'required|string|min:10|max:500',
            'emergencyName' => 'required|string|min:2|max:255',
            'emergencyPhone' => ['required', 'string', 'regex:/^09\d{9}$/', 'size:11'],
        ], [
            // Custom error messages
            'firstName.required' => 'First name is required.',
            'firstName.min' => 'First name must be at least 2 characters.',
            'lastName.required' => 'Last name is required.',
            'lastName.min' => 'Last name must be at least 2 characters.',
            'studentId.required' => 'Student ID is required.',
            'studentId.unique' => 'This student ID is already taken.',
            'dob.required' => 'Date of birth is required.',
            'dob.before' => 'Student must be at least 16 years old.',
            'dob.after' => 'Please enter a valid date of birth.',
            'nationality.required' => 'Nationality is required.',
            'course.required' => 'Course/Department is required.',
            'yearLevel.required' => 'Year level is required.',
            'academicStatus.required' => 'Academic status is required.',
            'startDate.required' => 'Start date is required.',
            'startDate.before_or_equal' => 'Start date cannot be in the future.',
            'expectedGrad.after' => 'Expected graduation date must be after start date.',
            'email.required' => 'Email address is required.',
            'email.unique' => 'This email address is already registered.',
            'email.regex' => 'Email must be from adzu.edu.ph, gmail.com, yahoo.com, outlook.com, or hotmail.com.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone number must be a valid Philippine number (09XXXXXXXXX).',
            'phone.size' => 'Phone number must be exactly 11 digits.',
            'address.required' => 'Address is required.',
            'address.min' => 'Address must be at least 10 characters.',
            'emergencyName.required' => 'Emergency contact name is required.',
            'emergencyPhone.required' => 'Emergency contact phone is required.',
            'emergencyPhone.regex' => 'Emergency contact phone must be a valid Philippine number (09XXXXXXXXX).',
            'emergencyPhone.size' => 'Emergency contact phone must be exactly 11 digits.',
            'photoUpload.image' => 'Photo must be an image file.',
            'photoUpload.mimes' => 'Photo must be a jpeg, png, jpg, or gif file.',
            'photoUpload.max' => 'Photo size must not exceed 2MB.',
        ]);

        // Handle photo upload
        $photoPath = null;
        if ($request->hasFile('photoUpload')) {
            $photoPath = $request->file('photoUpload')->store('student-photos', 'public');
        }

        // Map form field names to database column names
        $studentData = [
            'first_name' => $validatedData['firstName'],
            'last_name' => $validatedData['lastName'],
            'student_id' => $validatedData['studentId'],
            'gender' => $validatedData['gender'],
            'date_of_birth' => $validatedData['dob'],
            'nationality' => $validatedData['nationality'],
            'photo_path' => $photoPath,
            'course' => $validatedData['course'],
            'academic_advisor' => $validatedData['advisor'],
            'year_level' => $validatedData['yearLevel'],
            'academic_status' => $validatedData['academicStatus'],
            'start_date' => $validatedData['startDate'],
            'expected_graduation_date' => $validatedData['expectedGrad'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'emergency_contact_name' => $validatedData['emergencyName'],
            'emergency_contact_phone' => $validatedData['emergencyPhone'],
        ];

        $student = Student::create($studentData);

        return redirect()->route('students.index')
            ->with('success', 'Student record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            // Personal Information
            'firstName' => 'required|string|min:2|max:255',
            'lastName' => 'required|string|min:2|max:255',
            'studentId' => [
                'required',
                'string',
                'max:255',
                Rule::unique('students', 'student_id')->ignore($student->id)
            ],
            'gender' => 'required|in:Male,Female,Prefer not to say',
            'dob' => 'required|date|before:-16 years|after:-50 years',
            'nationality' => 'required|string|min:2|max:255',
            'photoUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            
            // Academic & Enrollment Information
            'course' => 'required|string|max:255',
            'advisor' => 'nullable|string|max:255',
            'yearLevel' => 'required|in:1st Year,2nd Year,3rd Year,4th Year',
            'academicStatus' => 'required|in:Regular,Probationary,Leave of Absence',
            'startDate' => 'required|date|before_or_equal:today|after:1990-01-01',
            'expectedGrad' => 'nullable|date|after:startDate|before:2030-12-31',
            
            // Contact Information
            'email' => [
                'required',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@(adzu\.edu\.ph|gmail\.com|yahoo\.com|outlook\.com|hotmail\.com)$/',
                Rule::unique('students', 'email')->ignore($student->id)
            ],
            'phone' => ['required', 'string', 'regex:/^09\d{9}$/', 'size:11'],
            'address' => 'required|string|min:10|max:500',
            'emergencyName' => 'required|string|min:2|max:255',
            'emergencyPhone' => ['required', 'string', 'regex:/^09\d{9}$/', 'size:11'],
        ], [
            // Custom error messages
            'firstName.required' => 'First name is required.',
            'firstName.min' => 'First name must be at least 2 characters.',
            'lastName.required' => 'Last name is required.',
            'lastName.min' => 'Last name must be at least 2 characters.',
            'studentId.required' => 'Student ID is required.',
            'studentId.unique' => 'This student ID is already taken.',
            'dob.required' => 'Date of birth is required.',
            'dob.before' => 'Student must be at least 16 years old.',
            'dob.after' => 'Please enter a valid date of birth.',
            'nationality.required' => 'Nationality is required.',
            'course.required' => 'Course/Department is required.',
            'yearLevel.required' => 'Year level is required.',
            'academicStatus.required' => 'Academic status is required.',
            'startDate.required' => 'Start date is required.',
            'startDate.before_or_equal' => 'Start date cannot be in the future.',
            'expectedGrad.after' => 'Expected graduation date must be after start date.',
            'email.required' => 'Email address is required.',
            'email.unique' => 'This email address is already registered.',
            'email.regex' => 'Email must be from adzu.edu.ph, gmail.com, yahoo.com, outlook.com, or hotmail.com.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Phone number must be a valid Philippine number (09XXXXXXXXX).',
            'phone.size' => 'Phone number must be exactly 11 digits.',
            'address.required' => 'Address is required.',
            'address.min' => 'Address must be at least 10 characters.',
            'emergencyName.required' => 'Emergency contact name is required.',
            'emergencyPhone.required' => 'Emergency contact phone is required.',
            'emergencyPhone.regex' => 'Emergency contact phone must be a valid Philippine number (09XXXXXXXXX).',
            'emergencyPhone.size' => 'Emergency contact phone must be exactly 11 digits.',
            'photoUpload.image' => 'Photo must be an image file.',
            'photoUpload.mimes' => 'Photo must be a jpeg, png, jpg, or gif file.',
            'photoUpload.max' => 'Photo size must not exceed 2MB.',
        ]);

        // Handle photo upload
        $photoPath = $student->photo_path;
        if ($request->hasFile('photoUpload')) {
            // Delete old photo if exists
            if ($student->photo_path) {
                Storage::disk('public')->delete($student->photo_path);
            }
            $photoPath = $request->file('photoUpload')->store('student-photos', 'public');
        }

        // Map form field names to database column names
        $studentData = [
            'first_name' => $validatedData['firstName'],
            'last_name' => $validatedData['lastName'],
            'student_id' => $validatedData['studentId'],
            'gender' => $validatedData['gender'],
            'date_of_birth' => $validatedData['dob'],
            'nationality' => $validatedData['nationality'],
            'photo_path' => $photoPath,
            'course' => $validatedData['course'],
            'academic_advisor' => $validatedData['advisor'],
            'year_level' => $validatedData['yearLevel'],
            'academic_status' => $validatedData['academicStatus'],
            'start_date' => $validatedData['startDate'],
            'expected_graduation_date' => $validatedData['expectedGrad'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'emergency_contact_name' => $validatedData['emergencyName'],
            'emergency_contact_phone' => $validatedData['emergencyPhone'],
        ];

        $student->update($studentData);

        return redirect()->route('students.index')
            ->with('success', 'Student record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        // Delete photo if exists
        if ($student->photo_path) {
            Storage::disk('public')->delete($student->photo_path);
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student record deleted successfully!');
    }

    /**
     * Search students by various criteria
     */
    public function search(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'LIKE', "%{$search}%")
                  ->orWhere('last_name', 'LIKE', "%{$search}%")
                  ->orWhere('student_id', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        if ($request->filled('course')) {
            $query->where('course', $request->input('course'));
        }

        if ($request->filled('year_level')) {
            $query->where('year_level', $request->input('year_level'));
        }

        if ($request->filled('academic_status')) {
            $query->where('academic_status', $request->input('academic_status'));
        }

        $students = $query->orderBy('last_name', 'asc')
            ->orderBy('first_name', 'asc')
            ->paginate(10);

        return view('studentRecord', compact('students'));
    }
}
