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
        private function savedepartmentData(department $department, Request $request) 
        {     $validatedData = $request->validate([         
            'name' => 'required|min:3|max:256',         
            'author_id' => 'required',         
            'description' => 'nullable',         
            'price' => 'nullable|numeric',         
            'year' => 'numeric',         
            'image' => 'nullable|image',         
            'display' => 'nullable'     
        ]); 
        $department->name = $validatedData['name'];     
        $department->author_id = $validatedData['author_id'];     
        $department->description = $validatedData['description'];     
        $department->price = $validatedData['price'];     
        $department->year = $validatedData['year'];     
        $department->display = (bool) ($validatedData['display'] ?? false);      
        
        if ($request->hasFile('image')) {         
            $uploadedFile = $request->file('image');         
            $extension = $uploadedFile->clientExtension();         
            $name = uniqid();         
            $department->image = $uploadedFile->storePubliclyAs(            
                '/',             
                $name . '.' . $extension,             
                'uploads'         
            );     
        } 
        $department->save();
    }
    public function put(Request $request) 
    {     
        $department = new Department();     
        $this->saveDepartmentData($department, $request);     
        return redirect('/departments');
    } 

    public function patch(Department $department, Request $request) 
    {     
        $this->saveDepartmentData($department, $request);     
        return redirect('/departments/update/' . $department->id); 
    }  

    

    public function delete(department $department) 
    {     
        $department->delete();     
        return redirect('/departments'); 
    }

}
