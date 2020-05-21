<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterOccupation extends Model
{
    protected $fillable = [
        "char_id", "occupation"
    ];
}
