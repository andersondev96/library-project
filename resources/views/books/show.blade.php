<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $book->title }}
    </h2>
  </x-slot>


  <div class="py-12">
    <x-back />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="table-auto">
            <thead>
              <tr>
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border px-4 py-2">ID</td>
                <td class="border px-4 py-2">{{ $book->id }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">ISBN</td>
                <td class="border px-4 py-2">{{ $book->isbn }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Autor(a)</td>
                <td class="border px-4 py-2">{{ $book->author }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Editora</td>
                <td class="border px-4 py-2">{{ $book->publishing_company }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Local de lançamento</td>
                <td class="border px-4 py-2">{{ $book->publication_place }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Data de lançamento</td>
                <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($book->publication_date)->format('d/m/Y') }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Quantidade de exemplares</td>
                <td class="border px-4 py-2">{{ $book->available_quantity }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Quantidades disponíveis</td>
                <td class="border px-4 py-2">{{ $book->available_quantity - $book->borrowed_amounts }}</td>
              </tr>
            </tbody>
          </table>
          <div class="flex flex-row gap-2 mt-4">
            <a href="{{ route('books.edit', $book->id)}}">
              <button
                class="bg-blue-500 h-10 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                Editar
              </button>
            </a>

            <form name="formDelete" action="{{ route('books.destroy', $book->id)}}" method="post"
              onSubmit="return confirm('Confirma a exclusão do livro?')">

              @csrf
              @method('DELETE')

              <button
                class="bg-red-500 h-10 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded"
                type="submit">
                Excluir
              </button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
