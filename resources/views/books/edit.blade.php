<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Livros') }}
    </h2>
  </x-slot>
  <div class="py-12">
      <x-back/>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 h-60 w-full h-full">
          <div class="py-6 px-12 flex w-full  bg-gray-200">
            <h1 class="text-xl font-medium text-gray-800">Editar livro</h1>
          </div>

          <form action="{{ route('books.update', $book->id )}}" method="post" class="py-6 px-12 w-full w-full">

            @csrf
            @method('PUT')

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-isbn">
                  isbn
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('isbn')) focus:outline-none border-red-500 @endif"
                  id="grid-isbn" name="isbn" type="text" value="{{$book->isbn}}" />
                @if($errors->has('isbn'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('isbn') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
              <div class="w-full md:w-3/4">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-title">
                  Título
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('title')) focus:outline-none border-red-500 @endif"
                  id="grid-title" name="title" type="text" value="{{$book->title}}" />

                @if($errors->has('title'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('title') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>

            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-author">
                  Autor
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('author')) focus:outline-none border-red-500 @endif"
                  id="grid-author" type="text" name="author" value="{{$book->author}}" />

                @if($errors->has('author'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('author') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-publishing">
                  Editora
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('publishing_company')) focus:outline-none border-red-500 @endif"
                  id="grid-publishing" name="publishing_company" type="text" value="{{$book->publishing_company}}" />

                @if($errors->has('publishing_company'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('publishing_company') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-publishing_place">
                  Local de lançamento
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('publication_place')) focus:outline-none border-red-500 @endif"
                  id="grid-publishing_place" name="publication_place" type="text"
                  value="{{$book->publication_place}}" />

                @if($errors->has('publication_place'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('publication_place') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-publication_date">
                  Data de lançamento
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('publication_date')) focus:outline-none border-red-500 @endif"
                  id="grid-publication_date" name="publication_date" type="date" value="{{$book->publication_date}}" />

                @if($errors->has('publication_date'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('publication_date') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-publisher_number">
                  Número da edição
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('publisher_number')) focus:outline-none border-red-500 @endif"
                  id="grid-publisher_number" name="publisher_number" type="text"
                  value="{{ $book->publisher_number }}" />

                @if($errors->has('publisher_number'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('publisher_number') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-available_quantity">
                  Quantidade de exemplares
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('available_quantity')) focus:outline-none border-red-500 @endif"
                  id="grid-available_quantity" name="available_quantity" type="text"
                  value="{{ $book->available_quantity }}" />

                @if($errors->has('available_quantity'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('available_quantity') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <button
                  class="appearence-none block bg-blue-500 cursor-pointer hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                  id="grid-publication_date" type="submit">Salvar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
