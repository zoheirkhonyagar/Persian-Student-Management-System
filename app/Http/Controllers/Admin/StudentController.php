<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Morilog\Jalali\jDate;


class StudentController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(15);
        return view('Admin.student.index' , compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = jdate(date('Y'))->format('Y');
        $months = [
            '1' => 'فروردین',
            '2' => 'اردیبهشت',
            '3' => 'خرداد',
            '4' => 'تیر',
            '5' => 'مرداد',
            '6' => 'شهریور',
            '7' => 'مهر',
            '8' => 'آبان',
            '9' => 'آذر',
            '10' => 'دی',
            '11' => 'بهمن',
            '12' => 'اسفند',
        ];
        return view('Admin.student.register' , compact(['year','months']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['time'] = \jDateTime::toGregorian($request['year'],$request['month'],$request['day']);
        $request['time'] = implode("-",$request['time']) ." 00:00:00";
        $this->validate($request , [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'sex' => 'required|string|min:2|max:3',
            'image' => 'nullable|mimes:jpeg,bmp,png',
            'national_number' => 'required|string|digits:10|unique:students',
            'father_name' => 'required|string',
            'father_job' => 'nullable|string',
            'mother_name' => 'required|string',
            'mother_job' => 'nullable|string',
            'address' => 'nullable|string',
            'family_count' => 'nullable|numeric',
            'student_count' => 'nullable|numeric',
            'day' => 'required|numeric',
            'month' => 'required|numeric',
            'year' => 'required|numeric',
            'time' => 'required|date',
        ]);
        $file = $request->file('image');
        if ($file) {
            $image = $this->uploadImage($file);
        }
        Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'sex' => $request->input('sex') ,
            'image' => $image,
            'national_number' => $request->input('national_number'),
            'father_name' => $request->input('father_name'),
            'father_job' => $request->input('father_job'),
            'mother_name' => $request->input('mother_name'),
            'mother_job' => $request->input('mother_job'),
            'address' => $request->input('address'),
            'family_count' => $request->input('family_count'),
            'student_count' => $request->input('student_count'),
            'birthday' => $request->input('time'),
            'user_id' => auth()->user()->id
        ]);

        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $user = $student->user();
        return view('Admin.student.show' , compact(['student' , 'user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('students.index'));
    }
}
