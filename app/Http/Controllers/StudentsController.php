<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.data')->with([
            'students' => Students::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentsRequest $request)
    {
        $validated = $request->validated();

        $students = new Students;
        $students->idstudent = $request->idstudent;
        $students->fullname = $request->fullname;
        $students->gender = $request->gender;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->save();

        return redirect('students')->with('msg', 'with the name ' . $request->fullname . ' has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students, $idstudent)
    {
        $data = Students::find($idstudent);

        return view('students.edit', $data);
    }

    public function update(UpdateStudentsRequest $request, Students $students, $idstudent)
    {
        $data = $students->find($idstudent);
        $data->fullname = $request->fullname;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->save();

        return redirect('students')->with('msg', 'with the name ' . $request->fullname . ' has been edit');
    }

    public function destroy(Students $students, $idstudent)
    {
        $data = $students->find($idstudent);
        $data->delete();

        return redirect('students')->with('msg', 'with the name ' . $data->fullname . ' has been delete');
    }
}
