<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function getCharacterList(){
        return response(Character::all());
    }

    public function getProfile(Character $character){
        return view("profile", [
            "character"=> $character->load(["occupation","shows","appearance"])
        ]);
    }
}
