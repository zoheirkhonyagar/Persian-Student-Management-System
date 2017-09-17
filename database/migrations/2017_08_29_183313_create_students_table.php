<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sex' , 3);
            $table->text('image')->nullable();
            $table->string('national_number')->unique();
            $table->string('class_name')->nullable();
            $table->timestamp('birthday');
            $table->string('father_name');
            $table->string('father_job')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name');
            $table->string('mother_job')->nullable();
            $table->string('mother_phone')->nullable();
            $table->text('address')->nullable();
            $table->integer('family_count')->nullable();
            $table->integer('student_count')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
