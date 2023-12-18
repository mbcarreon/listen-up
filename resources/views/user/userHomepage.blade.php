<head>
    <link href='https://fonts.googleapis.com/css?family=MuseoModerno' rel='stylesheet'>
    <style>
        .titleName h1 {
            font-family: 'MuseoModerno';
            margin-top: -140px;
            margin-left: 250px;
            font-size: 70px;
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
            padding-right: 30px;
        }

        .card1:hover .overlayer {
            visibility: visible;
        }

        .card1:hover .overlayer1 {
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
            border-radius: 5px 5px 0 0;
        }

        .card1 .overlayer1 {
            position: absolute;
            top: 0;
            left: 0;
            width: 87%;
            height: 80%;
            visibility: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: rgba(0, 0, 0, 0.6);
            transition: visibility 0.3s ease-in-out;
            border-radius: 60%;
        }

        .card1 .overlayer .fa-play-circle {
            color: #fff;
            font-size: 73px;
            transition: transform 0.3s ease-in-out;
        }

        .card1 .overlayer:hover .fa-play-circle {
            transform: scale(1.1);
        }

        .card1 .overlayer1 .fa-play-circle {
            color: #fff;
            font-size: 60px;
            transition: transform 0.3s ease-in-out;
        }

        .card1 .overlayer1:hover .fa-play-circle {
            transform: scale(1.1);
        }
        .modal-content .form-group {
            color: #000;
        }
            
        .paragraph-container {
        position: relative;
        }

        .link-at-right {
        position: absolute;
        top: 0;
        right: 0;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<x-app-layout>
    <x-slot name="header">
        @include('modals.submitTrack')
        <p>
            @if (auth()->user()->profile_image)
            <img src="{{ asset(auth()->user()->profile_image) }}" alt="Profile Image"
                style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
            @else
            <!-- Default image if no profile image is set -->
            <img src="{{ asset('image/profile/default-image.png') }}" alt="Default Profile Image"
                style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
            @endif
        </p>
        <div class="titleName">
            <h1>Welcome, {{ auth()->user()->name }}</h1>
        </div>
        <br>
        <br>
        <br>
        <br>


        <p>WHAT TO DO?</p>
        <hr style="border-color: white;">
        <div class="card1">
            <div class="overlayer1">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/homepage/music.jpg') }}" alt="Default Profile Image"
                style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="/user/musicList"><b>Discover Music</b> </a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer1">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/homepage/users.jpg') }}" alt="Default Profile Image"
                style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="user/membersList"><b>Discover Users</b></a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer1">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/homepage/submit.jpg') }}" alt="Default Profile Image"
                style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
            <button type="button" class="title1" data-toggle="modal" data-target="#addTrackModal">
                <b>Submit Tracks</b>
            </button>
        </div>

        <div class="card1">
            <div class="overlayer1">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/homepage/playlist.jpg') }}" alt="Default Profile Image"
                style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="user/viewPlaylist"><b>View Playlist</b></a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer1">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/homepage/like.jpg') }}" alt="Default Profile Image"
                style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="user/viewLike"><b>View Likes</b></a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer1">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/homepage/submit.jpg') }}" alt="Default Profile Image"
                style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="user/viewRating"><b>View Rated Tracks</b></a>
            </div>
        </div>

        @include('modals.viewSong')

        <div class="paragraph-container">
            <p>SUBMITTED TRACKS <a href="/user/viewTracks" class="link-at-right">See All</a></p>
            <hr style="border-color: white;">
        </div>
        
        <div id="trackList"></div>

        <p>POPULAR</p>
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
        

        <p>NEW RELEASES</p>
        <hr style="border-color: white;">
        <div class="card1">
            <a href="#" onclick="showSongModal('21883f29-b8aa-4d56-a3c9-a2ed44550bce','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/raining-in-manila.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>Raining in Manila</b>
                    <p>Lola Amour</p>
                </div>
            </a>
        </div>

        <div class="card1">
            <a href="#" onclick="showSongModal('92a2bfc3-a633-4d7f-b496-f81b0fe0071d','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/3d.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>3D</b>
                    <p>Jung Kook</p>
                </div>
            </a>
        </div>

        <div class="card1">
            <a href="#" onclick="showSongModal('11621eae-b333-4597-b944-4fd99ada3c6f','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/american-town.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>American Town</b>
                    <p>Ed Sheeran</p>
                </div>
            </a>
        </div>

        <div class="card1">
            <a href="#" onclick="showSongModal('a219e5fe-eac4-4aec-ab6d-ff2b81481e97','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/711.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>711</b>
                    <p>TONEEJAY</p>
                </div>
            </a>
        </div>

        <div class="card1">
            <a href="#" onclick="showSongModal('8f667b90-a2a4-46ea-8806-e957ea78c7bd','musicBrainz'); return false;">
                <div class="overlayer">
                    <i class="far fa-play-circle"></i>
                </div>
                <img src="{{ asset('image/musicList/my-love-mine-all-mine.jpg') }}" alt="Default Profile Image"
                    style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                <div class="title1">
                    <b>My Love Mine All Mine</b>
                    <p>Mitski</p>
                </div>
            </a>
        </div>
        <br>
        <br>
        <script type="text/javascript">
            function showHomepageTracks() {
                fetch('/tracks/homepage')
                    .then(response => response.json())
                    .then(data => {
                        console.log("Testingggg");
                        const trackList = document.getElementById('trackList');
                        const tracks = data.tracks.data || {};
                        console.log(tracks);

                        if (Object.keys(tracks).length > 0) {
                            trackList.innerHTML =
                                `${Object.values(tracks).map(track => 
                                    `<div class="card1">
                                        <a href="#" onclick="showSongModal('${track.id}', 'listenUp'); return false;">
                                            <div class="overlayer">
                                                <i class="far fa-play-circle"></i>
                                            </div>
                                            <img src="{{ asset('${track.cover}') }}" alt="Default Profile Image" onerror="this.src='{{ asset('image/DefaultSongCover.png') }}';";
                                                style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
                                            <div class="title1">
                                                <b>${track.title}</b>
                                                <p>${track.artist}</p>
                                            </div>
                                        </a>
                                    </div>`).join('')}`;
                        } else {
                            trackList.innerHTML = '<p>No songs in submitted tracks found</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching tracks:', error);
                    });
            }

            // Call the function to display liked songs on page load
            console.log("Testing");
            showHomepageTracks();
        </script>
    </x-slot>
</x-app-layout>