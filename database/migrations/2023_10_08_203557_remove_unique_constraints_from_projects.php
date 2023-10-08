<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueConstraintsFromProjects extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Drop unique constraint from inp_email
            $table->dropUnique('projects_inp_email_unique');

     
        });
    }
}