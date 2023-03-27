<?php
session_start();
$User_id = $_SESSION['User_id'];
$Digimon_id = $_SESSION['Digimon_id'];
$Owner_id = $_SESSION['Owner_id']; 


// echo $User_id;
// echo $Digimon_id;

//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
$conn = new mysqli("localhost", "root", "", "digimon");

// post competition type
// opponet id / digimon
$opponet_id = $_POST['opponet_id'];
$opponet_digimon_id = $_POST['opponet_digimon_id'];
$opponet_Owner_id = $_POST['opponet_Owner_id'];

// echo $opponet_id;
// echo $opponet_digimon_id;

if(isset($_POST["result"])){
    $date = date("Y/m/d"); 
    $result = $_POST["result"];


    if ($result = "win"){
        $Winner_own_id = $Owner_id;
        $Loser_own_id = $opponet_Owner_id;

        $sql = "SELECT `Level` FROM `tamers_owns` WHERE `Owner_id` = '$Owner_id'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            // get the stat
            $Level = $row["Level"];
        }
        $Level += 1;

        $sql = "UPDATE `tamers_owns` SET `Level`='$Level' WHERE `Owner_id` = '$Owner_id'";
        $result = $conn->query($sql);

    }
    else{
        $Winner_own_id = $opponet_Owner_id;
        $Loser_own_id = $Owner_id;
    }

    
    $sql = "INSERT INTO `competion`( `Organizer_id`,`Winner_own_id`, `Loser_own_id`, `Date`) VALUES ('$User_id','$Winner_own_id','$Loser_own_id','$date')";
    $result = $conn->query($sql);
    echo $sql;

    exit(header("Location: tamer_info.php"));	

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

    <h1>My digimon stat</h1>
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

    echo
    "Name: " . $Name . "<br>" .
        "Type: " . $Type . "<br>" .
        "HP: " . $HP . "(+" . $add_HP . ")" . "<br>" .
        "Attack: " . $Attack . "(+" . $add_Attack . ")" . "<br>" .
        "Level: " . $Level . "<hr>"

    ?>
    <h1>opponet digimon stat</h1>
    <?php

    //my digimon stat
    $sql = "SELECT * FROM `tamers_owns` JOIN digimon on tamers_owns.Digimon_id = digimon.Digimon_id WHERE User_id = '$opponet_id' AND tamers_owns.Digimon_id = '$opponet_digimon_id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        // get the stat
        $opponet_Name = $row["Name"];
        $opponet_Type = $row["Type"];
        $opponet_HP = $row["HP"];
        $opponet_Attack = $row["Attack"];
        $opponet_Level = $row["Level"];
        $opponet_Owner_id = $row["Owner_id"];

        $opponet_add_HP = ($opponet_Level - 1) * 50;
        $opponet_add_Attack = ($opponet_Level - 1) * 10;
    }

    echo
    "Name: " . $opponet_Name . "<br>" .
        "Type: " . $opponet_Type . "<br>" .
        "HP: " . $opponet_HP . "(+" . $opponet_add_HP . ")" . "<br>" .
        "Attack: " . $opponet_Attack . "(+" . $opponet_add_Attack . ")" . "<br>" .
        "Level: " . $opponet_Level . "<hr>"

    ?>
    <script>
    // my digimon
    var Name = '<?php echo $Name ?>';
    var HP = <?php echo $HP ?>;
    var Attack = <?php echo $Attack ?>;
    var Level = <?php echo $Level ?>;
    HP = HP + (Level - 1) * 50;
    Attack = Attack + (Level - 1) * 10;

    // opponet digimon
    var opponet_Name = '<?php echo $opponet_Name ?>';
    var opponet_HP = <?php echo $opponet_HP ?>;
    var opponet_Attack = <?php echo $opponet_Attack ?>;
    var opponet_Level = <?php echo $opponet_Level ?>;
    opponet_HP = opponet_HP + (opponet_Level - 1) * 50;
    opponet_Attack = opponet_Attack + (opponet_Level - 1) * 10;

    // game result
    var result = "";
    // game result output delay time count
    var delay_time = 0;

    class Digimon {
        constructor(name, hp, attack) {
            this.name = name;
            this.hp = hp;
            this.attack = attack;
        }

        takeDamage(damage) {
            this.hp -= damage;
            if (this.hp < 0) {
                this.hp = 0;
            }
        }

        attackOpponent(opponent) {
            opponent.takeDamage(this.attack);
        }

        isDefeated() {
            return this.hp === 0;
        }
    }

    function addToOutput(message, delay) {
        setTimeout(() => {
            const outputDiv = document.getElementById("output");
            const newLine = document.createElement("div");
            newLine.innerText = message;
            outputDiv.appendChild(newLine);
        }, delay);
    }

    async function battle(digimon1, digimon2) {
        let round = 1;
        let delay = 0;
        const delayIncrement = 500; // 1000 milliseconds (1 second) delay between messages

        while (!digimon1.isDefeated() && !digimon2.isDefeated()) {
            addToOutput(`Round ${round}:`, delay);
            delay += delayIncrement;

            digimon1.attackOpponent(digimon2);
            addToOutput(`${digimon1.name} attacks ${digimon2.name}! ${digimon2.name} has ${digimon2.hp} HP left.`,
                delay);
            delay += delayIncrement;

            if (digimon2.isDefeated()) {
                addToOutput(`${digimon2.name} is defeated! ${digimon1.name} wins!`, delay);
                result = "win";
                delay_time = delay;
                break
            }

            digimon2.attackOpponent(digimon1);
            addToOutput(`${digimon2.name} attacks ${digimon1.name}! ${digimon1.name} has ${digimon1.hp} HP left.`,
                delay);
            delay += delayIncrement;

            if (digimon1.isDefeated()) {
                addToOutput(`${digimon1.name} is defeated! ${digimon2.name} wins!`, delay);
                result = "lose";
                delay_time = delay;
                break
            }

            round++;
        }
    }

    const digimon1 = new Digimon(Name, HP, Attack);
    const digimon2 = new Digimon(opponet_Name, opponet_HP, opponet_Attack);

    function battleresult() {
        // var digimon_result = battle(digimon1, digimon2);
        battle(digimon1, digimon2);
        const form = document.getElementById("result_form");
        setTimeout(function() {
            form.style.display = 'block';
        }, delay_time);

        const B_result = document.getElementById("result");
        B_result.value = result;
    }
    </script>

    <button onclick="battleresult()">fight!</button>
    <br>
    <a href="Find_match.php">cancel</a>
    <br>

    <form action="Fighting.php" action="post" id="result_form" style="display:none" method="post">

        <!-- result -->
        <input type="hidden" id="result" name="result" value="">
        <!-- opponet id / digimon -->
        <input type="hidden" id="result" name="opponet_id" value="<?php echo $opponet_id?>">
        <input type="hidden" id="result" name="opponet_digimon_id" value="<?php echo $opponet_digimon_id?>">
        <input type="hidden" id="result" name="opponet_Owner_id" value="<?php echo $opponet_Owner_id?>">
        <!-- competition type -->
        <input type="hidden" id="result" name="Type" value="<?php echo $Type?>">

        <input type="submit" value="Go back">
    </form>



    <div id="output">

    </div>
</body>

</html>