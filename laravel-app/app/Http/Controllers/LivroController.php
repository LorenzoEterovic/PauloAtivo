<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Livro;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::orderBy('titulo')->get();

        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        return view('livros.create');
    }

    public function store(LivroRequest $request)
    {
        Livro::create($request->validated());

        return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function edit(string $id)
    {
        $livro = Livro::findOrFail($id);

        return view('livros.edit', compact('livro'));
    }

    public function update(LivroRequest $request, string $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->update($request->validated());

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}
