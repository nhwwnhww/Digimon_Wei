<?php

session_start();
session_destroy();

//If the user has sent through their username
if(isset($_POST['email'])){
	//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
	$conn = new mysqli("localhost", "root", "","digimon");
	
	//This line makes the sql
	$sql = "SELECT * FROM tamers WHERE Email = '{$_POST['email']}' AND password = '{$_POST['password']}'";
	
	//This line runs the query
	$result = $conn->query($sql);
	
	//Check if in database
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $User_id = $row["User_id"];
        $First_name = $row["First_name"];
        // echo "<script>alert($player_id)</script>";
        session_start();
        $_SESSION['User_id'] = $User_id;
        $_SESSION['First_name'] = $First_name;
        $_SESSION['time'] = time();
		exit(header("Location: tamer_info.php"));	
        }

	}else{
		echo "Username or password is wrong!";
	}	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 class='mainheading'>Home page</h1>

    <div class="login">
        <form action="index.php" method="post">
            <label>Username:</label>
            <input type="text" id="username" name="email" class="login_input"></input>
            <label>Password:</label>
            <input type="text" id="password" name="password" class="login_input"></input>
            <input type="submit" class='login_button'></input>
        </form>

        <a href="register_user.php">Register User</a>
    </div>

    <a href="Upload_digimon_data.php">upload digimon data</a>
    <a href="test.php">test data</a>
</body>
</html>