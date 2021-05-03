<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{

    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('Name');
            $table->text('Email');
            $table->text('Phone');
            $table->text('Message');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
