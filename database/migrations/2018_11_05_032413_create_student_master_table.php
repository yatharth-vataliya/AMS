<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_master', function (Blueprint $table) {
            $table->increments('registration_number');
			$table->integer('class');
            $table->string('division');
            $table->integer('roll_no');
			$table->string('student_name');
			$table->date('birth_date');
            $table->string('gender');
			$table->string('student_contact')->nullable();
			$table->date('student_join_date');
			$table->string('parents_name');
			$table->string('parents_occupation')->nullable();
			$table->string('parents_contact')->unique();
			$table->string('password');
			$table->string('address');
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
        Schema::dropIfExists('student_master');
    }
}
