<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Cadastrar: Livro
    </h2>
  </x-slot>
  <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow-sm sm:rounded-lg">
      <div class="p-12 bg-white border-b border-gray-200">
        <h1 class="text-2xl mb-6">Cadastrar Livro</h1>
        @if ($errors->any())
          <div class="alert alert-danger mb-4 text-red-500">
            <strong>Ops!</strong> Houveram alguns problemas no cadastro.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <form action="{{ route('books.store') }}" method="post">
          @csrf
          <label>Título</label>
          <input name="titulo" class="block mb-6 w-full" type="text" maxlength="60">
          <label>Autor</label>
          <input name="autor" class="block mb-6 w-full" type="text" maxlength="60">
          <div class="flex justify-between gap-6">
            <span class="w-1/2">
              <label class="block">Gênero</label>
              <input name="genero" class="block mb-6 w-full" type="text" maxlength="60">
            </span>
            <span class="w-1/4">
              <label class="block">Ano</label>
              <input name="ano" class="block mb-6 w-full" type="text">
            </span>
            <span class="w-1/4">
              <label>Qtd. Páginas</label>
              <input name="qtd_paginas" class="block mb-6 w-full" type="text">
            </span>
          </div>
          <div class="flex justify-between gap-3">
            <span class="w-1/3">
              <label>Qtd. Exemplares</label>
              <input name="qtd_exemplares" class="block mb-6 w-full" type="text">
            </span>
            <span class="w-1/3">
              <label>Qtd. Disponível</label>
              <input name="qtd_disponivel" class="block mb-6 w-full" type="text">
            </span>
            <span class="w-1/3">
              <label>Preço</label>
              <input name="preco" class="block mb-6 w-full" type="text">
            </span>
          </div>
          <button type="submit"
          class="border border-gray-300 bg-gray-100 text-gray-700 rounded w-full py-2 transition duration-200 
          hover:bg-gray-200">
            Cadastrar novo livro
          </button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>