<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0e1313" />
    <link rel="manifest" href="./manifest.json">
    <link rel="shortcut icon" href="./public/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="./public/apple-touch-icon.png">

    <title id="title">ListenUP</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        /* COMMON */
        section {
            height: auto;
            width: 100%;
            padding-top: 20rem;
            padding-bottom: 20rem;
        }

        .container {
            max-width: 1050px;
            margin: auto;
            padding: 0px 0px;
        }

        .row {
            display: flex;
            gap: 20px;
        }

        .left-col {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin: auto;
        }

        .right-col {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin: auto;
        }

        /* CUSTOM SCROLLBAR */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #fff;
        }

        ::-webkit-scrollbar-thumb {
            background: #0e1313;
        }

        /* LOADER */
        #loading {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #fff url(../assets/Image/loading.gif) no-repeat center;
            z-index: 999;
        }

        html {
            font-size: 62.5%;
            scroll-behavior: smooth;
        }

        /* MOVE TO TOP */
        #moveTopBtn {
            height: 4.5rem;
            width: 4.2rem;
            display: none;
            position: fixed;
            bottom: 4rem;
            right: 3rem;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #000080;
            color: #fff;
            cursor: pointer;
            padding: auto;
            border-radius: .4rem;
            font-size: 2.5rem;
        }

        /* NAVBAR */
        .content {
            max-width: 1250px;
            margin: auto;
            padding: 0px 30px;
        }

        .navbar {
            position: fixed;
            z-index: 5;
            width: 100%;
            padding: 25px 0;
            transition: all 0.3s ease;
        }

        .navbar.sticky {
            padding: 10px 0;
            background: linear-gradient(90deg, #bde1df 30%, #111 70%);
            box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.1);
        }

        .navbar .content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .logo a {
            color: #fff;
            font-size: 30px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar .menu-list {
            display: inline-flex;
            gap: 2rem;
        }

        .menu-list li {
            list-style: none;
        }

        .menu-list li a {
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .menu-list li a:hover {
            color: #0e1313;
        }

        .active-menu-list {
            border-bottom: 2px solid #0e1313;
            width: fit-content;
            margin: auto;
        }

        .icon {
            color: #0e1313;
            font-size: 20px;
            cursor: pointer;
            display: none;
        }

        .icon.cancel-btn {
            position: absolute;
            right: 30px;
            top: 20px;
        }

        .navbar.sticky .icon.cancel-btn {
            top: 10px;
        }

        .banner {
            height: 100vh;
            background-image: url('./banner.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .banner .title {
            position: absolute;
            top: 70%;
            left: 10%;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            font-weight: 400;
            color: #fff;
            text-align: center;
            margin: 0;
        }

        .title-container {
            display: inline-block;
            margin-right: 20px;
        }

        .banner .title2 {
            position: absolute;
            top: 20%;
            left: 13%;
            transform: translate(-50%, -50%);
            font-size: 3rem;
            font-weight: 400;
            color: #fff;
            text-align: center;
            margin: 0;
        }

        /* PLAY */
        .play {
            background: url("./black.png") no-repeat;
        }

        /* SELECT SONGS */
        .songs {
            background-image: url('./black.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .songs-header {
            display: flex;
            justify-content: space-between;
            gap: 2rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .songs-header .title {
            font-size: 4rem;
            font-weight: 400;
        }

        .songs-header .play-song-btn {
            text-decoration: none;
            text-align: center;
            font-size: 1.8rem;
            font-weight: 500;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            border: none;
            outline: none;
            background: #bde1df;
            color: #0e1313;
            cursor: pointer;
        }

        .contact {
            background-image: url('./black.png');
        }

        .contact .title {
            font-size: 4rem;
            font-weight: 400;
            color: #fff;
            text-align: center;
            margin-bottom: 5rem;
        }

        .contact .social-media {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .contact .social-media>a {
            display: flex;
            background: #bde1df;
            height: 7.5rem;
            width: 7.5rem;
            margin: 0 1.5rem;
            border-radius: .8rem;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: .6rem .6rem 1.0rem -.1rem rgba(0, 0, 0, 0.15), -.6rem -.6rem 1.0rem -.1rem rgba(255, 255, 255, 0.5);
            border: 1rem solid rgba(0, 0, 0, 0);
            transition: transform 0.5s;
        }

        .contact .social-media a i {
            font-size: 3.5rem;
            color: #eca7a6;
            transition: transform 0.5s;
        }

        .contact .social-media>a:hover {
            box-shadow: inset .4rem .4rem .6rem -.1rem rgba(0, 0, 0, 0.2), inset -.4rem -.4rem .6rem -.1rem rgba(255, 255, 255, 0.7),
                -0.05rem -0.05rem 0rem -.1rem rgba(255, 255, 255, 1), 0.05rem 0.05rem 0rem rgba(0, 0, 0, 0.15),
                0rem 1.2rem 1.0rem -1.0rem rgba(0, 0, 0, 0.05);

            border: .1rem solid rgba(0, 0, 0, 0.01);
            transform: translateY(.2rem);
        }

        .contact .social-media a:hover i {
            transform: scale(0.90);
        }

        .contact .social-media a:hover .fa-instagram {
            color: #f14843;
        }

        .contact .social-media a:hover .fa-facebook {
            color: #3b5998;
        }

        .contact .social-media a:hover .fa-linkedin {
            color: #0077b5;
        }

        .contact .social-media a:hover .fa-twitter {
            color: #00acee;
        }

        .contact .social-media a:hover .fa-github {
            color: #111;
        }

        .card-container {
            display: inline-block;
            margin-right: 20px;
        }

        .card1 {
            width: 190px;
            height: 180px;
            margin-right: 60px;
            left: 50px;
            margin-top: 220px;
            position: relative;
            background: #000;
            float: left;
        }

        .card1:hover .overlayer {
            visibility: visible;
        }

        .card1 img {
            width: 100%;
            height: 100%;
        }

        .card1 .title1 {
            width: 100%;
            height: 30px;
            text-align: center;
            margin-top: 180px;
        }

        .card1 .title1 a {
            top: -175px;
            color: #fff;
            position: relative;
            font-size: 13px;
            text-decoration: none;
        }

        .card1 .overlayer {
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            background: rgba(0, 0, 0, 0.6);
            text-align: center;
            visibility: hidden;
        }

        .card1 .overlayer .fa-play-circle {
            color: #fff;
            font-size: 73px;
            margin-top: 53px;
            transition: 100ms ease-in-out;
        }

        .card1 .overlayer:hover .fa-play-circle {
            transform: scale(1.1);
        }

        /* Styles for card2 */
        .card2 {
            width: 190px;
            height: 180px;
            margin-right: 70px;
            left: 50px;
            margin-top: 220px;
            position: relative;
            background: #000;
            float: left;
        }

        .card2:hover .overlayer1 {
            visibility: visible;
        }

        .card2 img {
            width: 100%;
            height: 100%;
        }

        .card2 .title1 {
            width: 100%;
            height: 30px;
            text-align: center;
            margin-top: 180px;
        }

        .card2 .title1 a {
            top: -175px;
            color: #fff;
            position: relative;
            font-size: 13px;
            text-decoration: none;
        }

        .card2 .overlayer1 {
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            background: rgba(0, 0, 0, 0.6);
            text-align: center;
            visibility: hidden;
        }

        .card2 .overlayer1 .fa-play-circle {
            color: #fff;
            font-size: 73px;
            margin-top: 53px;
            transition: 100ms ease-in-out;
        }

        .card2 .overlayer1:hover .fa-play-circle {
            transform: scale(1.1);
        }
    </style>
</head>

<body style = "background-color: #000">
  <button onclick="topFunction()" id="moveTopBtn" title="Go to top"><i class="fas fa-angle-up"></i></button>

 
  <nav class="navbar">
    <div class="content">
      <div class="logo"><a href="#">ListenUP</a></div>
      <ul class="menu-list">
    <div class="icon cancel-btn">
        <i class="fas fa-times"></i>
    </div>

    <li><a href="#play">Play Song</a></li>
    <li><a href="#songs">Music List</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#search"><i class="fas fa-search"></i> Search</a></li> 
</ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  	

  <div class="banner">
    <div class = "title-container;">
  <h2 class="title2">Recently Played </h2>
</div>
  <div class="card-container">
  <div class="card2">
			<div class="overlayer1">
				<i class="far fa-play-circle"></i>
			</div>
			<img src="https://i.pinimg.com/736x/02/b8/94/02b894f7ea6ad9f724648ee511ad018f--edm-music-house-music.jpg" alt="">
			<div class="title1">
				<a href="#"><b>Lorem Ipsum</b><p>Artist</p> </a>
			</div>
  </div>

  <div class="card2">
			<div class="overlayer1">
				<i class="far fa-play-circle"></i>
			</div>
			<img src="https://i.pinimg.com/736x/02/b8/94/02b894f7ea6ad9f724648ee511ad018f--edm-music-house-music.jpg" alt="">
			<div class="title1">
				<a href="#"><b>Lorem Ipsum</b><p>Artist</p> </a>
			</div>
  </div>
  </div>


  <h2 class="title">Favorites </h2>

  <div class="card-container">
    <div class="card1">
			<div class="overlayer">
				<i class="far fa-play-circle"></i>
			</div>
			<img src="https://i.pinimg.com/736x/02/b8/94/02b894f7ea6ad9f724648ee511ad018f--edm-music-house-music.jpg" alt="">
			<div class="title1">
      <a href="#"><b>Lorem Ipsum</b><p>Artist</p> </a>
			</div>
		</div>

    <div class="card1">
			<div class="overlayer">
				<i class="far fa-play-circle"></i>
			</div>
			<img src="https://i.pinimg.com/736x/02/b8/94/02b894f7ea6ad9f724648ee511ad018f--edm-music-house-music.jpg" alt="">
			<div class="title1">
      <a href="#"><b>Lorem Ipsum</b><p>Artist</p> </a>
			</div>
		</div>

    <div class="card1">
			<div class="overlayer">
				<i class="far fa-play-circle"></i>
			</div>
			<img src="https://i.pinimg.com/736x/02/b8/94/02b894f7ea6ad9f724648ee511ad018f--edm-music-house-music.jpg" alt="">
			<div class="title1">
      <a href="#"><b>Lorem Ipsum</b><p>Artist</p> </a>
			</div>
		</div>

    <div class="card1">
			<div class="overlayer">
				<i class="far fa-play-circle"></i>
			</div>
			<img src="https://i.pinimg.com/736x/02/b8/94/02b894f7ea6ad9f724648ee511ad018f--edm-music-house-music.jpg" alt="">
			<div class="title1">
      <a href="#"><b>Lorem Ipsum</b><p>Artist</p> </a>
			</div>
		</div>
  </div>
  <div class="card1">
			<div class="overlayer">
				<i class="far fa-play-circle"></i>
			</div>
			<img src="https://i.pinimg.com/736x/02/b8/94/02b894f7ea6ad9f724648ee511ad018f--edm-music-house-music.jpg" alt="">
			<div class="title1">
      <a href="#"><b>Lorem Ipsum</b><p>Artist</p> </a>
			</div>
		</div>
  </div>
  </div>

  
  <section class="play" id="play">
    <div class="container">
    
    </div>
  </section>

 
  <section class="songs" id="songs">
    <div class="container">
      <div class="songs-header">
        <h2 class="title">Choose a song !!</h2>
        <a class="play-song-btn" href="#play">Play Song</a>
      </div>
      <div class="btn-group">
      </div>
    </div>
  </section>

  <section class="contact" id="contact">
    <h2 class="title">Connect with me on Social media</h2>
    <div class="social-media">
      <a href="" target="_blank"><i class="fab fa-instagram"></i></a>

      <a href="" target="_blank"><i class="fab fa-facebook"></i></a>

      <a href="" target="_blank"><i class="fab fa-linkedin"></i></a>

      <a href="" target="_blank"><i class="fab fa-twitter"></i></a>

      <a href="" target="_blank"><i class="fab fa-github"></i></a>
    </div>

  <script src="./JS/script.js"></script>


</body>

</html>