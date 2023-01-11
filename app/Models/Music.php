<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
        'name',
        'path',
        'artist_id',
    ];
    use HasFactory;
}
