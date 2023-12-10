<div class="modal fade" id="songModal" tabindex="-1" role="dialog" aria-labelledby="songModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="songModalLabel">Song Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="songModalBody">
                <!-- Song details will be dynamically populated here -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showSongModal(songId) {
        // Fetch song details and populate the modal
        console.log("Test");
        fetch(`/get-song-details/music-brainz/${songId}`)
            .then(response => response.json())
            .then(song => {

                const modalBody = document.getElementById('songModalBody');
                // Populate the modal with song details
                //  Nag add ako ng "style="color: black;" since white yung text pag wala siya
                modalBody.innerHTML = `
                    <img src="${song.cover}" alt="Cover Image" style="width: 100%; height: auto;">
                    <h2 style="color: black;">${song.title}</h2>
                    <p style="color: black;">Artist: ${song.artist}</p>
                    <a href="${song.song_link}" target="_blank">Play</a>
                    <button onclick="likeSong(${song.id})" style="color: black;">Like</button>
                    <button onclick="reportSong(${song.id})" style="color: black;">!</button>
                    <button onclick="addToPlaylist(${song.id})" style="color: black;">+</button>
                `;
                // Show the modal
                $('#songModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching song details:', error);
            });
    }

    function likeSong(songId) {
        // Implement like functionality
        console.log(`Liked song with ID: ${songId}`);
    }

    function reportSong(songId) {
        // Implement report functionality
        console.log(`Reported song with ID: ${songId}`);
    }

    function addToPlaylist(songId) {
        // Implement add to playlist functionality
        console.log(`Added song with ID ${songId} to playlist`);
    }
</script>