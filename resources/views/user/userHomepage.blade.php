<x-app-layout>
    <x-slot name="header">
        <h1>Welcome, {{ auth()->user()->name }}</h1>
        <p><img src="{{ asset(auth()->user()->profile_image) }}" alt="Profile Image" style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;"></p>
        <p>Bio: {{ auth()->user()->bio }}</p>
        <p>Location: {{ auth()->user()->location }}</p>
        <p>Birthdate: {{ auth()->user()->birthdate }}</p>


        <div class="card">
            <div class="card-header">
                Other users
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
                        <!-- Remove the <th> and <td> for Id -->
                        <td><a href="#">{{$user->name}}</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>