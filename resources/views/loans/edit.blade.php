<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Empréstimos') }}
    </h2>

  </x-slot>
  <div class="py-12">
    <x-back />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 h-60 w-full h-full">
          <div class="py-6 px-12 flex w-full  bg-gray-200">
            <h1 class="text-xl font-medium text-gray-800">Editar empréstimo</h1>
          </div>

          <form method="POST" action="{{ route('loans.update', $loan->id )}}" class="py-6 px-12 w-full w-full">

            @csrf
            @method('PUT')

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                  ID do livro
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite"
                  id="grid-books_id" name="books_id" value="{{ $loan->books_id }}" required type="text" />
                @if($errors->has('books_id'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('books_id') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-client_id">
                  ID do cliente
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-client_id" name="client_id" value="{{ $loan->client_id }}" required type="text" />
                @if($errors->has('client_id'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('client_id') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-loan_date">
                  Data de empréstimo
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-loan_date" disabled name="loan_date" value="{{ $loan->loan_date }}" required type="date" />

                @if($errors->has('loan_date'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('loan_date') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>

              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-delivery_date">
                  Data de devolução
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite"
                  id="grid-delivery_date" name="delivery_date" value="{{ $loan->delivery_date }}" required
                  type="date" />
                @if($errors->has('delivery_date'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('delivery_date') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
            </div>

            @if(!isset($loan->return_date))
            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <button
                  class="appearence-none block bg-blue-500 cursor-pointer hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                  id="grid-publication_date" type="submit">Salvar</button>
              </div>
            </div>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
