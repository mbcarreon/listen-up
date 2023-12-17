<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
        @if(auth()->user()->profile_image)
        <img src="{{ asset(auth()->user()->profile_image) }}" alt="Profile Image"
            style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
        @else
        <!-- Default image if no profile image is set -->
        <img src="{{ asset('image/profile/default-image.png') }}" alt="Default Profile Image"
            style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
        @endif
        <h3>Name: {{ auth()->user()->name }}</h3>
        <p>Bio: {{ auth()->user()->bio }}</p>
        <p>Location: {{ auth()->user()->location }}</p>
        <p>Birthdate: {{ auth()->user()->birthdate }}</p>

        <a onClick="update()" href="javascript:void(0)" class="btn btn-info">Set up Profile</a>
        </td>

        <div>
            <!-- Modal -->
            <div class="modal fade" id="set-up-profile" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content border border-white" style="background-color: black;">
                        <div class="modal-header">
                            <h1 class="modal-title">Set up Profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('user.update-profile') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="bio" name="bio">
                                        @error('bio')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="location" name="location">
                                        @error('location')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="birthdate" class="col-sm-2 col-form-label">Birth date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="birthdate" name="birthdate">
                                        @error('birthdate')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="profile_image" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="profile_image" name="profile_image">
                                        @error('profile_image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <p>RECENT LIKES</p>
        <hr style="border-color: white;">
        <ul id="likedSongsList" style="white-space: nowrap; overflow-x: auto;"></ul>

        @include('modals.viewSong')

        <script type="text/javascript">
            function displayLikedSongs() {
                fetch('/get-liked-songs')
                    .then(response => response.json())
                    .then(data => {
                        const likedSongsList = document.getElementById('likedSongsList');
                        const likedSongs = data.likedSongs || {};

                        if (Object.keys(likedSongs).length > 0) {
                            likedSongsList.innerHTML =
                                `<h3>Liked Songs</h3>
                                <ul>
                                    ${Object.values(likedSongs).map(song => 
                                        `<a href="#" onclick="showSongModal('${song.id}'); return false;">
                                            <li style="display: inline-block; margin-right: 10px;"> 
                                                <img src="http://coverartarchive.org/release/${song.releaseId}/front" alt="Default Profile Image" style="width: 150px; height: 150px; border-radius: 5px 5px 0 0; object-fit: cover;">
                                                ${song.title} 
                                            </li>
                                        </a>`).join('')}
                                </ul>`;
                        } else {
                            likedSongsList.innerHTML = '<p>No liked songs found</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching liked songs:', error);
                    });
            }

            function update() {
                    $('#name').val('{{ auth()->user()->name }}');
                    $('#bio').val('{{ auth()->user()->bio }}');
                    $('#location').val('{{ auth()->user()->location }}');
                    $('#birthdate').val('{{ auth()->user()->birthdate }}');
                    $('#set-up-profile').modal('show');
                }

            // Call the function to display liked songs on page load
            displayLikedSongs();
        </script>


    </x-slot>
</x-app-layout>