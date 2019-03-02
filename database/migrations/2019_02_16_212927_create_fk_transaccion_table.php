<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkTransaccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaccion', function (Blueprint $table) {
            $table->foreign('usr_id','user_fk_transaccion')->references('usr_id')->on('users');
            $table->foreign('ttr_id','tipo_transaccio_fk_transaccion')->references('ttr_id')->on('tipo_transaccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('transaccion', function (Blueprint $table) {
          $table->dropForeign('user_fk_transaccion');
          $table->dropForeign('tipo_transaccio_fk_transaccion');
      });    }
}
