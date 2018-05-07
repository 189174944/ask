<?php

namespace App\Http\Controllers\Admin;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('filter') == 'is_special') {
            $users = UsersModel::with('special')->where('is_special', 1)->paginate(12);
            return view('admin.author', compact('users'));
        } else {
            $users = UsersModel::where('is_special', 0)->paginate(12);
            return view('admin.users', compact('users'));
        }
    }
}
