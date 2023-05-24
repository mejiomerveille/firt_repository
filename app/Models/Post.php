<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Comment;
use App\Models\User;
use App\Models\Like;
use App\Models\Commande;
use App\Models\Paiement;
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
