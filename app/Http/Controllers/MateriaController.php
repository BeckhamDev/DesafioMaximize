<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Materia/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'titulo' => 'required|string|max:255',
                'user_id' => 'required',
                'texto_completo' => 'required',
                'descricao' => 'required|string|max:255',
                'imagem' => 'required|image',
            ],
            [
                'required' => 'O campo :attribute é obrigatório!',
                'max' => 'Limite de caracteres excedido!',
                'imagem' => 'O arquivo inserido não é uma imagem!'
            ]
        );

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem')->store('img');
            Materia::create([
                'titulo' => $request->titulo,
                'user_id' => $request->user_id,
                'texto_completo' => $request->texto_completo,
                'descricao' => $request->descricao,
                'imagem' => $imagem,
            ]);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        $imagem = $materia->imagem;
        $request->validate([
            'titulo' => 'required|string|max:255',
            'user_id' => 'required',
            'texto_completo' => 'required',
            'descricao' => 'required|string|max:255',
            'imagem' => 'required|image',
        ]);
        if($request->hasFile('imagem')) {
            Storage::delete($materia->imagem);
            $imagem = $request->file('imagem')->store('img');
        }

        Materia::create([
            'titulo' => $request->titulo,
            'user_id' => $request->user_id,
            'texto_completo' => $request->texto_completo,
            'descricao' => $request->descricao,
            'imagem' => $imagem,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        Storage::delete($materia->imagem);
        $materia->delete();
    }
}
