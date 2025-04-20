<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["name" => "Leonardo da Vinci"],
            ["name" => "Vincent van Gogh"],
            ["name" => "Pablo Picasso"],
            ["name" => "Michelangelo Buonarroti"],
            ["name" => "Claude Monet"],
        ];

        foreach($types as $type) {
            Artist::create($type);
        }
    }
}
