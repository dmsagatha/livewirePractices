<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
  public function up()
  {
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->string('firstname', 50)->nullable();
      $table->string('lastname', 50)->nullable();
      $table->string('email')->unique();
      $table->tinyInteger('gender')->default(1);
      $table->string('phone')->nullable();
      $table->timestamps();
    });
  }
  
  public function down()
  {
    Schema::dropIfExists('students');
  }
}