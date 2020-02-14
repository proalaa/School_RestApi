<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentsResource;
use App\Http\Resources\StudentsResourceCollection;
use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * @return StudentsResourceCollection
     */
    public function index():StudentsResourceCollection
    {
        return new StudentsResourceCollection(Student::all());

    }

    /**
     * @param Student $student
     * @return StudentsResource
     */
    public function show(Student $student):StudentsResource
    {
        return new StudentsResource($student);
    }

    /**
     * @return StudentsResource
     */
    public function store(Request $request):StudentsResource
    {
        $request->validate([
            'first_name' =>'required',
            'last_name'=>'required',
            'phone_number'=>'bail|nullable|integer',
            'birth_date' => 'required',
            'total_grade'=>'required|integer'
        ]);


        $data = Student::create($request->all());
        return new StudentsResource($data);
    }

    /**
     * @param Request $request
     * @param Student $student
     * @return StudentsResource
     */
    public function update(Request $request,Student $student):StudentsResource
    {

        $student->update($request->all());

        return new StudentsResource($student);
    }

    /**
     * @param Student $student
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json();
    }


}
