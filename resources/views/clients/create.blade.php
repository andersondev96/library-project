<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Clientes') }}
    </h2>

  </x-slot>
  <div class="py-12">
    <x-back />
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 h-60 w-full h-full">
          <div class="py-6 px-12 flex w-full  bg-gray-200">
            <h1 class="text-xl font-medium text-gray-800">Novo cliente</h1>
          </div>

          <form method="POST" action="{{ route('clients.store')}}" class="py-6 px-12 w-full w-full">

            @csrf
            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-1/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-cpf">
                  CPF
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite {{$errors->has('cpf') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-cpf" name="cpf" value="{{old('cpf')}}" type="text" placeholder="XXX.XXX.XXX-XX" />
                @if($errors->has('cpf'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('cpf') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
              <div class="w-full md:w-1/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-rg">
                  RG
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('rg') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-rg" name="rg" value="{{old('rg')}}" type="text" placeholder="XX.XXX.XXX" />
                @if($errors->has('rg'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('rg') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
              <div class="w-full md:w-4/6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                  Nome
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('name') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-name" name="name" value="{{old('name')}}" type="text"
                  placeholder="Digite o nome do cliente" />

                @if($errors->has('name'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('name') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-birth_date">
                  Data de nascimento
                </label>

                <div class="relative">
                  <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg
                      class="w-5 h-5 text-gray-500 dark:text-gray-400 {{$errors->has('birth_date') ? 'focus:outline-none text-red-500' : ''}}"
                      fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <input datepicker datepicker-autohide type="text" datepicker-format="yyyy-mm-dd"
                    class="pl-10 p-2.5 appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('birth_date') ? 'focus:outline-none border-red-500' : ''}}"
                    id="grid-birth_date" name="birth_date" value="{{old('birth_date')}}" placeholder="Selecione a data">
                </div>

                @if($errors->has('birth_date'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('birth_date') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-street">
                  Rua
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('street') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-street" type="text" name="street" value="{{old('street')}}"
                  placeholder="Digite o nome da rua" />

                @if($errors->has('street'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('street') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
              <div class="w-full md:w-1/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-number">
                  Número
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('number') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-number" name="number" value="{{old('number')}}" type="text" placeholder="Digite o número" />

                @if($errors->has('number'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('number') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-3/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-complement">
                  Complemento
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('complement') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-complement" name="complement" value="{{old('complement')}}" type="text"
                  placeholder="Bloco/Apartamento" />

                @if($errors->has('complement'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('complement') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-district">
                  Bairro
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('district') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-district" type="text" name="district" value="{{old('district')}}"
                  placeholder="Digite o bairro" />

                @if($errors->has('district'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('district') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
              <div class="w-full md:w-1/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip_code">
                  CEP
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('zip_code') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-zip_code" name="zip_code" value="{{old('zip_code')}}" type="text" placeholder="XX.XXX-XXX" />

                @if($errors->has('zip_code'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('zip_code') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-4">
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-complement">
                  Cidade
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('city') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-city" name="city" type="text" value="{{old('city')}}" placeholder="Digite a cidade" />

                @if($errors->has('city'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('city') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
              <div class="w-full md:w-1/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state_id">
                  Estado
                </label>
                <select
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('state_id') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-state_id" type="text" name="state_id">

                  @foreach($states as $e)
                  <option @if(old('state_id')==$e->id) {{'selected="selected"'}} @endif
                    value="{{ $e->id }}">{{  $e->initials }}</option>
                  @endforeach
                </select>

                @if($errors->has('state_id'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('state_id') as $error)
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
                  id="grid-email" name="email" value="{{old('email')}}" type="text" placeholder="Digite o e-mail" />

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
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-telephone">
                  Telefone
                </label>
                <input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('telephone') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-telephone" name="telephone" value="{{old('telephone')}}" type="text"
                  placeholder="(XX)XXXXX-XXXX" />


                @if($errors->has('telephone'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('telephone') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif
              </div>
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-type">
                  Tipo de cliente
                </label>
                <select
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('type') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-type" name="type">

                  <option value="NULL" disabled selected>Selecione uma opção</option>
                  @foreach($types as $t)
                  <option @if(old('type')==$t) {{'selected="selected"'}} @endif value="{{$t}}">{{$t}}</option>
                  @endforeach
                </select>

                @if($errors->has('type'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('type') as $error)
                  {{ $error }}
                  @endforeach
                </div>
                @endif

              </div>
              <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-department">
                  Departamento
                </label>
                <select
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{$errors->has('department') ? 'focus:outline-none border-red-500' : ''}}"
                  id="grid-department" name="department">
                  <option value="NULL" disabled selected>Selecione uma opção</option>
                  @foreach($departments as $d)
                  <option @if(old('department')==$d) {{'selected="selected"'}} @endif value="{{$d}}">{{$d}}</option>
                  @endforeach
                </select>

                @if($errors->has('department'))
                <div class="text-red-500 text-sm">
                  @foreach($errors->get('department') as $error)
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
