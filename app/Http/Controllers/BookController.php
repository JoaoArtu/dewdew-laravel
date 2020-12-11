<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(15);

        return view('books.index', compact('books'))->with('i', (request()->input('page', 1) -1) * 15);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'genero' => 'required',
            'ano' => 'required',
            'qtd_paginas' => 'required',
            'qtd_exemplares' => 'required',
            'qtd_disponivel' => 'required',
            'preco' => 'required',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Livro cadastrado com sucesso.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
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

        Book::where('id', $book->id)->update($request->except(['_token', '_method']));

        return redirect()->route('books.index')->with('success', 'Livro editado com sucesso.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso.');
    }
}
