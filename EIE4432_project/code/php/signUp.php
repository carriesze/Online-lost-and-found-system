<!DOCTYPE html>
<?php
    $userID = $_POST['userID'];
    setcookie($userID, time() + (60 * 60 * 24)); // 1 day
?>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
<?php
    include "mysqlConnect.php";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect){
        die("Connection failed: ".mysqli_connect_error());
    }
    $password = $_POST['password'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $imageUpload = $_POST['imageUpload'];
    $birthday = $_POST['birthday'];
    $userQuery = "INSERT INTO user (userID, password, nickname, email, gender, profileImage, birthday) VALUES ('$userID', '$password', '$nickname', '$email', '$gender', '$imageUpload', '$birthday')";
    $rs = mysqli_query($connect, $userQuery) or die(mysqli_error($connect));
    if(mysqli_affected_rows($connect) > 0) {
        echo "<script>alert('Sign up success');window.location.href='../html/index.html';</script>";
        die();
    } else {
        echo "<script>alert('Sign up unsuccess');window.location.href='../html/index.html';</script>";
        die();
    }
    mysqli_close($connect);
?>
</body>
</html>
