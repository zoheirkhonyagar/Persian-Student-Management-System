<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin.index' , compact('users'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('Admin.user.profile.show' , compact('user'));
    }

    public function update()
    {

    }
}
