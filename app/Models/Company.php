<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function cities(){
        return $this->belongsToMany(city::class, 'company_city');
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable'); //Função criada na Model Comment 'comme
    }
}
