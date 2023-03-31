<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>View and Respond Notice</title>
	<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/login.css">
	<link rel="stylesheet" href="../css/user.css">
	<script src="../js/verify.js"></script>
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
			<li><a href="../php/userLost.php">Lost</a></li>
			<li><a href="../php/userFound.php">Found</a></li>
			<li style="float:right"><a href="../php/logout.php">Logout</a></li>
			<li style="float:right"><a href="../php/userPage.php" id="username">User</a></li>
        </ul>
    </div>
	<main>
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 px-0 d-none d-sm-block">
				<?php
					include "mysqlConnect.php";
					$connect = mysqli_connect($server, $user, $pw, $db);
					if(!$connect){
						die("Connection failed: ".mysqli_connect_error());
					}
					$noticeNo = $_GET['noticeNo'];
					$userQuery = "SELECT * FROM notice WHERE noticeNo = '$noticeNo'";
					$result = mysqli_query($connect, $userQuery);
					if(!$result) {
						printf("Error: %s\n", mysqli_error($connect));
						exit();
					}
					if ($rs = mysqli_fetch_assoc($result)) {
						$image = $rs['image'];
						echo("<img src='../images/item/$image' class='login-img'>");
					}
				?>
			</div>
			<div class="col-sm-6 login-section-wrapper">
				<div class="login-wrapper my-auto">
					<h1 class="login-title">View and Respond Notice</h1>
					<form action="../php/updateNotice.php" method = "post" id = "formCreateNotice">
						<?php
							$result = mysqli_query($connect, $userQuery);
							if ($rs = mysqli_fetch_assoc($result)) {
								$noticeNo = $rs['noticeNo'];
								$type = $rs['type'];
								$date = $rs['date'];
								$venue = $rs['venue'];
								$contact = $rs['contact'];
								$description = $rs['description'];
								printf("<input type='hidden' id='noticeNo' name='noticeNo' value=%d>
								<div class='form-group'><label>Type</label>
								<label id='date' name='date' class='form-control'>%s</label></div>
								<div class='form-group'><label>Date</label>
								<label id='date' name='date' class='form-control'>%s</label></div>
								<div class='form-group'><label>Venue</label>
								<label id='venue' name='venue' class='form-control'>%s</label></div>
								<div class='form-group'><label>Contact</label>
								<label id='contact' name='contact' class='form-control'>%s</label></div>
								<div class='form-group'><label>Description</label>
								<label id='description' name='description' class='form-control'>%s</label></div>
								", $noticeNo, $type, $date, $venue, $contact, $description);
							}
						?>
						<div class="form-group">
							<label>Your Respond</label>
							<input name="respondMsg" id="respondMsg" class="form-control" placeholder="Enter your respond here">
						</div>
						<input type="button" class="btn btn-block login-btn" value="Respond Notice" onclick="verifyRespondNotice();">
					</form>
				</div>
			</div>
		</div>
	</div>
	</main>
</body>
</html>
