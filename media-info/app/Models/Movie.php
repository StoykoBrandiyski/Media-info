<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    
    protected $fillable = [
        'category_id',
        'user_added',
        'title',
        'director',
        'actors',
        'year',
        'country',
        'duration',
        'summary',
        'image',
        'trailer_link'
    ];

    public function category()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
