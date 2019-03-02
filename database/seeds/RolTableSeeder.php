<?php

use Illuminate\Database\Seeder;
use App\User;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('rol')->insert([
          'rol_nombre' => 'Administrador',
          'rol_descripcion' => '...',
      ]);

      DB::table('rol')->insert([
          'rol_nombre' => 'Ciudadano',
          'rol_descripcion' => '...',
      ]);

    }
}
