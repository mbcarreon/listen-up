<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .name {
            margin-top: -35px;
            margin-left: 44px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #00a93a;
            color:black;
        }


        .card1 {
            position: relative;
            display: inline-block;
            padding-right: 15px;
        }

        .card1:hover .overlayer {
            visibility: visible;
        }

        .card1 img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            object-fit: cover;
        }

        .card1 .title1 {
            position: relative;
            top: 100%;
            left: 0;
            width: 100%;
            padding: 15px;
            text-align: center;
            box-sizing: border-box;
        }

        .card1 .title1 a {
            color: #fff;
            text-decoration: none;
            font-size: 13px;
        }

        .card1 .title1 b {
            font-size: 16px;
            display: block;
        }

        .card1 .title1 p {
            font-size: 12px;
            margin-top: 5px;
        }

        .card1 .overlayer {
            position: absolute;
            top: 0;
            left: 0;
            width: 93%;
            height: 68%;
            visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: rgba(0, 0, 0, 0.6);
            transition: visibility 0.3s ease-in-out;
            border-radius: 50%;
        }

        .card1 .overlayer .fa-play-circle {
            color: #fff;
            font-size: 73px;
            transition: transform 0.3s ease-in-out;
        }

        .card1 .overlayer:hover .fa-play-circle {
            transform: scale(1.1);
        }

        .heart {
            color: #fff; /* Initial color */
            cursor: pointer;
        }

        .heart.clicked {
            color: #ff0000; /* Color when clicked */
        }
    </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<x-app-layout>
    <x-slot name="header">
        <h3>
            @if(auth()->user()->profile_image)
            <img src="{{ asset(auth()->user()->profile_image) }}" alt="Profile Image"
                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
            @else
            <!-- Default image if no profile image is set -->
            <img src="{{ asset('image/profile/default-image.png') }}" alt="Default Profile Image"
                style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
            @endif
            <div class="name">
                {{ auth()->user()->name }}
            </div>
        </h3>

        <div class="form-group">
            <label for="artistNameInput">Enter artist name:</label>
            <input type="text" id="artistNameInput" class="form-control" style="width: 300px;"
                placeholder="Enter artist name">
        </div>

        <button class="btn btn-primary" onclick="searchArtist()">Search</button>
        <br>
        <br>

        @include('modals.viewSong')
        @include('modals.rateSong')

        <p>Popular Music</p>
        <hr style="border-color: white;">

        <div class="card1">
            <a href="#" onclick="showSongModal('0e627f75-4818-40f0-b3c3-a526b0406649','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/buwan.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>Buwan</b>
                    <p>juan carlos</p>
                </div>
            </a>
        </div>

        <div class="card1">
            <a href="#" onclick="showSongModal('4ab59ccd-6afa-4dd4-9430-28c76342be9d','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/next-to-you.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>Next to you</b>
                    <p>Chris Brown</p>
                </div>
            </a>
        </div>

        <div class="card1">
            <a href="#" onclick="showSongModal('c9319bbc-8dec-4c7c-8934-ee234345f705','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/i-like-me-better.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>I Like Me Better</b>
                    <p>Lauv</p>
                </div>
            </a>
        </div>

        <div class="card1">
            <a href="#" onclick="showSongModal('e139bd8d-410c-41c1-967c-a30ee3b444e8','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/butter.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>Butter</b>
                    <p>BTS</p>
                </div>
            </a>
        </div>

        <div class="card1">
            <a href="#" onclick="showSongModal('19b6d048-f981-40e9-8235-a5acf969e5df','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/attention.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>Attention</b>
                    <p>Charlie Puth</p>
                </div>
            </a>
        </div>

        <div id="artistInfo"></div>
        <div id="songList"></div>

    </x-slot>
</x-app-layout>

<script>
    function searchArtist() {
        const artistName = document.getElementById('artistNameInput').value;
        const artistUrl = `https://musicbrainz.org/ws/2/artist/?query=${artistName}&fmt=json`;

        fetch(artistUrl)
            .then(response => response.json())
            .then(artistData => {
                const artists = artistData.artists;

                if (artists.length > 0) {
                    // Display the list of artists in a table
                    const artistTable = `
                        <table>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Type</th>
                                <th>Sort Name</th>
                                <th>Area</th>
                                <th>Action</th>
                            </tr>
                            ${artists.map(artist => `
                                <tr>
                                    <td>${artist.name}</td>
                                    <td>${artist.gender || 'N/A'}</td>
                                    <td>${artist.type || 'N/A'}</td>
                                    <td>${artist.sort_name || 'N/A'}</td>
                                    <td>${artist.area ? artist.area.name : 'N/A'}</td>
                                    <td><a href="#" onclick="showSongs('${artist.id}')">Show Songs</a></td>
                                </tr>
                            `).join('')}
                        </table>
                    `;
                    const artistInfoContainer = document.getElementById('artistInfo');
                    artistInfoContainer.innerHTML = `<h2>Artists:</h2>${artistTable}`;
                } else {
                    const artistInfoContainer = document.getElementById('artistInfo');
                    artistInfoContainer.innerHTML = '<p>No artists found</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching data from MusicBrainz API:', error);
            });
    }

    // This function is called when an artist is clicked to show songs
    function showSongs(artistId) {
        fetch('/get-rated-songs')
        .then(response => response.json())
        .then(data => {
            const ratedSongs = data.ratedSongs || [];
            fetch('/get-liked-songs')
            .then(response => response.json())
            .then(data => {
                const likedSongs = data.likedSongs || [];
                const apiUrl = `https://musicbrainz.org/ws/2/recording/?query=arid:${artistId}&fmt=json`;
                fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // Display songs directly from recordings
                    const songListContainer = document.getElementById('songList');
                    const recordings = data.recordings || [];
                    
                    if (recordings.length > 0) {
                        const songsTable = `
                            <h3>List of Songs:</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Song Name</th>
                                        <th>Like</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${recordings.map(recording => `
                                        <tr>
                                            <td>${recording.title || "Untitled"}</td>
                                            <td>
                                                <button onclick="likeSong('${recording.id}')">
                                                    <i class="fas fa-heart heart${likedSongs[recording.id] ? ' clicked' : ''}" onclick="toggleHeart(this)"></i>
                                                </button>
                                                <button onclick="showRateModal('${recording.id}', this)">
                                                    <i class="${ratedSongs[recording.id] ? 'fas' : 'far'} fa-star"></i>
                                                </button>
                                                <button onclick="addToPlaylist('${recording.id}')">
                                                    +
                                                </button>
                                            </td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        `;
                        songListContainer.innerHTML = songsTable;
                    } else {
                        songListContainer.innerHTML = '<p>No songs found for this artist</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching data from MusicBrainz API:', error);
                });
            })
            .catch(error => {
                console.error('Error fetching liked songs:', error);
            });
        })
        .catch(error => {
            console.error('Error fetching liked songs:', error);
        });
    }

    function likeSong(songId) {
        // Send an AJAX request to the server
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
            alert(data.message);
        })
        .catch(error => {
            console.error('Error adding song to liked songs:', error);
        });
    }

    function toggleHeart(element) {
        element.classList.toggle('clicked');
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

</html>