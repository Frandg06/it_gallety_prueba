<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                "title"=> "La Gioconda (Monna Lisa)",
                "serie_name" => "Renacimiento italiano",
                "year" => 1503,
                "inventory_id" => "ITG18188",
                "img_url" => "/image/monalisa.jpg",
                "artist_id" => 1,
                "status_id" => 1,
                "language_id" => 1,
            ],
            [
                "title"=> "Guernica",
                "serie_name" => "Pintura",
                "year" => 1973,
                "inventory_id" => "ITG18189",
                "img_url" => "/image/guernica.jpg",
                "artist_id" => 3,
                "status_id" => 2,
                "language_id" => 1,
            ],
            [
                "title"=> "The Starry Night",
                "serie_name" => "Interventions",
                "year" => 2020,
                "inventory_id" => "ITG18190",
                "img_url" => "/image/noche.webp",
                "artist_id" => 2,
                "status_id" => 3,
                "language_id" => 1,
            ],
        ];

        foreach($types as $type) {
            GalleryItem::create($type);
        }
    }
}
