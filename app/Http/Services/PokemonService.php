<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class PokemonService
{
    protected string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function getPokemon(string $pokemon)
    {
        $response = Http::get($this->url . $pokemon);
        return json_decode($response, true);
    }
}
