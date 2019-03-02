<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->foreign('tdo_id','users_fk_tipo_documento')->references('tdo_id')->on('tipo_documento');
          $table->foreign('tpe_id','users_fk_tipo_persona')->references('tpe_id')->on('tipo_persona');
          $table->foreign('rol_id','users_fk_rol')->references('rol_id')->on('rol');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropForeign('users_fk_tipo_documento');
        $table->dropForeign('users_fk_tipo_persona');
        $table->dropForeign('users_fk_rol');
      });
    }
}
