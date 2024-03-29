<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name'=>'Ariel',
            'last_name'=>'Jara',
            'role'=>'admin',
            'rut'=>'18281979-4',
            'email'=>'ariel@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
    }
}
