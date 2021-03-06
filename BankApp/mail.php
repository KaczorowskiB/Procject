
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8"/>
    <title>BankApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

        a
        {
            text-decoration: none;
            outline: none;
        }

        body
        {
            margin: 0;
            background: #222;
            font-family: 'Baloo Bhaina 2', cursive;
            font-weight: 300;
        }

        #container
        {
            margin-left: auto;
            margin-right: auto;
        }

        .navbar
        {
            width: 80%;
            margin: 0 auto;
        }

        header
        {
            background: #55d6aa;
        }

        header ::after
        {
            content: '';
            display: table;
            clear: both;
        }

        .logo
        {
            float: left;
            padding: 10px 0;
            height: 60px;
        }

        nav
        {
            float: right;
        }

        nav ul
        {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        nav li
        {
            display: inline-block;
            margin-left: 70px;
            padding-top: 28px;

            position: relative;
        }

        nav a
        {
            color: #444;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 14px;

        }

        nav a:hover
        {
            color: #000;
        }

        nav a::before
        {
            content: '';
            display: block;
            height: 5px;
            width: 100%;
            background-color: #444;

            position: absolute;
            top: 0;
            width: 0%;

            transition: all ease-in-out 250ms;
        }

        nav a:hover::before
        {
            width: 100%;
        }

        .slidershow
        {
            width: 800px;
            height: 500px;
            overflow: hidden;
            padding-left: -300px;
        }

        .middle
        {
            position:absolute;
            top: 50%;
            left: 22%;
            transform: translate(-50%,-50%);
        }

        .navigation
        {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .bar
        {
            width: 50px;
            height: 10px;
            border: 2px solid black;
            margin: 6px;
            cursor: pointer;
        }

        .bar:hover
        {
            background: black;
        }

        input[name="r"]
        {
            position: absolute;
            visibility: hidden;
        }

        .slides
        {
            width: 500%;
            height: 100%;
            display: flex;
        }

        .slide
        {
            width: 20%;
            transition: 0.6s;
        }

        .slide img
        {
            width: 100%;
            height: 100%;
        }

        #r1:checked ~ .s1{
            margin-left: 0;
        }

        #r2:checked ~ .s1{
            margin-left: -20%;
        }

        #r3:checked ~ .s1{
            margin-left: -40%;
        }

        #r4:checked ~ .s1{
            margin-left: -60%;
        }

        .footer-main-div
        {
            width: 100%;
            height: auto;
            margin: auto;
            background: #272727;
            padding: 20px 0px;
            position: absolute;
            top: 100%;

        }

        .footer-social-icons
        {
            width: 100%;
            height: auto;
            margin: auto;
        }

        .footer-social-icons ul
        {
            margin: 0px;
            padding: 0px;
            text-align: center;
        }

        .footer-social-icons ul li
        {
            display: inline-block;
            width: 50px;
            height: 50px;
            margin: 0px 10px;
            border-radius: 100%;
            background: #32CD32;
        }

        .footer-social-icons ul li a
        {
            color: #272727;
            font-size: 25px;
        }

        .footer-social-icons ul li a i
        {
            line-height: 50px;
        }

        .footer-menu-one
        {
            width: 100%;
            height: auto;
            margin: auto;
        }

        .footer-menu-one ul
        {
            margin: 0px;
            padding: 0px;
            text-align: center;
        }

        .footer-menu-one ul li
        {
            display: inline-block;
            margin: 0px 15px;
        }

        .footer-menu-one ul li a
        {

            font-size: 20px;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            text-decoration: none;
            outline: none;
        }

        .footer-bottom
        {
            width: 1893px;
            height: auto;
            margin: auto;
            background: #32CD32;
            padding: 5px;
            position: absolute;
            top: 112%;

        }

        .footer-bottom p
        {
            font-size: 14px;
            text-align: center;
            color: #272727;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .footer-bottom p a
        {
            color: #272727;
        }

        .content_text
        {
            width: 50%;
            height: auto;
            margin: auto;
            position: absolute;
            left: 50%;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
        }

    </style>
</head>
<body>

<div id ="container">

    <header>
        <div class="navbar">
            <img src="logo.png" alt="logo" class="logo">
            <nav>
                <ul>
                    <li><a href="index.html">Strona Główna</a></li>
                    <li><a href="register.php">Zarejestruj się</a></li>
                    <li><a href="login.php">Zaloguj się</a></li>
                    <li><a href="#">O banku</a></li>
                    <li><a href="#">Kursy walut</a></li>
                    <li><a href="kontakt.php">Kontakt</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <div id="content">
        <div class="slidershow middle">
            <div class="slides">

                <input type="radio" name="r" id="r1" checked>
                <input type="radio" name="r" id="r2">
                <input type="radio" name="r" id="r3">
                <input type="radio" name="r" id="r4">

                <div class="slide s1">
                    <img src="coins.png" alt="">
                </div>

                <div class="slide">
                    <img src="money.jpg" alt="">
                </div>

                <div class="slide">
                    <img src="gold.jpg" alt="">
                </div>

                <div class="slide">
                    <img src="bitcoin.jpg" alt="">
                </div>

                <div class="navigation">
                    <label for="r1" class="bar"></label>
                    <label for="r2" class="bar"></label>
                    <label for="r3" class="bar"></label>
                    <label for="r4" class="bar"></label>
                </div>

            </div>
        </div>

        <div class="content_text">
            <h1 align="center">Kontakt</h1>
            </br>
            Wiadomość została wysłana!

                </form>


        </div>
        
    </div>


    </div>


</div>

<div id="footer">
    <div class="footer-main-div">
        <div class="footer-social-icons">
            <ul>
                <li><a href="#" target="blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" target="blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" target="blank"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#" target="blank"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>

        <div class="footer-menu-one">
            <ul>
                <li><a href="#">Strona Główna</a></li>
                <li><a href="#">O Nas</a></li>
                <li><a href="#">Kursy Walut</a></li>
                <li><a href="#">Kontakt</a></li>
            </ul>
        </div>
    </div>



</div>
<div class="footer-bottom">
    <p>Stworzone przez: <a href="#"></a>Maciej Jóźwiak i Bartek Kaczorowski</p>
</div>
</div>
</body>

</html>