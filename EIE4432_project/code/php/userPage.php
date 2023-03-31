<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/user.css">
    <script src="../js/cookie.js"></script>
    <script>
        window.onload = function() {
            checkCookie();
            document.getElementById("username").innerHTML = getCookie("user");
        }
    </script>
</head>
<body>
    <?php
        include "mysqlConnect.php";
        $connect = mysqli_connect($server, $user, $pw, $db);
        if(!$connect){
            die("Connection failed: ".mysqli_connect_error());
        }

        $userID = $_COOKIE['user'];
        $userQuery = "select * from user where userID ='$userID'";
        $result = mysqli_query($connect, $userQuery);
        if(!$result) {
            printf("Error: %s\n", mysqli_error($connect));
            exit();
        }
        echo '<div class="bar">';
        echo '<ul><li><a href="../html/userHome.html">Home</a></li>';
        echo '<li><a href="userLost.php">Lost</a></li>';
        echo '<li><a href="userFound.php">Found</a></li>';
        echo '<li style="float:right"><a href="logout.php">Logout</a></li>';
        echo '<li style="float:right"><a class="active" href="userPage.php">'.$userID.'</a></li></ul>';
        echo '</div>';
        echo '<main>';
        echo '<div class="container-fluid">';
        echo '<div class="row">';
        echo '<div class="col-sm-6 px-0 d-none d-sm-block">';

        if ($rs = mysqli_fetch_assoc($result)) {
            $profileImage = $rs['profileImage'];
            echo("<img src='../images/$profileImage' class='login-img'>");
        }
        echo '</div>';
        echo '<div class="col-sm-6 login-section-wrapper">';
        echo '<div class="login-wrapper my-auto">';
        echo '<h1 class="login-title">Personal Information</h1>';
        $result = mysqli_query($connect, $userQuery);
        if ($rs = mysqli_fetch_assoc($result)) {
            $nickname = $rs['nickname'];
            $email = $rs['email'];
            $gender = $rs['gender'];
        
            $birthday = $rs['birthday'];
            $admin = $rs['admin'];
            printf("
                <div class='form-group'><label>User ID</label>
                <label id='userID' name='userID' class='form-control'>%s</label></div>
                <div class='form-group'><label>Nickname</label>
                <label id='nickname' name='nickname' class='form-control'>%s</label></div>
                <div class='form-group'><label>Email</label>
                <label id='email' name='email' class='form-control'>%s</label></div>
                <div class='form-group'><label>Gender</label>
                <label id='gender' name='gender' class='form-control'>%s</label></div>
                <div class='form-group'><label>Birthday</label>
                <label id='birthday' name='birthday' class='form-control'>%s</label></div>
                ", $userID, $nickname, $email, $gender, $birthday);
            echo("<a href='../html/updateInfo.html'><input type='button' class='btn btn-block login-btn' value='Update'></a>");
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</main>';
    ?>
</body>
</html>
