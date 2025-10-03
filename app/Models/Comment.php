<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['content','user_id','book_id	'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
