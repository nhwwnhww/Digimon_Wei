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


    if ($result == "win"){
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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en-AU">

<head>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

    <title>CLASH DIGIMON</title>

    <link rel="stylesheet" type="text/css" href="cue/css/qg.css" media="all">
    <!--[if lt IE 8]><link rel="stylesheet" href="cue/css/qg-ie.css" type="text/css" media="all"><![endif]-->

    <link href="cue/css/layout-small.css" media="all" rel="stylesheet" type="text/css">
    <link href="cue/css/layout-medium.css" media="only all and (min-width: 43em) and (max-width: 65em)" rel="stylesheet"
        type="text/css">
    <link href="cue/css/layout-large.css" media="only all and (min-width: 65em)" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="cue/images/favicon.ico">

    <!--[if lt IE 9]>
    	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
    	<script type="text/javascript" src="cue/js/ie-layout.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="theme/agency.css" media="all">
    <link rel="stylesheet" type="text/css" href="theme/bs-layout-large.css" media="only all and (min-width: 65em)">
    <!--[if lt IE 8]><link rel="stylesheet" href="theme/agency-ie.css" type="text/css" media="all"><![endif]-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>

    <style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }
    </style>
</head>

<body>

    <!--[if lt IE 9]><script type="text/javascript">jQuery && jQuery.transformer({addClasses:true})</script><![endif]-->
    <div id="access">
        <h2>Skip links and keyboard navigation</h2>
        <ul>
            <li><a href="#content">Skip to content</a></li>
            <li><a href="#nav-site">Skip to navigation</a></li>
            <li><a href="#footer">Skip to footer</a></li>
            <li><a href="http://www.qld.gov.au/help/accessibility/keyboard.html#section-aria-keyboard-navigation">Use
                    tab and cursor keys to move around the page (more information)</a></li>
        </ul>
    </div>

    <div id="header">
        <div class="box-sizing">
            <div class="max-width">
                <!-- <h2>Site header</h2> -->

                <a id="qg-coa" href="http://www.qld.gov.au/">
                    <!--[if gte IE 7]><!--><img src="theme/qg-coa.png" width="287" height="50"
                        alt="Queensland Government">
                    <!--<![endif]-->
                    <!--[if lte IE 6]><img src="theme/qg-coa-ie6.png" width="287" height="50" alt="Queensland Government"><![endif]-->
                    <img src="cue/images/qg-coa-print.png" class="print-version" alt="">
                </a>

                <ul id="tools">
                    <li><a accesskey="3" href="http://www.qld.gov.au/#sitemap">Site map</a></li>
                    <li><a accesskey="4" href="http://www.qld.gov.au/contact/">Contact us</a></li>
                    <li><a href="http://www.qld.gov.au/help/">Help</a></li>
                    <li class="last-child">
                        <form action="http://pan.search.qld.gov.au/search/search.cgi" id="search-form">
                            <div class="search-wrapper">
                                <label for="search-query">Search Queensland Government</label>
                                <input accesskey="5" type="text" name="query" id="search-query" size="27" value="">
                                <input type="submit" class="submit" value="Search">
                                <input type="hidden" name="num_ranks" value="10">
                                <input type="hidden" name="tiers" value="off">
                                <input type="hidden" name="collection" value="qld-gov">
                                <input type="hidden" name="profile" value="qld">
                            </div>
                        </form>
                    </li>
                </ul>

                <h2 id="site-name"><a href="/" accesskey="2">
                        <!--[if gte IE 7]><!--><img src="theme/site-name.png" height="28" alt="Site name">
                        <!--<![endif]-->
                        <!--[if lte IE 6]><img src="theme/site-name-ie6.png" height="28" alt="Site name"><![endif]-->
                        <img src="theme/site-name-print.png" height="28" class="print-version" alt="">
                    </a></h2>

            </div>
        </div>
    </div>


    <div id="nav-site">
        <div class="max-width">
            <h2>Site navigation</h2>
            <ul>
                <li><a href="index.php">Home</a>
                </li>
                <li><a href="tamer_info.php">Tamer Page</a>
                </li>
                <li><a href="Find_match.php">Select Digimon</a></li>
                <li><a href="normal_competiton.php">Find your opponent</a></li>
            </ul>
        </div>
    </div>

    <div id="page-container">
        <div class="max-width">

            <div id="nav-section">
                <div class="box-sizing">
                    <h2>My Digimon stat</h2>

                    <?php
                              //my digimon stat
                              $sql = "SELECT * FROM `tamers_owns` JOIN digimon on tamers_owns.Digimon_id = digimon.Digimon_id WHERE User_id = '$User_id' AND tamers_owns.Digimon_id = '$Digimon_id'";
                              $result = $conn->query($sql);
                              while ($row = $result->fetch_assoc()) {
                                  // get the stat
                                  $Name = $row["Name"];
                                  $ID = $row["Digimon_id"];
                                  $Type = $row["Type"];
                                  $HP = $row["HP"];
                                  $Attack = $row["Attack"];
                                  $Level = $row["Level"];
                                  $date = $row["Data"];

                                  $add_HP = ($Level - 1) * 50;
                                  $add_Attack = ($Level - 1) * 10;
                              }

                              echo "<div class='col'>
                              <div class='card h-100'>
                                <div class='card-body'>
                                  <h5 class='card-title'>$Name</h5>
                                  <p class='card-text'>ID: $ID</p>
                                  <p class='card-text'>Type: $Type</p>
                                  <p class='card-text'>Level: $Level</p>
                                  <p class='card-text'>HP: $HP (+$add_HP)</p>
                                  <p class='card-text'>Attack: $Attack (+$add_Attack)</p>
                                  <p class='card-text'>Owned since: $date</p>
                                </div>
                              </div>
                              </div>";
                              ?>

                </div>
            </div>

            <div id="content-container">
                <div id="breadcrumbs">
                    <h2>You are here:</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="tamer_info.php">Tamer's Home Page</a></li>
                        <li><a href="Find_match.php">Select Digimon</a></li>
                        <li><a href="normal_competiton.php">Find your opponent</a></li>
                        <li class="last-child">Fight Page</li>
                    </ol>
                </div>
                <div id="content">

                    <div class="article">
                        <div class="box-sizing">
                            <button class="btn btn-primary text-white" onclick="battleresult()">fight!</button>
                            <hr>
                            <form action="Fighting.php" action="post" id="result_form" style="display:none"
                                method="post">

                                <!-- result -->
                                <input type="hidden" id="result" name="result" value="">
                                <!-- opponet id / digimon -->
                                <input type="hidden" id="result" name="opponet_id" value="<?php echo $opponet_id?>">
                                <input type="hidden" id="result" name="opponet_digimon_id"
                                    value="<?php echo $opponet_digimon_id?>">
                                <input type="hidden" id="result" name="opponet_Owner_id"
                                    value="<?php echo $opponet_Owner_id?>">
                                <!-- competition type -->
                                <input type="hidden" id="result" name="Type" value="<?php echo $Type?>">

                                <input class="btn btn-primary text-white" type="submit" value="Go back">
                            </form>
                            <div id="output" id="content-container">
                            </div>
                            <a class="btn btn-secondary text-white" style="text-decoration:none" href="normal_competiton.php">cancel</a>
                            <br>

                            
                        </div>
                        
                    </div>
                    <div class="aside">
                    <div class="box-sizing">
                        <h3>Opponent digimon</h3>
                        <?php

                                //my digimon stat
                                $sql = "SELECT * FROM `tamers_owns` JOIN digimon on tamers_owns.Digimon_id = digimon.Digimon_id WHERE User_id = '$opponet_id' AND tamers_owns.Digimon_id = '$opponet_digimon_id'";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    // get the stat
                                    $opponet_Name = $row["Name"];
                                    $opponet_ID = $row["Digimon_id"];
                                    $opponet_Type = $row["Type"];
                                    $opponet_HP = $row["HP"];
                                    $opponet_Attack = $row["Attack"];
                                    $opponet_Level = $row["Level"];
                                    $opponet_Owner_id = $row["Owner_id"];

                                    $opponet_add_HP = ($opponet_Level - 1) * 50;
                                    $opponet_add_Attack = ($opponet_Level - 1) * 10;
                                }

                              echo "<div class='col'>
                              <div class='card h-100'>
                                <div class='card-body'>
                                  <h5 class='card-title'>$opponet_Name</h5>
                                  <p class='card-text'>ID: $opponet_ID</p>
                                  <p class='card-text'>Type: $opponet_Type</p>
                                  <p class='card-text'>Level: $opponet_Level</p>
                                  <p class='card-text'>HP: $opponet_HP (+$opponet_add_HP)</p>
                                  <p class='card-text'>Attack: $opponet_Attack (+$opponet_add_Attack)</p>
                                </div>
                              </div>
                              </div>";
                              ?>
                    </div>
                </div>
                </div>
                

            </div>
            
        </div>
        
    </div>

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
                                    const newLine = document.createElement("p");
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
                                    addToOutput(
                                        `${digimon1.name} attacks ${digimon2.name}! ${digimon2.name} has ${digimon2.hp} HP left.`,
                                        delay);
                                    delay += delayIncrement;

                                    if (digimon2.isDefeated()) {
                                        addToOutput(`${digimon2.name} is defeated! ${digimon1.name} wins!`, delay);
                                        result = "win";
                                        delay_time = delay;
                                        break
                                    }

                                    digimon2.attackOpponent(digimon1);
                                    addToOutput(
                                        `${digimon2.name} attacks ${digimon1.name}! ${digimon1.name} has ${digimon1.hp} HP left.`,
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


    <div id="footer">
        <div id="fat-footer">
            <div class="max-width">
                <div class="box-sizing">
                    <h2>Explore this site</h2>

                    <div class="section">
                        <h3><a href="/about/">Information about</a></h3>
                        <ul>
                            <li><a href="/about/driving-and-transport/">Driving and public transport</a></li>
                            <li><a href="/about/education-and-learning/">Education and learning</a></li>
                            <li><a href="/about/environment-and-resources/">Environment and resources</a></li>
                            <li><a href="/about/health-and-communities/">Health and communities</a></li>
                            <li><a href="/about/jobs-and-work/">Jobs and work</a></li>
                            <li><a href="/about/law-and-safety/">Law and safety</a></li>
                            <li><a href="/about/business-and-industry/">Business and industry</a></li>
                            <li><a href="/about/leisure-and-culture/">Leisure and culture</a></li>
                        </ul>
                    </div>

                    <div class="section">
                        <h3><a href="/government/">Government</a></h3>
                        <ul>
                            <li><a href="/government/levels-of-government.html">Levels of government</a></li>
                            <li><a href="/government/about-the-queensland-government.html">About the Queensland
                                    Government</a></li>
                            <li><a href="/government/constitution-and-governor.html">Constitution and Governor</a></li>
                            <li><a href="/government/system-of-government.html">System of government</a></li>
                            <li><a href="/government/rights-and-responsibilities.html">Rights and responsibilities</a>
                            </li>
                            <li><a href="/government/elections-and-parliament.html">Elections and parliament</a></li>
                            <li><a href="/government/legislation.html">Legislation</a></li>
                            <li><a href="/government/departments/">Departments</a></li>
                            <li><a href="/government/other-government-bodies/">Other government bodies</a></li>
                            <li><a href="/government/publications/">Reports and publications</a></li>
                            <li><a href="/government/contacts.html">Contacts</a></li>
                        </ul>
                    </div>

                    <div class="section">
                        <h3><a href="/about-queensland/">About Queensland</a></h3>
                        <ul>
                            <li><a href="/about-queensland/moving.html">Moving to Queensland</a></li>
                            <li><a href="/about-queensland/history/">Queensland's history</a></li>
                            <li><a href="/about-queensland/sister-states.html">Sister states</a></li>
                        </ul>
                    </div>

                    <div class="section">
                        <h3><a href="/announcements/">Announcements</a></h3>
                        <ul>
                            <li><a href="/announcements/?region=darlingDownsWestMoreton">Darling Downs / West
                                    Moreton</a></li>
                            <li><a href="/announcements/?region=farNorth">Far North Queensland</a></li>
                            <li><a href="/announcements/?region=fitzroy">Fitzroy</a></li>
                            <li><a href="/announcements/?region=greaterBrisbane">Greater Brisbane</a></li>
                            <li><a href="/announcements/?region=mackayWhitsunday">Mackay / Whitsunday</a></li>
                            <li><a href="/announcements/?region=north">North Queensland</a></li>
                            <li><a href="/announcements/?region=northCoast">North Coast</a></li>
                            <li><a href="/announcements/?region=southCoast">South Coast</a></li>
                            <li><a href="/announcements/?region=west">West Queensland</a></li>
                            <li><a href="/announcements/?region=wideBayBurnett">Wide Bay Burnett</a></li>
                        </ul>
                    </div>

                    <div class="section">
                        <h3><a href="/comment/">Comment on</a></h3>
                        <h3><a href="/my-community/">My community</a></h3>
                        <h3><a href="/services/">Services online</a></h3>
                        <h3><a href="/grants/">Grants</a></h3>
                        <h3 class="feed-link"><a href="/help/feeds/">XML feeds</a></h3>
                    </div>

                </div>
            </div>
        </div>

        <div class="max-width">
            <div class="box-sizing">
                <h2>Site footer</h2>
                <ul>
                    <li class="legal"><a href="http://www.qld.gov.au/legal/copyright/">Copyright</a></li>
                    <li class="legal"><a href="http://www.qld.gov.au/legal/disclaimer/">Disclaimer</a></li>
                    <li class="legal"><a href="http://www.qld.gov.au/legal/privacy/">Privacy</a></li>
                    <li class="legal"><a href="http://www.qld.gov.au/right-to-information/">Right to information</a>
                    </li>
                    <li><a href="http://www.qld.gov.au/help/access/">Accessibility</a></li>
                    <li><a href="http://www.smartjobs.qld.gov.au/">Jobs in Queensland Government</a></li>
                    <li id="languages"><a href="http://www.qld.gov.au/languages/">Other languages</a></li>
                </ul>
                <p class="legal">&copy; The State of Queensland (agency name) 2010&ndash;2013</p>
                <p><a href="http://www.qld.gov.au/" accesskey="1">Queensland Government</a></p>
                <div id="qg-branding">
                    <p><img class="tagline" src="theme/qg-tagline-footer.png" alt="Great state. Great opportunity."></p>
                </div>
            </div>
        </div>
    </div>



    <!--[if gte IE 9]><!-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
    <!--<![endif]-->
    <script type="text/javascript" src="cue/js/qg.js"></script>

    <script type="text/javascript" src="theme/column-heights.js"></script>



</body>

</html>