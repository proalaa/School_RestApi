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


    public function store()
    {
        $data = $this->Forvalidation();
        Student::create($data);
    }

    /**
     * @param Student $student
     */
    public function update(Student $student)
    {
        $data = $this->Forvalidation();
        $student->update($data);
    }


    public function destroy(Student $student)
    {
        $student->delete();
    }

    private function Forvalidation()
    {
        request()->validate([
            'first_name' =>'required',
            'last_name'=>'required',
            'phone_number'=>'integer',
            'birth_date' => 'required',
            'total_grade'=>'required|integer'
        ]);
    }
}
