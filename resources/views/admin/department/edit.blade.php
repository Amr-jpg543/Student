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

    <form class="form-horizontal" action="{{ route('admin.departments.update', $department->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name</label>
                <div class="col-sm-9">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="fname" 
                        placeholder="Name Here" 
                        name="name" 
                        value="{{ old('name', $department->name) }}"
                        required
                    />
                </div>
            </div>

            <div class="form-group row mt-3">
                <label for="description" class="col-sm-3 text-end control-label col-form-label">Description</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description">{{ old('description', $department->description) }}</textarea>
                </div>
            </div>
        </div>
        <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection
