<?php

namespace App\Http\Controllers\Admin;

use App\Models\UsersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = UsersModel::paginate(12);
        return view('admin.users', compact('users'));
    }
}
