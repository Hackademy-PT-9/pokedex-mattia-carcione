<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    //function per importare i dati nel database
    public function fetchAndStorePokemonData()
    {
        $client = new Client();
        $limit = 1008; //imposta il limite di dati da implementare nel database, max 1008

        $response = $client->get("https://pokeapi.co/api/v2/pokemon?limit={$limit}&offset=0");
        $pokemonList = json_decode($response->getBody(), true);

        foreach ($pokemonList['results'] as $pokemon) {
            $pokemonDataResponse = $client->get($pokemon['url']);
            $pokemonData = json_decode($pokemonDataResponse->getBody(), true);

            $pokedexResponse = $client->get("https://pokeapi.co/api/v2/pokemon-species/{$pokemonData['id']}");
            $pokedexData = json_decode($pokedexResponse->getBody(), true);
            $pokedexDescription = $pokedexData['flavor_text_entries'][0]['flavor_text'];

            Pokemon::create([
                'name' => $pokemonData['name'],
                'pokedex_number' => $pokemonData['id'],
                'pokedex_description' => $pokedexDescription,
                'stats' => json_encode($pokemonData['stats']),
                'type' => $pokemonData['types'][0]['type']['name'],
                'image_url' => $pokemonData['sprites']['front_default'],
            ]);
        }

        return 'Dati Pokémon archiviati nel database con successo.';
    }
}