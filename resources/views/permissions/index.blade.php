<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Permissões') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          <div class="flex flex-row w-full items-center justify-between">

            <div class="flex flex-row items-center mb-4">

              <a href="{{ route('permissions.create') }}">
                <button class="bg-blue-500 h-10 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 rounded">
                  Adicionar permissão
                </button>
              </a>
            </div>

          </div>

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
                          Nome do usuário
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Permissão
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          Criado em
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                          <span class="sr-only">Options</span>
                        </th>

                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      @foreach($permission as $p)
                      <tr>
                        <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                          {{ $p->id }}
                        </td>
                        <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                          {{ $p->users->name }}
                        </td>
                        <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                          {{ $p->permissions->name }}
                        </td>
                        <td class="px-6 py-3 text-sm p-3 border-t border-grey-light whitespace-no-wrap">
                          {{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y') }}
                        </td>

                        <td class="flex flex-row gap-2 px-6 py-3 whitespace-nowrap text-right text-sm font-medium">


                          <a href="{{ route('permissions.edit', $p->id )}}"
                            class="text-indigo-600 hover:text-indigo-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                              fill="currentColor">
                              <path
                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                          </a>

                          @if(Auth::user()->id != $p->users->id)
                          <form name="formDelete" action="{{route('permissions.destroy', $p->id )}}" method="post"
                            onSubmit="return confirm('Confirma a exclusão das permissões do usuário?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-500 hover:text-indigo-900">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                  clip-rule="evenodd" />
                              </svg>
                              </a>
                          </form>
                          @endif

                        </td>

                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>