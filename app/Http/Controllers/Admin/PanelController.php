<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends AdminController
{
    public function index()
    {
        $users = User::all();
        $students = Student::latest()->take(10)->get();
        $count = 1;
        return view('Admin.index' , compact('users' , 'students' , 'count'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('Admin.user.profile.show' , compact('user'));
    }

    public function update(UserRequest $request)
    {
        $user = auth()->user();

        $user->first_name = Request::input('first_name');
        $user->last_name = Request::input('last_name');
        $user->national_number = Request::input('national_number');
        if (! Request::file('image') == '')
        {
            $image = $this->uploadImage(Request::file('image'));
            $user->image = $image;
        }

        if ( ! Request::input('password') == '')
        {
            $user->password = bcrypt(Request::input('password'));
        }

        $user->save();
    }

}
