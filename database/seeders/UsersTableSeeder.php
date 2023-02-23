<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hector',
            'email' => 'hector@gmail.com',
            'email_verified_at' => now(),
            'address' => 'Calle 71 villamagna II',
            'phone' => '9999922577',
            'cedula'=>'12345678',
            'role' => 'admin',
            'password' => bcrypt('123456789'), // password
        ]);


        User::create([
            'name' => 'yayo',
            'email' => 'yayo@gmail.com',
            'email_verified_at' => now(),
            'address' => 'Calle 71 villamagna II',
            'phone' => '9999922577',
            'cedula'=>'12345678',
            'role' => 'patient',
            'password' => bcrypt('123456789'), // password
        ]);

        
        User::create([
            'name' => 'joely',
            'email' => 'joely@gmail.com',
            'email_verified_at' => now(),
            'address' => 'Calle 71 villamagna II',
            'phone' => '9999922577',
            'cedula'=>'12345678',
            'role' => 'doctor',
            'password' => bcrypt('123456789'), // password
        ]);


//$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
        User::factory(50)->create();
    }



}

