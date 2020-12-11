<?php

namespace App\Http\Controllers;

use App\Models\Disk;
use Illuminate\Http\Request;

class DiskController extends Controller
{
    public function index()
    {
        $disks = Disk::latest()->paginate(15);

        return view('disks.index', compact('disks'))->with('i', (request()->input('page', 1) -1) * 15);
    }

    public function create()
    {
        return view('disks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'artista' => 'required',
            'genero' => 'required',
            'ano' => 'required',
            'qtd_exemplares' => 'required',
            'qtd_disponivel' => 'required',
            'preco' => 'required',
        ]);

        Disk::create($request->all());

        return redirect()->route('disks.index')->with('success', 'Livro cadastrado com sucesso.');
    }

    public function show(Disk $disk)
    {
        return view('disks.show', compact('disk'));
    }

    public function edit(Disk $disk)
    {
        return view('disks.edit', compact('disk'));
    }

    public function update(Request $request, Disk $disk)
    {
        $request->validate([
            'titulo',
            'autor',
            'genero',
            'ano',
            'qtd_paginas',
            'qtd_exemplares',
            'qtd_disponivel',
            'preco',
        ]);

        Disk::where('id', $disk->id)->update($request->except(['_token', '_method']));

        return redirect()->route('disks.index')->with('success', 'Livro editado com sucesso.');
    }

    public function destroy(Disk $disk)
    {
        $disk->delete();

        return redirect()->route('disks.index')->with('success', 'Livro excluído com sucesso.');
    }
}
