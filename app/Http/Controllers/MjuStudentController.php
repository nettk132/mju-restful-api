<?php

namespace App\Http\Controllers;

use App\Models\MjuStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
class MjuStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = MjuStudent::all();
        $responseData = [
            'status' => 'success',
            'data' => [
                'students' => $students,
            ],
        ];

        // ส่ง JSON response ในรูปแบบ JSend
        return Response::json($responseData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'student_code' => 'required|string|max:15',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'first_name_en' => 'required|string|max:50',
            'last_name_en' => 'required|string|max:50',
            'major_id' => 'required|exists:majors,major_id',
            'idcard' => 'required||digits:13',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'birthdate' => 'required|string',
            'gender' => 'required|string',

        ]);

        MjuStudent::create($validated);

        return response()->json(['message' => 'Student created successfully'], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request,MjuStudent $mjuStudent)
    {
        // Log the request parameter 'mju'
        Log::info($request->mju);

        // Retrieve the student code from the request
        $student_code = $request->mju;

        // Find the student by the student code using the get method
        $students = $mjuStudent->where('student_code', $student_code)->get();

        if ($students->isEmpty()) {
            // Handle the case where the student is not found, for example, return a 404 response.
            return response()->json(['error' => 'Student not found'], 404);
        }

        // Return the student information as JSON
        return response()->json(
            [
                'message' => 'Student retrieved successfully',
                'add data by' => 'aphiched',
                'data' => $students
            ]
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MjuStudent $mjuStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MjuStudent $mjuStudent)
    {
        $validated = $request->validate([
            'student_code' => 'required|string|max:15',
       ]);

       $mjuStudent = MjuStudent::where('student_code', $validated['student_code'])->first();

	// 1)   ตรวจสอบความถูกต้องของข้อมูล validate $request
        $validated = $request->validate([
            'student_code' => 'required|string|max:15',
            'first_name' => 'required|string|max:50',
            'first_name_en' => 'required|string|max:50',
            'major_id' => 'required|exists:majors,major_id',
            'idcard' => 'required|digits:13',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

	// 2)   แก้ไขข้อมูลใหม่
        $mjuStudent->update($validated);

	// 3)   กลับไปยังหน้าจอแสดงผล (json)
        return response()->json(['message' => 'Student update successfully','data' => $validated], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, MjuStudent $mju)
    {


    $mju->delete();

    return response()->json(
        [
            'message' => 'Student deleted successfully',
            'deleted Data ' => $mju,
        ],
        200
    );
}
}
