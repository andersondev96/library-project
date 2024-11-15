<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200 w-full h-full">
            <div class="py-6 px-12 flex w-full  bg-sky-600">
                <h1 class="text-xl font-medium text-gray-50">Novo livro</h1>
            </div>

            <form wire:submit="store" class="py-6 px-12 w-full">

                @csrf
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-1/4 px-3 mb-4 md:mb:0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-isbn">
                            isbn
                        </label>
                        <input
                            class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('isbn') ? 'focus:outline-none border-red-500' : '' }}"
                            type="text" wire:model="isbn" placeholder="Digite o ISBN do livro" />

                        @if ($errors->has('isbn'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('isbn') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="w-full md:w-3/4">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-title">
                            Título
                        </label>
                        <input
                            class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('title') ? 'focus:outline-none border-red-500' : '' }}"
                            ype="text" wire:model="title" placeholder="Digite o título do livro" />

                        @if ($errors->has('title'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('title') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    </div>

                </div>

                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-author">
                            Autor
                        </label>
                        <input
                            class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('author') ? 'focus:outline-none border-red-500' : '' }}"
                            type="text" wire:model="author" placeholder="Digite o nome do autor" />

                        @if ($errors->has('author'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('author') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    </div>
                    <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-publishing">
                            Editora
                        </label>
                        <input
                            class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('publishing_company') ? 'focus:outline-none border-red-500' : '' }}"
                            id="grid-publishing" wire:model="publishing_company" type="text" placeholder="Digite o nome da editora" />

                        @if ($errors->has('publishing_company'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('publishing_company') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    </div>

                    <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-generous">
                            Gênero
                        </label>
                        <div class="mt-2">
                            <select id="grid-generous" wire:model="generous"
                                class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('generous') ? 'focus:outline-none border-red-500' : '' }}">
                                <option>Drama</option>
                                <option>Ação</option>
                                <option>Ficção científica</option>
                            </select>
                        </div>

                        @if ($errors->has('generous'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('generous') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    </div>

                </div>

                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full px-3 mb-4 md:mb:0">
                        <label for="grid-synopsis" class="block text-sm font-medium leading-6 text-gray-900">Sinopse do livro</label>
                        <div class="mt-2">
                          <textarea id="grid-synopsis" wire:model="synopsis"
                            class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('synopsis') ? 'focus:outline-none border-red-500' : '' }}">
                        </textarea>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-gray-600">Escreva a sinopse do livro.</p>
                      </div>
                </div>



                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-publishing_place">
                            Local de lançamento
                        </label>
                        <input
                            class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('publication_place') ? 'focus:outline-none border-red-500' : '' }}"
                            id="grid-publishing_place" wire:model="publication_place"
                            type="text" placeholder="Digite onde o livro foi lançado" />

                        @if ($errors->has('publication_place'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('publication_place') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    </div>


                        <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-publication_date">
                                Data de lançamento
                            </label>

                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 {{ $errors->has('publication_date') ? 'focus:outline-none text-red-500' : '' }}"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input datepicker datepicker-autohide type="text" datepicker-format="yyyy-mm-dd"
                                    class="pl-10 p-2.5 appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('publication_date') ? 'focus:outline-none border-red-500' : '' }}"
                                    id="grid-publication_date" wire:model="publication_date" placeholder="Selecione a data">
                            </div>


                            @if ($errors->has('publication_date'))
                                <div class="text-red-500 text-sm">
                                    @foreach ($errors->get('publication_date') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                        </div>
                        <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-publisher_number">
                                Número da edição
                            </label>
                            <input
                                class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('publisher_number') ? 'focus:outline-none border-red-500' : '' }}"
                                id="grid-publisher_number" wire:model="publisher_number" type="text"
                                placeholder="Digite o número da edição" />

                            @if ($errors->has('publisher_number'))
                                <div class="text-red-500 text-sm">
                                    @foreach ($errors->get('publisher_number') as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                        </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-4">

                    <div class="w-full md:w-1/6 px-3 mb-4 md:mb:0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-pages_number">
                            Número de páginas
                        </label>
                        <input
                            class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('pages_number') ? 'focus:outline-none border-red-500' : '' }}"
                            type="number" id="grid-pages_number" wire:model="pages_number" type="text" />

                        @if ($errors->has('pages_number'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('pages_number') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    </div>

                    <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-language">
                            Idioma
                        </label>
                        <div class="mt-2">
                            <select id="grid-language" wire:model="language" autocomplete="language"
                                class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('language') ? 'focus:outline-none border-red-500' : '' }}">
                                <option>Português</option>
                                <option>Inglês</option>
                                <option>Espanhol</option>
                            </select>
                        </div>

                        @if ($errors->has('language'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('language') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    </div>

                    <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-target_audience">
                            Público-alvo
                        </label>
                        <div class="mt-2">
                            <select id="target_audience" wire:model="target_audience" autocomplete="target_audience"
                                class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('target_audience') ? 'focus:outline-none border-red-500' : '' }}">
                                <option>Crianças</option>
                                <option>Adolescentes</option>
                                <option>Adulto</option>
                            </select>
                        </div>

                        @if ($errors->has('target_audience'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('target_audience') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    </div>

                    <div class="w-full md:w-1/6 px-3 mb-4 md:mb:0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for="grid-available_quantity">
                            Número de exemplares
                        </label>
                        <input
                            class="appearence-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-whrite focus:border-gray-500 {{ $errors->has('available_quantity') ? 'focus:outline-none border-red-500' : '' }}"
                            id="grid-available_quantity" wire:model="available_quantity" type="number"
                            value="{{ old('available_quantity') }}"
                            placeholder="Digite a quantidade de exemplares" />

                        @if ($errors->has('available_quantity'))
                            <div class="text-red-500 text-sm">
                                @foreach ($errors->get('available_quantity') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    </div>

                </div>

                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full md:w-2/6 px-3 mb-4 md:mb:0">
                        <button
                            class="appearence-none block bg-green-500 cursor-pointer hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                            id="grid-publication_date" type="submit">Salvar</button>
                    </div>
                </div>

                </div>

            </form>
        </div>
    </div>

</div>
