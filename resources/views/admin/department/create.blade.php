@extends('shared.admin.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('msg'))
<div class="alert alert-success">
    {{ Session::get('msg') }}
</div>
@endif
<form class="form-horizontal" action="{{ route('admin.departments.store') }}" enctype="multipart/form-data"
    method="post">
    @csrf
    <div class="card-body">
        <div class="form-group row">
            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Name</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="fname" placeholder="Name Here" name="name" value="{{ old('name') }}"/>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-3 text-end control-label col-form-label">Description</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="description" >{{ old('description') }}</textarea>
            </div>
        </div>
    </div>
    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </div>
</form>
@endsection