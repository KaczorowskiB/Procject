<?php

session_start();

if ((!isset($_POST['username'])) || (!isset($_POST['password'])))
{   
    header('Location: login.php');
    exit();
}

require_once "polaczenie.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
{
    echo "Error:".$polaczenie->connect_errno ."Opis: ".$polaczenie->connect_error;
}
else
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = htmlentities($username,ENT_QUOTES,"UTF-8");
    
    if ($result = @$polaczenie->query(sprintf("SELECT * FROM users where username='%s'",mysqli_real_escape_string($polaczenie,$username))))
    {
        $how_many_users = $result->num_rows;
        if($how_many_users>0)
        {
            $row = $result->fetch_assoc(); 

            if(password_verify($password,$row['password']))
            {
                $_SESSION['loged'] = true;          
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['surname'] = $row['surname'];
                $_SESSION['email'] = $row['email'];

                unset($_SESSION['blad']);
                $result->free_result();            
                header('Location:loged.php');
            }
            
            else
            {           
             $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło !</span>';
             header('Location: login.php') ;       
            }

        }
        else
        {           
           $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło !</span>';
           header('Location: login.php') ;       
        }
    }
    $polaczenie->close();
}
?>