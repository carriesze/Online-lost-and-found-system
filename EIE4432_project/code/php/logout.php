<!DOCTYPE html>
<html>
<head>
    <title>MySQL Query</title>
</head>
<body>
<?php
    echo "<script>alert('Logout success');window.location.href='../html/index.html';</script>";
	setcookie("user", "", time() -3600, "/");
?>
</body>
</html>
