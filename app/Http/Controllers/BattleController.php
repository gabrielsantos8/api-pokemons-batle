<?php

namespace App\Http\Controllers;

use App\Http\Services\PokemonService;
use Illuminate\Http\Request;

class BattleController extends Controller
{
    public function battle($pk1, $pk2)
    {
        $service = new PokemonService("https://pokeapi.co/api/v2/pokemon/");
        $pokemon1 = $service->getPokemon($pk1);


        $pokemon2 = $service->getPokemon($pk2);


        if (empty($pokemon1)) {
            return "{$pk1} não encontrado!";
        } 
        
        if (empty($pokemon2)) {
            return "{$pk2} não encontrado!";
        }

        $forcaPokemon1 = $pokemon1['stats'][0]['base_stat'];
        $forcaPokemon2 = $pokemon2['stats'][0]['base_stat'];

        if($forcaPokemon1 != $forcaPokemon2) {
            return $forcaPokemon1 > $forcaPokemon2 ? $pk1 : $pk2 . " venceu a batalha! {$pk1}: {$forcaPokemon1} VS {$pk2}: {$forcaPokemon2} de força!";
        }
        return "Empate! {$pk1}: $forcaPokemon1 VS {$pk2}: $forcaPokemon2.";
    }
}
