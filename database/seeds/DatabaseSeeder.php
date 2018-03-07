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
            'name' => 'Gabriel',
            'phone' => '1532278388',
            'birth' => '1990-11-22',
            'gender' => 'M',
            'email' => 'gabrielamerico90@gmail.com',
            'password' => bcrypt('123456')
        ]);

        // $this->call(UsersTableSeeder::class);
    }

}
