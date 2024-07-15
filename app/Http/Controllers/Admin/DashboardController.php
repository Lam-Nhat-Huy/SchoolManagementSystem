<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $template = 'admin.dashboard.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
        ));
    }
}
