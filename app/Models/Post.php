<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'user_id',
        'imagen'
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class, 'post_id', 'id')->OrderBy('id', 'DESC'); ;
    }
    public function likes(){
        return $this->hasMany(Like::class, 'post_id', 'id');
    }

    public function checkLike($user){
        return $this->likes->contains('user_id', $user->id);
    }
}
