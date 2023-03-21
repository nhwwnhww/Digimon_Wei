<?php
session_start();
$User_id = $_SESSION['User_id'];
$Digimon_id = $_SESSION['Digimon_id'];

// echo $User_id;
// echo $Digimon_id;

//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
$conn = new mysqli("localhost", "root", "", "digimon");

$opponet_id = $_POST['opponet_id'];
$opponet_digimon_id = $_POST['opponet_digimon_id'];

// echo $opponet_id;
// echo $opponet_digimon_id;

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

    <!-- I need upload participate date -->

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

    <button onclick="battle(digimon1, digimon2);">fight!</button>
    <a href="Find_match.php">cancel</a>

    <form action="Fighting.php" action="post" style="display:none">
        <input type="submit" value="ok">
    </form>

    <button onclick="test()"> test</button>

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
            const delayIncrement = 700; // 1000 milliseconds (1 second) delay between messages

            while (!digimon1.isDefeated() && !digimon2.isDefeated()) {
                addToOutput(`Round ${round}:`, delay);
                delay += delayIncrement;

                digimon1.attackOpponent(digimon2);
                addToOutput(`${digimon1.name} attacks ${digimon2.name}! ${digimon2.name} has ${digimon2.hp} HP left.`, delay);
                delay += delayIncrement;

                if (digimon2.isDefeated()) {
                    addToOutput(`${digimon2.name} is defeated! ${digimon1.name} wins!`, delay);
                    break;
                }

                digimon2.attackOpponent(digimon1);
                addToOutput(`${digimon2.name} attacks ${digimon1.name}! ${digimon1.name} has ${digimon1.hp} HP left.`, delay);
                delay += delayIncrement;

                if (digimon1.isDefeated()) {
                    addToOutput(`${digimon1.name} is defeated! ${digimon2.name} wins!`, delay);
                    break;
                }

                round++;
            }
        }

        const digimon1 = new Digimon(Name, HP, Attack);
        const digimon2 = new Digimon(opponet_Name, opponet_HP, opponet_Attack);
    </script>

    <div id="output">

    </div>
</body>

</html>