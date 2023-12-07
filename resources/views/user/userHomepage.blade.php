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
        <h1>Welcome, {{ auth()->user()->name }}</h1>
        <p> This homepage will become customized as you follow active members on Listen Up.</p>


        <p>NEW ON LISTEN UP</p>
        <hr>
        <p>POPULAR ON LISTEN UP</p>
        <hr>
        <div class="card1">
			<div class="overlayer">
				<i class="far fa-play-circle"></i>
			</div>
            <img src="{{ asset('image/musicList/jk.jpg') }}" alt="Default Profile Image"
                     style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
			<div class="title1">
            <a href="#"><b>Buwan</b><p>Juan Karlos</p> </a>
			</div>
		</div>

    <div class="card1">
			<div class="overlayer">
				<i class="far fa-play-circle"></i>
			</div>
            <img src="{{ asset('image/musicList/cb.png') }}" alt="Default Profile Image"
                     style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
			<div class="title1">
            <a href="#"><b>Next to you</b><p>Chris Brown</p> </a>
			</div>
		</div>
        <p>LATEST MUSIC</p>
        <hr>
        <p>POPULAR THIS WEEK</p>
        <hr>
        <br>
        <br>
    </x-slot>
</x-app-layout>