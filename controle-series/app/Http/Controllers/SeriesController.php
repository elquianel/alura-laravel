<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(){

        //o db não é uma boa utilização, pois acessa diretamente o banco de dados
        // $teste = DB::select('SELECT * from usuario where id_usuario = 404242');
        // dd($teste);

        //maneira correta de se faazer, utilizando o ORM do laravel, o elouquent
        $series = Serie::all();

            // o 'series' => nada mais é que o nome que vc irá manusear lá na view
            // return view('index', ['series' => $series]);

            //outra maneira de mandar nomeado o nome do array que será utilizado na view
            // return view('index', compact('series'));

            //outra maneira e até mais expressiva de se retornar uma view e passar dados para a mesma
            return view('series.index')->with('series', $series);
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){
        // $nomeSerie = $request->input('nome');

        //o db não é uma boa utilização, pois acessa diretamente o banco de dados
        // DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);

        // $serie = new Serie();

        // $serie->nome = $nomeSerie;
        // $serie->save();

        // Serie::create($request->only(['nome', 'teste']));
        // Serie::create($request->except(['_token']));
        Serie::create($request->all());

        //só funciona no laravel 9
        return to_route('series.index');
        // return redirect()->route('series.index');
    }
}
