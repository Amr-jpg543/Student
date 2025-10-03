@extends('shared.admin.app')
@section('content')

@dump(asset('storage/' . $student['image']))
<h5 class="card-title">Basic Datatable</h5>
<div class="table-responsive">
    <table id="zero_config" class="table table-striped table-bordered">
        <tbody>
            <tr>
                <th style="background-color: #333;color:#fff;width:20%">ID</th>
                <td>{{ $student['id'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #333;color:#fff;width:20%">Name</th>
                <td>{{ $student['name'] }}</td>
            </tr>
     
            <tr>
                <th style="background-color: #333;color:#fff;width:20%">Description</th>
                <td>{{ $student['description'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #333;color:#fff;width:20%">Image</th>
                <td>
                    <img src="/storage/{{ $student['image'] }}" width="100" alt="student image">

                </td>
            </tr>
            <tr>
                <th style="background-color: #333;color:#fff;width:20%">department</th>
                <td>{{ $student['department_id'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #333;color:#fff;width:20%">Created At</th>
                <td>{{ $student['created_at'] }}</td>
            </tr>
            <tr>
                <th style="background-color: #333;color:#fff;width:20%">Updated At</th>
                <td>{{ $student['updated_at'] }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{route('admin.students.index')}}" class="btn btn-secondary">Cancel</a>
<form action="{{route('admin.students.destroy',$student['id'])}}" method="POST" class="d-inline-block">
@csrf
@method('DELETE')
<input type="submit" value="Delete" class="btn btn-danger" >
</form>


    
   
</div>
@endsection