@extends('layout')  
@section('content')      
    <h1>department Management System</h1>      
@if (count ($items) > 0 )          
    <table class="table table-striped table-hover table-sm">             
        <thead class="thead-light">                 
            <tr>                     
                <th>ID</td>                     
                <th>Name</td>
                <th>Student</th>
                <th>Year</th>
                <th>Grades</th>
                <th>Published</th>                    
                <th>&nbsp;</td>                 
            </tr>             
        </thead>             
        <tbody>              
        @foreach($items as $department)             
            <tr>                 
                <td>{{ $department->id }}</td>                 
                <td>{{ $department->name }}</td>
                <td>{{ $department->student->name }}</td>
                <td>{{ $department->year }}</td>
                <td>&euro; {{ number_format($department->grades, 2, '.') }}</td>
                <td>{!! $department->display ? '&#x2714;' : '&#x274C;' !!}</td>                 
                <td>
                    <a 
                        href="/departments/update/{{ $department->id }}" 
                        class="btn btn-outline-primary btnsm"
                    >Edit</a>
                    <form 
                        action="/departments/delete/{{ $department->id }}" 
                        method="post" 
                        class="deletion-form d-inline"
                    >
                        @csrf 
                        <button 
                            type="submit" 
                            class="btn btn-outline-danger btn-sm"
                        >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach 
    </tbody>        
    </table>  
@else          
    <p>No entries found in database</p>      
@endif
<a href="/departments/create" class="btn btn-primary">Create</a>  
@endsection 