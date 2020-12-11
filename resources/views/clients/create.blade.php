<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Cadastrar: Cliente
    </h2>
  </x-slot>
  <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white shadow-sm sm:rounded-lg">
      <div class="p-12 bg-white border-b border-gray-200">
        <h1 class="text-2xl mb-6">Cadastrar Cliente</h1>
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
        <form action="{{ route('clients.store') }}" method="post">
          @csrf
          <label>Nome</label>
          <input name="nome" class="block mb-6 w-full" type="text" maxlength="60">
          <label>CPF</label>
          <input name="cpf" class="block mb-6 w-full" type="text">
          <label>Endereço</label>
          <input name="endereco" class="block mb-6 w-full" type="text" maxlength="60">
          <button type="submit"
          class="border border-gray-300 bg-gray-100 text-gray-700 rounded w-full py-2 transition duration-200 
          hover:bg-gray-200">
            Cadastrar novo cliente
          </button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>