<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Clientes') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <div class="flex flex-row w-full items-center justify-between">
            <form action="{{ route('clients.index')}}" method="GET">
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
          <div>
            <a href="{{route('clients.create')}}">
              <button class="bg-blue-500 h-10 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 rounded">
                Adicionar cliente
              </button>
            </a>
          </div>
        </div>
        <a href="{{route('clients.index')}}">
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
                        Data de nascimento
                      </th>
                      <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        E-mail
                      </th>
                      <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Telefone
                      </th>
                      <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Options</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($clients as $c)
                    <tr>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light 'whitespace-no-wrap'">
                        {{ $c->id }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light 'whitespace-no-wrap'">
                        {{ $c->cpf }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light 'whitespace-no-wrap'">
                        {{ strlen($c->name) > 30 ? substr($c->name, 0, 30) . "..." : $c->name }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light 'whitespace-no-wrap'">
                        {{ \Carbon\Carbon::parse($c->birth_date)->format('d/m/Y') }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light 'whitespace-no-wrap'">
                        {{ strlen($c->email) > 24 ? substr($c->email, 0, 24) . "..." : $c->email }}
                      </td>
                      <td class="px-6 py-3 text-sm p-3 border-t border-grey-light 'whitespace-no-wrap'">
                        {{ $c->telephone }}
                      </td>
                      <td class="flex flex-row gap-2 px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{route('clients.show', $c->id)}}" class="text-teal-600 hover:text-teal-900">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                              d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                              clip-rule="evenodd" />
                          </svg>
                        </a>

                        <a href="{{route('clients.edit', $c->id)}}" class="text-indigo-600 hover:text-indigo-900">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                          </svg>
                        </a>

                        <form name="formDelete" action="{{route('clients.destroy', $c->id )}}" method="post"
                          onSubmit="return confirm('Confirma a exclusão do cliente?')">

                          @csrf
                          @method('DELETE')

                          <button type="submit" class="text-red-500 hover:text-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                              fill="currentColor">
                              <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                            </svg>
                            </a>
                        </form>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="mt-4">
                {{ $clients->links() }}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
</x-app-layout>