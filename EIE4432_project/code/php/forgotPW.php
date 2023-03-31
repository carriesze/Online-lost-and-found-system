<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
<?php
    include "mysqlConnect.php";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect){
        die("Connection failed: ".mysqli_connect_error());
    }
    $userID = $_POST['userID'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $userQuery = "SELECT userID, email, birthday FROM user
                    WHERE userID = '$userID' and email = '$email' and birthday = '$birthday'";
    $result = mysqli_query($connect, $userQuery);
    if (!$result) {
        die("Could not successfully run query.");
    }
    if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('Either your username or email or birthday is not correct!');window.location.href='../html/forgotPW.html';</script>";
    }else {
        echo "<script>alert('Verify success');window.location.href='../html/resetPW.html';</script>";
        die();
    }
    mysqli_close($connect);
?>
</body>
</html>
