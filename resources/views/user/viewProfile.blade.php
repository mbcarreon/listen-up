<x-app-layout>
    <x-slot name="header">
        <h1>Profile of {{ $user->name }}</h1>
        <p><img src="{{ asset($user->profile_image) }}" alt="Profile Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;"></p>
        <p>Bio: {{ $user->bio }}</p>
        <p>Location: {{ $user->location }}</p>
        <p>Birthdate: {{ $user->birthdate }}</p>

        <h5>List of {{$user->name}} Favorite Songs: </h5>
        <p>Song 1</p>
        <p>Song 1</p>
        <p>Song 1</p>
        <p>Song 1</p>
        <p>Song 1</p>
    </x-slot>
</x-app-layout>