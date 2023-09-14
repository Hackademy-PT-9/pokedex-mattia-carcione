<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    protected static $generations = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'];

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

    public function index($uri = '')
    {
        return $this->getGeneration($uri);
    }
    public function getGeneration($uri)
    {
        if ($uri == '' || $uri == 'I') {
            return $this->setGeneration(1, 151);
        } elseif ($uri == 'II') {
            return $this->setGeneration(152, 251, $uri);
        } elseif ($uri == 'III') {
            return $this->setGeneration(252, 386, $uri);
        } elseif ($uri == 'IV') {
            return $this->setGeneration(387, 493, $uri);
        } elseif ($uri == 'V') {
            return $this->setGeneration(494, 649, $uri);
        } elseif ($uri == 'VI') {
            return $this->setGeneration(650, 721, $uri);
        } elseif ($uri == 'VII') {
            return $this->setGeneration(722, 809, $uri);
        } elseif ($uri == 'VIII') {
            return $this->setGeneration(810, 905, $uri);
        } elseif ($uri == 'IX') {
            return $this->setGeneration(906, 1008, $uri);
        } else {
            abort(404);
        }
    }
    public function setGeneration($a, $b, $uri = 'I')
    {
        $pokemonData = Pokemon::whereBetween('id', [$a, $b])->get();
        return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData,]);
    }
    public function show($pokemonName)
    {
        return $this->pokemonExists($pokemonName);
    }

    public function setTypeColor($type)
    {
        return self::$colorType[$type];
    }

    public function getTypeColor($pokemonName)
    {
        $pokemon = Pokemon::all()->where('name', $pokemonName)->first();
        return $this->setTypeColor($pokemon->type);
    }

    public function pokemonExists ($pokemonName) {
        $pokemon = Pokemon::all()->where('name', $pokemonName)->first();

        if ($pokemon) {
            $color = $this->getTypeColor($pokemonName);
            return view('show', compact('pokemon', 'color'));
        } else 
            abort(404);
    }
}
