<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('full_name', 200);
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female', 'Other']);
            $table->date('enrollment_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};
