<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('department')->get(); // عشان يجيب اسم القسم كمان
        return view('admin.student.index', compact('students'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.student.create', compact('departments'));
    }

    public function store(StudentRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs('products', $imageName, 'public');

            // هنا نستخدم array syntax
            $data['image'] = $path;
        }

        Student::create($data);

        return redirect()->route('admin.students.index')->with('msg', 'Student created successfully ✅');
    }

    public function show($id)
    {
        $student = Student::with('department')->findOrFail($id);
        return view('admin.student.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $departments = Department::all(); // عشان نعرضها في select box
        return view('admin.student.edit', compact('student', 'departments'));
    }

    public function update(StudentRequest $request, $id)
    {
        $data = $request->validated();

        $student = Student::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
            $data['image'] = $path;
        }

        $student->update($data);

        return redirect()->route('admin.students.index')->with('msg', 'Student updated successfully ✅');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student.delete', compact('student'));
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('admin.students.index')->with('msg', '');
    }
}
