<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
<!-- ===================================================================
DO NOT EDIT FILE
This file is the code for the top of every page except Studio.  It shouldn't need
to be changed for any reason other than perhaps changing the Google Analytics ID.
=================================================================== -->
<head> 
    <title>UNC Low Brass Studio for Trombone, Euphonium, and Tuba</title> 
    <link rel="stylesheet" type="text/css" href="./style.css" /> 
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />	
    <meta name="keywords"
	  content="trombone, euphonium, tuba, low brass, low-brass, UNC, tbone, brass chamber music, student" />
    <meta name="description" 
	  content="The resource for current and future students studying 
		   trombone, euphonium, or tuba at UNC, the University of North 
		   Carolina Chapel Hill." />
    <meta name="author" content="Michael Kris" />
    <meta name="copyright" content="January 2012" />

</head> 

<body> 

<script type="text/javascript">

 var _gaq = _gaq || [];
 _gaq.push(['_setAccount', 'UA-19162732-1']);
 _gaq.push(['_trackPageview']);

 (function() {
   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
 })();

</script>

<div id="backgroundHome"> 
	<div id="container"> 
	
		<div id="banner"> 
		</div> 
		
		<div id="navcontainer" class="clearfix"> 
			
			<?php 
				$pagename = strrchr($_SERVER["REQUEST_URI"], "/");
				$pagename = substr($pagename, 1);
			?>
			
			<ul id="navlist"> 
			<!-- Displays links and assigns CSS class to current page link -->
				<?php 
					if ($pagename == "index.php" or $pagename == "")
						echo('<li class="active">');
					else echo('<li>'); 
				?>	
				<a href="index.php">Home</a></li> 
				
				<?php 
					if ($pagename == "events.php")
						echo('<li class="active">');
					else echo('<li>'); 
				?>
				<a href="events.php">Events</a></li> 
				
				<?php 
					if ($pagename == "biopage.php")
						echo('<li class="active">');
					else echo('<li>'); 
				?>
				<a href="biopage.php">Faculty Bio</a></li> 
				
				<?php 
					if ($pagename == "resources.php")
						echo('<li class="active">');
					else echo('<li>'); 
				?>				
				<a href="resources.php">Resources</a></li> 

				<?php 
					if ($pagename == "audio.php")
						echo('<li class="active">');
					else echo('<li>'); 
				?>					
				<a href="audio.php">Audio</a></li> 

				<?php 
					if ($pagename == "studio.php")
						echo('<li class="active">');
					else echo('<li>'); 
				?>	
				<a href="studio.php">Inside the Studio</a></li> 
			</ul> 
		</div> 

		
