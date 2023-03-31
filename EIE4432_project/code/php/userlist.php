<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Registered User</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/userlist.css">
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
            <li style="float:right"><a href="../php/logout.php">Logout</a></li>
            <li style="float:right"><a id="username">User</a></li>
        </ul>
    </div>
    <div class="list">
        <?php
	        include "mysqlConnect.php";
            $connect = mysqli_connect($server, $user, $pw, $db);
            if(!$connect){
                die("Connection failed: ".mysqli_connect_error());
            }
	        $userQuery = "SELECT * FROM user WHERE admin != '1' order by userID ASC";
	        $result = mysqli_query($connect, $userQuery);
	        if(!$result) {
		        printf("Error: %s\n", mysqli_error($connect));
		        exit();
	        }
	        while($rc = mysqli_fetch_assoc($result)) {
		        $userID = $rc['userID'];
		        $nickname = $rc['nickname'];
		        $email = $rc['email'];
		        $profileImg = $rc['profileImage'];
		        $gender = $rc['gender'];
		        $birthday = $rc['birthday'];
		        printf("
			        <form action='../php/viewNoticeByID.php' method = 'post'>
			        <input type='hidden' id='userID' name='userID' value='%s'>
			        <div class='line'>
			        <div class='user'>
				        <div class='profile'>
					        <img src='../images/profile/%s' alt=''>
				        </div>
				        <div>
                            <h1 class='id'>%s</h1>  
                        </div>
			        </div>
			        <div class='name'>
                        <p>%s</p>
                    </div>
			        <div class='email'>
                         <p>%s</p>
                    </div>
			        <div class='gender'>
                        <p>%s</p>
                    </div>
			        <div class='birthday'>
                            <p>%s</p>
                    </div>
			        <div class='user-notice'>
				        <input type='submit' class='btn' value='Notice'>
                    </div>
			        </div>
			        </form>
		            "
		            ,$userID, $profileImg, $userID, $nickname, $email, $gender, $birthday
		        );
	        }
	
        ?>   		
    </div>
</body>
</html>
