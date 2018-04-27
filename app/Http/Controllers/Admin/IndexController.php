<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        if (!empty(Session::get('account'))) {
            return view('admin.index');
        } else {
            return redirect()->to('admin/login');
        }
    }
}
