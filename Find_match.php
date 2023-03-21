<?php
session_start();
$User_id = $_SESSION['User_id'];

//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
$conn = new mysqli("localhost", "root", "", "digimon");
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
    <h1>select your digimon</h1>
    <?php
    if (isset($_SESSION['Digimon_id'])) {
        $Digimon_id = $_SESSION['Digimon_id'];
        $sql = "SELECT * FROM `tamers_owns` JOIN digimon on tamers_owns.Digimon_id = digimon.Digimon_id WHERE User_id = '$User_id' AND tamers_owns.Digimon_id = '$Digimon_id'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            // get the stat
            $Name = $row["Name"];
            $Type = $row["Type"];
            $HP = $row["HP"];
            $Attack = $row["Attack"];
            $Level = $row["Level"];

            $add_HP = ($Level - 1) * 50;
            $add_Attack = ($Level - 1) * 10;

            echo
            "Name: " . $Name . "<hr>" .
                "Type: " . $Type . "<hr>" .
                "HP: " . $HP . "(+" . $add_HP . ")" . "<hr>" .
                "Attack: " . $Attack . "(+" . $add_Attack . ")" . "<hr>" .
                "Level: " . $Level . "<hr>";
        }
    }
    else {
        echo "please select a digimon to fight";
    }



    ?>
    <a href="select_digimon.php">change one</a>
    <hr>
    <a href="tamer_info.php">go back</a>
    <hr>


    <a href="normal_competiton.php">Normal_fight</a>
    <br>
    <a href="normal_competiton.php">Join a tournment</a>

    <h1>current tournment</h1>

</body>

</html>