<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Permissões') }}
    </h2>

  </x-slot>
  <div class="py-12">
    <x-back />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 h-60 w-full h-full">
          <div class="py-6 px-12 flex w-full  bg-gray-200">
            <h1 class="text-xl font-medium text-gray-800">Editar permissão</h1>
          </div>

          <form method="POST" action="{{ route('permissions.update', $permission->id )}}"
            class="py-6 px-12 w-full w-full">

            @csrf
            @method('PUT')
            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-user_id">
                  Nome do usuário
                </label>
                <select
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite"
                  id="grid-user_id" name="user_id" disabled>

                  @foreach($users as $u)
                  <option value="{{ $u->id }}" @if($u->id == $permission->users->id)
                    selected
                    @endif>
                    {{ $u->name  }}
                  </option>
                  @endforeach
                </select>

              </div>
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-permission_id">
                  Permissão
                </label>
                <select
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-permission_id" name="permission_id">

                  @foreach($permissions as $ps)
                  <option value="{{ $ps->id }}" @if($ps->id == $permission->permissions->id)
                    selected
                    @endif
                    >{{ $ps->name }}</option>
                  @endforeach
                </select>
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