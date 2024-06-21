<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request){

        //o db não é uma boa utilização, pois acessa diretamente o banco de dados
        // $teste = DB::select('SELECT * from usuario where id_usuario = 404242');
        // dd($teste);

        //maneira correta de se faazer, utilizando o ORM do laravel, o elouquent
        $series = Serie::all();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        // $request->session()->forget('mensagem.sucesso');

            // o 'series' => nada mais é que o nome que vc irá manusear lá na view
            // return view('index', ['series' => $series]);

            //outra maneira de mandar nomeado o nome do array que será utilizado na view
            // return view('index', compact('series'));

            //outra maneira e até mais expressiva de se retornar uma view e passar dados para a mesma
            return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request){
        // $nomeSerie = $request->input('nome');

        //outra maneira de disparar alertas, mas n usa o flash
        // session(['mensagem.sucesso' => 'Série adicionada com sucesso']);

        //o db não é uma boa utilização, pois acessa diretamente o banco de dados
        // DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);

        // $serie = new Serie();

        // $serie->nome = $nomeSerie;
        // $serie->save();

        // Serie::create($request->only(['nome', 'teste']));
        // Serie::create($request->except(['_token']));
        // o metodo create retorna pra gente o valor da model $serie, logo, podemos utilizar esses dados já logo apos a inserção
        $serie = Serie::create($request->all());
        //o metodo flash já faz o metodo forget automaticamente, pois só dura uma requisição
        $request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");

        //só funciona no laravel 9
        return to_route('series.index');
        // return redirect()->route('series.index');
    }

    public function destroy(Serie $series){
        // dd($request->series);
        // $serie = Serie::find($request->series);
        $series->delete();
        // Serie::destroy($request->series);


        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Serie $series){
        return view('series.edit')->with('serie', $series);
    }
}
