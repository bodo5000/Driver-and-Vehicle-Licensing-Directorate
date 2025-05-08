<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'person_id' => Person::first()->id,
            'username' => 'user1',
            'password' => Hash::make('password'),
            'isActive' => true,
        ]);
    }
}
