<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable =[
        "char_id", "name","img", "status", "nickname"
    ];
    
    public  function occupation(){
        return $this->hasMany(CharacterOccupation::class,"char_id","char_id");
    }
    
    public function shows(){
        return $this->belongsToMany(Show::class,"character_shows", "char_id",
            "show_id", "char_id", "id");
    }
    
    public  function appearance(){
        return $this->hasMany(CharacterAppearance::class,"char_id","char_id");
    }
}
