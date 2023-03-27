<?php
session_start();
// if (time() < $_SESSION['time'] + 120){
$User_id = $_SESSION['User_id'];
$First_name = $_SESSION['First_name'];
// $_SESSION['time'] = time();
// }
// else {
//     exit(header("Location: index.php"));
// }

//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
$conn = new mysqli("localhost", "root", "", "digimon");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tamer <?php echo $User_id ?>'s page</title>
</head>

<body>
    <a href="index.php">sign out</a>
    <h1>Hi! <?php echo $First_name ?></h1>
    <a href="user_update.php">Update User</a>
    <a href="Find_match.php">Find match</a>
    <hr>

    <?php
    //sql 
    $sql = "SELECT * FROM `tamers_owns` JOIN digimon on tamers_owns.Digimon_id = digimon.Digimon_id 
        WHERE `User_id` = '$User_id' 
        ORDER BY `tamers_owns`.`Level` DESC";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        echo '<table>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Level</th>
            </tr>';

            $count = 0;
        while ($row = $result->fetch_assoc()) {
            //put in row
            echo "<tr>
            <td>{$row["Name"]}</td>
            <td>{$row["Type"]}</td>
            <td>{$row["Level"]}</td>

            </tr>";
            // output only five 
            $count+=1;
            if($count == 5){
                break;
            }
        }
        echo '</table>';
    }
    ?>
    <a href="select_digimon.php?web=tamer_info">show more</a>

    <h1>Get random digimon</h1>
    <a href="get_random_digimon.php">click me!</a>
    <hr>
</body>

</html>