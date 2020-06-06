<?php
session_start();

if (isset($_POST['email']))
{
    $is_OK=true;
    $username = $_POST['username'];

    if((strlen($username)<3) || (strlen($username)>20))
    {
        $is_OK=false;
        $_SESSION['e_username'] = "Nazwa uzytkownika musi posiadac od 3 do 20 znaków";
    }

    if(ctype_alnum($username)==false)
    {
        $is_OK=false;
        $_SESSION['e_username']="Nazwa uzytkownika moze się skladac yulko z liter i cyfr (bez polskich znaków)";
    }

    $email = $_POST['email'];

    $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);

    if((filter_var($emailB,FILTER_SANITIZE_EMAIL)==false)|| ($emailB!=$email))
    {
        $is_OK=false;
        $_SESSION['e_email'] = "Podaj poprawy adres !";
    }

    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    


    if ((strlen($password1)<8) || (strlen($password1)>20))
    {
        $is_OK=false;
        $_SESSION["e_password"]="Hasło musi posiadac od 8 do 20 znaków";
    }

    if($password1!=$password2)
    {
        $is_OK=false;
        $_SESSION["e_password"]="Podane hasła nie są identyczne";
    }

    $password_hash = password_hash($password1,PASSWORD_DEFAULT);
    
    if (!isset($_POST['regulations']))
    {
        $is_OK=false;
        $_SESSION['e_regulations']="Regulamin nie został zaakceptowany";
    }

    $name = $_POST['name'];

    if ((strlen($name)<8) || (strlen($name)>20))
    {
        $is_OK=false;
        $_SESSION["e_name"]="Imię musi posiadac od 8 do 20 znaków";
    }

    $surname = $_POST['surname'];

    if ((strlen($surname)<8) || (strlen($surname)>20))
    {
        $is_OK=false;
        $_SESSION["e_surname"]="Nazwisko musi posiadac od 8 do 20 znaków";
    }

    require_once "polaczenie.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try
    {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if($polaczenie->connect_errno!=0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            $result = $polaczenie->query("SELECT id FROM users where email='$email'");
            if(!$result) throw new Exception($polaczenie->error);
            $how_many = $result->num_rows;
            if($how_many>0)
            {
                $is_OK=false;
                $_SESSION['e_email']="Istnieje juz konto z tym adresem!";
            }
            
            $result = $polaczenie->query("SELECT id FROM users where username='$username'");
            if(!$result) throw new Exception($polaczenie->error);
            $how_many = $result->num_rows;
            if($how_many>0)
            {
                $is_OK=false;
                $_SESSION['e_username']="Istnieje juz konto z taką nazwą uzytkownika!";
            }

            if($is_OK==true)
            {
                if($polaczenie->query("INSERT INTO users VALUES ('$username', '$password_hash', '$name', '$surname', '$email',NULL)"))
                {
                    header('Location: login.php');
                    exit();
                }
                else
                {
                    
                }
            
            }

            $polaczenie->close();
        }
    }

    catch(Exception $e)
    {
    echo '<span style="color:red;">Błąd serwera!</span>';
    echo '<br/> Informacja developerska:'.$e;
    }

    
    
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
    width: 500px;
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

        ::placeholder
        {
            color:white;
        }

 </style>

</head>
<body>

<script>
    function myFunction()
    {
        alert("Udało się zarejestrować !"); 
    }
</script>   


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

<form method="post">
<div class="login-box">
<h1>Zarejestruj się w banku</h1>

<div class="textbox">
    <i aria-hidden="true"></i>
    <input  type="text" placeholder="Nazwa użytkownika" name="username" value="">
</div>

<?php
if (isset($_SESSION['e_username']))
{
    echo '<div class="error">'.$_SESSION['e_username'].'</div>';
    unset($_SESSION['e_username']);
}
?>

<div class="textbox">
    <i aria-hidden="true"></i>
    <input type="password" placeholder="Hasło" name="password1" value="">
</div>

<?php
if (isset($_SESSION['e_password']))
{
    echo '<div class="error">'.$_SESSION['e_password'].'</div>';
    unset($_SESSION['e_password']);
}
?>

<div class="textbox">
    <i aria-hidden="true"></i>
    <input type="password" placeholder="Powtórz hasło" name="password2" value="">
</div>

<div class="textbox">
    <i aria-hidden="true"></i>
    <input type="text" placeholder="Imię" name="name" value="">
</div>

<?php
if (isset($_SESSION['e_name']))
{
    echo '<div class="error">'.$_SESSION['e_name'].'</div>';
    unset($_SESSION['e_name']);
}
?>

<div class="textbox">
    <i aria-hidden="true"></i>
    <input type="text" placeholder="Nazwisko" name="surname" value="">
</div>

<?php
if (isset($_SESSION['e_surname']))
{
    echo '<div class="error">'.$_SESSION['e_surname'].'</div>';
    unset($_SESSION['e_surname']);
}
?>

<div class="textbox">
    <i aria-hidden="true"></i>
    <input type="text" placeholder="Email" name="email" value="">
</div>

<?php
if (isset($_SESSION['e_email']))
{
    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
    unset($_SESSION['e_email']);
}
?>

    <label>
<input type="checkbox" name="regulations" /> Akceptuję regulamin
    </label>

<?php
if (isset($_SESSION['e_regulations']))
{
    echo '<div class="error">'.$_SESSION['e_regulations'].'</div>';
    unset($_SESSION['e_regulations']);
}
?>

<input class="btn" type="submit" name="" value="Zarejestruj się">

</div>
    </form>
</body>
</html>
