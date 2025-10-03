<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //
    protected $table = 'books';

    protected $fillable = ['title','summary','image','stok','genre_id'];

    public function Genres()
    {
        return $this->belongsTo(Genres::class, 'genre_id');
    }
    
    public function comments(){
        return $this -> hasMany(Comment::class, 'book_id');
    }
}
