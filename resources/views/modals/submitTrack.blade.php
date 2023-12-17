<div class="modal fade" id="addTrackModal" tabindex="-1" role="dialog" aria-labelledby="addTrackModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTrackModalLabel">Add Track</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" id="addTrackForm">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="form-group">
                        <label for="artist">Artist</label>
                        <input type="text" class="form-control" id="artist" name="artist" required>
                    </div>

                    <div class="form-group">
                        <label for="album">Album</label>
                        <input type="text" class="form-control" id="album" name="album">
                    </div>

                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country">
                    </div>

                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input type="text" class="form-control" id="genre" name="genre">
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration">
                    </div>

                    <div class="form-group">
                        <label for="cover">Cover Picture</label>
                        <input type="file" class="form-control-file" id="cover" name="cover" accept="image/*" required>
                    </div>

                    <div class="form-group">
                        <label for="song_link">Song Link</label>
                        <input type="text" class="form-control" id="song_link" name="song_link" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function submitTrack() {
        console.log("submitTrack has been triggered..");
        const formData = new FormData(document.getElementById('addTrackForm'));

        fetch('{{ route("tracks.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (confirm(data.message) || !confirm(data.message)) {
                document.getElementById('addTrackForm').reset();
                $('#addTrackModal').modal('hide');
            }
        })
        .catch(error => {
            console.error('Error submitting track:', error);
        });
    }

    document.getElementById('addTrackForm').addEventListener('submit', function(event) {
        event.preventDefault();
        submitTrack();
    });
</script>
