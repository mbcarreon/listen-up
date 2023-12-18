<x-app-layout>
    <x-slot name="header">
        <p>All Tracks</p>
        <hr style="border-color: white;">
        <ul id="allTracksList" style="white-space: nowrap; overflow-x: auto;"></ul>


        @include('modals.viewSong')

        <script type="text/javascript">
            function displayAllTracks() {
                fetch('/tracks/all')
                    .then(response => response.json())
                    .then(data => {
                        console.log(JSON.stringify(data.tracks, null,2));
                        const allTracksList = document.getElementById('allTracksList');
                        const tracks = data.tracks || {};

                        if (Object.keys(tracks).length > 0) {
                            allTracksList.innerHTML =
                                `<ul>
                                    ${Object.values(tracks).map(song => `
                                        <a href="#" onclick="showSongModal('${song.id}', 'listenUp'); return false;">
                                            <li style="display: inline-block; margin-right: 10px;"> 
                                                <img src="/${song.cover}" alt="Default Profile Image" onerror="this.src='{{ asset('image/DefaultSongCover.png') }}';"; style="width: 150px; height: 150px; border-radius: 5px 5px 0 0; object-fit: cover;">
                                                ${song.title} 
                                            </li>
                                        </a>`).join('')}
                                </ul>`;
                        } else {
                            allTracksList.innerHTML = '<ul>There are no submitted tracks</ul>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching reported tracks:', error);
                    });
            }
            displayAllTracks();
        </script>
    </x-slot>

</x-app-layout>