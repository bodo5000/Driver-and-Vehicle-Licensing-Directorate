<?php

namespace Database\Seeders;

use App\Models\TestType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'VisionTest',
                'fees' => 10.0
            ],
            [
                'title' => 'WrittenTest',
                'fees' => 20.0
            ],
            [
                'title' => 'DriveTest',
                'fees' => 30.0
            ],
        ];

        foreach ($data as $item) {
            TestType::create($item);
        }
    }
}
