<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    public function fetchAndStorePokemonData()
    {
        $client = new Client();

        // Esegui la richiesta per ottenere la lista dei Pokémon
        $response = $client->get("https://pokeapi.co/api/v2/pokemon?limit=1008&offset=0");
        $pokemonList = json_decode($response->getBody(), true);

        foreach ($pokemonList['results'] as $pokemon) {
            // Esegui una richiesta per ottenere i dati del singolo Pokémon
            $pokemonDataResponse = $client->get($pokemon['url']);
            $pokemonData = json_decode($pokemonDataResponse->getBody(), true);

            // Esegui una richiesta per ottenere la descrizione del Pokédex
            $pokedexResponse = $client->get("https://pokeapi.co/api/v2/pokemon-species/{$pokemonData['id']}");
            $pokedexData = json_decode($pokedexResponse->getBody(), true);
            $pokedexDescription = $pokedexData['flavor_text_entries'][0]['flavor_text'];

            // Archivia i dati nel database
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