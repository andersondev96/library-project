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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite"
                  id="grid-cpf" name="cpf" :value="old('cpf')" required  type="text" placeholder="XXX.XXX.XXX-XX" />
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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-rg" name="rg" :value="old('rg')" required type="text" placeholder="XX.XXX.XXX" />
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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-name" name="name" :value="old('name')" required type="text" placeholder="Digite o nome do cliente" />

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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-birth_date" name="birth_date" :value="old('birth_date')" required type="date" />

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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-street" type="text" name="street" :value="old('street')" required placeholder="Digite o nome da rua" />

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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-number" name="number" :value="old('number')" required type="text" placeholder="Digite o número" />

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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-complement" name="complement"  :value="old('complement')" required type="text" placeholder="Bloco/Apartamento" />

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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-district" type="text" name="district" :value="old('district')" required placeholder="Digite o bairro" />

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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-zip_code" name="zip_code" :value="old('zip_code')" required type="text" placeholder="XX.XXX-XXX" />

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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-city" name="city" type="text" :value="old('city')" required placeholder="Digite a cidade" />

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
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-state_id" type="text" name="state_id">

                  @foreach($states as $e)
                  <option value="{{ $e->id }}">{{  $e->initials }}</option>
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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-email" name="email" :value="old('email')" required type="email" placeholder="Digite o e-mail" />

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
                <x-input
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-telephone" name="telephone" :value="old('telephone')" required type="text" placeholder="(XX)XXXXX-XXXX" />

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
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-type" name="type">

                  <option value="NULL" disabled selected>Selecione uma opção</option>
                  <option value="Aluno">Aluno</option>
                  <option value="Professor">Professor</option>
                  <option value="Funcionário">Funcionário</option>
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
                  class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500"
                  id="grid-department" name="department">
                  <option value="NULL" disabled selected>Selecione uma opção</option>
                  <option value="DCEX">DCEX</option>
                  <option value="DCHM">DCHM</option>
                  <option value="DCNN">DCNN</option>
                  <option value="DCBL">DCBL</option>
                  <option value="DCTL">DCTL</option>
                  <option value="Não se aplica">Não se aplica</option>
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