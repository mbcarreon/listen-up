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
        <p>Bio: {{ auth()->user()->bio }}</p>
        <p>Location: {{ auth()->user()->location }}</p>
        <p>Birthdate: {{ auth()->user()->birthdate }}</p>
        <a href="/user/profile">Set up your profile</a>
        <br>
        <br>

        <div class="card">
            <div class="card-header">
                Visit other users' profiles
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <!-- Remove the <th> for Id -->
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp

                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <a href="{{ route('user.show', ['id' => $user->id]) }}">
                                    @if ($user->profile_image)
                                        <img src="{{ asset($user->profile_image) }}" alt="Profile Image"
                                             style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
                                    @else
                                        <!-- Default image if no profile image is set for this user -->
                                        <img src="{{ asset('image/profile/default-image.png') }}" alt="Default Profile Image"
                                             style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
                                    @endif
                                    {{ $user->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>