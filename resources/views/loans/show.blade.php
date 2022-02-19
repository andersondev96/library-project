<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Empréstimo
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
                <td class="border px-4 py-2">Data do empréstimo</td>
                <td class="border px-4 py-2">{{\Carbon\Carbon::parse($loan->loan_date)->format('d/m/Y')}}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Livro</td>
                <td class="border px-4 py-2">{{$loan->books->title}}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Cliente</td>
                <td class="border px-4 py-2">{{$loan->client->name}}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Data da entrega</td>
                <td class="border px-4 py-2">{{\Carbon\Carbon::parse($loan->delivery_date)->format('d/m/y')}}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Devolvido em</td>
                <td class="border px-4 py-2">
                  {{isset($loan->return_date) ? \Carbon\Carbon::parse($loan->return_date)->format('d/m/Y') : ''}}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Multa</td>
                <td class="border px-4 py-2">{{$loan->traffic_ticket}}</td>
              </tr>
              <tr>
                <td class="border px-4 py-2">Paga</td>
                <td class="border px-4 py-2">
                  @if(isset($loan->return_date) && $loan->traffic_ticket > 0)
                  @if($loan->paid > 0)
                  Não
                  @else
                  Sim
                  @endif
                  @endif
                </td>
              </tr>

            </tbody>
          </table>
          @if(!isset($loan->return_date))
          <div class="flex flex-row gap-2 mt-4">
            <a href="{{ route('loans.edit', $loan->id)}}">
              <button
                class="bg-blue-500 h-10 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                Editar
              </button>
            </a>

            <form name="formDelete" action="{{ route('loans.destroy', $loan->id)}}" method="post"
              onSubmit="return confirm('Confirma a exclusão do empréstimo?')">

              @csrf
              @method('DELETE')

              <button
                class="bg-red-500 h-10 hover:bg-red-700 text-white font-bold py-2 px-4 border border-red-700 rounded"
                type="submit">
                Excluir
              </button>

            </form>

          </div>
          @endif
        </div>



      </div>
    </div>
  </div>

</x-app-layout>
