<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlcertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlcertificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->text('pathtofile')->nullable();
            $table->integer('catid')->nullable();
            $table->string('certnumber')->nullable();
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
        Schema::dropIfExists('vlcertificates');
    }
}
