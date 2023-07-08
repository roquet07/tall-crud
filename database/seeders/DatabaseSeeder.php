<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::delete('blogs'); //Elimina cada vez que ejecutemos el seed
        Storage::makeDirectory('blogs'); //Crea el directorio


      
        $this->call(BlogSeeder::class);
        $this->call(UserSeeder::class);

        
    }
}
