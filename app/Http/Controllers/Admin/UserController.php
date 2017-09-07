<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('Admin.user.profile.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       // dd($request->all());
        $this->validate($request , [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,bmp,png',
            'national_number' => [
                'required',
                'digits:10',
                'string',
                Rule::unique('users')->ignore($user->id, 'id')
            ],
        ]);
        if(!$request->input('password') == null)
        {
            $this->validate($request , [
                'password' => 'string|min:6|confirmed',
            ]);
        }

        $password = $request->input('password') != null ? bcrypt($request->input('password')) : $user->password ;
        $file = $request->file('image');
        $inputs = $request->all();

        if ($file)
        {
            $inputs['image'] = $this->uploadImage($file);
        }else{
            $inputs['image'] = $user->image;
        }

        $user->update([
            "_token" => $request->input('_token'),
            "_method" => $request->input('_method'),
            "first_name" => $request->input('first_name'),
            "last_name" => $request->input('last_name'),
            "national_number" => $request->input('national_number'),
            "image" => $inputs['image'],
            "password" => $password,
            "password_confirmation" => $password
        ]);
        return redirect(route('user.profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
