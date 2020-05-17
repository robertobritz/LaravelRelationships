<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name',
        'initials',
        'contry_id',
    ];

    public function contry()
    {
        return $this->belongsTo(Contry::class);
    }

    public function cities()
    {
        return $this->hasMany(city::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable'); //Função criada na Model Comment 'comme
    }

}
