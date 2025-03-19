<html>
<head>
</head>
<body>
<?php
	for($i=1;$i<=6;$i++){
		printf("<h%d>標題%d</h%d>\n",$i,$i,$i);
	}
?>
<form method = "post" action = "result.php">
	Account:<input type = "text" name = "my ID" placeholder = "account" ><br>
	Password:<input type = "password" name = "my PS" placeholder = "password" ><br>
	<input type = "submit" value = "login">
	<input type = "reset" value = "clear">
</body>
</html>
