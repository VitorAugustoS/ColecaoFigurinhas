<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;

class ClubeController extends Controller
{
    
    public function index()
    {
        $clube = new Clube();
        $clubes = Clube::All();
        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
        ]);
    }

    
    public function store(Request $request)
    {
        $clube->nome = $request->get("nome");
        $clube->escudo = $request->get("escudo");
        $clube->save();

        return redirect("/clube");
    }

    
    public function edit($id)
    {
        $clube = Clube::Find($id);
        $clubes = Clube::All();

        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
        ]);
    }

    
    public function destroy($id)
    {
        Clube::Destroy($id);
    }
}
