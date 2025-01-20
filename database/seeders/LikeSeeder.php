<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    public function run()
    {
        // Liked Movies Admin
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 11,
            'type' => 'movie',
            'title' => 'Star Wars',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1891,
            'type' => 'movie',
            'title' => 'The Empire Strikes Back',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1892,
            'type' => 'movie',
            'title' => 'Return of the Jedi',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1893,
            'type' => 'movie',
            'title' => 'Star Wars Episode I',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1894,
            'type' => 'movie',
            'title' => 'Star Wars Episode II',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1895,
            'type' => 'movie',
            'title' => 'Star Wars Episode III',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 140607,
            'type' => 'movie',
            'title' => 'Star Wars Episode VII',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 181808,
            'type' => 'movie',
            'title' => 'Star Wars Episode VIII',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 181812,
            'type' => 'movie',
            'title' => 'Star Wars Episode IX',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 330459,
            'type' => 'movie',
            'title' => 'Rogue One'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1045770,
            'type' => 'movie',
            'title' => 'Daaaaali',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1110358,
            'type' => 'movie',
            'title' => 'Yannick'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 872709,
            'type' => 'movie',
            'title' => 'Fumer fait tousser'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 15097,
            'type' => 'movie',
            'title' => 'La cité de la peur'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 16320,
            'type' => 'movie',
            'title' => 'Serenity'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 21778,
            'type' => 'movie',
            'title' => 'RRRrrrr'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 587792,
            'type' => 'movie',
            'title' => 'Palm Springs'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 50848,
            'type' => 'movie',
            'title' => 'Le nom des gens'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 401,
            'type' => 'movie',
            'title' => 'Garden State'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 2907,
            'type' => 'movie',
            'Title' => 'Addams Family'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 2758,
            'type' => 'movie',
            'title' => 'Addams Family Values'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1125138,
            'type' => 'movie',
            'title' => 'Aymeric Lompret',
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 383809,
            'type' => 'movie',
            'title' => 'Merci Patron',
        ]);


        // Liked TV Admin
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 202879,
            'type' => 'tv',
            'title' => 'Star Wars Skeleton Crew'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 4194,
            'type' => 'tv',
            'title' => 'Star Wars The Clone Wars'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 83867,
            'type' => 'tv',
            'title' => 'Star Wars Andor'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 105971,
            'type' => 'tv',
            'title' => 'Star Wars The Bad Batch'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 60554,
            'type' => 'tv',
            'title' => 'Star Wars Rebels'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 114461,
            'type' => 'tv',
            'title' => 'Ahsoka'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 82856,
            'type' => 'tv',
            'title' => 'The Mandalorian'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 115036,
            'type' => 'tv',
            'title' => 'The Book of Boba Fett'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 114479,
            'type' => 'tv',
            'title' => 'The Acolyte'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 92830,
            'type' => 'tv',
            'title' => 'Obi-Wan Kenobi'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 97727,
            'type' => 'tv',
            'title' => 'Inside Job'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1404,
            'type' => 'tv',
            'title' => 'Chuck'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 62017,
            'type' => 'tv',
            'title' => 'The Man in the High Castle'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1274,
            'type' => 'tv',
            'title' => 'Six Feet Under'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 42009,
            'type' => 'tv',
            'title' => 'Black Mirror'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 94626,
            'type' => 'tv',
            'title' => 'La Flamme'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 2490,
            'type' => 'tv',
            'title' => 'The IT Crowd'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 4271,
            'type' => 'tv',
            'title' => 'Farscape'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 224784,
            'type' => 'tv',
            'title' => 'Farscape The Peacekeeper Wars'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 1437,
            'type' => 'tv',
            'title' => 'Firefly'
        ]);
        Like::create([
            'user_id' => 1,
            'tmdb_id' => 48891,
            'type' => 'tv',
            'title' => 'Brooklyn Nine-Nine'
        ]);
    }
}
