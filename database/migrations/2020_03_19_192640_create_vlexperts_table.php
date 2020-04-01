<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlexpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlexperts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('catid')->default(2);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('surname')->nullable();
            $table->text('info')->nullable();
            $table->text('img')->nullable();
            $table->string('work')->nullable();
            $table->string('phone')->nullable();
            $table->string('mob')->nullable();
            $table->string('email')->nullable();
            $table->date('dob')->nullable();
            $table->integer('gender')->default(0);
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
        Schema::dropIfExists('vlexperts');
    }
}
