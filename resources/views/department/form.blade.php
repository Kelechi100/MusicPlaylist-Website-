@extends('layout')  
@section('content')  
    <h1>Outline</h1> 
@if ($errors->any())     
    <div class="alert alert-danger">Please fix the validation errors!</div> 
@endif

<form     
    method="post"     
    action="{{ $department->exists ? '/departments/patch/' . $department->id : '/departments/put' }}"
    enctype="multipart/form-data" >    
    @csrf 
    <div class="mb-3">         
        <label for="department-name" class="form-label">Name</label>
        <input             
            type="text"             
            id="department-name"             
            name="name"             
            value="{{ old('name', $department->name) }}"             
            class="form-control @error('name') is-invalid @enderror"         
        >
        @error('name')            
            <p class="invalid-gradesdback">{{ $errors->first('name') }}</p>         
        @enderror
    </div>
    <div class="mb-3">
        <label for="department-student" class="form-label">Student</label> 
        <select
            id="department-student"             
            name="student_id"             
            class="form-select @error('student_id') is-invalid @enderror"         
        >             
            <option value="">Choose the student!</option>
                @foreach($students as $student)                    
                    <option                         
                        value="{{ $student->id }}" 
                        @if ($student->id == old('student_id', $department->student>id ?? false)) selected @endif                     
                    >{{ $student->name }}
                    </option>
                @endforeach
        </select>
        @error('student_id')
            <p class="invalid-gradesdback">{{ $errors->first('student_id') }}</p> 
        
        @enderror
    </div>
    <div class="mb-3">         
        <label for="department-description" class="form-label">Description</label>
        <textarea
            id="department-description"             
            name="description"
            class="form-control @error('description') is-invalid @enderror"         
        >{{ old('description', $department->description) }}</textarea>
        @error('description')
            <p class="invalid-gradesdback">{{ $errors->first('description') }}</p>
        @enderror
    </div>
    <div class="mb-3">         
        <label for="department-year" class="form-label">Study year</label>
        <input             
            type="number" max="{{ date('Y') + 1 }}" step="1"             
            id="department-year"             
            name="year"             
            value="{{ old('year', $department->year) }}"             
            class="form-control @error('year') is-invalid @enderror"         
        >
        @error('year')             
            <p class="invalid-gradesdback">{{ $errors->first('year') }}</p>         
        @enderror     
    </div>
    <div class="mb-3">         
        <label for="department-grades" class="form-label">Grades</label>
        <input
           type="number" min="0.00" step="0.01" lang="en"             
           id="department-grades"             
           name="grades"             
           value="{{ old('grades', $department->grades) }}"             
           class="form-control @error('grades') is-invalid @enderror"         
        > 
        @error('grades')
            <p class="invalid-gradesdback">{{ $errors->first('grades') }}</p>
        @enderror
    </div>
    <!--image-->
    <div class="mb-3">     
        <label for="department-image" class="form-label">Image</label>
        @if($department->image)
        <img
            src="{{ asset('images/' . $department->image) }}"             
            class="img-fluid img-thumbnail d-block mb-2"             
            alt="{{ $department->name }}"
        >
        @endif
        <input
            type="file" accept="image/png, image/webp, image/jpeg"         
            id="department-image"         
            name="image"         
            class="form-control @error('image') is-invalid @enderror"
        >
        @error('image')
           <p class="invalid-gradesdback">{{ $errors->first('image') }}</p> 
        @enderror
    </div>  
    <div class="mb-3">
        <div class="form-check">            
            <input                 
                type="checkbox"                 
                id="department-display"                 
                name="display"                 
                value="1"                 
                class="form-check-input @error('display') is-invalid @enderror"                 
                @if (old('display', $department->display)) checked @endif             
            >             
            <label class="form-check-label" for="department-display">
                Publish
            </label>
            @error('display')                 
                <p class="invalid-gradesdback">{{ $errors->first('display') }}</p>             
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">        
        {{ $department->exists ? 'Update' : 'Create' }}     
    </button> 
</form>
@endsection


   





    
     
