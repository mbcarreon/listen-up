<x-app-layout>
    <x-slot name="header">
        <h3> Music lovers, critics and friends — find popular members.</h3>
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