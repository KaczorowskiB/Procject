<?php
session_start();

if(!isset($_SESSION['loged']))
{
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BankApp_login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
<style>

body
{
margin: 0;
padding: 0;
font-family: 'Baloo Bhaina 2', cursive;
background: url(1.jpg) no-repeat;
background-size: cover;
}

.login-box
{
    width: 280px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    color: white;
}

.login-box h1
{
float: left;
font-size: 40px;
color: black;
border-bottom: 6px solid #4caf50;
margin-bottom: 50px;
padding: 0;
}

.textbox
{
    width: 100%;
    overflow: hidden;
    font-size: 20px;
    padding: 8px 0;
    margin: 8px 0;
    border: 1px solid white;
}

.textbox i
{
width: 26px;
float: left;
text-align: center;
}

.textbox input
{
    border: none;
    outline: none;
    background: none;
    color: white;
    font-size: 18px;
    width: 80%;
    float: left;
    margin: 0 10px;
}

.btn
{
    width: 100%;
    background: #4caf50;
    border: 2px solid #4caf50;
    color: white;
    padding: 5px;
    font-size: 18px;
    cursor: pointer;
    margin: 12px 0;
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

        p
        {
            color: white;
            font-size:20px;
        }

 </style>

</head>
<body>

    <header>
        <div class="navbar">
            <img src="logo.png" alt="logo" class="logo">
            <nav>
                <ul>
                    <li><a href="index.html">Strona Główna</a></li>
                    <li><a href="register.php">Zarejestruj się</a></li>
                    <li><a href="login.php">Zaloguj się</a></li>
                    <li><a href="about.html">O banku</a></li>
                    <li><a href="kursy.html">Kursy walut</a></li>
                    <li><a href="kontakt.php">Kontakt</a></li>
                    
                </ul>
            </nav>
        </div>
    </header>

    
<?php

        echo "<p>Witaj ".$_SESSION['username'].'! [<a href="logout.php">Wyloguj się !</a>]</p>';
        echo "<p>Konta użytkownika  ".$_SESSION['username'].' - <a href="accounts_go.php">Moje konta bankowe</a></p>';
?>

</body>
</html>

