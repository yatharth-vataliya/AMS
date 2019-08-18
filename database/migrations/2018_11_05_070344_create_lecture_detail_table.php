<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture_detail', function (Blueprint $table) {
            $table->increments('lecture_id');
			$table->integer('subject_id')->references('subject_id')->on('subject_master')->onDelete('cascade');
			$table->integer('teacher_id')->references('teacher_id')->on('teacher_master')->onDelete('cascade');
			$table->integer('division_id')->references('division_id')->on('division_master')->onDelete('cascade')->nullable();
			$table->integer('room_id')->references('room_id')->on('room_master')->onDelete('cascade');
			$table->integer('class');
            $table->date('date');
			$table->integer('lecture_no');
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
        Schema::dropIfExists('lecture_detail');
    }
}
