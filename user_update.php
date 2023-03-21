<?php
session_start();
if (time() < $_SESSION['time'] + 120){
    $User_id = $_SESSION['User_id'];
    $_SESSION['time'] = time();
}
else {
    exit(header("Location: index.php"));
}

if(isset($_POST['Email'])){
	if ($_POST['Email']!= '' && $_POST['Password']!= ''){
		//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
		$conn = new mysqli("localhost", "root", "","digimon");
		
		//This line makes the sql
        $sql = "UPDATE `tamers`SET `First_name`='{$_POST['First_name']}',`Last_name`='{$_POST['Last_name']}',`Data`='{$_POST['Data']}',`Email`='{$_POST['Email']}',`Password`='{$_POST['Password']}',`Phone`='{$_POST['Phone']}' WHERE `User_id` = '$User_id'";
		//This line runs the query and checks for an error
		if(!$conn->query($sql)){
			echo $sql;
			echo "Error description: " . $mysqli -> error;
		}else{
			exit(header("Location: tamer_info.php"));
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
    <?php
			//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
			$conn = new mysqli("localhost", "root", "","digimon");
			
			//This line makes the sql
			$sql = "SELECT `First_name`,`Last_name`,`Data`,`Email`,`Password`,`Phone` FROM `tamers` WHERE `User_id` = $User_id";
			
			//This line runs the query
			$result = $conn->query($sql);
			
			while($row = $result->fetch_assoc()) {
				//get tamer info
                $First_name=$row["First_name"];
                $Last_name=$row["Last_name"];
                $Data=$row["Data"];
                $Email=$row["Email"];
                $Password=$row["Password"];
                $Phone=$row["Phone"];
			}
			?>

<h1 class='mainheading'>Tamer info update</h1>
        <!-- First_name`, `Last_name`, `Data`, `Email`, `Password`, `Phone -->
        <form action="user_update.php" method="post">
            <label>First_name:</label>
            <input type="text" id="username" value="<?php echo $First_name?>" name="First_name" class="login_input"></input>
            <label>Last_name:</label>
            <input type="text" id="nickname" value="<?php echo $Last_name?>" name="Last_name" class="login_input"></input>
            <label>Data:</label>
            <input type="date" id="password" value="<?php echo $Data?>" name="Data" class="login_input"></input>
            <label>Email:</label>
            <input type="text" id="team_id" value="<?php echo $Email?>" name="Email" class="login_input"></input>
            <label>Password:</label>
            <input type="password" id="team_id" value="<?php echo $Password?>" name="Password" class="login_input"></input>
            <label>Phone:</label>
            <input type="text" id="team_id" value="<?php echo $Phone?>" name="Phone" class="login_input"></input>
            <input type="submit" class='login_button'></input>
        </form>
        <a href="tamer_info.php">Cancel update</a>
</body>
</html>