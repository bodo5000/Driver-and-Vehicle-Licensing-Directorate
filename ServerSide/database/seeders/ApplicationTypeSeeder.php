<?php

namespace Database\Seeders;

use App\Models\ApplicationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'New International License',
                'fees' => 51.0,
            ],
            [
                'title' => 'New Local License',
                'fees' => 30.0,
            ],
            [
                'title' => 'Release Detained Driving',
                'fees' => 15.0,
            ],
            [
                'title' => 'Renew Driving License',
                'fees' => 7.0,
            ],
            [
                'title' => 'Replace For Damaged Driving License',
                'fees' => 5.0,
            ],
            [
                'title' => 'Replace For Lost Driving License',
                'fees' => 10.0,
            ],
            [
                'title' => 'Retake Test Service',
                'fees' => 5.0,
            ],

        ];

        foreach ($data as $item) {
            ApplicationType::create($item);
        }
    }
}
