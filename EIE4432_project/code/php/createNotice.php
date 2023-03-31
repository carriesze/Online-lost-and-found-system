<!DOCTYPE html>
<html>
<head>
    <title>Create Notice</title>
</head>
<body>
    <?php
        include "mysqlConnect.php";
        $connect = mysqli_connect($server, $user, $pw, $db);
        if(!$connect){
            die("Connection failed: ".mysqli_connect_error());
        }

        $type = $_POST['type'];
        $venue = $_POST['venue'];
        $contact = $_POST['contact'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $imageUpload = $_POST['imageUpload'];
	    $user = $_COOKIE['user'];
        $userQuery = "INSERT INTO notice (type, date, venue, contact, description, image) VALUES ('$type', '$date', '$venue', '$contact', '$description', '$imageUpload')";
        $rs = mysqli_query($connect, $userQuery) or die(mysqli_error($connect));
        if(mysqli_affected_rows($connect) > 0) {
            $noticeNo = mysqli_insert_id($connect);
            $userQuery2 = "INSERT INTO noticeuser (noticeNo, createdBy) VALUES ('$noticeNo', '$user')";
            $rs2 = mysqli_query($connect, $userQuery2) or die(mysqli_error($connect));
            if(mysqli_affected_rows($connect) > 0) {
	            echo "<script>alert('Create notice success');window.location.href='../html/userHome.html';</script>";
            } else {
	            echo "Create notice user fail";
            }
        } else {
            echo "Create new notice fail";
        }
        mysqli_close($connect);
    ?>
</body>
</html>
