<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Playlist') }}
        </h2>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        @if(auth()->user()->profile_image)
        <img src="{{ asset(auth()->user()->profile_image) }}" alt="Profile Image"
            style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
        @else
        <!-- Default image if no profile image is set -->
        <img src="{{ asset('image/profile/default-image.png') }}" alt="Default Profile Image"
            style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;">
        @endif

        <br>
        <a onClick="update()" href="javascript:void(0)" class="btn btn-info">Edit Playlist Name</a>
        <hr style="border-color: white;">
        <ul id="playlistList" style="white-space: nowrap; overflow-x: auto;"></ul>
        <div class="modal fade" id="playlist_name" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content border border-white" style="background-color: black;">
                        <div class="modal-header">
                            <h1 class="modal-title">Edit Playlist Name</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('user.update-playlist_name') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="playlist_name" class="col-sm-2 col-form-label">Playlist Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="playlist_name" name="playlist_name" required>
                                        @error('playlist_name')
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

        @include('modals.viewSong')

        <script type="text/javascript">
            function displayPlaylist() {
                fetch('/get-playlist')
                    .then(response => response.json())
                    .then(data => {
                        const playlistList = document.getElementById('playlistList');
                        const playlist = data.playlist || {};

                        if (Object.keys(playlist).length > 0) {
                            playlistList.innerHTML =
                                `<h3>Playlist Name: {{ auth()->user()->playlist_name }} </h3>
                                <ul>
                                    ${Object.values(playlist).map(song => 
                                        `<a href="#" onclick="showSongModal('${song.id}','musicBrainz'); return false;">
                                            <li style="display: inline-block; margin-right: 10px;"> 
                                                <img src="http://coverartarchive.org/release/${song.releaseId}/front" alt="Default Profile Image" style="width: 150px; height: 150px; border-radius: 5px 5px 0 0; object-fit: cover;">
                                                ${song.title} 
                                            </li>
                                        </a>`).join('')}
                                </ul>`;
                        } else {
                            playlistList.innerHTML = '<p>No songs in playlist found</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching playlist:', error);
                    });
            }

            // Call the function to display liked songs on page load
            displayPlaylist();

            function update() {
                    $('#playlist_name').val('{{ auth()->user()->playlist_name}}');
                    $('#playlist_name').modal('show');
                }

            // Call the function to display liked songs on page load
            displayLikedSongs();
        </script>

        

    </x-slot>
</x-app-layout>