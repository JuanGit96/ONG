<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = (int)$this->command->ask('Cuantos usuarios necesitas ?');


        $users = factory(User::class, $count)->create();

        $this->command->info('¡Usuarios creados!');
    }
}
