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
            <h1 class="text-xl font-medium text-gray-800">Editar perfil</h1>
          </div>

          <form method="POST" action="{{ route('users.update', $user->id )}}" class="py-6 px-12 w-full w-full">

            @csrf
            @method('PUT')

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Avatar
                </label>
                <input class="form-control
                    block
                    w-full
                    px-2
                    py-1
                    text-sm
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileSm"
                  type="file">

              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                  Nome
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite"
                  id="grid-name" name="name" value="{{ $user->name }}" required type="text" />
              </div>
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                  E-mail
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-email" name="email" value="{{$user->email}}" required type="email" />

              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-atual_password">
                  Senha atual
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-actual_password" name="actual_password" :value="old('actual_password')" required
                  type="password" />

              </div>

              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Nova senha
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('password')) focus:outline-none border-red-500 @endif"
                  id="grid-password" name="password" :value="old('password')" type="password" />

                @if($errors->has('password'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('password') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>

              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                  for="grid-password_confirmation">
                  Confirmar senha
                </label>
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 @if($errors->has('password_confirmation')) focus:outline-none border-red-500 @endif"
                  id="grid-street" type="password" name="password_confirmation" :value="old('password_confirmation')" />

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