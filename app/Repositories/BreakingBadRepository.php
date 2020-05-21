<?php

namespace App\Repositories;
use App\Character;
use App\Show;
use Illuminate\Support\Facades\Http;


class BreakingBadRepository
{
    protected $baseUrl = "https://www.breakingbadapi.com/api/";
    
    function getCharacters():string {
        $response = Http::get($this->baseUrl."characters");
        $body = $response->body();
        $characters = json_decode($body);
        $shows = ["Breaking Bad", "Better Call Saul"];
        foreach ($shows as $show){
            Show::firstOrCreate(["name"=>$show]);
        }
        foreach ($characters as $character){
            $newCharacter = Character::firstOrNew(["char_id"=> $character->char_id]);
            $newCharacter->fill((array)$character);
            $newCharacter->save();
            foreach($character->occupation as $occupation){
                $newCharacter->occupation()->firstOrCreate(["occupation"=>$occupation]);
            }
            $this->getCharacterShows($newCharacter, $character->category);
            foreach($character->appearance as $appearance){
                $newCharacter->appearance()->firstOrCreate(["show_id"=>1,"appearance"=>$appearance]);
            }
            foreach($character->better_call_saul_appearance as $BSappearance){
                $newCharacter->appearance()->firstOrCreate(["show_id"=>2,"appearance"=>$BSappearance]);
            }
        }
        return "complete";
    }
    
    function getCharacterShows(Character $character, string $category):string{
        switch($category){
            case "Breaking Bad, Better Call Saul":
                $show =[1,2];
                break;
            case "Breaking Bad":
                $show =[1];
                break;
            case "Better Call Saul":
                $show =[2];
                break;
        }
        $character->shows()->sync($show);
        return "Done";
    }
    
    
    
}