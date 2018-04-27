<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (!empty(Session::get('account'))) {
            return redirect()->to('admin');
        } else {
            return view('admin.login');
        }
    }

    public function store(Request $request)
    {
        $account = $request->get('account');
        $password = $request->get('password');
        $admin = AdminModel::where(['account' => $account]);
        $count = $admin->count();
        if ($count > 0) {
            if (Hash::check($password, $admin->first()->password)) {
                Session::put(["users_id" => $admin->first()->id, 'account' => $admin->first()->account]);
                return response()->json([
                    'code' => 1,
                    'info' => 'success',
                ]);
            } else {
                return response()->json([
                    'code' => 0,
                    'info' => 'fail',
                    'data' => [$account, $password]
                ]);
            }
        } else {
            return response()->json([
                'code' => 0,
                'info' => 'user not found',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect()->to('admin/login');
    }
}
