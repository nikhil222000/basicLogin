<?php
$servername="localhost";
$username="root";
$password="";
$database_name="test";

$conn=mysqli_connect($servername,$username,$password,$database_name);

if(!$conn){
    die("Connection Failed");
}
if(isset($_POST['validate'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = mysqli_query($conn, "SELECT email_id,passwords FROM loginexercise WHERE email_id='$email' AND passwords='$password'");
    $count = mysqli_num_rows($query);
    if($count>0){
        $currentDateTime = date('Y-m-d H:i:s');
        $queryLogin = "INSERT INTO logintime (loginTime, email_id)
        VALUES ('$currentDateTime','$email')";
        mysqli_query($conn, $queryLogin);
        echo "<script type='text/javascript'>
        window.location.href = 'mainpage.html';
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
        alert('Enter correct Details or Sign up as new user');
        window.location.href = 'index.html';
        </script>";
    }
    mysqli_close($conn);
}
if(isset($_POST['createEntry'])){
    $email = $_POST['sign_email'];
    $password = $_POST['sign_password'];
    $name = $_POST['sign_name'];
    $query = mysqli_query($conn, "SELECT email_id FROM loginexercise WHERE email_id='$email'");
    $count = mysqli_num_rows($query);
    if($count>0){
        echo "<script type='text/javascript'>
        alert('Id already exists in database, Kindly Login');
        window.location.href = 'index.html';
        </script>";
    }
    else{
        $queryInsert = "INSERT INTO loginexercise (email_id, passwords, userName)
        VALUES ('$email', '$password', '$name')";
        if(mysqli_query($conn, $queryInsert)){
            echo "<script type='text/javascript'>
            alert('User created successfully, Kindly login with those credentials');
            window.location.href = 'index.html';
            </script>";
        }
    }
    mysqli_close($conn);
}
?>