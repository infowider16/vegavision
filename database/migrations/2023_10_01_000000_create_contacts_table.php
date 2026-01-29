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
            $table->string('name', 255);
            $table->string('organization', 255);
            $table->string('email', 255);
            $table->string('country_code', 5);
            $table->string('phone', 10);
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
