<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'imdb_rate',
        'release_date',
        'image'
    ];
}
