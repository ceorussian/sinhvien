<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_id');
            $table->string('class_id')->nullable();
            $table->string('step')->default(1);
            $table->string('subject_id')->nullable();
            $table->string('score_mieng')->nullable();
            $table->string('score_15')->nullable();
            $table->string('score_60')->nullable();
            $table->string('score_last')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
