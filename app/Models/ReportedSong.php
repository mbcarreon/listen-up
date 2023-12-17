<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedSong extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'album',
        'country',
        'genre',
        'duration',
        'cover',
        'song_link',
        'reported_at'
    ];
}
