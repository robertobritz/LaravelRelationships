<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'latitude',
        'longetude',
        'contry_id',
    ];
    public function contry()
    {
        return $this->belongsTo(Contry::class);
    }
    
}
