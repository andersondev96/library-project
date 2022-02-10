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
            <h1 class="text-xl font-medium text-gray-800">Devolução</h1>
          </div>

          <form method="POST" action="{{ route('loans/finishDeliver', $loan->id )}}" class="py-6 px-12 w-full w-full">

            @csrf
            @method('PUT')

            <div class="flex flex-wrap -mx-3 mb-4 py-6 px-12 w-full">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                  ID do livro
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-books_id" name="books_id" value="{{ $loan->books_id }}" type="text" readonly />
              </div>

              <div class="w-full md:w-4/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                  Nome do livro
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-title" name="books_id" value="{{ $loan->books->title }}" type="text" readonly />
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4 py-6 px-12 w-full">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                  Nome do cliente
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-title" name="name" value="{{ $loan->client->name }}" type="text" readonly />
              </div>

              <div class="f-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                  Data de empréstimo
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-loan_date" name="loan_date" value="{{ $loan->loan_date }}" type="date" readonly />
              </div>

              <div class="f-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                  Data de devolução
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-delivery_date" name="delivery_date" value="{{ $loan->delivery_date }}" type="date"
                  readonly />
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4 py-6 px-12 w-full">
              <div class="f-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                  Entregue em
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-return_date" name="return_date" value="{{ $returnDate }}" type="date" readonly />
              </div>

              <div class="f-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                  Multa
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-traffic_ticket" value="{{ $trafficTicket === 1 ? 'Sim' : 'Não' }}" type="text" readonly />
              </div>

              <div class="f-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-books_id">
                  Valor da multa
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-traffic_ticket_value" name="traffic_ticket"
                  value="{{ 'R$ '.number_format(($trafficTicketValue), 2, '.', '.') }}" type="text" readonly />
              </div>
            </div>

            @if(!isset($loan->return_date))
            <div class="flex flex-wrap -mx-3 mb-4 py-6 px-12 w-full">
              <div class="f-full md:w-2/6 px-3 mb-4 md:mb:0">
                <a href="">
                  <button
                    class="bg-blue-500 h-10 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                    Confirmar devolução
                  </button>
                </a>
              </div>
            </div>
            @endif
          </form>

        </div>
      </div>
    </div>
</x-app-layout>
