<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="songModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="songModalLabel">Song Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="reportModalBody">
                <!-- Song details will be dynamically populated here -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showReportModal(songId) {
        // Fetch song details and populate the modal
        console.log("showReportModal is triggered");
        fetch(`/get-song-details/listen-up/${songId}`)
            .then(response => response.json())
            .then(song => {
                const modalBody = document.getElementById('reportModalBody');
                // Populate the modal with song details
                //  Nag add ako ng "style="color: black;" since white yung text pag wala siya
                //  Also, invisible yung like button
                modalBody.innerHTML = `
                    <h1 style="color: black;">REPORTED TRACK</h1>
                    <img src="/${song.cover}" alt="Cover Image" style="width: 100%; height: auto;">
                    <h2 style="color: black;">${song.title}</h2>
                    <p style="color: black;">Artist: ${song.artist}</p>
                    <p style="color: black;">Album: ${song.album}</p>
                    <p style="color: black;">Duration: ${song.duration}</p>
                    <p style="color: black;">Genre: ${song.genre}</p>
                    <p style="color: black;">Country: ${song.country}</p>
                    <button onclick="deleteTrack('${songId}')" style="background-color: #dc3545; color: #fff; border: none; padding: 10px 20px; cursor: pointer; margin-right: 10px;">Delete Track</button>
                    <button onclick="resolveTrack('${songId}')" style="background-color: #28a745; color: #fff; border: none; padding: 10px 20px; cursor: pointer;">Mark as Resolved</button>
                `;
                // Show the modal
                $('#reportModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching song details:', error);
            });
    }
    function deleteTrack(songId) {
        console.log(`Delete track with ID: ${songId}`);
        fetch('/delete-track', {
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
            console.error('Error deleting song:', error);
        });

    }
    function resolveTrack(songId) {
        console.log(`Resolve track with ID: ${songId}`);
        fetch('/resolve-track', {
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
            console.error('Error resolving song:', error);
        });

    }
</script>