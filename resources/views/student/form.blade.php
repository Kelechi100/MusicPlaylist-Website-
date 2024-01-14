@extends('layout')  
@section('content')      
    <h1>{{ $student }}</h1>
    @if ($errors->any())        
        <div class="alert alert-danger">Please fix the errors! </div>     
    @endif 
    <form method="post" action="{{ $student->exists ? '/students/patch/' . $student->id : '/students/put' }}"> 
    @csrf 
        <div class="mb-3"> 
            <label for="student-name" class="form-label">Student name</label>
            <input
                type="text"                  
                class="form-control @error('name') is-invalid @enderror"                  
                id="student-name"                  
                name="name"
                coursename="coursename" 
                gender="gender"
                value="{{ old('name', $student->name) }}">

            @error('name')                 
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>             
            @enderror
        </div>
        <div class="mb-3">
            <label for="course-name" class="form-label">course name</label>
            <input
                type="text"                  
                class="form-control @error('name') is-invalid @enderror"                  
                id="course-name"                  
                name="coursename"
                value="{{ old('name', $student->name) }}">
            @error('coursename')                 
                <p class="invalid-feedback">{{ $errors->first('coursename') }}</p>             
            @enderror
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input
                type="text"                  
                class="form-control @error('name') is-invalid @enderror"                  
                id="gender"                  
                name="gender"
                value="{{ old('name', $student->name) }}">
            @error('gender')                 
                <p class="invalid-feedback">{{ $errors->first('gender') }}</p>             
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection 

        
