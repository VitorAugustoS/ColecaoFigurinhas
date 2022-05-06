<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;
use App\Models\Posicao;
use App\Models\Jogador;
use Illuminate\Support\Facades\DB;

class JogadorController extends Controller
{
    
    public function listaJogadores(){
        return DB::table("jogador AS j")
                    ->join("clube AS c", "j.clube_id", "=", "c.id")
                    ->join("posicao AS p", "j.clube_id", "=", "p.id")
                    ->select("j.*", "c.nome AS nome_clube", "p.nome AS nome_posicao")
                    ->get();
    }

    public function index()
    {
        $jogador = new Jogador();
        $jogadors = $this->listaJogadores();
        $clubes = Clube::All();
        $posicaos = Posicao::All();

        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadors" => $jogadors,
            "clubes" => $clubes,
            "posicaos" => $posicaos
        ]);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            "nome" => "required|max:100",
            "dataNascimento" => "required",
            "clube_id" => "required",
            "posicao_id" => "required"
        ], [
            "nome.required" => "O campo é obrigatório.",
            "nome.max" => "O campo aceita no máximo :max caracteres.",
            "dataNascimento" => "O campo é obrigatório.",
            "clube_id" => "O campo é obrigatório.",
            "posicao_id" => "O campo é obrigatório."
        ]);

        if ($request->get("id") != ""){
			$jogador = Jogador::Find($request->get("id"));
		} else {
			$jogador = new Jogador();
		}
        $jogador->nome = $request->get("nome");
        $jogador->dataNascimento = $request->get("dataNascimento");
        $jogador->clube_id = $request->get("clube_id");
        $jogador->posicao_id = $request->get("posicao_id");
        $jogador->save();

        return redirect("/jogador");
    }

    
    public function edit($id)
    {
        $jogador = Jogador::Find($id);
        $jogadors = $this->listaJogadores();
        $clubes = Clube::All();
        $posicaos = Posicao::All();

        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadors" => $jogadors,
            "clubes" => $clubes,
            "posicaos" => $posicaos
        ]);
    }

    
    public function destroy($id)
    {
        Jogador::Destroy($id);
        return redirect("/jogador");
    }
}
