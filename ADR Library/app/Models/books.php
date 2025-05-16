<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'title',
        'summary',
        'image',
        'stok',
        'genre_id'
    ];

    public function genre()
    {
        return $this->belongsTo(genre::class, 'genre_id');
    }

    public function comments()
    {
        return $this->hasMany(comment::class, 'books_id');
    }

}

