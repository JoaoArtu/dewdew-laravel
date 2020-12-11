<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Ver: Disco {{ $disk->id }}
    </h2>
  </x-slot>
  <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow-sm sm:rounded-lg">
      <div class="p-12 bg-white border-b border-gray-200">
        <h1 class="text-2xl mb-6">Ver detalhes</h1>
        <div>
          <h2 class="mb-6">ID: {{ $disk->id }}</h2>
          <h2>Título</h2>
          <h3 class="m-3 text-gray-500">{{ $disk->titulo }}</h3>
          <h2>Artista</h2>
          <h3 class="m-3 text-gray-500">{{ $disk->artista }}</h3>
          <div class="flex justify-between gap-6">
            <span class="w-2/3">
              <h2>Gênero</h2>
              <h3 class="m-3 text-gray-500">{{ $disk->genero }}</h3>
            </span>
            <span class="w-1/3">
              <h2>Ano</h2>
              <h3 class="m-3 text-gray-500">{{ $disk->ano }}</h3>
            </span>
          </div>
          <div class="flex justify-between gap-3">
            <span class="w-1/3">
              <h2>Qtd. Exemplares</h2>
              <h3 class="m-3 text-gray-500">{{ $disk->qtd_exemplares }}</h3>
            </span>
            <span class="w-1/3">
              <h2>Qtd. Disponível</h2>
              <h3 class="m-3 text-gray-500">{{ $disk->qtd_disponivel }}</h3>
            </span>
            <span class="w-1/3">
              <h2>Preço</h2>
              <h3 class="m-3 text-gray-500">{{ $disk->preco }}</h3>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>