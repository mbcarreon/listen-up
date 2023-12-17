<head>
    <link href='https://fonts.googleapis.com/css?family=MuseoModerno' rel='stylesheet'>
    <style>
        .titleName h1{
            font-family: 'MuseoModerno';
            margin-top: -140px;
            margin-left: 250px;
            font-size: 70px;
        }
        .subName h6 {
            font-family: 'MuseoModerno';
            margin-top: 5px;
            margin-left: 258px;
            font-size: 20px;
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
        <div class="subName">
            <h6>admin</h6>
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


        @include('modals.viewSong')

 
        <p>SUBMITTED TRACKS</p>
        <hr style="border-color: white;">

        
        <p>POPULAR</p>
        <hr style="border-color: white;">

        <div class="card1">
            <a href="#" onclick="showSongModal('0e627f75-4818-40f0-b3c3-a526b0406649'); return false;">
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
            <a href="#" onclick="showSongModal('4ab59ccd-6afa-4dd4-9430-28c76342be9d'); return false;">
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
            <a href="#" onclick="showSongModal('c9319bbc-8dec-4c7c-8934-ee234345f705'); return false;">
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
            <a href="#" onclick="showSongModal('e139bd8d-410c-41c1-967c-a30ee3b444e8'); return false;">
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
            <a href="#" onclick="showSongModal('19b6d048-f981-40e9-8235-a5acf969e5df'); return false;">
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
        <br>
        <br>
    </x-slot>
</x-app-layout>