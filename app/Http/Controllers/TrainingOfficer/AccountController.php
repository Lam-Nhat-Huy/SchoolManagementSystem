<?php

namespace App\Http\Controllers\TrainingOfficer;

use App\Http\Controllers\Controller;
use App\Models\TrainingOfficer\TrainingOfficerAccount;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $getAllTrainingOfficerAccount = TrainingOfficerAccount::orderBy('training_officer_accounts.created_at', 'DESC')
            ->paginate(10);

        $template = 'training_officer.account.account.pages.index';

        return view('training_officer.dashboard.layout', compact(
            'template',
            'getAllTrainingOfficerAccount',
        ));
    }

    public function create()
    {
        $template = "training_officer.account.account.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/training_officer.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        $config['method'] = 'create';


        return view('training_officer.dashboard.layout', compact(
            'template',
            'config',
        ));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit($id)
    {
        $getEdit = TrainingOfficerAccount::where('training_officer_accounts.id', $id)
            ->first();

        $template = "training_officer.account.account.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/training_officer.css'
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                '/admin/plugins/ckeditor/ckeditor.js',
                '/admin/plugins/ckfinder_2/ckfinder.js',
                '/admin/lib/finder.js',
                '/admin/lib/library.js',
            ]
        ];

        $config['method'] = 'edit';

        return view('training_officer.dashboard.layout', compact(
            'template',
            'config',
            'getEdit',
        ));
    }

    public function update(Request $request, $id)
    {
    }
}
