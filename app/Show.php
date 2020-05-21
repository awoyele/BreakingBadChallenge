<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = ["name"];
    
    public function characters(){
        return $this->belongsToMany(Character::class, "character_shows","show_id","char_id");
    }
}
