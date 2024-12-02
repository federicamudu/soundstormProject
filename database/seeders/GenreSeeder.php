<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres=[
            'Pop',
            'Rock',
            'Metal',
            'Jazz',
            'Blues',
            'Reggae',
            'Country',
            'Folk',
            'Classical',
            'Dance',
            'Hip Hop',
            'Rap',
            'Soul',
            'Funk',
            'Punk',
            'Grunge',
            'Indie',
            'Alternative',
            'Electronic',
            'House',
            'Trance',
            'Techno',
            'Dubstep'
        ];

        foreach($genres as $genre){
            Genre::create([
                'name'=>$genre
            ]);
        }
    }
}
