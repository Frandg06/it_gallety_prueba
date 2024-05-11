<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["name" => "Reserved"],
            ["name" => "Sold"],
            ["name" => "Available"],
        ];

        foreach($types as $type) {
            Status::create($type);
        }
    }
}
