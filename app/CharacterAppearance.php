<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterAppearance extends Model
{
    protected $fillable = [
        "char_id", "show_id","appearance"
    ];
}
