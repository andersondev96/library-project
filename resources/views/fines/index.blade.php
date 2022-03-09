<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Multas') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <div class="flex flex-row w-full items-center justify-between">
            <form action="{{ route('fines.index')}}" method="GET">
              <div class="flex flex-row items-center mb-4">
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight"
                  id="input-search" name="name" type="text" placeholder="Buscar por nome" />


                <button class="ml-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                </button>
            </form>
          </div>
        </div>
        <a href="{{route('fines.index')}}">
          <div class="ml-1 text-xs mb-2 text-blue-400 text-opacity-75">
            EXIBIR TODOS OS RESULTADOS
          </div>
        </a>
        <div class="flex flex-col">

          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                      </th>
                      <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        CPF
                      </th>
                      <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nome
                      </th>
                      <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        E-mail
                      </th>
                      <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Telefone
                      </th>
                      <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Multas
                      </th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Payment</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($fines as $f)
                    <tr>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                        {{ $f->id }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                        {{ $f->cpf }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                        {{ strlen($f->name) > 25 ? substr($f->name, 0, 25) . "..." : $f->name }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                        {{ $f->email }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                        {{ $f->telephone }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                        {{ 'R$ '.number_format(($f->traffic_ticket), 2, '.', '.') }}
                      </td>
                      <td>
                        <a href="{{ route('/fines/payment', $f->id) }}">
                          <button
                            class="flex justify-center items-center bg-gray-200 w-12 text-sm h-5 w-5 text-blue-500 rounded hover:bg-gray-400 hover:text-stone-50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                            </svg>
                          </button>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="mt-4">
                {{ $fines->links() }}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
</x-app-layout>
