<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Courses;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view('index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Courses::all();
        return view('create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $storeData = $request->validate([
            'name'   => 'required|max:255',
            'email'  => 'required|max:255',
            'phone'  => 'required|numeric',
            'sex'    => 'required|max:255',
            'course' => 'required|max:255',
            'active' => 'required|max:255',
            'hobbies' => 'required',
        ]);
        $storeData['hobbies'] = implode(", ",$storeData['hobbies']);
        $student = Student::create($storeData);

        return response()->json([
            "status"  => "Success",
            "message" => "Student has been saved successfully"
        ]);

        //return redirect('/students')->with('completed', 'Student has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Courses::all();
        return view('edit', compact('student','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'name'   => 'required|max:255',
            'email'  => 'required|max:255',
            'phone'  => 'required|numeric',
            'sex'    => 'required|max:255',
            'course' => 'required|max:255',
            'active' => 'required|max:255',
            'hobbies' => 'required',
        ]);
        $updateData['hobbies'] = implode(", ",$updateData['hobbies']);
        Student::whereId($id)->update($updateData);
        
        return response()->json([
            "status"  => "Success",
            "message" => "Student has been updated successfully"
        ]);

        //return redirect('/students')->with('completed', 'Student has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json([
            "status"  => "Success",
            "message" => "Student has been deleted successfully"
        ]);

        // return redirect('/students')->with('completed', 'Student has been deleted');
    }
}
