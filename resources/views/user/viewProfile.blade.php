<x-app-layout>
    <x-slot name="header">
        <h1>Profile of {{ $user->name }}</h1>
        @if($user->profile_image)
        <p><img src="{{ asset($user->profile_image) }}" alt="Profile Image"
                style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;"></p>
        @else
        <!-- Default image if no profile image is set -->
        <p><img src="{{ asset('image/profile/default-image.png') }}" alt="Default Profile Image"
                style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover;"></p>
        @endif
        <p>Bio: {{ $user->bio }}</p>
        <p>Location: {{ $user->location }}</p>
        <p>Birthdate: {{ $user->birthdate }}</p>

        @if(auth()->user()->isAdmin() && !$user->isAdmin())
        <form method="POST" action="{{ route('make-admin', ['user' => $user->id]) }}">
            @csrf
            <button type="submit" class="btn" style="background-color: #aed581; color: #000;">Make Admin</button>
        </form>
        @endif
        <br> <br>
        <ul id="playlistList" style="white-space: nowrap; overflow-x: auto;"></ul>
        <ul id="likedSongsList" style="white-space: nowrap; overflow-x: auto;"></ul>
        <ul id="ratedSongsList" style="white-space: nowrap; overflow-x: auto;"></ul>

        @include('modals.viewSong')

        <script type="text/javascript">
            function displayPlaylist() {
                fetch('/get-playlist/' + {{$user->id}})
                    .then(response => response.json())
                    .then(data => {
                        const playlistList = document.getElementById('playlistList');
                        const playlist = data.playlist || {};

                        if (Object.keys(playlist).length > 0) {
                            playlistList.innerHTML =
                            `<h3>Playlist Name: {{ $user->playlist_name }} </h3>
                                <ul>
                                    ${Object.values(playlist).map(song => 
                                        `<a href="#" onclick="showSongModal('${song.id}'); return false;">
                                            <li style="display: inline-block; margin-right: 10px;"> 
                                                <img src="http://coverartarchive.org/release/${song.releaseId}/front" alt="Default Profile Image" onerror="this.src='{{ asset('image/DefaultSongCover.png') }}';"; style="width: 150px; height: 150px; border-radius: 5px 5px 0 0; object-fit: cover;">
                                                ${song.title} 
                                            </li>
                                        </a>`).join('')}
                                </ul>`;
                        } else {
                            playlistList.innerHTML = '<h3>Playlist</h3><ul>No songs in playlist found</ul>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching playlist:', error);
                    });
            }
            function displayLikedSongs() {
                fetch('/get-liked-songs/' + {{$user->id}})
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
                                                <img src="http://coverartarchive.org/release/${song.releaseId}/front" alt="Default Profile Image" onerror="this.src='{{ asset('image/DefaultSongCover.png') }}';"; style="width: 150px; height: 150px; border-radius: 5px 5px 0 0; object-fit: cover;">
                                                ${song.title} 
                                            </li>
                                        </a>`).join('')}
                                </ul>`;
                        } else {
                            likedSongsList.innerHTML = '<h3>Liked Songs</h3><ul>No liked songs found</ul>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching liked songs:', error);
                    });
            }
            function displayRatedSongs() {
                fetch('/get-rated-songs/' + {{$user->id}})
                    .then(response => response.json())
                    .then(data => {
                        const ratedSongsList = document.getElementById('ratedSongsList');
                        const ratedSongs = data.ratedSongs || {};

                        if (Object.keys(ratedSongs).length > 0) {
                            ratedSongsList.innerHTML =
                                `<h3>Rated Songs</h3>
                                <ul>
                                    ${Object.values(ratedSongs).map(song => 
                                        `<a href="#" onclick="showSongModal('${song.id}'); return false;">
                                            <li style="display: inline-block; margin-right: 10px;"> 
                                                <img src="http://coverartarchive.org/release/${song.releaseId}/front" alt="Default Profile Image" onerror="this.src='{{ asset('image/DefaultSongCover.png') }}';"; style="width: 150px; height: 150px; border-radius: 5px 5px 0 0; object-fit: cover;">
                                                ${song.title} 
                                            </li>
                                        </a>`).join('')}
                                </ul>`;
                        } else {
                            ratedSongsList.innerHTML = '<h3>Rated Songs</h3><p>No rated songs found</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching rated songs:', error);
                    });
            }
            displayPlaylist();
            displayLikedSongs();
            displayRatedSongs();
        </script>
    </x-slot>
</x-app-layout>