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
        <p>RECENT RATINGS</p>
        <hr style="border-color: white;">
        <ul id="ratedSongsList" style="white-space: nowrap; overflow-x: auto;"></ul>

        @include('modals.viewSong')

        <script type="text/javascript">
            function displayRatedSongs() {
                fetch('/get-rated-songs')
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
                                                <img src="http://coverartarchive.org/release/${song.releaseId}/front" alt="Default Profile Image" style="width: 150px; height: 150px; border-radius: 5px 5px 0 0; object-fit: cover;">
                                                ${song.title} 
                                            </li>
                                        </a>`).join('')}
                                </ul>`;
                        } else {
                            ratedSongsList.innerHTML = '<p>No rated songs found</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching rated songs:', error);
                    });
            }

            // Call the function to display rated songs on page load
            displayRatedSongs();
        </script>

    </x-slot>
</x-app-layout>