<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlbooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('catid');
            $table->string('name');
            $table->text('info')->nullable();
            $table->string('author')->nullable();
            $table->text('description')->nullable();
            $table->text('img')->nullable();
            $table->text('downfile')->nullable();
            $table->integer('downcount')->default(0);
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
        Schema::dropIfExists('vlbooks');
    }
}
