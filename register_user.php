<?php
//If the user has sent through their username
if(isset($_POST['Email'])){
	if ($_POST['Email']!= '' && $_POST['Password']!= ''){
		//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
		$conn = new mysqli("localhost", "root", "","digimon");
		
		//This line makes the sql
        $sql = "INSERT INTO `tamers`(`First_name`, `Last_name`, `Data`, `Email`, `Password`, `Phone`,`Rank`,`Is_admin`) VALUES ('{$_POST['First_name']}','{$_POST['Last_name']}','{$_POST['Data']}','{$_POST['Email']}','{$_POST['Password']}','{$_POST['Phone']}','stone','no')";
		//This line runs the query and checks for an error
		if(!$conn->query($sql)){
			echo $sql;
			echo "Error description: " . $mysqli -> error;
		}else{
			exit(header("Location: index.php"));
		}
	}else{
		echo "You can't leave anything empty!";
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
    <div class="login">
        <h1 class='mainheading'>Register User</h1>
        <!-- First_name`, `Last_name`, `Data`, `Email`, `Password`, `Phone -->
        <form action="register_user.php" method="post">
            <label>First_name:</label>
            <input type="text" id="username" name="First_name" class="login_input"></input>
            <label>Last_name:</label>
            <input type="text" id="nickname" name="Last_name" class="login_input"></input>
            <label>Data:</label>
            <input type="date" id="password" name="Data" class="login_input"></input>
            <label>Email:</label>
            <input type="text" id="team_id" name="Email" class="login_input"></input>
            <label>Password:</label>
            <input type="password" id="team_id" name="Password" class="login_input"></input>
            <label>Phone:</label>
            <input type="text" id="team_id" name="Phone" class="login_input"></input>
            <input type="submit" class='login_button'></input>
        </form>
        <a href="index.php">Cancel Registration</a>

    </div>
</body>

</html>