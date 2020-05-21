<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function getHome(Request $request){
            $show = $request->show ?? 1;
            $characters = Character::whereHas("shows", function($query)use($show){
                $query->where("show_id", $show);
            })->get();
        return view('welcome',[
            "characters"=>$characters,
            "seasons"=> (new Character)->seasons[$show]
        ]);
    }
    
    public function getCharacterList(Request $request){
        $show = $request->show ?? 1;
        $characters = Character::whereHas("shows", function($query)use($show){
            $query->where("show_id", $show);
        });
        if($request->season){
            $characters->whereHas("appearance",function($query)use($show, $request){
                $query->where("show_id",$show)->where("appearance",$request->season ?? "*");
            });
        }
        return response(["characters"=>$characters->get(), "seasons"=> (new Character)->seasons[$show]]);
    }
    
    public function search(Request $request){
        $show = $request->show ?? 1;
        $characters = Character::whereHas("shows", function($query)use($show){
            $query->where("show_id", $show);
        });
        $characters->where("name","like","%$request->search%");
        return response(["characters"=>$characters->get(), "seasons"=> (new Character)->seasons[$show]]);
    }

    public function getProfile(Character $character){
        return view("profile", [
            "character"=> $character->load(["occupation","shows","appearance"])
        ]);
    }
}
