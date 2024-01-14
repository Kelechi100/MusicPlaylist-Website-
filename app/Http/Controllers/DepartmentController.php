<?php

namespace App\Http\Controllers;
use App\Models\Department; 

use Illuminate\Http\Request;

class DepartmentController extends Controller

{
    public function list() 
    {     
        $items = Department::orderBy('name', 'asc')->get();      
        return view(         
            'department.list',         
            [             
                'title' => 'Departments',             
                'items' => $items         
            ]     
        ); 
    } 
    public function create()
    {
        $students = Student::orderBy('name', 'asc')->get(); 
        return view(
            'department.create',
            [
                'title' => 'Add new department',
                'department' => new Department(),
                'students' => $students, 
            ]
            
        );
    }



    public function put(Request $request) 
    {     
        $validatedData = $request->validate([         
            'name' => 'required|min:3|max:256',         
            'student_id' => 'required',         
            'description' => 'nullable',         
            'grades' => 'nullable|numeric',         
            'year' => 'numeric',                 
            'display' => 'nullable'     
        ]);      
        
        $department = new Department();
        $department->name = $validatedData['name'];     
        $department->student_id = $validatedData['student_id'];     
        $department->description = $validatedData['description'];     
        $department->grades = $validatedData['grades'];     
        $department->year = $validatedData['year']; 
        $department->fill($validatedData);   
        $department->display = (bool) ($validatedData['display'] ?? false);
        if ($request->hasFile('image')) {     
            $uploadedFile = $request->file('image');     
            $extension = $uploadedFile->clientExtension();     
            $name = uniqid();     
            $department->image =  $uploadedFile->storePubliclyAs(         
                '/',          
                $name . '.' . $extension,          
                'uploads'    
            ); 
        }    
        $department->save(); 

        return redirect('/departments');  

    }
    public function update(department $department) 
    {     
        $students = Student::orderBy('name', 'asc')->get();      
        return view(         
            'department.form',         
            [             
                'title' => 'Edit department',             
                'department' => $department,             
                'students' => $students,         
            ]     
        ); 
    } 

    public function patch(department $department, Request $request) 
    {     
        $validatedData = $request->validate([         
            'name' => 'required|min:3|max:256',         
            'student_id' => 'required',         
            'description' => 'nullable',         
            'grades' => 'nullable|numeric',         
            'year' => 'numeric',         
            'image' => 'nullable|image',         
            'display' => 'nullable'     
        ]);
        $department->name = $validatedData['name'];     
        $department->student_id = $validatedData['student_id'];     
        $department->description = $validatedData['description'];     
        $department->grades = $validatedData['grades'];     
        $department->year = $validatedData['year'];     
        $department->display = (bool) ($validatedData['display'] ?? false);
        if ($request->hasFile('image')) {     
            $uploadedFile = $request->file('image');     
            $extension = $uploadedFile->clientExtension();     
            $name = uniqid();     
            $department->image =  $uploadedFile->storePubliclyAs(         
                '/',          
                $name . '.' . $extension,          
                'uploads'     
            ); 
        }      
        $department->save();      
        
        return redirect('/departments/update/' . $department->id); 
    }

    public function delete(department $department) 
    {     
        $department->delete();     
        return redirect('/departments'); 
    }

}
