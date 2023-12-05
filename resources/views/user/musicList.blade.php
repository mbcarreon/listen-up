
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music List') }}
        </h1>

<h3> Here is the list of your music, {{ auth()->user()->name }}</h3>

<p> Songs 1 </p>
<p> Songs 1 </p>
<p> Songs 1 </p>
<p> Songs 1 </p>
<p> Songs 1 </p>

    </x-slot>

</x-app-layout>