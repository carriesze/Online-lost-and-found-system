<!DOCTYPE html>
<html>
<head>
    <title>User</title>
</head>
<body>
<?php
    include "mysqlConnect.php";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect){
        die("Connection failed: ".mysqli_connect_error());
    }
    $userID = $_COOKIE['user'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $profileImage = $_POST['profileImage'];
    if($nickname != "") {
		echo "<script>alert($nickname);</script>";
        $userQuery1 = "UPDATE user SET nickname='$nickname' WHERE userID='$userID'";
        $result1 = mysqli_query($connect, $userQuery1);
        if (!$result1) {
            printf("Error: %s\n", mysqli_error($connect));
            die("Could not successfully run query.");
        }
    }
    if($email != "") {
        $userQuery2 = "UPDATE user SET email='$email' WHERE userID='$userID'";
        $result2 = mysqli_query($connect, $userQuery2);
        if (!$result2) {
            printf("Error: %s\n", mysqli_error($connect));
            die("Could not successfully run query.");
        }
    }
    if($profileImage != "") {
        $userQuery3 = "UPDATE user SET profileImage='$profileImage' WHERE userID='$userID'";
        $result3 = mysqli_query($connect, $userQuery3);
        if (!$result3) {
            printf("Error: %s\n", mysqli_error($connect));
            die("Could not successfully run query.");
        }
    }
    if(mysqli_affected_rows($connect) > 0) {
        echo "<script>alert('Update success');window.location.href='userPage.php';</script>";
        die();
    } else{
        echo "<script>alert('Update unsuccess');window.location.href='userPage.php';</script>";
        die();
    }
    mysqli_close($connect);
?>
</body>
</html>
