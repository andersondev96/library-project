<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Usuários') }}
    </h2>

  </x-slot>
  <div class="py-12">
    <x-back />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 h-60 w-full h-full">
          <div class="py-6 px-12 flex w-full  bg-gray-200">
            <h1 class="text-xl font-medium text-gray-800">Novo usuário</h1>
          </div>

          <form method="POST" action="{{ route('users.store')}}" class="py-6 px-12 w-full w-full">

            @csrf
            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                  Nome
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite {{$errors->has('name') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-name" name="name" value="{{old('name')}}" type="text" />

                @if($errors->has('name'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('name') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                  E-mail
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('email') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-email" name="email" value="{{old('email')}}" type="text" />

                @if($errors->has('email'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('email') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Senha
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('password') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-password" name="password" value="{{old('password')}}" type="password" />

                @if($errors->has('password'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('password') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>

              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-password_confirmation">
                  Confirmar senha
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('password_confirmation') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-street" type="password" name="password_confirmation"
                  value="{{old('password_confirmation')}}" />

                @if($errors->has('password_confirmation'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('password_confirmation') as $error)
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