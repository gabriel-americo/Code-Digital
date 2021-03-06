<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        User::create([
            'cpf' => '41254172882',
            'nome' => 'Gabriel Americo',
            'telefone' => '1532278388',
            'nascimento' => '1990-11-22',
            'sexo' => 'M',
            'email' => 'gabrielamerico90@gmail.com',
            'tipo' => 1,
            'password' => bcrypt('123456')
        ]);

        // $this->call(UsersTableSeeder::class);
    }

}
