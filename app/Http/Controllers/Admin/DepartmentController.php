<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        return view('admin.department.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();

        Department::create($data);

        return redirect()->back()->with('msg', 'Department created successfully ✅');
    }
    public function edit($id){
        $department = Department::findOrFail($id);
        return view('admin.department.edit', compact('department'));
    }
    public function update(DepartmentRequest $request, $id){
        $data = $request->validated();
        $department = Department::findOrFail($id);
        $department->update($data);
         return redirect()->route('admin.departments.index')->with('msg', 'Student updated successfully ✅');

    }
       public function destroy($id){
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('admin.departments.index')->with('msg','');
    }
}
