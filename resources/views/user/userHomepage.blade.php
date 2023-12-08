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
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<x-app-layout>
    <x-slot name="header">
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
            <div class="title1">
                <a href="#"><b>Submit Tracks</b></a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer1">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/homepage/playlist.jpg') }}" alt="Default Profile Image"
                style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="#"><b>View Playlist</b></a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer1">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/homepage/like.jpg') }}" alt="Default Profile Image"
                style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="#"><b>View Likes</b></a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer1">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/homepage/submit.jpg') }}" alt="Default Profile Image"
                style="width: 160px; height: 160px; border-radius: 50%; object-fit: cover;">
            <div class="title1">
                <a href="#"><b>View Rated Tracks</b></a>
            </div>
        </div>


        <p>FEATURED TRACKS</p>
        <hr style="border-color: white;">
        <div class="card1">
            <div class="overlayer">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/musicList/jk.jpg') }}" alt="Default Profile Image"
                style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
            <div class="title1">
                <a href="https://www.youtube.com/watch?v=KK3tIclJ140" target="_blank"><b>Buwan</b>
                    <p>Juan Karlos</p>
                </a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/musicList/cb.png') }}" alt="Default Profile Image"
                style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
            <div class="title1">
                <a href="#"><b>Next to you</b>
                    <p>Chris Brown</p>
                </a>
            </div>
        </div>

        <div class="card1">
            <div class="overlayer">
                <i class="far fa-play-circle"></i>
            </div>
            <img src="{{ asset('image/musicList/jk.jpg') }}" alt="Default Profile Image"
                style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
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
                style="width: 200px; height: 200px; border-radius: 5px 5px 0 0; object-fit: cover;">
            <div class="title1">
                <a href="#"><b>Next to you</b>
                    <p>Chris Brown</p>
                </a>
            </div>
        </div>
        <p>LATEST MUSIC</p>
        <hr style="border-color: white;">
        <p>POPULAR THIS WEEK</p>
        <hr style="border-color: white;">
        <br>
        <br>
    </x-slot>
</x-app-layout>