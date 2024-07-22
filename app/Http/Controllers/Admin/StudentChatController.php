<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chats;
use Illuminate\Http\Request;

class StudentChatController extends Controller
{
    public function index()
    {
        $getChatStudent = Chats::where('student_id', session('user_id'))
            ->get();

        $getChatOffier = Chats::where('reply_to', session('user_id'))
            ->get();

        $template = 'admin.student_chat.student_chat.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getChatStudent',
            'getChatOffier',
        ));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
