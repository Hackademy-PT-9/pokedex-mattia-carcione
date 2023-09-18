<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    protected static $generations = [
        'I' => 1,
        'II' => 2,
        'III' => 3,
        'IV' => 4,
        'V' => 5,
        'VI' => 6,
        'VII' => 7,
        'VIII' => 8,
        'IX' => 9,
    ];
    protected static $colorType = [
        'normal' => '#A8A77A',
        'fire' => '#EE8130',
        'water' => '#6390F0',
        'electric' => '#F7D02C',
        'grass' => '#7AC74C',
        'ice' => '#96D9D6',
        'fighting' => '#C22E28',
        'poison' => '#A33EA1',
        'ground' => '#E2BF65',
        'flying' => '#A98FF3',
        'psychic' => '#F95587',
        'bug' => '#A6B91A',
        'rock' => '#B6A136',
        'ghost' => '#735797',
        'dragon' => '#6F35FC',
        'dark' => '#705746',
        'steel' => '#B7B7CE',
        'fairy' => '#D685AD',
    ];

    //index's methods
    public function index($uri = '')
    {
        return $this->getGeneration($uri);
    }
    public function getGeneration($uri)
    {
        if ($uri === '') {
            $uri = "gen=1";
        }
        $pokemonGeneration = Generation::where('id', preg_replace("/[^0-9]/", "", $uri))->firstOrFail();
        $pokemonData = $pokemonGeneration->pokemon;
        return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData,]);
    }

    //show's methods
    public function show($pokemonName)
    {
        return $this->getColorAndPokemon($pokemonName);
    }
    public function getColorAndPokemon($pokemonName)
    {
        $pokemon = Pokemon::all()->where('name', $pokemonName)->first();

        if ($pokemon) {
            $color = $this->setColor($pokemonName);
            return view('show', compact('pokemon', 'color'));
        } else
            abort(404);
    }
    public function setColor($pokemonName)
    {
        $pokemon = Pokemon::all()->where('name', $pokemonName)->first();
        return self::$colorType[$pokemon->type_1];
    }
}