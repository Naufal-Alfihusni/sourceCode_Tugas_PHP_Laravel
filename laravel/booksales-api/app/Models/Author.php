<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Pest\Concerns\Retrievable;

class Author extends Model
{
    private $authors = [
        [
            'name' => 'Isaac Asimov',
            'photo' => 'isaac_asimov.jpg',
            'bio' => 'American author and professor of biochemistry, known for his works in science fiction.'
        ],
        [
            'name' => 'J.K. Rowling',
            'photo' => 'jk_rowling.jpg',
            'bio' => 'British author, best known for the Harry Potter series.'
        ],
        [
            'name' => 'Tere Liye',
            'photo' => 'tere_liye.jpg',
            'bio' => 'Penulis Indonesia yang menghasilkan berbagai novel populer.'
        ],
        [
            'name' => 'Pramoedya Ananta Toer',
            'photo' => 'pramoedya.jpg',
            'bio' => 'Sastrawan Indonesia yang menulis Tetralogi Buru.'
        ],
        [
            'name' => 'Ahmad Fuadi',
            'photo' => 'ahmad_fuadi.jpg',
            'bio' => 'Penulis Indonesia yang dikenal melalui novel Negeri 5 Menara.'
        ]

    ];

    public function getAuthor()
    {
        return $this->authors;
    }
}
