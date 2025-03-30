<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::create([
            'title' => 'The Witcher 3: Wild Hunt',
            'developer' => 'CD Projekt Red',
            'genre' => 'RPG',
            'release_date' => '2015-05-19',
            'platform' => 'PC',
            'price' => 49.99,
            'cover_image' => '/covers/coverswitcher3.jpg',
        ]);

        Game::create([
            'title' => 'Minecraft',
            'developer' => 'Mojang Studios',
            'genre' => 'Sandbox',
            'release_date' => '2011-11-18',
            'platform' => 'Xbox',
            'price' => 26.95,
            'cover_image' => '/covers/coversminecraft.jpg',
        ]);

        Game::create([
            'title' => 'Elden Ring',
            'developer' => 'FromSoftware',
            'genre' => 'RPG',
            'release_date' => '2022-02-25',
            'platform' => 'PC',
            'price' => 59.99,
            'cover_image' => '/covers/coverseldenring.jpg',
        ]);

        Game::create([
            'title' => 'Grand Theft Auto V',
            'developer' => 'Rockstar Games',
            'genre' => 'Action',
            'release_date' => '2013-09-17',
            'platform' => 'PC, Xbox One',
            'price' => 29.99,
            'cover_image' => '/covers/coversgta5.jpg',
        ]);

        Game::create([
            'title' => 'The Legend of Zelda: Breath of the Wild',
            'developer' => 'Nintendo',
            'genre' => 'Adventure',
            'release_date' => '2017-03-03',
            'platform' => 'Switch, Wii U',
            'price' => 59.99,
            'cover_image' => '/covers/coverszelda_botw.jpg',
        ]);

        Game::create([
            'title' => 'DOOM Eternal',
            'developer' => 'id Software',
            'genre' => 'RPG',
            'release_date' => '2020-03-20',
            'platform' => 'PC',
            'price' => 39.99,
            'cover_image' => '/covers/coversdoom_eternal.jpg',
        ]);

    }
}