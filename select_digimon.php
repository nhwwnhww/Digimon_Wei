<?php
session_start();
$User_id = $_SESSION['User_id'];

if (isset($_POST["Digimon_id"])) {
    $_SESSION['Digimon_id'] = $_POST["Digimon_id"];
    echo $_SESSION['Digimon_id'];
    exit(header("Location: Find_match.php"));
}

$sort = "";

if (isset($_GET["sort"])) {
    $sort = $_GET["sort"];

    if ($sort == "HP") {
        $sort = "ORDER BY `digimon`.`HP` DESC";
    }
    if ($sort == "Attack") {
        $sort = "ORDER BY `digimon`.`Attack` DESC";
    }
    if ($sort == "Level") {
        $sort = "ORDER BY `tamers_owns`.`Level` DESC";
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
    <h1>HP sort</h1>
    <a href="select_digimon.php?sort=HP">click me</a>
    <h1>Attack sort</h1>
    <a href="select_digimon.php?sort=Attack">click me</a>
    <h1>Level sort</h1>
    <a href="select_digimon.php?sort=Level">click me</a>


    <h1>back</h1>
    <a href="Find_match.php">back</a>
    <form action="select_digimon.php" method="post">
        <table>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>HP</th>
                <th>Attack</th>
                <th>Level</th>
            </tr>
            <?php

            //Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
            $conn = new mysqli("localhost", "root", "", "digimon");

            //sql 
            $sql = "SELECT * FROM `tamers_owns` 
    JOIN digimon on tamers_owns.Digimon_id = digimon.Digimon_id
    WHERE `User_id` = '$User_id'
    $sort
    ";

            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                //put in row
                echo "<tr>
            <td>{$row["Name"]}</td>
            <td>{$row["Type"]}</td>
            <td>{$row["HP"]}</td>
            <td>{$row["Attack"]}</td>
            <td>{$row["Level"]}</td>
            <td>ID: <input type='submit' name='Digimon_id' value='{$row["Digimon_id"]}'><-choose it</td>
            </tr>";
            }
            ?>
        </table>

    </form>
</body>

</html>