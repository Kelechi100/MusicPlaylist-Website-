@extends('layout')  
@section('content')      
    <h1>Student Management System</h1>      
    @if (count ($students) > 0 )          
        <table class="table table-striped table-hover table-sm">             
            <thead class="thead-light">                 
                <tr>                     
                <th>ID</td>                     
                <th>Name</td>
                <th>Coursename</th>
                <th>Gender</th>                    
                <th>&nbsp;</td>                 
                </tr>             
            </thead>             
            <tbody>              
            @foreach($students as $student)             
            <tr>                 
                <td>{{ $student->id }}</td>                 
                <td>{{ $student->name }}</td>
                <td>{{ $student->coursename }}</td>
                <td>{{ $student->gender }}</td>                
                <td><a href="/students/update/{{ $student->id }}" class="btn btn-outline-primary btnsm">Edit
                <form action="/students/delete/{{ $student->id }}" method="post" class="deletionform d-inline">
                @csrf 
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button> 
                </form></a></td>         
                </tr>             
            @endforeach             
            </tbody>         
        </table>  
        
    @else          
        <p>No entries found in database</p>      
    @endif
    <a href="/students/create" class="btn btn-primary">Create</a>  
@endsection 