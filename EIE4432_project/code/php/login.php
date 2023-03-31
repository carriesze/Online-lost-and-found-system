<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<?php
    include "mysqlConnect.php";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect){
        die("Connection failed: ".mysqli_connect_error());
    }
    $login = FALSE;
    $userID = $_POST['userID'];
    $password = $_POST['password'];
    $userQuery = "SELECT userID, password FROM user WHERE userID = '$userID' and password = '$password'";
    $rs = mysqli_query($connect, $userQuery) or die(mysqli_error($connect));
    if(mysqli_affected_rows($connect) > 0) {
        setcookie("user", $userID, time() + (86400 * 30), "/");
        $userQuery1 = "SELECT admin FROM user WHERE userID = '$userID'";
        $rs1 = mysqli_query($connect, $userQuery1) or die(mysqli_error($connect));
        $row = mysqli_fetch_assoc($rs1);
        if(!$row['admin']) {
            $userQuery2 = "SELECT nickname FROM user WHERE userID = '$userID'";
            $rs2 = mysqli_query($connect, $userQuery2) or die(mysqli_error($connect));
            $row2 = mysqli_fetch_assoc($rs2);
            $nickname = $row2['nickname'];
            setcookie("nickname", $nickname, time() + (86400 * 30), "/");
            echo "<script>alert('Login Success');window.location.href='../html/userHome.html';</script>";
        } else if($row['admin']) {
            echo "<script>alert('Login Success');window.location.href='../html/adminHome.html';</script>";
        }
    } else {
        echo "<script>alert('Either your username or the password is not correct!');window.location.href='../html/index.html';</script>";
        die();
    }
    mysqli_close($connect);
?>
</body>
</html>
