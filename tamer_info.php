`<?php
session_start();
// if (time() < $_SESSION['time'] + 120){
    $User_id = $_SESSION['User_id'];
    $First_name = $_SESSION['First_name'];
    // $_SESSION['time'] = time();
// }
// else {
//     exit(header("Location: index.php"));
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tamer <?php echo $User_id?>'s page</title>
</head>
<body>
    <a href="index.php">sign out</a>
    <h1>Hi! <?php echo $First_name?></h1>
<a href="user_update.php">Update User</a>
<a href="Find_match.php">Find match</a>
<h1>Get random digimon</h1>
<a href="get_random_digimon.php">click me!</a>
</body>
</html>