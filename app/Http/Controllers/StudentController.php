<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Student;

class StudentController extends Controller
{
    //public function
    public function list()
    {
        $students = Student::orderBy('name', 'asc')->get();      
        return view(         
            'student.list',         
            [             
                'title' => 'students',             
                'students' => $students         
            ]     
        ); 
        
        
    }


    public function create()
    {
        return view(
            'student.form',
            [
                'title' => 'Add new Student',
                'student' => new Student() 

            ]
            
        );
    }


    public function put(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|max:50',
            'coursename'=>'required|max:50',
            'gender'=>'required'
        ]);
        $student= new Student();
        $student->name=$validatedData['name'];
        $student->coursename=$validatedData['coursename'];
        $student->gender=$validatedData['gender'];
        $student->save();
        return redirect('/students')->with('success','Student added successfully');
    }

    public function update(Student $student) {
        return view(
            "student.form",
            [
                "title" => "Edit Student",
                "student" => $student
                
            ]
            
        );
    }
    public function patch(Student $student, Request $request) {
        $validatedData = $request->validate([
            'name'=>'required|max:80',
        ]);
        $student->name= $validatedData['name'];
        $student->save();
        return redirect('/students');

    }

    public function delete(Student $student) 
    {     
        $student->delete();     
        return redirect('/students'); 
    } 

    
}
