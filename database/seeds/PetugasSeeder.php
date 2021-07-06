<?php

use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')->table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@email.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);
    }
}
