<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\StoreAccountRequest;
use App\Http\Requests\Admin\Account\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $province;
    public function __construct()
    {
        $this->province = new Account();
    }
    public function index(Request $request)
    {
        $sort = 10;
        if (!empty($request->sort)) {
            $sort = $request->sort;
        }
        $getAllAccount = $this->province->getAllAccount($request->keyword, $sort);

        $template = 'admin.account.account.pages.index';

        return view(
            'admin.dashboard.layout',
            compact(
                'template',
                'getAllAccount',
            )
        );
    }

    public function create()
    {
        $template = "admin.account.account.pages.store";

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/account.css'
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


        return view(
            'admin.dashboard.layout',
            compact(
                'template',
                'config',
            )
        );
    }

    public function store(StoreAccountRequest $request)
    {
        $data = $request->validated();

        if ($data) {
            $account = new Account();

            $account->name = $request->account_name;
            $account->email = $request->account_email;
            $account->role_id = 1;
            $account->OTP = rand(111111, 999999);
            $account->created_by = session('user_id');

            $account->save();

            toastr()->success('Thêm thành công');

            return redirect()->route('account.index');
        }

        toastr()->error('Có lỗi xảy ra, vui lòng thử lại');

        return back();
    }


    public function edit(Request $request)
    {
        $request->session()->put('account_session_id', $request->id);

        $getEdit = $this->province->getEditAccount(session('account_session_id'));

        $template = "admin.account.account.pages.store";


        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                '/admin/css/account.css'
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

        return view(
            'admin.dashboard.layout',
            compact(
                'template',
                'config',
                'getEdit',
            )
        );
    }

    public function update(UpdateAccountRequest $request)
    {
        $data = $request->validated();
        if ($data) {
            $account = Account::find(session('account_session_id'));

            $account->name = $request->account_name;
            $account->email = $request->account_email;
            $account->role_id = 1;
            $account->OTP = rand(111111, 999999);
            $account->updated_by = session('user_id');

            $account->save();

            $request->session()->forget('account_session_id');

            toastr()->success('Thêm thành công');

            return redirect()->route('account.index');
        }

        toastr()->error('Có lỗi xảy ra, vui lòng thử lại');

        return back();
    }
    public function trash($id)
    {
        $trash = $this->province::find($id);

        $trash->deleted_by = session('user_id');

        $trash->deleted_at = now();

        $trash->save();

        toastr()->success('Đã Ẩn Tài khoản');

        return redirect()->route('account.index');
    }

    public function restore($id)
    {
        $trash = $this->province::find($id);

        $trash->deleted_by = null;

        $trash->deleted_at = null;

        $trash->save();

        toastr()->success('Đã Khôi Phục Tài khoản');

        return redirect()->route('account.index');
    }
    public function delete($id)
    {
        $trash = $this->province::find($id);

        $trash->delete();

        toastr()->success('Đã Xóa Tài khoản');

        return redirect()->route('account.index');
    }
}
