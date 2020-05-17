<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contry extends Model
{

    protected $fillable = [
        'name',
    ];

    public function states(){
        return $this->hasMany(State::class);
    }

    public function location(){
        return $this->hasOne(Location::class);
    }

    public function cities(){
        return $this->hasManyThrough(city::class, State::class); // Primeiro informamos a tabela da qual queremos ter o resultado, e o segundo model seria o que será utilizado como ligação, no caso o State
    }
    
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable'); //Função criada na Model Comment 'comme
    }
}
