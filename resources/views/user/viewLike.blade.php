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

        <br>
        <p>RECENT LIKES</p>
        <hr style="border-color: white;">
        <ul id="likedSongsList" style="white-space: nowrap; overflow-x: auto;"></ul>

        <script type="text/javascript">
            function displayLikedSongs() {
                fetch('/get-liked-songs')
                    .then(response => response.json())
                    .then(data => {
                        const likedSongsList = document.getElementById('likedSongsList');
                        const likedSongs = data.likedSongs || [];

                        if (likedSongs.length > 0) {
                            likedSongsList.innerHTML = `<h3></h3><ul>${likedSongs.map(song => `<li style="display: inline-block; margin-right: 10px;"> <img src="{{ asset('image/like/unknown.jpg') }}" alt="Default Profile Image"
            style="width: 150px; height: 150px; border-radius: 5px 5px 0 0; object-fit: cover;">${song} </li>`).join('')}</ul>`;
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