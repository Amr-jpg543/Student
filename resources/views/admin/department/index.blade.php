@extends('shared.admin.app')

@section('content')
    <h5 class="card-title">Basic Datatable</h5>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <td>{{ $department['id'] }}</td>
                        <td>{{ $department['name'] }}</td>
                        <td>
                            <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn btn-success">Edit</a>

                            <form action="{{ route('admin.departments.destroy', $department['id']) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
