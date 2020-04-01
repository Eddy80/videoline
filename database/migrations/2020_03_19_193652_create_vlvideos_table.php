<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlvideos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('catid');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->text('text')->nullable();
            $table->integer('durationinseconds')->nullable();
            $table->integer('viewcount')->default(0);
            $table->text('filename')->nullable();
            $table->string('preview')->nullable();
            $table->smallInteger('payed')->default(0);
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
        Schema::dropIfExists('vlvideos');
    }
}
