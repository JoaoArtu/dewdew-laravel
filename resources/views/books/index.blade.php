<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Visualizar: Livros
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
          <a href={{ route('books.create') }} class="mr-20">
            <button type="button" 
            class="border border-gray-300 text-gray-700 rounded px-4 py-2 transition duration-200 
            hover:bg-gray-200">
              Cadastrar novo livro
            </button>
          </a>
          <form name="search" method="get" class="ml-auto">
            <input type="text" class="flex-1 mx-2 rounded" placeholder="Pesquisar por título...">
            <input type="text" class="flex-1 mx-2 rounded" placeholder="Pesquisar por autor...">
            <input type="text" class="flex-1 mx-2 rounded" placeholder="Pesquisar por gênero...">
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
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Ano</th>
            <th>Disp.</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
          @foreach ($books as $book)
          <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->titulo }}</td>
            <td>{{ $book->autor }}</td>
            <td>{{ $book->genero }}</td>
            <td>{{ $book->ano }}</td>
            <td>{{ $book->qtd_disponivel }}</td>
            <td>{{ $book->preco }}</td>
            <td>
              <a href="{{ route('books.show', $book->id) }}" class="mx-2"><i class="fas fa-eye text-blue-500"></i></a>
              <a href="{{ route('books.edit', $book->id) }}" class="mx-2"><i class="fas fa-edit text-green-500"></i></a>
              <form class="inline" action="{{ route('books.destroy', $book->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" title="delete" class="mx-2"><i class="fas fa-trash text-red-500"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
          {{ $books->links() }}
      </div>
    </div>
  </div>
</x-app-layout>