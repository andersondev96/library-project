<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ $user->name }}
    </h2>

  </x-slot>

  <div class="py-12">
    <x-back />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex flex-column p-6 bg-white border-b border-gray-200">
          <div class="flex items-center rounded justify-center vertical-column h-56 w-64">
            <img
              class="rounded-full object-cover w-48 h-48 outline-purple-700 outline outline-offset-2 outline-2 shadow-xl shadow-lg shadow-indigo-500/50"
              src="http://localhost:8000/images/uploads/{{$user->image}}"
              onError="this.src='{{asset('images/user.png')}}'" alt="Usuário" />
          </div>
          <div class="personal-infos flex-col ml-24">
            <h1 class="title font-sans text-2xl font-semibold mb-4">Informações pessoais</h1>
            <div class="flex flex-col h-full gap-2">
              <div class="email-container">
                <strong>E-mail: </strong>
                <span>{{ $user->email }}</span>
              </div>
              <div class="permission-container">
                <strong>Permissão: </strong>
                <span>
                  @foreach($permissions as $p)
                  @if($user->id == $p->user_id)
                  {{ $p->permissions->name }}
                  @endif
                  @endforeach
                </span>
              </div>
              <div class="created-container">
                <strong>Cadastrado desde: </strong>
                <span>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</span>
              </div>

              <div class="buttons flex flex-row gap-6 mt-8">
                <div>
                  <a href="{{ route('users.edit', $user->id)}}">
                    <button
                      class="bg-blue-500 h-10 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                      Editar
                    </button>
                  </a>
                </div>

                @if(Auth::user()->id != $user->id)
                <div>
                  <form name="formDelete" action="{{ route('users.destroy', $user->id)}}" method="post"
                    onSubmit="return confirm('Confirma a exclusão do usuário?')">

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
      </div>
    </div>
  </div>


</x-app-layout>