<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Visualizar: Discos
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
          <a href={{ route('disks.create') }} class="mr-20">
            <button type="button" 
            class="border border-gray-300 text-gray-700 rounded px-4 py-2 transition duration-200 
            hover:bg-gray-200">
              Cadastrar novo disco
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
          @foreach ($disks as $disk)
          <tr>
            <td>{{ $disk->id }}</td>
            <td>{{ $disk->titulo }}</td>
            <td>{{ $disk->artista }}</td>
            <td>{{ $disk->genero }}</td>
            <td>{{ $disk->ano }}</td>
            <td>{{ $disk->qtd_disponivel }}</td>
            <td>{{ $disk->preco }}</td>
            <td>
              <a href="{{ route('disks.show', $disk->id) }}" class="mx-2"><i class="fas fa-eye text-blue-500"></i></a>
              {{-- <a href="{{ route('disks.show', $disk->id) }}" class="mx-2"><span class="text-blue-500">Ver</span></a> --}}
              <a href="{{ route('disks.edit', $disk->id) }}" class="mx-2"><i class="fas fa-edit text-green-500"></i></a>
              {{-- <a href="{{ route('disks.edit', $disk->id) }}" class="mx-2"><span class="text-green-500">Editar</span></a> --}}
              <form class="inline" action="{{ route('disks.destroy', $disk->id) }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" title="delete" class="mx-2"><i class="fas fa-trash text-red-500"></i></button>
                {{-- <button type="submit" title="delete" class="mx-2"><span class="text-red-500">Excluir</span></button> --}}
              </form>
            </td>
          </tr>
          @endforeach
        </table>
          {{ $disks->links() }}
      </div>
    </div>
  </div>
</x-app-layout>