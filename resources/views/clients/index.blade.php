<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Visualizar: Clientes
    </h2>
  </x-slot>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    @if ($message = Session::get('success'))
      <div class="mb-6 text-green-600">
        <p>{{ $message }}</p>
      </div>
    @endif
    <div class="bg-white shadow-sm sm:rounded-lg">
      <div class="p-6 bg-white border-b border-gray-200">
        <div class="flex">
          <a href={{ route('clients.create') }} class="mr-20">
            <button type="button" 
            class="border border-gray-300 text-gray-700 rounded px-4 py-2 transition duration-200 
            hover:bg-gray-200">
              Cadastrar novo cliente
            </button>
          </a>
          <form name="search" method="get" class="ml-auto">
            <input type="text" class="flex-1 mx-2 rounded" placeholder="Pesquisar por nome...">
            <input type="text" class="flex-1 mx-2 rounded" placeholder="Pesquisar por cpf...">
            <a href="" class="">
              <button type="submit"
              class="border border-gray-300 text-gray-700 rounded px-8 py-2 transition duration-200 
              hover:bg-gray-200">
                Pesquisar
              </button>
            </a>
          </form>
        </div>
        <table class="w-full my-6 custom-table">
          <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Endereço</th>
            <th>Alugados</th>
            <th>Ações</th>
          </tr>
          @foreach ($clients as $client)
          <tr>
            <td>{{ $client->nome }}</td>
            <td>{{ $client->cpf }}</td>
            <td>{{ $client->endereco }}</td>
            <td></td>
            <td>
              <a href="{{ route('clients.show', $client->cpf) }}" class="mx-2"><i class="fas fa-eye text-blue-500"></i></a>
              <a href="{{ route('clients.edit', $client->cpf) }}" class="mx-2"><i class="fas fa-edit text-green-500"></i></a>
              <form class="inline" action="{{ route('clients.destroy', $client->cpf) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" title="delete" class="mx-2"><i class="fas fa-trash text-red-500"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
          {{ $clients->links() }}
      </div>
    </div>
  </div>
</x-app-layout>