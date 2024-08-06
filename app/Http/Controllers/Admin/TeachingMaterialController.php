<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teachers;
use App\Models\TeachingMaterial;
use Illuminate\Http\Request;

class TeachingMaterialController extends Controller
{
    public function index()
    {
        $materials = TeachingMaterial::with('teacher')->get();
        return view('admin.dashboard.layout', [
            'template' => 'admin.teacher.teachermaterials.pages.index'], compact('materials'));
    }

    public function create()
    {
        $materials = TeachingMaterial::with('teacher')->get();
        $teachers = Teachers::all(); // Fetch all teachers
        return view('admin.dashboard.layout', [
            'template' => 'admin.teacher.teachermaterials.pages.store'
        ], compact('materials', 'teachers'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_link' => 'required|url',
        ]);

        TeachingMaterial::create([
            'teacher_id' => $request->teacher_id,
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $request->file_link,
        ]);

        toastr()->success('Tài liệu giảng dạy đã được tải lên thành công.');
            return redirect()->route('materials.index');
    }

    public function show(TeachingMaterial $teachingMaterial)
    {
        return view('admin.dashboard.layout', [
            'template' => 'admin.teacher.teachermaterials.pages.show'], compact('teachingMaterial'));
    }

    public function destroy($id)
    {
        $teachingMaterial = TeachingMaterial::findOrFail($id);
        $teachingMaterial->delete();
    
        toastr()->success('Tài liệu giảng dạy đã được xóa thành công.');
        return redirect()->route('materials.index');
    }
    
}

