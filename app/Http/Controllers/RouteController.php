<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    protected static $generations = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'];
    public function index($uri = '')
    {
        if ($uri == '' || $uri == 'I') {
            $idMin = 2;
            $idMax = 152;
            $pokemonData = Pokemon::whereBetween('id', [$idMin, $idMax])->get();
            return view('index', ['uri' => 'I', 'generations' => self::$generations, 'pokemonData' => $pokemonData]);
        } elseif ($uri == 'II') {
            $idMin = 153;
            $idMax = 251;
            $pokemonData = Pokemon::whereBetween('id', [$idMin, $idMax])->get();
            return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData]);
        } elseif ($uri == 'III') {
            $idMin = 252;
            $idMax = 386;
            $pokemonData = Pokemon::whereBetween('id', [$idMin, $idMax])->get();
            return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData]);
        } elseif ($uri == 'IV') {
            $idMin = 387;
            $idMax = 493;
            $pokemonData = Pokemon::whereBetween('id', [$idMin, $idMax])->get();
            return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData]);
        } elseif ($uri == 'V') {
            $idMin = 494;
            $idMax = 649;
            $pokemonData = Pokemon::whereBetween('id', [$idMin, $idMax])->get();
            return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData]);
        } elseif ($uri == 'VI') {
            $idMin = 650;
            $idMax = 721;
            $pokemonData = Pokemon::whereBetween('id', [$idMin, $idMax])->get();
            return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData]);
        } elseif ($uri == 'VII') {
            $idMin = 722;
            $idMax = 809;
            $pokemonData = Pokemon::whereBetween('id', [$idMin, $idMax])->get();
            return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData]);
        } elseif ($uri == 'VIII') {
            $idMin = 810;
            $idMax = 905;
            $pokemonData = Pokemon::whereBetween('id', [$idMin, $idMax])->get();
            return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData]);
        } elseif ($uri == 'IX') {
            $idMin = 906;
            $idMax = 1008;
            $pokemonData = Pokemon::whereBetween('id', [$idMin, $idMax])->get();
            return view('index', ['uri' => $uri, 'generations' => self::$generations, 'pokemonData' => $pokemonData]);
        }
    }

    public function show(Pokemon $pokemon){
        return view('show', compact('pokemon'));
    }
}
