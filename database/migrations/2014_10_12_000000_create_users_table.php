<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('usr_id');
            $table->string('name');
            $table->string('usr_apellido');
            $table->string('usr_telefono')->nullable();
            $table->string('usr_ciudad');
            $table->string('usr_numero_documento');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            #Foreing Keys
            $table->integer('tpe_id')->unsigned();
            $table->integer('tdo_id')->unsigned();
            $table->integer('rol_id')->unsigned();
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
