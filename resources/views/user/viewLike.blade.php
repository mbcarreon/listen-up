<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
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

            // Call the function to display liked songs on page load
            displayLikedSongs();
        </script>

    </x-slot>
</x-app-layout>