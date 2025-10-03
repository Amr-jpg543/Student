@extends('shared.admin.app')

@section('content')
    {{-- Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Success Message --}}
    @if(Session::has('msg'))
        <div class="alert alert-success">
            {{ Session::get('msg') }}
        </div>
    @endif

    <form class="form-horizontal" 
          action="{{ route('admin.students.update', $student->id) }}" 
          enctype="multipart/form-data" 
          method="post">
        @csrf
        @method('PUT')

        <div class="card-body">

            {{-- Name --}}
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">Name</label>
                <div class="col-sm-9">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="name" 
                        name="name" 
                        placeholder="Enter student name" 
                        value="{{ old('name', $student->name) }}" 
                        required
                    />
                </div>
            </div>

            {{-- Description --}}
            <div class="form-group row mt-3">
                <label for="description" class="col-sm-3 text-end control-label col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea 
                        class="form-control" 
                        id="description" 
                        name="description" 
                        rows="3"
                    >{{ old('description', $student->description) }}</textarea>
                </div>
            </div>

            {{-- Image --}}
            <div class="form-group row mt-3">
                <label for="image" class="col-sm-3 text-end control-label col-form-label">Image</label>
                <div class="col-sm-9">
                    <input 
                        type="file" 
                        class="form-control" 
                        id="image" 
                        name="image" 
                        accept="image/*"
                    />
                    @if ($student->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $student->image) }}" 
                                 alt="Student Image" 
                                 width="120" 
                                 class="rounded shadow">
                        </div>
                    @endif
                </div>
            </div>

            {{-- Department --}}
            <div class="form-group row mt-3">
                <label for="department_id" class="col-sm-3 text-end control-label col-form-label">Department</label>
                <div class="col-sm-9">
                    <select class="form-select" id="department_id" name="department_id" required>
                        <option value="" disabled>-- Select Department --</option>
                        @foreach ($departments as $department)
                            <option 
                                value="{{ $department->id }}" 
                                {{ old('department_id', $student->department_id) == $department->id ? 'selected' : '' }}
                            >
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        {{-- Submit --}}
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-success">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection
