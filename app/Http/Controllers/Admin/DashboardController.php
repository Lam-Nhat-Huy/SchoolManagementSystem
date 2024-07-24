<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Dữ liệu mẫu
        $data = [65, 59, 80, 81, 56, 55, 40];
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];

        $template = 'admin.dashboard.pages.index';

        return view('admin.dashboard.layout', compact('template', 'data', 'labels'));
    }
}
