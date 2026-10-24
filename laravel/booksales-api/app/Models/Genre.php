<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'name' => 'Fiction',
            'description' => 'A literary work based on the imagination and not necessarily on fact.',
        ],
        [
            'name' => 'Non-Fiction',
            'description' => 'A literary work based on facts and real events.',
        ],
        [
            'name' => 'Fantasy',
            'description' => 'Cerita dengan unsur imajinatif, sihir, atau dunia rekaan.',
        ],
        [
            'name' => 'Romance',
            'description' => 'Cerita yang berfokus pada hubungan dan kisah cinta.',
        ],
        [
            'name' => 'Adventure',
            'description' => 'Cerita yang menampilkan perjalanan, tantangan, dan petualangan.',
        ],
    ];

    public function getGenres()
    {
        return $this->genres;
    }
}
