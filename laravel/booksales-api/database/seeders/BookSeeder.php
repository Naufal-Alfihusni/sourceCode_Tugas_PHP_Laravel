<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create(
            [
                'title' => 'pulang',
                'description' => 'petualangan seorang pemuda yang kembali ke desa kelahirannya.',
                'price' => 40000,
                'stock' => 15,
                'cover_photo' => 'pulang.jpg',
                'genre_id' => 1,
                'author_id' => 1
            ]
        );
        Book::create(
            [
                'title' => 'sebuah seni untuk bersikap bodo amat',
                'description' => 'Buku yang membahas tentang kehidupan dan filosofi hidup seseorang. ',
                'price' => 25000,
                'stock' => 5,
                'cover_photo' => 'sebuah_seni.jpg',
                'genre_id' => 2,
                'author_id' => 2
            ]
        );
        Book::create(
            [
                'title' => 'Naruto',
                'description' => 'Buku yang membahas tentang jalan ninja seseorang. ',
                'price' => 30000,
                'stock' => 50,
                'cover_photo' => 'sebuah_seni.jpg',
                'genre_id' => 2,
                'author_id' => 4
            ]
        );
        Book::create(
            [
                'title' => 'Laskar Pelangi',
                'description' => 'Novel tentang perjuangan anak-anak dalam meraih pendidikan.',
                'price' => 90000,
                'stock' => 22,
                'cover_photo' => 'laskar_pelangi.jpg',
                'genre_id' => 2,
                'author_id' => 4
            ],
        );
        Book::create(
            [
                'title' => 'Negeri 5 Menara',
                'description' => 'Novel tentang pendidikan, persahabatan, dan cita-cita.',
                'price' => 88000,
                'stock' => 18,
                'cover_photo' => 'negeri_5_menara.jpg',
                'genre_id' => 3,
                'author_id' => 1
            ],
        );
    }
}
