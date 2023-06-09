<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    public function post(){
        return $this->belongsTo(Post::class);
    }
}