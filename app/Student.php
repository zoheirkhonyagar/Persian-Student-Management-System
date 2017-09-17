<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name','last_name','sex','image','national_number','class_name','father_name','father_job','father_phone','mother_name','mother_job','mother_phone','address','family_count','student_count','birthday','user_id'
    ];
    protected $casts = [
        'image' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
