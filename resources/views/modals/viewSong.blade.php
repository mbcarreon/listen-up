
<head>
    <style>
    .heart {
        color: #ff0000; 
        cursor: pointer;
    }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
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
    function showSongModal(songId, database) {
        // Fetch song details and populate the modal
        console.log("Test");
        if(database == "listenUp") {
            console.log("This is from ListenUpDatabase");
            fetch(`/get-song-details/listen-up/${songId}`)
                .then(response => response.json())
                .then(song => {
                    const modalBody = document.getElementById('songModalBody');
                    // Populate the modal with song details
                    //  Nag add ako ng "style="color: black;" since white yung text pag wala siya
                    //  Also, invisible yung like button
                    modalBody.innerHTML = `
                        <img src="${song.cover}" alt="Cover Image" style="width: 100%; height: auto;">
                        <h2 style="color: black;">${song.title}</h2>
                        <p style="color: black;">Artist: ${song.artist}</p>
                        <a href="${song.song_link}" target="_blank">Play</a>
                        <button onclick="likeSong('${song.id}', this)">
                            <i class="${song.hasLikedSong ? ' fas' : 'far'} fa-heart heart"></i>
                        </button>
                        <button onclick="reportTrack('${song.id}')" style="color: black;">!</button>
                        <button onclick="addToPlaylist('${song.id}')" style="color: black;">+</button>
                    `;
                    // Show the modal
                    $('#songModal').modal('show');
                })
                .catch(error => {
                    console.error('Error fetching song details:', error);
                });
        } else {
            console.log("This is from MusicBrainz");
            fetch(`/get-song-details/music-brainz/${songId}`)
                .then(response => response.json())
                .then(song => {

                const modalBody = document.getElementById('songModalBody');
                // Populate the modal with song details
                //  Nag add ako ng "style="color: black;" since white yung text pag wala siya
                //  Also, invisible yung like button
                modalBody.innerHTML = `
                    <img src="${song.cover}" alt="Cover Image" style="width: 100%; height: auto;">
                    <h2 style="color: black;">${song.title}</h2>
                    <p style="color: black;">Artist: ${song.artist}</p>
                    <button onclick="likeSong('${song.id}', this)">
                        <i class="${song.hasLikedSong ? ' fas' : 'far'} fa-heart heart"></i>
                    </button>
                    <button onclick="addToPlaylist('${song.id}')" style="color: black;">+</button>
                `;
                // Show the modal
                $('#songModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching song details:', error);
            });
        }
    }

    function likeSong(songId, buttonElement) {
        // Implement like functionality
        console.log(`Liked song with ID: ${songId}`);
        fetch('/like-song', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': @json(csrf_token()), // Include CSRF token if needed
            },
            body: JSON.stringify({
                songId: songId,
            }),
        })
        .then(response => response.json())
        .then(data => {
            const heartIcon = buttonElement.querySelector('.far.fa-heart') 
                || buttonElement.querySelector('.fas.fa-heart') ;
            if (heartIcon) {
                console.log("HeartIcon found");
                heartIcon.classList.toggle('fas');
                heartIcon.classList.toggle('far');
            } else {
                console.log("HeartIcon not found");
            }
            alert(data.message);
        })
        .catch(error => {
            console.error('Error adding song to liked songs:', error);
        });
    }
    
    function reportTrack(songId) {
        // Implement report functionality
        console.log(`Reported track with ID: ${songId}`);
        fetch('/report-track', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': @json(csrf_token()), // Include CSRF token if needed
            },
            body: JSON.stringify({
                songId: songId,
            }),
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.error('Error reporting song:', error);
        });

    }
    function addToPlaylist(songId) {
        // Implement add to playlist functionality
        console.log(`Added song with ID ${songId} to playlist`);
        fetch('/add-to-playlist', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': @json(csrf_token()), // Include CSRF token if needed
            },
            body: JSON.stringify({
                songId: songId,
            }),
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            console.error('Error adding song to playlist:', error);
        });
    }
</script>