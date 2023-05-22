<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Comment;
use App\User;
use App\Like;
use App\Commande;
use App\Paiement;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function commandes(){
        return $this->hasMany(Commande::class);
    }
    public function paiements(){
        return $this->hasMany(Paiement::class);
    }
   
}
