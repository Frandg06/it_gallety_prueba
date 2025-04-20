<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ArtistSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(GalleryItemSeeder::class);
    }
}
