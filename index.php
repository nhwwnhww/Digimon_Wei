<?php

session_start();
session_destroy();

//If the user has sent through their username
if(isset($_POST['email'])){
	//Create database connection -> 4 variables are 'localhost', username for the localhost (should be 'root', password for loacalhost (should be nothing), and database name
	$conn = new mysqli("localhost", "root", "","digimon");
	
	//This line makes the sql
	$sql = "SELECT * FROM tamers WHERE Email = '{$_POST['email']}' AND password = '{$_POST['password']}'";
	
	//This line runs the query
	$result = $conn->query($sql);
	
	//Check if in database
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $User_id = $row["User_id"];
        $First_name = $row["First_name"];
        // echo "<script>alert($player_id)</script>";
        session_start();
        $_SESSION['User_id'] = $User_id;
        $_SESSION['First_name'] = $First_name;
        $_SESSION['time'] = time();
		exit(header("Location: tamer_info.php"));	
        }

	}else{
		echo "<h1 style='background:red'>Username or password is wrong!</h1>";
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
                <li><a data-bs-toggle="modal" data-bs-target="#exampleModal">Login</a>
                </li>
                <!-- <li><a href="index.html">Menu item 3</a>
				<ul>
					<li><a href="#">Unordered</a></li>
					<li><a href="#">Unordered list item 2.2</a></li>
				</ul>
			</li>
			<li><a href="index.html">Menu item 4</a></li>
			<li><a href="index.html">Themes</a>
				<ul>
					<li><a href="../template/xhtml-3column.html">Bare</a></li>
					<li><a href="../greyscale/xhtml-3column.html">Greyscale</a></li>
					<li><a href="../bluesteel/xhtml-3column.html">Blue Steel</a></li>
					<li><a href="../supergreen/xhtml-3column.html">Supergreen</a></li>
				</ul>
			</li>
			<li><a href="index.html">Page models</a>
				<ul>
					<li><a href="xhtml-1column.html">1 column</a></li>
					<li><a href="xhtml-2column.html">2 column</a></li>
					<li><a href="xhtml-3column.html">3 column</a></li>
					<li><a href="xhtml-text.html">Text content</a></li>
					<li><a href="xhtml-accessibility.html">Accessibility statement</a></li>
					<li><a href="xhtml-applications.html">Applications</a></li>
					<li><a href="xhtml-search-results.html">Search results</a></li>
					<li><a href="xhtml-video.html">Video</a></li>
				</ul>
			</li> -->
            </ul>
        </div>
    </div>

    <div id="page-container">
        <div class="max-width">

            <!-- <div id="nav-section"><div class="box-sizing">
			<h2>Section heading</h2>
			<ul>
				<li><a href="index.html">Menu item</a></li>
				<li><a href="index.html">Menu item</a></li>
				<li><a href="index.html">Menu item</a><ul>
					<li><a href="index.html">Menu item</a></li>
					<li><a href="xhtml-video.html">Online video</a></li>
				</ul></li>
				<li><a href="index.html">Menu item</a>
					<ul>
						<li><a href="#">Unordered list item 1</a>
							<ul>
								<li><a href="#">CUE template</a></li>
								<li><a href="#">Heading 1</a></li>
								<li><a href="#">Unordered list item 3</a></li>
								<li><a href="#">Unordered list item 4</a></li>
							</ul>
						</li>
						<li><a href="#">Unordered list item 3</a></li>
						<li><a href="#">Unordered list item 4</a></li>
					</ul>
				</li>
				<li><a href="index.html">Menu item</a></li>
				<li><a href="index.html">Menu item</a></li>
			</ul>
		</div></div> -->


            <div id="content-container">







                <div id="breadcrumbs">
                    <h2>You are here:</h2>
                    <ol>
                        <li class="last-child"><a href="index.html">Home</a></li>
                        <!-- <li><a href="index.html">Menu item</a></li>
                    <li><a href="index.html">Menu item</a></li>
                    <li class="last-child">Heading 1</li> -->
                    </ol>
                </div>
                <div id="content">

                    <div class="article">
                        <div class="box-sizing">
                            <h1 style="font-family: 'Orbitron', sans-serif">Clash DigiWei</h1>

                            <hr>

                            <img src="./home.jpg" alt="Home img" width="100%">

                            <hr>

                            <button type="button" class="btn btn-primary w-50" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Play Now
                            </button>

                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="index.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="login">

                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Email:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="username" name="email" class="login_input"
                                                        class="form-control-plaintext"></input>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Password:</label>

                                                <div class="col-sm-10">
                                                    <input type="password" id="password" name="password" class="login_input"
                                                        class="form-control-plaintext"></input>
                                                </div>
                                            </div>



                                            <a href="register_user.php">Register User</a>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Login"></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="article"><div class="box-sizing">
					
					<h1>CUE template</h1><div class="page-options" id="pre-page-options"><ul>
        
        
        <li><a href="http://www.qld.gov.au/share/">Share</a>
        
        </li>
        <li><a href="http://www.qld.gov.au/help/feeds/">Subscribe</a><ul>
            <li><a href="#">RSS feed</a></li>
            <li><a href="#">Atom feed</a></li>
            <li><a href="#">Email newsletter</a></li>
        </ul></li>
    </ul></div><div class="section" id="section-introduction">
	    <p>Welcome to the CUE 3.0 template!</p>
    	
    	<p>Use the 'Themes' and 'Page models' items from the site navigation menu to preview different variants that are included with the CUE template.</p>
    </div><div class="section" id="section-documentation">
        <h2>Documentation</h2>
        <p>The following template documentation is also available:</p>
        <ul>
            <li><a href="../../docs/cue-template-change-log.doc" class="download"><span class="title">Template change log</span><span class="meta"> (DOC, 72 KB)</span></a></li>
            <li><a href="../../docs/cue-template-conformance-requirements.doc" class="download"><span class="title">Template conformance requirements</span><span class="meta"> (DOC, 95 KB)</span></a></li>
            <li>Implementation advice:<ul>
                <li><a href="../../docs/cue-how-to-customise-the-template.doc" class="download"><span class="title">How to customise the template</span><span class="meta"> (DOC, 90 KB)</span></a></li>
                <li><a href="../../docs/cue-template-reset-styles.doc" class="download"><span class="title">CUE template reset styles</span><span class="meta"> (DOC, 49 KB)</span></a></li>
            </ul></li>
        </ul>
    </div><div class="section" id="section-more-info">
        <h2>More information</h2>
        <p>More information is available on the <a href="http://ssq.govnet.qld.gov.au/web/">Queensland Government WebCentre</a>
        	or by contacting the Smart Service Queensland <a href="onlineservices@smartservice.qld.gov.au">Online Services Unit</a>.</p>
    </div>
                    
				</div></div> -->

                </div>

                <!-- <div class="aside"><div class="box-sizing">
				<h2>Supplementary content</h2>
				<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.</p>
			</div></div>

			<div class="aside"><div class="box-sizing">
				<h2>Supplementary content</h2>
				<p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
			</div></div> -->

                <!-- <div id="document-properties">
                    <div class="box-sizing">
                        <dl>
                            <dt>Last reviewed</dt>
                            <dd>28 June 2010</dd>
                            <dt>Last updated</dt>
                            <dd>29 June 2010</dd>
                        </dl>
                    </div>
                </div> -->


                <!-- <div id="page-feedback">
                    <form action="" method="post">
                        <h2>Rate this page</h2>
                        <ol class="questions">
                            <li class="select1">
                                <fieldset>
                                    <strong>How useful was the information on this page?</strong>
                                    <ol class="options">
                                        <li><label for="rating-high"><input type="radio" name="rating" id="rating-high"
                                                    value="high"> Very useful</label></li>
                                        <li><label for="rating-medium"><input type="radio" name="rating"
                                                    id="rating-medium" value="medium"> Somewhat useful</label></li>
                                        <li><label for="rating-low"><input type="radio" name="rating" id="rating-low"
                                                    value="low"> Not very useful</label></li>
                                    </ol>
                                </fieldset>
                            </li>
                            <li class="textarea">
                                <label>Other feedback</label>
                                <textarea name="feedback" id="feedback" cols="50" rows="7"></textarea>
                            </li>
                        </ol>
                        <div class="actions">
                            <input class="primary-action" type="submit" value="Submit feedback">
                        </div>
                    </form>
                </div> -->

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