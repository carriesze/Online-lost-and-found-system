<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
<?php
    include "mysqlConnect.php";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect){
        die("Connection failed: ".mysqli_connect_error());
    }
    $password = $_POST['password'];
	echo($_COOKIE['resetID']);
	$user = $_COOKIE['resetID'];
    $userQuery = "UPDATE user SET password = '$password' WHERE userID = '$user'";
    $rs = mysqli_query($connect, $userQuery) or die(mysqli_error($connect));
    if(mysqli_affected_rows($connect) > 0) {
        echo "<script>alert('Password reset success');window.location.href='../html/index.html';</script>";
    }
    else {
        echo "Password reset fail";
    }
    mysqli_close($connect);
?>
</body>
</html>
