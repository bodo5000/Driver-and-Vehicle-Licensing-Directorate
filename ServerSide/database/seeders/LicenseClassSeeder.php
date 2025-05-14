<?php

namespace Database\Seeders;

use App\Models\LicenseClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LicenseClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Small Motorcycle',
                'description' => 'this class for small motorcycle',
                'min_allowed_age' => 18,
                'default_validity_length' => 3,
                'fees' => 20.0
            ],
            [
                'name' => 'Heavy Motorcycle',
                'description' => 'this class for small Heavy Motorcycle like race,benili',
                'min_allowed_age' => 21,
                'default_validity_length' => 5,
                'fees' => 40.0
            ],
            [
                'name' => 'Ordinary Driving License',
                'description' => 'this class for traditional cars',
                'min_allowed_age' => 21,
                'default_validity_length' => 5,
                'fees' => 15.0
            ],
            [
                'name' => 'Commercial',
                'description' => 'this class for Commercial work',
                'min_allowed_age' => 30,
                'default_validity_length' => 2,
                'fees' => 50.0
            ],
            [
                'name' => 'Agricultural',
                'description' => 'this class for small Agricultural',
                'min_allowed_age' => 30,
                'default_validity_length' => 3,
                'fees' => 55.00
            ],
            [
                'name' => 'Small and Medium bus',
                'description' => 'this class for transportation for bus',
                'min_allowed_age' => 25,
                'default_validity_length' => 5,
                'fees' => 22.0
            ],
            [
                'name' => 'Trunk and Heavy Vehicle',
                'description' => 'this class Transporting goods',
                'min_allowed_age' => 35,
                'default_validity_length' => 2,
                'fees' => 35.0
            ],
        ];

        foreach ($data as $item) {
            LicenseClass::create($item);
        }
    }
}
