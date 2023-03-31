<!DOCTYPE html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Pending notices</title>
	<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
    <div class="bar">
        <ul>
			<li><a href="../html/adminHome.html">Home</a></li>
			<li style="float:right"><a href="logout.php">Logout</a></li>
			<li style="float:right"><a href="userPage.php" id="username">User</a></li>
        </ul>
    </div>
    <main role="main" id="main">
		<section class="tiles-a">
			<ul>
				<?php
					include "mysqlConnect.php";
					$connect = mysqli_connect($server, $user, $pw, $db);
					if(!$connect){
						die("Connection failed: ".mysqli_connect_error());
					}
					$count = 0;
					$userQuery = "SELECT * FROM notice";
					$result = mysqli_query($connect, $userQuery);
					if(!$result) {
						printf("Error: %s\n", mysqli_error($connect));
						exit();
					}
					while($rc = mysqli_fetch_assoc($result)) {
						$noticeNo = $rc['noticeNo'];
						$image = $rc['image'];
						$user = $_COOKIE['user'];
						$userQuery2 = "SELECT * FROM noticeuser WHERE noticeNo = '$noticeNo'";
						$result2 = mysqli_query($connect, $userQuery2);
						if(!$result2) {
							printf("Error: %s\n", mysqli_error($connect));
							exit();
						}
						while($rc = mysqli_fetch_assoc($result2)) {
							if ($rc['respondedBy'] == "") {
								$count = 1;
								printf('<li><a href="adminViewNoticeDetails.php?noticeNo=%d" id="%d" style="background: url(\'../images/item/%s\'); background-size: cover;" aria-controls="aside" aria-expanded="false"></a></li>', $noticeNo, $noticeNo, $image);
							}
						}
						if (mysqli_num_rows($result2) == 0)  {
							$count = 0;
						}
					}
					if (mysqli_num_rows($result) == 0)  {
						$count = 0;
					}
					if ($count==0) {
						echo("<h1>No item have been uploaded!</h1>");
					}
				?>
			</ul>
		</section>
    </main>
</body>
</html>
