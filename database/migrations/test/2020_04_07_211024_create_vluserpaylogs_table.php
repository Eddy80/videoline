<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVluserpaylogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vluserpaylogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->string('firstname');
            $table->string('lastname');
            $table->double('payamount');
            $table->date('paydate');
            $table->string('promokodforpay');
            $table->integer('paywaiting');
            $table->integer('payedtouser');
            $table->string('cardnumber');
            $table->string('cardname');
            $table->double('payedtouseramount');
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
        Schema::dropIfExists('vluserpaylogs');
    }
}
