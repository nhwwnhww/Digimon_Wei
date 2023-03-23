<?php

session_start();
    $User_id = $_SESSION['User_id'];

//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
$conn = new mysqli("localhost", "root", "","digimon");
			
//This line makes the sql
$sql = "SELECT * FROM `digimon`";

//This line runs the query
$result = $conn->query($sql);

$count = 0;
while($result->fetch_assoc()) {
    $count+=1;
}

$get_random = rand(1,$count);
// echo $get_random;

$sql = "SELECT * FROM `tamers_owns` WHERE `User_id` = '$User_id' AND `Digimon_id`='$get_random'";
$result = $conn->query($sql);
$output = "You draw a duplicate digimon, the level of that digimon will be added by one.";

//Check if in database
if ($result->num_rows > 0) {
    
    
    while($row = $result->fetch_assoc()) {
        // get the level
        $original_level = $row["Level"];
    }
        // if duplicate then add level
        $level = $original_level + 5;

        $sql = "UPDATE `tamers_owns` SET `Level`='$level' WHERE `User_id`='$User_id' AND `Digimon_id`='$get_random'";
        $result = $conn->query($sql);

        // echo 'already';
    }
    else{
        $date = date("Y/m/d"); 
        $sql = "INSERT INTO `tamers_owns`(`User_id`, `Digimon_id`, `Data`, `Level`) VALUES ('$User_id','$get_random','$date','1')";
        $result = $conn->query($sql);
        $level = 1;
        
        $output = "You have drawn a digimon!!";
    }
    $sql = "SELECT `Name`, `Type`, `HP`, `Attack` FROM `digimon` WHERE `Digimon_id` = '$get_random'";
    $result = $conn->query($sql);	
    while($row = $result->fetch_assoc()) {
        // get the stat
        $Name = $row["Name"];
        $Type = $row["Type"];
        $HP = $row["HP"];
        $Attack = $row["Attack"];
    }

    // echo "Name: ".$Name;
    // echo "Type: ".$Type;
    // echo "HP: ".$HP;
    // echo "Attack: ".$Attack;
    // echo "Level: ".$level;

    echo '<script>alert("'. $output .'")</script>';
    echo '<script>alert("'.
    "Name: ". $Name . '\n'.
    "Type: ". $Type . '\n'.
    "HP: ". $HP . '\n'.
    "Attack: ". $Attack . '\n'.
    "Level: ". $level
    .'")</script>';
?>

<h1>DAMNNN!!!</h1>
<h3><?php echo $Name?> , LET'S GOOO</h3>
<a id="jump" href="tamer_info.php">return to previous page</a>
<?php
    if (isset($_GET["web"])){
        $web = $_GET["web"];
        // echo $web;
        echo "<script>document.getElementById('jump').href = '$web.php';</script>";
    }
?>