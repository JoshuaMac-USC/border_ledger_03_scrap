<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('fname');
            $table->string('lname');
            $table->integer('age');
            $table->string('id_number');
            $table->string('id_type');
            $table->string('mode_of_transpo');
            $table->string('vplatenum')->nullable();
            $table->string('purpose');
            $table->string('destination');
            $table->string('border_name');
            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borders');
    }
}
