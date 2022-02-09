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
            <h1 class="text-xl font-medium text-gray-800">Novo empréstimo</h1>
          </div>
          <div class="flex flex-wrap -mx-3 mb-4 py-6 px-12 w-full">
            <div class="flex flex-col px-3 mb-4 md:mb:0 mr-36">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                ID do livro
              </label>
              <span class="text-center font-light font-mono text-lg text-gray-500">{{$loan->books_id}}</span>
            </div>

            <div class="flex flex-col px-3 mb-4 md:mb:0 mr-36">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                Nome do livro
              </label>
              <span class="text-center font-light font-mono text-lg text-gray-500">{{$loan->books->title}}</span>
            </div>


          </div>

          <div class="flex flex-wrap -mx-3 mb-4 py-6 px-12 w-full">
            <div class="flex flex-col px-3 mb-4 md:mb:0 mr-36">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                Nome do cliente
              </label>
              <span class="text-center font-light font-mono text-lg text-gray-500">{{ $loan->client->name}}</span>
            </div>

            <div class="flex flex-col px-3 mb-4 md:mb:0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                Data de empréstimo
              </label>
              <span
                class="text-center font-light font-mono text-lg text-gray-500">{{\Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y')}}</span>
            </div>
          </div>

          <div class="flex flex-wrap -mx-3 mb-4 py-6 px-12 w-full">
            <div class="flex flex-col px-3 mb-4 md:mb:0 mr-24">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                Data de devolução
              </label>
              <span
                class="text-center font-light font-mono text-lg text-gray-500">{{\Carbon\Carbon::parse($loan->delivery_date)->format('d/m/Y')}}</span>
            </div>

            <div class="flex flex-col px-3 mb-4 md:mb:0 mr-36">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                Entregue em
              </label>
              <span
                class="text-center font-light font-mono text-lg text-gray-500" value="{{$returnDate}}">{{\Carbon\Carbon::parse($returnDate)->format('d/m/Y')}}</span>
            </div>
          </div>

          <div class="flex flex-wrap -mx-3 mb-4 py-6 px-12 w-full">
            <div class="flex flex-col px-3 mb-4 md:mb:0 mr-56">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                Multa
              </label>
              <span class="text-center font-light font-mono text-lg text-gray-500" value="{{$trafficTicket}}">
                @if($trafficTicket === 1)
                Sim
                @else
                Não
                @endif
              </span>
            </div>

            <div class="flex flex-col px-3 mb-4 md:mb:0">
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                Valor da multa
              </label>
              <span class="text-center font-light font-mono text-lg text-gray-500" value="{{$trafficTicketValue}}">{{$trafficTicketValue}}</span>
            </div>

          </div>
          <div class="flex flex-wrap -mx-3 mb-4 py-6 px-12 w-full">
          <a href="">
              <button
                class="bg-blue-500 h-10 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                Confirmar devolução
              </button>
            </a>
            </div>
        </div>
      </div>

</x-app-layout>
