<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lecture_id')->references('lecture_id')->on('lecture_detail')->onDelete('cascade');
            $table->integer('student_registration')->references('student_registration')->on('student_master')->onDelete('cascade');
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
        Schema::dropIfExists('attendance_detail');
    }
}
