<?php
/*
 * Template Name: Update - Habitat HABS
 */

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Habitat Update - Subnautica</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width initial-scale=1, maximum-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro' rel='stylesheet' type='text/css'>

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/css/swagger.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/css/normalize.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/css/main.css" media="(min-width: 768px)">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/css/narrow.css" media="(max-width: 768px)">

	<script src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/vendor/modernizr-2.8.3.min.js"></script>

</head>
<body class="loading">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<nav class = "navbar navbar-default navbar-fixed-top">
	<div class = "container-fluid">


		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapsed" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><img src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/logos/subnautica_logo_32px.png" class = "img-responsive navbar-logo" alt = "subnautica logo"></a>
		</div><!--/navbar-header-->


		<div class="collapse navbar-collapse" id="navbar-collapsed">
			<ul class="nav navbar-nav">
				<form action="http://store.steampowered.com/app/264710/" target="_blank">
					<button class="btn btn-default navbar-btn buy-btn">Buy now on&nbsp;<img src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/socials/steam_full.png" class = "buy-icon"></button>
				</form>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="https://www.facebook.com/subnautica" target="_blank"><img src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/socials/subnautica_facebook.png" class = "img-responsive social-icon" alt = "subnautica facebook" data-toggle = "tooltip" title = "faceyspace" data-placement = "bottom"> </a></li>
				<li><a href="https://twitter.com/subnautica" target="_blank"><img src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/socials/subnautica_twitter.png" class = "img-responsive social-icon" alt = "subnautica twitter" data-toggle = "tooltip" title = "twitter" data-placement = "bottom"></a></li>
				<li><a href="https://youtube.com/user/subnautica" target="_blank"><img src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/socials/subnautica_youtube.png" class = "img-responsive social-icon" alt = "subnautica youtube" data-toggle = "tooltip" title = "youtube" data-placement = "bottom"></a></li>
				<li><a href="https://instagram.com/subnautica/" target="_blank"><img src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/socials/subnautica_instagram.png" class = "img-responsive social-icon" alt = "subnautica instagram" data-toggle = "tooltip" title = "instagram" data-placement = "bottom"></a></li>
				<li><a href="http://steamcommunity.com/app/264710" target="_blank"><img src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/socials/subnautica_steam.png" class = "img-responsive social-icon" alt = "subnautica steam community" data-toggle = "tooltip" title = "steam community" data-placement = "bottom"></a></li>
				<li><a href="http://unknownworlds.com/subnautica/" target="_blank"><img src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/socials/subnautica_uwe.png" class = "img-responsive social-icon" alt = "subnautica blog" data-toggle = "tooltip" title = "development blog" data-placement = "bottom"></a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dev Information<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="https://trello.com/b/yxoJrFgP/subnautica" target="_blank">Production Tracker</a></li>
						<li><a href="https://trello.com/b/eLEWpq3P/subnautica-playtesting" target="_blank">Bug Tracker</a></li>
						<li><a href="http://subnautica.unknownworlds.com/#/subnautica/checkins" target="_blank">Repository Checkins</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="http://subnautica.unknownworlds.com/#/subnautica/feedback" target="_blank">Feedback Reports</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="http://steamcommunity.com/sharedfiles/filedetails/?id=356376081" target="_blank">Feedback Guide</a></li>
						<li><a href="http://steamcommunity.com/sharedfiles/filedetails/?id=355026171" target="_blank">Experimental Updates Guide</a></li>
						<li><a href="http://steamcommunity.com/sharedfiles/filedetails/?id=356376081" target="_blank">Feedback Guide</a></li>
						<li><a href="http://steamcommunity.com/sharedfiles/filedetails/?id=448862051" target="_blank">Technical Support Guide</a></li>
					</ul>
				</li><!--/dropdown-->
			</ul>

		</div><!--/collapse navbar-collapse-->
	</div>
</nav>


<main>
	<div id="skrollr-body">
		<section id="slide-1" class="homeSlide">
			<div class="bcg">
				<div class="hsContainer">
					<div class="hsContent">

						<div class="video_container">
							<video autoplay loop muted poster="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/video/subnautica_habitat_1_still.jpg"
							       id="bgvid"
							       data-anchor-target="#slide-1"
							       data-bottom-top="background-position: 50% 0px"
							       data-top-bottom="background-position: 50% -100px;"
							       data-anchor-target="#slide-1">
								<source src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/video/subnautica_habitat_1.mp4" type = "video/mp4">
							</video>
						</div>

						<div id="landing-content">
							<img class="landing-content-img" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/logos/subnautica_logo_small.png" /><br />
							<img class="landing-content-img" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/logos/title.png" />
							<p class="big-picture-copy">A software upgrade has been downloaded to your Survival PDA. This upgrade adds new blueprints to your database, enhances the PDA's ability to read the environment, and better prepares you to survive for extended periods in harsh conditions.<br /><br />
								<a href="#slide-1-dialog" id="landing-console-open"><img class="log" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/log-128.png" /></a></p>
						</div>

						<div id="slide-1-dialog" class="modalDialog dialogDialog">
							<div>
								<a href="#close" title="Close" class="close-modal">X</a>
								<div class="scrollme">
									<h4>Colonial Headquarters 15 minutes prior to Aurora impact.</h4>
									<p>Controller: Sit rep!</p>

									<p>Analyst: Ma'am, the Aurora's gone dark. Last known position on collision course with planet 4546B.</p>

									<p>Controller: Did the life pods launch?</p>

									<p>Analyst: None registered so far, Ma'am. And there's something else.</p>

									<p>Controller: Say it.</p>

									<p>Analyst: When the Aurora left dock, her emergency equipment was still on factory settings.</p>

									<p>Controller: You're telling me we have a bird in the soup, and their Survival PDAs are running vanilla?!</p>

									<p>Analyst: That's the situation, Ma'am... Ma'am, what should we do?</p>

									<p>Controller: Bring me every star chart, tech geek and concentration enhancer in the building...</p>

									<p>Analyst: Yes Ma'am!</p>

									<p>Controller: ...and god damn it you build me an update package, and you find me a way to flash them Version 1.1!</p>
								</div>

							</div>
						</div>

					</div>
				</div>
			</div>
		</section>

		<section id="slide-2" class="homeSlide">
			<div class="bcg">
				<div class="hsContainer">
					<div class="hsContent">

						<p class="big-picture-copy">Please study this short instructional video to help familiarize yourself with your PDA's new functionality.</p>

						<div class="pda">
							<div class="embed-responsive embed-responsive-16by9 youtube trailer">
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/D6bbdr-z2KE"></iframe>
							</div>

						</div>

						<div class="sea-surface bcg-width"></div>

					</div>
				</div>
			</div>

		</section>

		<section id="slide-3" class="homeSlide">
			<div class="bcg" data-anchor-target="#slide-3">
				<div class="hsContainer">
					<div class="hsContent">
						<h3>New Habitat Blueprints Available <a href="#slide-3-dialog" id="slide-3-log"><img class="log" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/log-128.png" /></a></h3>
						<p>Default modules still provide reliable shelter, but they have been augmented with more advanced structural designs providing enhanced work space, visibility and ease of access.</p>

						<div id="slide-3-dialog" class="modalDialog dialogDialog">
							<div>
								<a href="#close" title="Close" class="close-modal">X</a>
								<p>Analyst: Ma'am, there's not enough bandwidth to send everything, but I think I can optimise the automated habitat terraforming algorithms to fit them in.</p>

								<p>Controller: You mean to say we have survivors out there with rock-faces jutting into their habitats? Make it so!</p>

							</div>
						</div>

						<div id="base-diagram" >
							<img id="base-arrows" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_arrows.svg" data-center="opacity:1;" data-100-top="opacity: 1;" data-306-top="opacity: 0;" data-anchor-target="#slide-3" />
							<div id="base-glass" class="base-diagram-copy" data-center="left: 180px; top: 30px;" data-100-top="left: 180px; top: 30px;" data-306-top="left: -200px;" data-anchor-target="#slide-3">
								<h4>
									<a href="#base-glass-modal">Glass Corridors</a>
								</h4>
							</div>
							<div id="base-glass-modal" class="modalDialog">
								<div>
									<a href="#close" title="Close" class="close-modal">X</a>
									<h4>Glass Corridors</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_glass.jpg" alt="Glass Corridors" />
									<p>A less efficient, less structurally sound way to build in a straight line, or around a corner. Glass walls offers enhanced defensive awareness and - depending on the environment - aesthetic value.</p>
								</div>
							</div>
							<div id="base-compartment" class="base-diagram-copy" data-center="left: 320px; bottom: -20px;" data-100-top="left: 320px; bottom: -20px;" data-306-top="left: -200px;" data-anchor-target="#slide-3">
								<h4>
									<a href="#base-compartment-modal">Large Compartment</a>
								</h4>
							</div>
							<div id="base-compartment-modal" class="modalDialog">
								<div>
									<a href="#close" title="Close" class="close-modal">X</a>
									<h4>Large Compartment</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_room.jpg" alt="Large Compartment" />
									<p>A large module with 7 multi-purpose ports, in addition to standard floor and ceiling access panels. Customizable with XL Windows, hull reinforcements, or as a corridor hub.</p>
								</div>
							</div>
							<div id="base-vertical" class="base-diagram-copy" data-center="right: 65px; top: 11px;"
							     data-100-top="right: 65px; top: 11px;" data-306-top="right: -200px;" data-anchor-target="#slide-3">
								<h4>
									<a href="#base-vertical-modal">Vertical Connector</a>
								</h4>
							</div>
							<div id="base-vertical-modal" class="modalDialog">
								<div>
									<a href="#close" title="Close" class="close-modal">X</a>
									<h4>Vertical Connector</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_vertical.jpg" alt="Vertical Connector" />
									<p>A more efficient and structurally sound way to build up, or down. Ladder must be fabricated separately.</p>
								</div>
							</div>
							<div id="base-observatory" class="base-diagram-copy" data-center="right: -30px; bottom: 50px;" data-100-top="right: -30px; bottom: 50px;" data-306-top="right: -200px;" data-anchor-target="#slide-3">
								<h4>
									<a href="#base-observatory-modal">The Observatory</a>
								</h4>
							</div>
							<div id="base-observatory-modal" class="modalDialog">
								<div>
									<a href="#close" title="Close" class="close-modal">X</a>
									<h4>The Observatory</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_observatory.jpg" alt="The Observatory" />
									<p>95% enamelled glass for maximum visibility and integrity, this module nonetheless introduces structural vulnerabilities under extreme pressures. Also plays mood music.</p>
								</div>
							</div>
							<div id="base-moonpool" class="base-diagram-copy" data-center="left: 100px; bottom: 75px;" data-100-top="left: 100px; bottom: 75px;" data-306-top="left: -200px;" data-anchor-target="#slide-3">
								<h4>
									<a href="#base-moonpool-modal">The Moon Pool</a>
								</h4>
							</div>
							<div id="base-moonpool-modal" class="modalDialog">
								<div>
									<a href="#close" title="Close" class="close-modal">X</a>
									<h4>The Moon Pool</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_moonpool.jpg" alt="The Moon Pool" />
									<p>A vast undertaking for only the most developed underwater habitats. The Moonpool provides easy access to the local environment, in addition to docking capabilities.</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>

		<section id="slide-4" class="homeSlide">
			<div class="bcg" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-4">
				<div class="hsContainer">
					<div class="hsContent">

						<a href="#slide-4-dialog"><img class="log" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/log-128.png" /></a>
						<div id="slide-4-dialog" class="modalDialog dialogDialog">
							<div>
								<a href="#close" title="Close" class="close-modal">X</a>
								<p>Controller: The moment we're done here I want to know who let that ship leave dock without a single room in the constructor database!</p>

							</div>
						</div>

					</div>

				</div>

			</div>
		</section>

		<section id="slide-5" class="homeSlide">
			<div class="bcg">
				<div class="hsContainer">
					<div class="hsContent">
						<h3>New Utility Blueprints Available</h3>
						<p>For survivors who find themselves occupying their habitat for extended periods, the new utilities are designed to make that habitat a little more like home.</p>
						<div id="room-diagram" >
							<img id="room-arrows" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/room_arrows.svg" data-center="opacity:1;" data-100-top="opacity:1;" data-306-top="opacity: 0;" data-anchor-target="#slide-5" />
							<img id="room-door" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/room_diagram_door.png" data-center="opacity:0;" data-100-top="opacity: 0;" data-300-top="opacity: 1;" data-anchor-target="#slide-5"/>

							<div id="utility-locker" class="base-diagram-copy" data-center="left: -5px; top: 108px;" data-100-top="left: -5px; top: 108px;" data-306-top="left: -200px;" data-anchor-target="#slide-5">
								<h4>
									<a href="#utility-locker-modal">Small Storage Locker</a>
								</h4>
							</div>
							<div id="utility-locker-modal" class="modalDialog">
								<div>
									<a href="#close" title="Close" class="close-modal">X</a>
									<h4>Small Storage Locker</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_lockers.jpg" alt="Small Storage Locker" />
									<p>37.5% reduction in capacity from the default locker, this model features an editable label for categorized storage solutions, and is more economical to construct.</p>
								</div>
							</div>
							<div id="utility-aquarium" class="base-diagram-copy" data-center="left: 30px; bottom: 6px;" data-100-top="left: 30px; bottom: 6px;" data-306-top="left: -200px;" data-anchor-target="#slide-5">
								<h4>
									<a href="#utility-aquarium-modal">The Aquarium</a>
								</h4>
							</div>
							<div id="utility-aquarium-modal" class="modalDialog">
								<div>
									<a href="#close" title="Close" class="close-modal">X</a>
									<h4>The Aquarium</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_aquarium.jpg" alt="The Aquarium" />
									<p>The Aquarium features self-sustaining plant life, and can hold up to 8 small aquatic creatures. It is designed to deliver a convenient solution for storage of live specimens for research or consumption, but may be re-purposed in a more permanent habitat for use as an aesthetic feature.</p>
								</div>
							</div>
							<div id="utility-signs" class="base-diagram-copy" data-center="right: 25px; top: 152px;" data-100-top="right: 25px; top: 152px;" data-306-top="right: -200px;" data-anchor-target="#slide-5">
								<h4>
									<a href="#utility-signs-modal">Interior Signs</a>
								</h4>
							</div>
							<div id="utility-signs-modal" class="modalDialog">
								<div>
									<a href="#close" title="Close" class="close-modal">X</a>
									<h4>Interior Signs</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_sign.jpg" alt="Interior Signs" />
									<p>With the improved structural blueprints included in this update, navigation within complex habitats becomes a problem. Signs are the solution.</p>
								</div>
							</div>
							<div id="utility-bench" class="base-diagram-copy" data-center="right: 35px; bottom: 100px;" data-100-top="right: 35px; bottom: 100px;" data-306-top="right: -200px;" data-anchor-target="#slide-5">
								<h4>
									<a href="#utility-bench-modal">The Bench</a>
								</h4>
							</div>
							<div id="utility-bench-modal" class="modalDialog">
								<div>
									<a href="#close" title="Close" class="close-modal">X</a>
									<h4>The Bench</h4>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/bases/base_bench.jpg" alt="The Bench" />
									<p>Prolonged periods of physical exertion increase metabolic rate. Install The Bench in an aesthetically pleasing location for maximum reduction in the effects of thirst and hunger.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="slide-6" class="homeSlide">
			<div class="bcg" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-6">
				<div class="hsContainer">
					<div class="hsContent">

						<div class="big-picture-copy">
							<h3>Moonpool update received.</h3>
							<p>Submersible upgrade capability pending.<br />
								ERROR: Essential blueprint data not found! More fragments needed for full analysis.</p>
						</div>

					</div>
				</div>
			</div>

		</section>

		<section id="slide-7" class="homeSlide homeSlideTall">
			<div class="bcg">
				<div class="hsContainer">
					<div class="hsContent">

						<div id="slide-7-title">
							<h3>New Power Generation Blueprints Available <a href="#slide-7-dialog"><img class="log" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/log-128.png" /></a></h3>
							<p>Temporary power generators have been recalled and replaced with experimental designs to deliver sustainable electric charge under a variety of extreme conditions.</p>
						</div>

						<div style="width:100%; float:left;">
							<div class="power-icon-set">
								<div class="power-icon-set-inner">
									<div class="power-copy">
										<img class="power-img" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/power/solar.png" alt="Solar Panel" />
										<h4>All-Weather Solar Panel</h4>
										<p>Charges in sunlight, efficiency decreases in low-light conditions. Can store power for later use. </p>
									</div>

									<div class="power-copy">
										<img class="power-img" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/power/transmitter.png" alt="Power Transmitter" />
										<h4>Power Transmitter</h4>
										<p>Connects generators and utilities, enabling construction of generators at greater distances from the habitat.</p>
									</div>

									<div class="power-copy">
										<img class="power-img" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/power/bio.png" alt="Bioreactor" />
										<h4>Bioreactor</h4>
										<p>Putrefies plant matter to generate heat, which is converted into electric power.</p>
									</div>
								</div>
							</div>
						</div>

						<br />

						<div class="power-icon-set">
							<div class="power-icon-set-inner">
								<div class="power-copy " data-center="opacity: 1" data-bottom-top="opacity: 0" data-anchor-target="#slide-7">
									<img class="power-img" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/power/thermal.png" alt="Thermal Plant" />
									<h4>Thermal Plant</h4>
									<p>Heat differential between titanium plates generates electric charge in temperatures greater than 15C.</p>
								</div>

								<div class="power-copy " data-center="opacity: 1" data-bottom-top="opacity: 0" data-anchor-target="#slide-7">
									<img class="power-img" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/power/nuclear.png" alt="Nuclear Reactor" />
									<h4>Nuclear Reactor</h4>
									<p>Uranium-powered solution for small colonies. Highly efficient, highly dangerous.</p>
								</div>
							</div>
						</div>


						<div id="slide-7-dialog" class="modalDialog dialogDialog">
							<div>
								<a href="#close" title="Close" class="close-modal">X</a>
								<p>Controller: Listen up, I want this package streamlined! You don't need a focus-group approved surface texture when you're fighting for your life on an alien world. If the power systems are beta, pack them up and move on!</p>

							</div>
						</div>

					</div>
				</div>
			</div>

		</section>

		<section id="slide-8" class="homeSlide">
			<div class="bcg" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-8">
				<div class="hsContainer">
					<div class="hsContent">

						<div class="big-picture-copy">
							<h3>New Biome Detected: Grand Reef</h3>
							<p>Depth: 200-450m Unidentified flora detected. Unexploited resources detected. Moonpool Fragments Detected. Danger detected.</p>
						</div>

					</div>

				</div>
		</section>

		<section id="slide-9" class="homeSlide">
			<div class="bcg" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-9">
				<div class="hsContainer">
					<div class="hsContent">

						<div class="img-col-3 magnetite">
							<div class="big-picture-copy">
								<h4>New Metal Detected: Magnetite</h4>
								<p>A material with powerful magnetic properties known to interfere with the scanning capabilities of earlier software versions. Resources needed to fabricate the Compass have been updated.</p>
							</div>
						</div>

						<div class="img-col-3 kelp">
							<div class="big-picture-copy">
								<h4>New Organic Material Detected: Creepvine Seed Clusters</h4>
								<p>New applications have been discovered for this common species of kelp. Its seed pods can be processed to produce a basic, water-resistant Lubricant, essential for construction of advanced machinery.</p>
							</div>
						</div>

						<div class="img-col-3 uranium">
							<div class="big-picture-copy">
								<h4>New Metal Detected: Uranium</h4>
								<p>Though rarely encountered in high density, even trace quantities of Uranium contain enough chemical energy to power a small nuclear reactor. Nearest deposits: Grand Reef.</p>
							</div>
						</div>

					</div>
				</div>
			</div>

		</section>


		<section id="slide-10" class="homeSlide">
			<div class="bcg">
				<div class="hsContainer">
					<div class="hsContent">

						<div id="slide-10-title">
							<h3>EMERGENCY UPDATE: FLOOD CONTROL <a href="#slide-10-dialog"><img class="log" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/log-128.png" /></a></h3>

							<p>A gravity control glitch previously caused habitat compartments to flood at a constant rate, regardless of size or elevation. With this update:</p>

							<ul>
								<li>Larger compartments take longer to fill;</li>
								<li>Higher compartments will not flood until lower compartments are full;</li>
								<li>Compartments will not fill further than the external water level.</li>
							</ul>

							<p>These changes are demonstrated in the following instructional video.</p>

							<div id="base-flood-vid">
								<div class="embed-responsive embed-responsive-16by9 youtube">
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/C-oBJtJ-O6M"></iframe>
								</div>
							</div>



						</div>


						<div id="slide-10-dialog" class="modalDialog dialogDialog">
							<div>
								<a href="#close" title="Close" class="close-modal">X</a>
								<p>Controller: Tell me about this planet the Aurora was orbiting.</p>

								<p>Analyst: Unexplored. Capable of supporting life. Ocean planet. O2 atmos-</p>

								<p>Controller: Backtrack. Ocean planet?</p>

								<p>Analyst: Affirmative. Does it mean something?</p>

								<p>Controller: It means we're in more trouble than we thought. Get me the fluid dynamics team!</p>

							</div>
						</div>

					</div>
				</div>
			</div>


		</section>


		<section id="slide-11" class="homeSlide">
			<div class="bcg">
				<div class="hsContainer">
					<div class="hsContent">

						<h3>Flood Management: Bulkhead Doors</h3>

						<div id="slide-11-copy" class="clearfix">

							<img id="bulkhead-gif" class="vid" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/subnautica_habitat_bulkheads.gif" alt="Bulkhead Demonstration" />

							<p>New blueprint available. To help manage the very real threat of drowning the bulkhead reinforces the habitat, and provides effective means of hermetically sealing off different subsections in case of emergency. The following instructional simulator may aid in understanding new flooding scenarios and how to manage them.</p>

						</div>

						<div id="flood-sim" class="big-picture-copy">
							<canvas id="flood_sim_canvas" width="640" height="400" style="border:1px solid #000000; float: left;"></canvas>
							<form action="" id="flood_sim_controls" style="float: left; padding: 25px;">
								<input type="checkbox" id="flood_sim_equalize_compartments" value="Equalize Compartments">Equalize Compartments<br>
								<input type="checkbox" id="flood_sim_show_pressure" value="Show Pressure">Show Pressure<br>
								Exterior Water Level<br>
								<input type="range" id="flood_sim_global_water_level" min=0 max=100><br>
								<fieldset>
									<legend>Action:</legend>
									<input type="radio" id="flood_sim_place_corridor" name="place" value="corridor">Place Corridor<br>
									<input type="radio" id="flood_sim_place_door" name="place" value="door">Place Door<br>
									<input type="radio" id="flood_sim_place_leak" name="place" value="leak">Place Leak<br>
									<input type="radio" id="flood_sim_place_clear" name="place" value="clear">Erase<br>
									<input type="radio" id="flood_sim_interact" name="place" value="interact">Interact<br>
								</fieldset>
							</form>
						</div>

					</div>
				</div>
			</div>

		</section>

		<section id="slide-12" class="homeSlide">
			<div class="bcg">
				<div class="hsContainer">
					<div class="hsContent">

						<div class="mail-list-form" data-bottom-top="opacity: 0;" data-center="opacity: 1" data-anchor-target="#slide-12">
							<h3>Get development updates <a href="#slide-12-dialog"><img class="log" src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/log-128.png" /></a></h3>
							<p>Sign up to the Subnautica development mailing list! Receive a newsletter when Subnautica receives an update like this one.</p>

							<br />

							<form action="//subnauti.us6.list-manage.com/subscribe/post?u=bf02bb8619c14d31027c73d97&amp;id=8fa28cd2f4" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								<div class = "form-group text-center">
									<input type="email" value="" name="EMAIL" class="form-control" placeholder = "email address" id="mce-EMAIL">
									<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div>
									<div style="position: absolute; left: -5000px;"><input type="text" name="b_bf02bb8619c14d31027c73d97_8fa28cd2f4" tabindex="-1" value=""></div>
									<br />
									<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default"></div>
								</div>
							</form>
						</div>


						<div id="slide-12-dialog" class="modalDialog dialogDialog">
							<div>
								<a href="#close" title="Close" class="close-modal">X</a>
								<p>???</p>

							</div>
						</div>

						<div class="footer">
							<div class = "row">
								<div class = "col-md-3 text-center">
									<img src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/img/socials/uwe_full_vector.svg" alt = "unknown worlds entertainment" class = "uwe-footer">
								</div>
								<div class = "col-md-6 text-center uwe-footer">
									<p><a href = "http://unknownworlds.com/subnautica/community/" target="_blank">community </a>|
										<a href = "http://status.unknownworlds.com/" target="_blank"> system status </a>|
										<a href = "http://unknownworlds.com/subnautica/community/" target="_blank"> copyright </a>|
										<a href = "http://unknownworlds.com/subnautica/privacy-policy/" target="_blank"> privacy policy </a>|
										<a href = "http://unknownworlds.com/video-policy/" target="_blank"> youtube & twitch monetisation </a>|
										<a href = "http://unknownworlds.com/subnautica/terms-of-use/" target="_blank"> terms of use </a></p>
								</div>
								<div class = "col-md-3 text-center uwe-footer">
									<p>© 2015, <a href = "http://unknownworlds.com" target="_blank">Unknown Worlds Entertainment</a>. All rights reserved.</p>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>

	</div>

</main>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/vendor/bootstrap.min.js"></script>
<script src = "<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/parallax.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/imagesloaded.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/skrollr.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/skrollr.menu.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/_main.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/habitat-update/js/flood_sim.js"></script>


<!-- Turn off videos when more than 70% out of view -->
<script type="text/javascript">

	var videos = document.getElementsByTagName("video"), fraction = 0.3;

	function checkScroll() {

		for(var i = 0; i < videos.length; i++) {
			var video = videos[i];
			var x = 0,
				y = 0,
				w = video.offsetWidth,
				h = video.offsetHeight,
				r, //right
				b, //bottom
				visibleX, visibleY, visible,
				parent;

			parent = video;
			while (parent && parent !== document.body) {
				x += parent.offsetLeft;
				y += parent.offsetTop;
				parent = parent.offsetParent;
			}

			r = x + w;
			b = y + h;

			visibleX = Math.max(0, Math.min(w, window.pageXOffset + window.innerWidth - x, r - window.pageXOffset));
			visibleY = Math.max(0, Math.min(h, window.pageYOffset + window.innerHeight - y, b - window.pageYOffset));

			visible = visibleX * visibleY / (w * h);

			if (visible > fraction) {
				video.play();
			} else {
				video.pause();
			}
		}

	}

	window.addEventListener('scroll', checkScroll, false);
	window.addEventListener('resize', checkScroll, false);

	//check at least once so you don't have to wait for scrolling for the video to start
	window.addEventListener('load', checkScroll, false);
	checkScroll();

	// This is as good a place as any to initalise the Flood Sim script.
	FloodSimInitialize();

</script>

<!--Google Analytics-->
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'CHANGE_ME', 'auto');
	ga('send', 'pageview');
</script>
<script type = "text/javascript" charset = "utf-8">
	$('[data-toggle="tooltip"]').tooltip();
</script>

</body>
</html>
