<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      /**
         * Vaciando tabla antes de llenarla de nuevo
         */
        $this->truncateTables([
            'tipo_documento',
            'tipo_persona',
            'rol',
            'users',
        ]);

         $this->call(RolTableSeeder::class);
         $this->call(PersonTypeTableSeeder::class);
         $this->call(DocuemtTypeTableSeeder::class);
         $this->call(UsersTableSeeder::class);


    }

    public function truncateTables($tables)
    {
          DB::statement('SET session_replication_role = replica;'); //ignorar llaves foraneas

           foreach($tables as $table){
               DB::table($table)->truncate(); //vaciar la tabla
           }

           DB::statement('SET session_replication_role = origin;'); //reactivar validacion dellave foranea
    }
}
