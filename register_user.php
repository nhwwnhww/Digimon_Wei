<?php
//If the user has sent through their username
if(isset($_POST['Email'])){
	if ($_POST['Email']!= '' && $_POST['Password']!= ''){
		//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
		$conn = new mysqli("localhost", "root", "","digimon");
		
		//This line makes the sql
        $sql = "INSERT INTO `tamers`(`First_name`, `Last_name`, `Data`, `Email`, `Password`, `Phone`,`Rank`,`Is_admin`) VALUES ('{$_POST['First_name']}','{$_POST['Last_name']}','{$_POST['Data']}','{$_POST['Email']}','{$_POST['Password']}','{$_POST['Phone']}','stone','no')";
		//This line runs the query and checks for an error
		if(!$conn->query($sql)){
			echo $sql;
			echo "Error description: " . $mysqli -> error;
		}else{
			exit(header("Location: index.php"));
		}
	}else{
		echo "You can't leave anything empty!";
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
            </ul>
        </div>
    </div>

    <div id="page-container">
        <div class="max-width">
            <div id="content-container">
                <div id="breadcrumbs">
                    <h2>You are here:</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li class="last-child">Register Page</li>
                    </ol>
                </div>
                <div id="content">

                    <div class="article">
                        <div class="box-sizing">
                            <section class="vh-100 gradient-custom">
                                <div class="container py-5 h-100">
                                    <div class="row justify-content-center align-items-center h-100">
                                        <div class="col-12">
                                            <div class="card shadow-2-strong card-registration"
                                                style="border-radius: 15px;">
                                                <div class="card-body p-4 p-md-5">
                                                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                                                    <form action="register_user.php" method="post">

                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">

                                                                <div class="form-outline">
                                                                    <input type="text" id="firstName"
                                                                        class="form-control form-control-lg"
                                                                        name="First_name" />
                                                                    <label class="form-label" for="firstName">First
                                                                        Name</label>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 mb-4">

                                                                <div class="form-outline">
                                                                    <input type="text" id="lastName"
                                                                        class="form-control form-control-lg"
                                                                        name="Last_name" />
                                                                    <label class="form-label" for="lastName">Last
                                                                        Name</label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-4 d-flex align-items-center">

                                                                <div class="form-outline datepicker w-100">
                                                                    <input type="date"
                                                                        class="form-control form-control-lg"
                                                                        id="birthdayDate" name="Data" />
                                                                    <label for="birthdayDate"
                                                                        class="form-label">Birthday</label>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 mb-4 d-flex align-items-center">

                                                                <div class="form-outline">
                                                                    <input type="tel" id="phoneNumber"
                                                                        class="form-control form-control-lg"
                                                                        name="Phone" />
                                                                    <label class="form-label" for="phoneNumber">Phone
                                                                        Number</label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-outline">
                                                                <input type="email" id="emailAddress"
                                                                    class="form-control form-control-lg" name="Email" />
                                                                <label class="form-label" for="emailAddress">Email
                                                                    (Email will be you username)</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-outline">
                                                                <input type="password" id="emailAddress"
                                                                    class="form-control form-control-lg"
                                                                    name="Password" />
                                                                <label class="form-label"
                                                                    for="emailAddress">Password</label>
                                                            </div>
                                                        </div>

                                                        <div class="mt-4 pt-2">
                                                            <a class="btn btn-secondary btn-lg text-white"
                                                                href="index.php">Cancel</a>
                                                            <input class="btn btn-primary btn-lg" type="submit"
                                                                value="Submit" />

                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
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