<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Livros') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <x-back />
    @livewire('books.form-books')
  </div>
</x-app-layout>
