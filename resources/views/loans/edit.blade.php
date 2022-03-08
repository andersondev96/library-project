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
                  Livro
                </label>

                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite"
                  id="grid-books_id" name="books_id" value="{{ $loan->books->id }}" list="books">

                <datalist id="books">
                  @foreach($books as $b)
                  <option value="{{ $b->id }}">
                    {{ $b->title }}
                  </option>
                  @endforeach
                </datalist>


              </div>
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-client_id">
                  Cliente
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-client_id" name="client_id" value="{{ $loan->client->id }}" list="clients">

                <datalist id="clients">
                  @foreach($clients as $c)
                  <option value="{{ $c->id }}">
                    {{ $c->name }}
                  </option>
                  @endforeach
                </datalist>

                </select>
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-loan_date">
                  Data de empréstimo
                </label>

                <div class="relative">
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg
                      class="w-5 h-5 text-gray-500 dark:text-gray-400 {{$errors->has('delivery_date') ? 'focus:outline-none text-red-500' : ''}}"
                      fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <input datepicker datepicker-autohide type="text" datepicker-format="yyyy-mm-dd"
                    class="pl-10 p-2.5 appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('delivery_date') ? 'focus:outline-none border-red-500' : ''}}"
                    id="grid-loan_date" disabled name="loan_date" value="{{ $loan->loan_date }}"
                    placeholder="Selecione a data">
                </div>

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
                <div class="relative">
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg
                      class="w-5 h-5 text-gray-500 dark:text-gray-400 {{$errors->has('delivery_date') ? 'focus:outline-none text-red-500' : ''}}"
                      fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <input datepicker datepicker-autohide type="text" datepicker-format="yyyy-mm-dd"
                    class="pl-10 p-2.5 appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('delivery_date') ? 'focus:outline-none border-red-500' : ''}}"
                    id="grid-delivery_date" name="delivery_date" value="{{ $loan->delivery_date }}"
                    placeholder="Selecione a data">
                </div>

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