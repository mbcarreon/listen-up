<x-app-layout>
    <x-slot name="header">
        <h1>Profile of {{ $user->name }}</h1>
        @if($user->profile_image)
            <p><img src="{{ asset($user->profile_image) }}" alt="Profile Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;"></p>
        @else
            <!-- Default image if no profile image is set -->
            <p><img src="{{ asset('image/profile/default-image.png') }}" alt="Default Profile Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;"></p>
        @endif
        <p>Bio: {{ $user->bio }}</p>
        <p>Location: {{ $user->location }}</p>
        <p>Birthdate: {{ $user->birthdate }}</p>

    </x-slot>
</x-app-layout>