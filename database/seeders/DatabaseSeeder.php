<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'username' => 'test@62teknologi.com',
            'name' => 'test@62teknologi.com',
            'email' => 'test@62teknologi.com',
            'phone' => '123',
            'address' => 'Address',
            'bio' => 'Bio',
            'password' => Hash::make('Pass1234'),
        ]);

        Student::insert([
            'id' => 1,
            'name' => 'Rini',
            'gender' => 'F',
            'avatar' => 'img1.png',
            'dob' => '2001-01-01'
        ]);

        Student::insert([
            'id' => 2,
            'name' => 'Surya',
            'gender' => 'M',
            'avatar' => 'img2.png',
            'dob' => '2001-02-02'
        ]);
    }
}
