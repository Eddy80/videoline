<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlcatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlcats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parentcatid')->default(0);
            $table->integer('type')->default(0);//0-book, 1-telim
            $table->string('name');
            $table->text('text')->nullable();
            $table->integer('authorid')->nullable();
            $table->string('author')->nullable();
            $table->text('img')->nullable();
            $table->integer('totaldurationinseconds')->nullable();
            $table->integer('totalviewcount')->nullable();
            $table->integer('orderid')->nullable();
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
        Schema::dropIfExists('vlcats');
    }
}
