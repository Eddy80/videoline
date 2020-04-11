<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');

            $table->string('firstname');
            $table->string('lastname');
            $table->string('surname')->nullable();

            $table->string('phone')->nullable();

            $table->integer('gender')->default(0);

            $table->integer('secretq')->nullable();
            $table->string('secreta')->nullable();


            $table->string('avatar')->nullable();
            $table->string('description')->nullable();

            $table->date('paydate')->nullable();
            $table->double('payamount')->nullable();
            $table->date('payexpiredate')->nullable();
            $table->string('paymentkey')->nullable();
            $table->smallInteger('subscribe')->nullable();
            $table->string('promokodforregister')->nullable();
            $table->string('myprivatepromokod')->nullable();
            $table->double('payamountbypromokod')->nullable();
            $table->integer('status')->default(0);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
