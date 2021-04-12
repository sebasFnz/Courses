<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name',60);
            $table->smallInteger('course_ranking');
            $table->string('course_teacher',60);
            $table->enum('course_status',['Estreno','Estable', 'Antiguo']);
            $table->dateTime('created_at', 0);
            $table->dateTime('updated_at',0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
