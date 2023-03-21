<?php
session_start();
$User_id = $_SESSION['User_id'];
$Digimon_id = $_SESSION['Digimon_id'];

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
    <?php

    //my digimon stat
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
    }

    echo "<h1>my digimon</h1>" .
        "Name: " . $Name . "<br>" .
        "Type: " . $Type . "<br>" .
        "HP: " . $HP . "(+" . $add_HP . ")" . "<br>" .
        "Attack: " . $Attack . "(+" . $add_Attack . ")" . "<br>" .
        "Level: " . $Level . "<hr>"
    ?>
    <a href="Find_match.php">cancel this competion</a>
    <hr>

        <!-- find other tamer to fight PHP part-->
        <?php
        //others digimon stat
        $sql = "SELECT * FROM `tamers_owns` 
    JOIN digimon on tamers_owns.Digimon_id = digimon.Digimon_id
    JOIN tamers on tamers_owns.User_id = tamers.User_id
    WHERE tamers_owns.User_id != '$User_id'";
        $result = $conn->query($sql);

        // each part

        while ($row = $result->fetch_assoc()) {

            // <!-- find other tamer to fight HTML Part START-->
            echo "<form action='Fighting.php' method='post'>";

            // get the stat
            $Tamer = $row["First_name"];
            $Name = $row["Name"];
            $Type = $row["Type"];
            $HP = $row["HP"];
            $Attack = $row["Attack"];
            $Level = $row["Level"];

            // get opponent and digimon id
            $opponet_id = $row["User_id"];
            $opponet_digimon_id = $row["Digimon_id"];

            echo  "<input type='hidden' name='opponet_id' value='$opponet_id'>";
            echo  "<input type='hidden' name='opponet_digimon_id' value='$opponet_digimon_id'>";


            $add_HP = ($Level - 1) * 50;
            $add_Attack = ($Level - 1) * 10;

            echo 
                "Opponent name: " . $Tamer . "<br>" .
                "Name: " . $Name . "<br>" .
                "Type: " . $Type . "<br>" .
                "HP: " . $HP . "(+" . $add_HP . ")" . "<br>" .
                "Attack: " . $Attack . "(+" . $add_Attack . ")" . "<br>" .
                "Level: " . $Level ;

                echo '<input type="submit" value="Fight!!">';
            echo "</form>";
            echo "<hr>";
                // <!-- find other tamer to fight HTML Part END-->
        }


        ?>
        

</body>

</html>