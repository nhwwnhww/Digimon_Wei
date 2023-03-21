<?php
session_start();
    $User_id = $_SESSION['User_id'];

    if (!$_SESSION['Digimon_id']=''){
        $Digimon_id = $_SESSION['Digimon_id'];
        echo $Digimon_id;
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
    <form action="Find_match.php" method="post">
        <h1>select your digimon</h1>
        <?php
            if (isset($Digimon_id)){
                echo $Digimon_id;
            }
        ?>
        <a href="select_digimon.php">change one</a>


        <h1>normal fight</h1>
        <select name="Type" id="">
            <option value="Normal_fight">Normal_fight</option>
            <option value="tournment">Join a tournment</option>
        </select>
        <input type="submit" class='login_button'></input>
    </form>

    <h1>current tournment</h1>

</body>

</html>