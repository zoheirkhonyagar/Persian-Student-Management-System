<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name','last_name','sex','image','national_number','father_name','father_job','mother_name','mother_job','address','family_count','student_count','birthday','user_id'
    ];
    protected $casts = [
        'image' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
