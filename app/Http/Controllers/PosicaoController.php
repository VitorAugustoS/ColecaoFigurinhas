<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posicao;

class PosicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posicao = new Posicao();
        $posicaos = Posicao::All();

        return view("posicao.index", [
            "posicao" => $posicao,
            "posicaos" => $posicaos
        ]);
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            "nome" => "required|max:100"
        ], [
            "nome.required" => "O campo é obrigatório.",
            "nome.max" =>"O campo aceita no máximo :max caracteres."
        ]);

        if ($request->get("id") != ""){
			$posicao = Posicao::Find($request->get("id"));
		} else {
			$posicao = new Posicao();
		}
        $posicao->nome = $request->get("nome");
        $posicao->save();

        return redirect("/posicao");
    }

    
    public function edit($id)
    {
        $posicao = Posicao::Find($id);
        $posicaos = Posicao::All();

        return view("posicao.index", [
            "posicao" => $posicao,
            "posicaos" => $posicaos
        ]);
    }

    
    public function destroy($id)
    {
        Posicao::Destroy($id);
        return redirect("/posicao");
    }
}
