<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('inp_name');
            $table->string('inp_email')->unique();
            $table->text('description');
            $table->integer('students_needed')->unsigned();
            $table->integer('trimester')->unsigned();
            $table->integer('year')->unsigned();
            $table->timestamps();
    
            // Ensuring that a project title is unique within the same trimester and year
            $table->unique(['title', 'trimester', 'year']);
        });
    }
    
};
