@extends('shared.admin.app')
@section('content')
<h5 class="card-title">Basic Datatable</h5>
<div class="table-responsive">
    <table id="zero_config" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>image</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student['id'] }}</td>
                <td>{{ $student['name'] }}</td>
                 <td>
                    @if($student->image)
                        <img src="{{ asset('storage/' . $student->image) }}" width="100" alt="Student Image">
                    @else
                        <span>No image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.students.show',$student['id']) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('admin.students.edit',$student['id']) }}" class="btn btn-success">Edit</a>
                    <a href="{{ route('admin.students.delete',$student['id']) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection