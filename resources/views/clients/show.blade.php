<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $client->name }}
    </h2>

  </x-slot>

  <div class="py-12">
    <x-back />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="table-auto">
            <thead>
              <tr>
                <th class="px-4 py-2"></th>
                <th class="px-4 py-2"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border px-4 py-2">CPF</td>
                <td class="border px-4 py-2">{{ $client->cpf }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">RG</td>
                <td class="border px-4 py-2">{{ $client->rg }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Data de nascimento</td>
                <td class="border px-4 py-2">{{\Carbon\Carbon::parse($client->birth_date)->format('d/m/Y')}}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Telefone</td>
                <td class="border px-4 py-2">{{ $client->telephone }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">E-mail</td>
                <td class="border px-4 py-2">{{ $client->email }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Endereço</td>
                <td class="border px-4 py-2">{{ $client->address->street}}, {{$client->address->number}}
                  {{$client->address->complement}}, {{$client->address->district}}, {{$client->address->city}} - {{$client->address->state->initials}}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Tipo de cliente</td>
                <td class="border px-4 py-2">{{ $client->type }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Departamento</td>
                <td class="border px-4 py-2">{{ $client->department }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Quantidade de livros emprestados</td>
                <td class="border px-4 py-2">{{ $client->books }}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Multas</td>
                <td class="border px-4 py-2">{{ 'R$ '.number_format(($client->traffic_ticket), 2, '.', '.') }}</td>
              </tr>
            </tbody>
          </table>
          <div class="flex flex-row gap-2 mt-4">
            <a href="{{ route('clients.edit', $client->id)}}">
              <button
                class="bg-blue-500 h-10 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                Editar
              </button>
            </a>

            <form name="formDelete" action="{{ route('clients.destroy', $client->id)}}" method="post"
              onSubmit="return confirm('Confirma a exclusão do cliente?')">

              @csrf
              @method('DELETE')

              <button
                class="bg-red-500 h-10 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded"
                type="submit">
                Excluir
              </button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</x-app-layout>
