<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $template = "admin.student.student.pages.index";

        $config['seo'] = config('apps.user');

        return view('admin.dashboard.layout', compact(
            'template',
        ));
    }
}
