<!DOCTYPE html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>View my notices</title>
	<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/user.css">
	<script src="../js/user.js"></script>
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
			<li><a href="../html/userHome.html">Home</a></li>
			<li><a href="userLost.php">Lost</a></li>
			<li><a href="userFound.php">Found</a></li>
			<li style="float:right"><a href="logout.php">Logout</a></li>
			<li style="float:right"><a href="userPage.php" id="username">User</a></li>
        </ul>
    </div>
    <main role="main" id="main">
		<section class="tiles-a">
			<h1>Created notices:</h1>
			<ul>
				<?php
					include "mysqlConnect.php";
					$connect = mysqli_connect($server, $user, $pw, $db);
					if(!$connect) {
						die("Connection failed: ".mysqli_connect_error());
					}
					$count1 = 0;
					$user = $_COOKIE['user'];
					$userQuery = "SELECT * FROM noticeuser WHERE createdBy = '$user'";
					$result = mysqli_query($connect, $userQuery);
					if(!$result) {
						printf("Error: %s\n", mysqli_error($connect));
						exit();
					}
					while($rc = mysqli_fetch_assoc($result)) {
						$noticeNo = $rc['noticeNo'];
						$userQuery2 = "SELECT * FROM notice WHERE noticeNo = '$noticeNo'";
						$result2 = mysqli_query($connect, $userQuery2);
						if(!$result2) {
							printf("Error: %s\n", mysqli_error($connect));
							exit();
						}
						while($rc2 = mysqli_fetch_assoc($result2)) {
							$noticeNo = $rc2['noticeNo'];
							$image = $rc2['image'];
							$count1 = 1;
							printf('<li><a href="viewNoticeDetails.php?noticeNo=%d" id="%d" style="background: url(\'../images/item/%s\'); background-size: cover;" aria-controls="aside" aria-expanded="false"></a></li>', $noticeNo, $noticeNo, $image);
						}
					}
					if (mysqli_num_rows($result) == 0) {
						$count1 = 0;
					}
					if ($count1==0) {
						echo("<h1>No item has been created!</h1>");
					}
				?>
			</ul>
		</section>
		<section class="tiles-a">
			<h1>Responded notices:</h1>
			<ul>
				<?php
					$count2 = 0;
					$userQuery = "SELECT * FROM noticeuser WHERE respondedBy = '$user'";
					$result = mysqli_query($connect, $userQuery);
					if(!$result) {
						printf("Error: %s\n", mysqli_error($connect));
						exit();
					}
					while($rc = mysqli_fetch_assoc($result)) {
						$noticeNo = $rc['noticeNo'];
						$userQuery2 = "SELECT * FROM notice WHERE noticeNo = '$noticeNo'";
						$result2 = mysqli_query($connect, $userQuery2);
						if(!$result2) {
							printf("Error: %s\n", mysqli_error($connect));
							exit();
						}
						while($rc2 = mysqli_fetch_assoc($result2)) {
							$noticeNo = $rc2['noticeNo'];
							$image = $rc2['image'];
							$count2 = 1;
							printf('<li><a href="viewNoticeDetails.php?noticeNo=%d" id="%d" style="background: url(\'../images/item/%s\'); background-size: cover;" aria-controls="aside" aria-expanded="false"></a></li>', $noticeNo, $noticeNo, $image);
						}
					}
					if (mysqli_num_rows($result) == 0)  {
						$count2 = 0;
					}
					if ($count2==0) {
						echo("<label>No item has been responded!</label>");
					}
				?>
			</ul>
		</section>
    </main>
</body>
</html>
