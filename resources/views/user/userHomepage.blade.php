<x-app-layout>
    <x-slot name="header">
    <p>
            @if (auth()->user()->profile_image)
                <img src="{{ asset(auth()->user()->profile_image) }}" alt="Profile Image"
                     style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
            @else
                <!-- Default image if no profile image is set -->
                <img src="{{ asset('image/profile/default-image.png') }}" alt="Default Profile Image"
                     style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
            @endif
    </p>
        <h1>Welcome, {{ auth()->user()->name }}</h1>
        <p> This homepage will become customized as you follow active members on Listen Up.</p>


        <p>NEW ON LISTEN UP</p>
        <hr>
        <p>POPULAR ON LISTEN UP</p>
        <hr>
        <p>LATEST MUSIC</p>
        <hr>
        <p>POPULAR THIS WEEK</p>
        <hr>
        <br>
        <br>
    </x-slot>
</x-app-layout>