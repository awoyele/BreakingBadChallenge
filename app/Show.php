<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = ["name"];
    
    public function characters(){
        return $this->belongsToMany(Character::class);
    }
}
