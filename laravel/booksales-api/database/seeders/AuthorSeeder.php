<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create(
            [
                'name' => 'Isaac Asimov',
                'photo' => 'isaac_asimov.jpg',
                'bio' => 'American author and professor of biochemistry, known for his works in science fiction.'
            ]
        );
        Author::create(
            [
                'name' => 'J.K. Rowling',
                'photo' => 'jk_rowling.jpg',
                'bio' => 'British author, best known for the Harry Potter series.'
            ],
        );
        Author::create(
            [
                'name' => 'Tere Liye',
                'photo' => 'tere_liye.jpg',
                'bio' => 'Penulis Indonesia yang menghasilkan berbagai novel populer.'
            ],

        );
        Author::create(
            [
                'name' => 'Pramoedya Ananta Toer',
                'photo' => 'pramoedya.jpg',
                'bio' => 'Sastrawan Indonesia yang menulis Tetralogi Buru.'
            ],

        );
        Author::create(
            [
                'name' => 'Ahmad Fuadi',
                'photo' => 'ahmad_fuadi.jpg',
                'bio' => 'Penulis Indonesia yang dikenal melalui novel Negeri 5 Menara.'
            ]
        );
    }
}
