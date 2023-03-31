<!DOCTYPE html>
<html>
<head>
    <title>Respond Notice</title>
</head>
<body>
<?php
    include "mysqlConnect.php";
    $connect = mysqli_connect($server, $user, $pw, $db);
    if(!$connect){
        die("Connection failed: ".mysqli_connect_error());
    }
    $noticeNo = $_POST['noticeNo'];
    $respondMsg = $_POST['respondMsg'];
	$user = $_COOKIE['user'];
    $userQuery = "UPDATE noticeuser SET respondedBy = '$user', respondMsg = '$respondMsg' WHERE noticeNo = '$noticeNo'";
    $rs = mysqli_query($connect, $userQuery) or die(mysqli_error($connect));
    if(mysqli_affected_rows($connect) > 0) {
        echo "<script>alert('Respond notice success');window.location.href='../html/userHome.html';</script>";
    }
    else {
        echo "Respond notice fail";
    }
    mysqli_close($connect);
?>
</body>
</html>
