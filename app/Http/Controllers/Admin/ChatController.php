<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chats;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $getAllChat = Chats::select('chats.*', 'students.name as student_name')
            ->join('students', 'chats.student_id', '=', 'students.id')
            ->orderBy('chats.sent_at', 'DESC')
            ->get()
            ->groupBy('student_id');

        $chatCounts = $getAllChat->map(function ($chats, $studentId) {
            $countIsReplyZero = $chats->where('is_reply', 0)->count();
            return [
                'count_is_reply_zero' => $countIsReplyZero,
            ];
        });

        $template = 'admin.chat.chat.pages.index';

        return view('admin.dashboard.layout', compact(
            'template',
            'getAllChat',
            'chatCounts',
        ));
    }

    public function detail($id)
    {
        $config['class'] = 'none';

        $getAllChat = Chats::select('chats.*', 'students.name as student_name')
            ->join('students', 'chats.student_id', '=', 'students.id')
            ->orderBy('chats.sent_at', 'DESC')
            ->get()
            ->groupBy('student_id');

        $chatCounts = $getAllChat->map(function ($chats, $studentId) {
            $countIsReplyZero = $chats->where('is_reply', 0)->count();
            return [
                'count_is_reply_zero' => $countIsReplyZero,
            ];
        });

        $getChatDetail = Chats::select('chats.*', 'students.name as student_name')
            ->join('students', 'chats.student_id', '=', 'students.id')
            ->where('chats.student_id', $id)
            ->get();

        $getChatOffier = Chats::where('reply_to', $id)
            ->get();

        $template = 'admin.chat.chat.pages.detail';

        return view('admin.dashboard.layout', compact(
            'template',
            'config',
            'getAllChat',
            'chatCounts',
            'getChatDetail',
            'getChatOffier',
        ));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
