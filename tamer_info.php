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

$admin_display = 'none';

$sql = "SELECT `Is_admin` FROM `tamers` WHERE `User_id` = $User_id";

$result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["Is_admin"] == 'yes'){
                $admin_display = 'block';
            }
        }
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
                <li><a href="#">About me</a>
                    <ul>
                        <li>
                            <a href="select_digimon.php?web=tamer_info">My digimon</a>
                        </li>
                        <li>
                            <a href="competition_record.php">My battle history</a>
                        </li>
                        <li><a href="user_update.php">Update my information</a></li>
                    </ul>
                </li>
                <li><a href="Find_match.php">Find match</a></li>
                <li>
                    <a href="index.php">sign out</a>
                </li>
            </ul>
        </div>
    </div>

    <div id="page-container">
        <div class="max-width">
            <div id="nav-section">
                <div class="box-sizing">
                    <h1>My digimon</h1>
                    <?php
    //sql 
    $sql = "SELECT * FROM `tamers_owns` JOIN digimon on tamers_owns.Digimon_id = digimon.Digimon_id 
        WHERE `User_id` = '$User_id' 
        ORDER BY `tamers_owns`.`Level` DESC";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        echo "<table class='table table-striped table-hover table-bordered'>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Level</th>
            </tr>";

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
                    <br>    
                    <a href="get_random_digimon.php">click me to get random digimon</a>
                    <br>

                    <a href="Upload_digimon_data.php" style="display:<?php echo $admin_display?>">upload digimon data</a>
                </div>
            </div>

            <div id="content-container">
                <div id="breadcrumbs">
                    <h2>You are here:</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li class="last-child">Tamer's Home Page</li>
                    </ol>
                </div>
                <div id="content">

                    <div class="article">
                        <div class="box-sizing">
                            <h1>Hi! <?php echo $First_name ?></h1>
                            <a href="user_update.php">Update User</a>
                            <hr>
                            <div class="container">
                                <div class="row">
                                    <a href="Find_match.php" class="btn btn-primary text-white" style="text-decoration:none">Find match</a>
                                </div>
                            </div>
                            


                        </div>
                    </div>
                </div>
                <div class="aside">
                    <div class="box-sizing">
                        <h1>competition</h1>
                        <?php
    //sql 
    $sql = "SELECT *, tamers_owns.User_id as user FROM `competion` 
    JOIN tamers_owns on competion.Winner_own_id = tamers_owns.Owner_id
    WHERE `competion`.`Organizer_id` = '$User_id' 
    ORDER BY `competion`.`Competion_id` DESC";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        echo "<table class='table table-striped table-hover table-bordered'>
            <tr>
                <th>Competition ID</th>
                <th>data</th>
                <th>result</th>
            </tr>";

            $count = 0;
            while ($row = $result->fetch_assoc()) {
            $result_1 = 'lost';
            $winner = $row["user"];
            if($row["user"] == $User_id){
                $result_1 = 'win';
            }
            //put in row
            echo "<tr>
            <td>{$row["Competion_id"]}</td>
            <td>{$row["Date"]}</td>
            <td>$result_1</td>

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
                        <a href="competition_record.php">show more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


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