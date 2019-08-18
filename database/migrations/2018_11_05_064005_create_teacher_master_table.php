<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_master', function (Blueprint $table) {
            $table->increments('teacher_id');
			$table->string('teacher_name');
			$table->string('teacher_address')->nullable();
			$table->string('teacher_contact');
			$table->string('teacher_email')->unique();
            $table->string('gender');
			$table->date('teacher_join_date');
			$table->date('teacher_leave_date')->nullable();
			$table->string('teacher_password');
			$table->integer('status')->default(1);
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
        Schema::dropIfExists('teacher_master');
    }
}
