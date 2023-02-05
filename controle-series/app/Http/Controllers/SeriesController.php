<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(){
        {
            $series = [
                'Dark',
                'Lost',
                'Round 6'
            ];

            // o 'series' => nada mais é que o nome que vc irá manusear lá na view
            // return view('index', ['series' => $series]);

            //outra maneira de mandar nomeado o nome do array que será utilizado na view
            // return view('index', compact('series'));

            //outra maneira e até mais expressiva de se retornar uma view e passar dados para a mesma
            return view('series.index')->with('series', $series);
        }
    }

    public function create(){
        return view('series.create');
    }
}
