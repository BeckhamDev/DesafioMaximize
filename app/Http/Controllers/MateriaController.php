<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MateriaResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Dashboard');
    }

    /**
     * Display a listing all 'Materias' with pagination
     */
    public function GetMaterias()
    {
        $materias = Materia::with('user')->orderBy('materias.id', 'DESC')->paginate(10);
        return $materias;
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Materia/Create');
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
            ],
            [
                'required' => 'O campo :attribute é obrigatório!',
                'max' => 'Limite de caracteres excedido!',
            ]
        );

        $imagem = $request->imagem;
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem')->store('img');
        };

        Materia::create([
            'titulo' => $request->titulo,
            'user_id' => $request->user_id,
            'texto_completo' => $request->texto_completo,
            'descricao' => $request->descricao,
            'imagem' => $imagem,
        ]);

        return Redirect::route('materia.index')->with('message', 'Matéria cadastrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $materia = MateriaResource::collection(Materia::where('id', '=', $id)->get());
        return Inertia::render('Materia/Edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $materia = Materia::find($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'user_id' => 'required',
            'texto_completo' => 'required',
            'descricao' => 'required|string|max:255',
        ]);


        $imagem = $materia->imagem;
        if ($request->hasFile('imagem')) {
            Storage::delete($imagem);
            $imagem = $request->file('imagem')->store('img');
        }

        $materia->update([
            'titulo' => $request->titulo,
            'user_id' => $request->user_id,
            'texto_completo' => $request->texto_completo,
            'descricao' => $request->descricao,
            'imagem' => $imagem,
        ]);

        return Redirect::route('materia.index')->with('message', 'Matéria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $materia = Materia::find($id);
        if($materia->imagem){
            Storage::delete($materia->imagem);
        }

        $materia->delete();
        return Redirect::route('materia.index');
    }

    /**
     * Show the information about the specified resource
     */
    public function exibeMateria(String $id)
    {
        $materia = Materia::with('user')->find($id);
        return Inertia::render('Materia', compact('materia'));
    }


    /**
     * Render the web-portal with all the materias information
     */
    public function portal()
    {
        $materias = MateriaResource::collection(Materia::orderBy('materias.id', 'DESC')->get());
        return Inertia::render('Web', compact('materias'));
    }
}
