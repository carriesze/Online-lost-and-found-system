<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Chart</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>
<body>
    <div class="bar">
        <ul>
          <li><a  href="../html/adminHome.html">Home</a></li>
          <li style="float:right"><a href="../php/logout.php">Logout</a></li>
          <li style="float:right"><a id="username">User</a></li>
        </ul>
    </div>
    <main>
        <div class="container-fluid">
            <canvas id="myChart" style="width:50%; max-width: 1500px;"></canvas>
        </div>
    </main>
    <script>
        var xValues = ["10-29", "30-49", "50-69", ">70"];
    <?php
        include "mysqlConnect.php";
        $connect = mysqli_connect($server, $user, $pw, $db);
        if(!$connect){
            die("Connection failed: ".mysqli_connect_error());
        }
        $value2 = 0;
        $value3 = 0;
        $value4 = 0;
        $value5 = 0;
        $userQuery = "SELECT count(*) as count FROM noticeuser WHERE createdBy in (SELECT userID FROM user WHERE DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), birthday)), '%Y') BETWEEN 10 AND 29);";
        $result = mysqli_query($connect, $userQuery);
        if(!$result) {
            printf("Error: %s\n", mysqli_error($connect));
            exit();
        }
        while($rc = mysqli_fetch_assoc($result)) {
            $value2 = $rc['count'];
        }
        $userQuery = "SELECT count(*) as count FROM noticeuser WHERE createdBy in (SELECT userID FROM user WHERE DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), birthday)), '%Y') BETWEEN 30 AND 49);";
        $result = mysqli_query($connect, $userQuery);
        if(!$result) {
            printf("Error: %s\n", mysqli_error($connect));
            exit();
        }
        while($rc = mysqli_fetch_assoc($result)) {
            $value3 = $rc['count'];
        }
        $userQuery = "SELECT count(*) as count FROM noticeuser WHERE createdBy in (SELECT userID FROM user WHERE DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), birthday)), '%Y') BETWEEN 50 AND 69);";
        $result = mysqli_query($connect, $userQuery);
        if(!$result) {
            printf("Error: %s\n", mysqli_error($connect));
            exit();
        }
        while($rc = mysqli_fetch_assoc($result)) {
            $value4 = $rc['count'];
        }
        $userQuery = "SELECT count(*) as count FROM noticeuser WHERE createdBy in (SELECT userID FROM user WHERE DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), birthday)), '%Y') BETWEEN 70 AND 150);";
        $result = mysqli_query($connect, $userQuery);
        if(!$result) {
            printf("Error: %s\n", mysqli_error($connect));
            exit();
        }
        while($rc = mysqli_fetch_assoc($result)) {
            $value5 = $rc['count'];
        }
        echo("var value2=$value2;");
        echo("var value3=$value3;");
        echo("var value4=$value4;");
        echo("var value5=$value5;");
    ?>
        var yValues = [value2, value3, value4, value5];
        var barColors = ["green","blue","orange","brown"];
        
        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                    display: true,
                    text: "The number of notices in different age ranges"
                }
            }
        });
    </script>
</body>
</html>
