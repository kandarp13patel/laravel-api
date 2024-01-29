<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;



class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();
        $user = User::where('email', 'nick.reynolds@domain.co')->first();

        $albums = [
            [
                "title" => "Nandhaka Pieris",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "img" => "img/landscape1.jpeg",
                "date" => "2015-05-01",
                "featured" => true
            ],
            [
                "title" => "New West Calgary",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "img" => "img/landscape2.jpeg",
                "date" => "2016-05-01",
                "featured" => false
            ],
            [
                "title" => "Australian Landscape",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "img" => "img/landscape3.jpeg",
                "date" => "2015-02-02",
                "featured" => false
            ],
            [
                "title" => "Halvergate Marsh",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "img" => "img/landscape4.jpeg",
                "date" => "2014-04-01",
                "featured" => true
            ],
            [
                "title" => "Rikkis Landscape",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "img" => "img/landscape5.jpeg",
                "date" => "2010-09-01",
                "featured" => false
            ],
            [
                "title" => "Kiddi Kristjans Iceland",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "img" => "img/landscape6.jpeg",
                "date" => "2015-07-21",
                "featured" => true
            ]
        ];

        foreach ($albums as $post) {
            Post::create($post);
        }
    }
}
