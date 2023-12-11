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
    let userRating = 0;
    let btnElement;

    function showRateModal(songId, element) {
        if(element) {
            btnElement = element;
        }
        // Fetch song details and populate the modal
        console.log("showRateModal is triggered");
        fetch(`/get-song-details/music-brainz/${songId}`)
            .then(response => response.json())
            .then(song => {

                const modalBody = document.getElementById('songModalBody');
                // Populate the modal with song details
                //  Nag add ako ng "style="color: black;" since white yung text pag wala siya
                //  Also, invisible yung like button
                modalBody.innerHTML = `
                    <h1 style="color: black;">RATE SONG</h1>
                    <img src="${song.cover}" alt="Cover Image" style="width: 100%; height: auto;">
                    <h2 style="color: black;">${song.title}</h2>
                    <p style="color: black;">Artist: ${song.artist}</p>
                    <p style="color: black;">Album: ${song.album}</p>
                    <p style="color: black;">Duration: ${song.duration}</p>
                    <p style="color: black;">Genre: ${song.genre}</p>
                    <p style="color: black;">Country: ${song.country}</p>
                    <div>
                        <p style="color: black;">Rate the song:</p>
                        <div id="ratingStars">
                            <span class="star" onclick="rateSong(1)" style="color: black;">&#9733;</span>
                            <span class="star" onclick="rateSong(2)" style="color: black;">&#9733;</span>
                            <span class="star" onclick="rateSong(3)" style="color: black;">&#9733;</span>
                            <span class="star" onclick="rateSong(4)" style="color: black;">&#9733;</span>
                            <span class="star" onclick="rateSong(5)" style="color: black;">&#9733;</span>
                        </div>
                    </div>
                    <button onclick="submitRating('${songId}')" style="color: black;">Submit</button>
                `;
                // Show the modal
                $('#songModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching song details:', error);
            });
    }

    function rateSong(stars) {
        userRating = stars;
        highlightStars(stars);
    }

    function highlightStars(stars) {
        const starElements = document.getElementsByClassName("star");
        for (let i = 0; i < starElements.length; i++) {
            if (i < stars) {
                starElements[i].style.color = "gold";
            } else {
                starElements[i].style.color = "black";
            }
        }
    }

    function submitRating(songId) {
        // Implement like functionality
        console.log(`Rate song with ID: ${songId}`);
        console.log(`Rating: ${userRating}`);
        if (0 < userRating && userRating <= 5) {
            fetch('/rate-song', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': @json(csrf_token()), // Include CSRF token if needed
                },
                body: JSON.stringify({
                    songId: songId,
                    rating: userRating,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if(btnElement) {
                    // Get the child 'i' element within btnElement
                    const iconElement = btnElement.querySelector('i');

                    // Toggle 'far' and 'fas' classes on the iconElement
                    iconElement.classList.remove('far');
                    iconElement.classList.add('fas');
                }
                alert(data.message);
            })
            .catch(error => {
                console.error('Error adding song to liked songs:', error);
            });
        } else {
            alert("Kindly provide your rating on a scale of 1 to 5 stars for the song.");
        }
    }
    

    // Resets the userRating to 0 when closing the modal
    $(document).ready(function () {
        $('#songModal').on('hidden.bs.modal', function () {
            // Reset userRating to 0 when the modal is closed
            userRating = 0;
            rateSong(userRating);
        });
    });
</script>