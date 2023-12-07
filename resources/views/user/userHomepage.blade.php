<x-app-layout>
    <x-slot name="header">
        <h1>Welcome, {{ auth()->user()->name }}</h1>
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

        
        <br>
        <br>
    </x-slot>
</x-app-layout>