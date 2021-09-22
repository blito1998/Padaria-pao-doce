<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Edson Admin',
            'password' => Hash::make('123456789'),
            'email' => 'edson@adm.com',
            'verificador' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Alana Admin',
            'password' => Hash::make('123456789'),
            'email' => 'alana@adm.com',
            'verificador' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Carlos Admin',
            'password' => Hash::make('123456789'),
            'email' => 'carlos@adm.com',
            'verificador' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Kaio Admin',
            'password' => Hash::make('123456789'),
            'email' => 'kaio@adm.com',
            'verificador' => '1'
        ]);
    }
}
