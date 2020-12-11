<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(15);

        return view('clients.index', compact('clients'))->with('i', (request()->input('page', 1) -1) * 15);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'nome' => 'required',
        'cpf' => 'required',
        'endereco' => 'required',
    ]);

    Client::create($request->all());

    return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso.');
    }

    public function show(Client $client)
    {
      return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
      return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
      $request->validate([
        'nome',
        'cpf',
        'endereco',
    ]);

    Client::where('cpf', $client->cpf)->update($request->except(['_token', '_method']));

    return redirect()->route('clients.index')->with('success', 'Cliente editado com sucesso.');
    }

    public function destroy(Client $client)
    {
      $client->delete();

      return redirect()->route('clients.index')->with('success', 'Cliente excluído com sucesso.');
    }
}
