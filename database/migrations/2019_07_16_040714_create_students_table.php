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
            $table->bigIncrements('id');
            $table->string('class_id');
            $table->string('name')->nullable();
            $table->string('gender')->default(1);
            $table->string('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('nation')->default(1);
            $table->string('name_father')->nullable();
            $table->string('name_mother')->nullable();
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
