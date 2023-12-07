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
            background-color: #f2f2f2;
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
            color: #000;
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
    </style>
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

        <p>Popular Music</p>
        <hr>

        <div class="card1">
            <div class="overlayer">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/musicList/jk.jpg') }}" alt="Default Profile Image"
                style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="#"><b>Buwan</b>
                    <p>Juan Karlos</p>
                </a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/musicList/cb.png') }}" alt="Default Profile Image"
                style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="#"><b>Next to you</b>
                    <p>Chris Brown</p>
                </a>
            </div>
        </div>

        <div id="artistInfo"></div>
        <div id="songList"></div>

    </x-slot>

    <!-- Include JavaScript at the end of the body to ensure DOM elements are available -->
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
        const apiUrl = `https://musicbrainz.org/ws/2/recording/?query=arid:${artistId}&fmt=json`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                // Display songs directly from recordings
                const songListContainer = document.getElementById('songList');
                const recordings = data.recordings || [];
                if (recordings.length > 0) {
                    const songsList = recordings.map(recording => recording.title || "Untitled");
                    console.log("Songs:", songsList);
                    songListContainer.innerHTML = `<h3>List of Songs:</h3><ul>${songsList.map(song => `
            <li>
                ${song}
                <button class ="btn btn-sucess" onclick="likeSong('${song}')">Like</button>
            </li>`).join('')}</ul>`;
                } else {
                    songListContainer.innerHTML = '<p>No songs found for this artist</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching data from MusicBrainz API:', error);
            });
    }


</script>

</html>