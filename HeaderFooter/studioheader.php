<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
<!-- ===================================================================
DO NOT EDIT FILE
This file is the code for the top of the Studio file.  It shouldn't need
to be changed for any reason other than perhaps changing the Google Analytics
ID.
=================================================================== -->
<head>
	<title>UNC Low Brass Studio</title> 
	<link rel="stylesheet" type="text/css" href="./style.css" /> 
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	
	<script type="text/javascript" src="./HeaderFooter/fadeslideshow.js">
	/* 
	===================================================================
	Top Studio Slideshow
	=================================================================== 
	*/	
	/***********************************************
	* Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
	* This notice MUST stay intact for legal use
	* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
	* http://www.dynamicdrive.com/dynamicindex14/fadeinslideshow.htm
	***********************************************/
	</script>

	<script type="text/javascript">

	var myImageArray = new Array();
	var myImageArray2 = new Array();

	/**
		PHP Code for finding all slideshow images.
		
		Searches $imageDir for all files of varying types, but isn't too forgiving.
		Only accepts .png .PNG .jpg. and .JPG.
	*/
	<?php
	$imageDir = "./Images/Slideshow/";
	$studentImageDir = "./Images/StudentPics/";
	
	//$fullImageDir = "./Images/LargeSlides/";
	
	pushImages();
	
	/*
	The function pushImages populates an array of URIs to image files stored in $imageDir defined above.
	It makes sure to recognize various image formats and naming conventions (does not support mixed case).
	*/
	function pushImages() 
	{
		global $imageDir;
		global $studentImageDir;		
		global $countImgs;
		global $countStudents;
		//global $fullImageDir;

		// Build top slideshow array
		foreach (glob($imageDir . "*.png") as $png) {
			//tempAr will be populated into the slideshow javascript
			//the first element is the thumbnail
			//the second element is the large image file
			//echo("tempAr = ['$png', '" . substr_replace($png, $fullImageDir, 0, strlen($imageDir)) . "'];");	
			echo("tempAr = ['$png', '$png'];");			
			echo("myImageArray.push(tempAr);" );
			$countImgs += 1;
		}	
		
		foreach (glob($imageDir . "*.PNG") as $png) {
			echo("tempAr = ['$png', '$png'];");					
			echo("myImageArray.push(tempAr);" );
			$countImgs += 1;
		}	
		
		foreach (glob($imageDir . "*.jpg") as $jpg) {
			echo("tempAr = ['$jpg', '$jpg'];");				
			echo("myImageArray.push(tempAr);" );
			$countImgs += 1;
		}	
		
		foreach (glob($imageDir . "*.JPG") as $jpg) {
			echo("tempAr = ['$jpg', '$jpg'];");				
			echo("myImageArray.push(tempAr);" );
			$countImgs += 1;
		}
		
		echo("myImageArray.sort()"); //sort our slideshow alphabetically
		
	}				
	?>
	
	var totalImages = myImageArray.length;	

	var topgallery = new fadeSlideShow({
		wrapperid: "topfadeshow", //ID of blank DIV on page to house Slideshow
		dimensions: [400, 267], //width/height of gallery in pixels. Should reflect dimensions of largest image
		imagearray: [
		<?php
		for ($i = 0; $i<$countImgs; $i++) {
			echo("[myImageArray[$i][0], '', '_blank', '']"); //myImageArray[0][1] was the second term but was removed
			if ($i < $countImgs-1)
				echo(",");
		}
		?>	
		],
		displaymode: {type:'auto', pause:5000, cycles:0, wraparound:false},
		persist: false, //remember last viewed slide and recall within same session?
		fadeduration: 500, //transition duration (milliseconds)
		descreveal: "none",
		togglerid: "fadeshow1toggler"
	})

	</script>
	
	<script type="text/javascript"><!--
/* 
===================================================================
Student Image Slideshow
=================================================================== 
*/	
	
	imageArray = new Array();
	/* Start by parsing the student file and setting up our data structures */
	
	<?php	
	parseFile();
	
	/* 
	Function looks at studentinfo.html and parses it into clean strings.  The file
	is broken into chunks of students (separated by two breaklines), names (first line of each student),
	and names with no spaces (spaces removed from name element).
	*/
	function parseFile()
	{	
		global $studentImageDir;	
		//Parse the studentinfo file, converting HTML characters, end lines, and then cleaning bad chars
		$rawfile = file_get_contents("./studentinfo.html", "r");
		$explodeFile = explode("START HERE-->", $rawfile);
		$cleanInProgress = $explodeFile[1];	
		
		//$htmlfile = htmlspecialchars($rawfile, ENT_QUOTES);
		$cleanInProgress = str_replace("\n", '<br/>', $cleanInProgress);	
		$cleanInProgress = str_replace('"', '\\"', $cleanInProgress);
		$cleanInProgress = str_replace("'", "\\'", $cleanInProgress); 
		$cleanInProgress = ereg_replace("[^A-Za-z0-9<>/&# .@;\"\'\\=:-{},]", "", $cleanInProgress);	
		$cleanInProgress = str_replace("<br/><br/><br/><br/><br/><br/>", "<br/><br/>", $cleanInProgress);		
		$cleanInProgress = str_replace("<br/><br/><br/><br/><br/>", "<br/><br/>", $cleanInProgress);		
		$cleanInProgress = str_replace("<br/><br/><br/><br/>", "<br/><br/>", $cleanInProgress);		
		$cleanString = str_replace("<br/><br/><br/>", "<br/><br/>", $cleanInProgress);
	
		//Declare and store the formatted string into a javascript variable
		echo "var finalString = '" . $cleanString . "';"; 

		$nospaces = ereg_replace("[^A-Za-z0-9<>/]", "", $cleanString); 
		echo "var tempStudentInfo = '" . $nospaces . "';";
		
		$StudentDataWithBlanks = explode("<br/><br/>", $cleanString);
		
		$NamesNoSpaces = explode("<br/><br/>", $nospaces);
		
	?>
	var SlideImages = [];	
	
	<?php	
		//Populate the student images in the javascript array.
		for ($i=0; $i<sizeof($NamesNoSpaces); $i++)
		{
			$explodeName = explode("<br/>", $NamesNoSpaces[$i]);
			$tempPicName = $explodeName[0] . ".png";
			
			if ( file_exists($studentImageDir . $tempPicName) )
				echo "SlideImages.push('" . $tempPicName . "');";
			else
				echo "SlideImages.push('MissingStudentPic.png');";
		}
	}
	?>
		
	//Store the student captions into a Javascript array variable
	var StudentData = finalString.split("<br/><br/>");	

	//Parse out arrays for students and their instruments.  This will be used
	//for the student directory table.
	
	var StudentNames = [];
	var StudentInstruments = [];
	var StudentCaptions = [];
	
	//Parse out the name, instrument, and caption from each block of text.
	//This code is very fickle so to make it handle problems better, we blank out any data missing a student name
	for (i=0; i<StudentData.length; i++)
	{
		var tempName = StudentData[i].split("<br/>")[0];
		var tempInst = StudentData[i].split("<br/>")[1];
		var tempCaption = "";					

		//Parse caption	if student name is not blank	
		var tempParsedStudent = StudentData[i].split("<br/>");
		
		for (j=2; j<tempParsedStudent.length; j++)
		//Iterate through the student's caption to create breaklines between lines and 
		// to prep for population of the StudentCaptions Array
		{
			//Pull out labels
			parsedLine = tempParsedStudent[j].split(":");
			if (parsedLine.length > 1)
			// Only format the bold label if there is a colon on this line.
			{
				for (k=0; k<parsedLine.length; k++)
				{
					if (k==0)
					{
						tempCaption = tempCaption + "<b>" + parsedLine[k] + ":</b>";
					}
					else
						tempCaption = tempCaption + parsedLine[k];
				}
				tempCaption = tempCaption + "<br/>";
			}
			else 
			{
				tempCaption = tempCaption + tempParsedStudent[j] + "<br/>";
			}
		}
		
		// Clean up data
								
		if (!tempInst)
			tempInst = "";		
		
		if (!tempName && !tempInst)
		{
			tempName = "MISSING NAME";
			tempInst = "MISSING INSTRUMENT";
			tempCaption = "MISSING CAPTION";
		}		
		
		StudentNames.push(tempName);
		StudentInstruments.push(tempInst);				
		StudentCaptions.push(tempCaption);
	}
	
	/* Functionality begins here */

	var imageDir = "./Images/StudentPics/";
	var imageNum = 0;	
	var globalCurrentNum = 0;
	var i=0;
	
	for (i=0;i<StudentData.length;i++)
	{
		imageArray[imageNum++] = imageDir + SlideImages[i];	
	}
			
	var totalImages = imageArray.length;	
	
	function getNextImage()
	{
		imageNum = (globalCurrentNum+1) % totalImages;
	
		var new_image = imageArray[imageNum];	

		updateCountMsg(imageNum);	
		updateCaptionMsg(imageNum);
		updateTableItem(imageNum);
		globalCurrentNum = imageNum;
		return(new_image);
	}
	
	function getPrevImage() 
	{
		imageNum = (globalCurrentNum-1+totalImages) % totalImages;
		
		var new_image = imageArray[imageNum];
		
		updateCountMsg(imageNum);	
		updateCaptionMsg(imageNum);
		updateTableItem(imageNum);
		globalCurrentNum = imageNum;
		return(new_image);
	}
	
	function updateCountMsg(currentNum)
	{
		currentCount = document.getElementById("curcount");			
		currentCount.innerHTML = "[" + (currentNum+1) + " of " + totalImages + "]";			
	}
	
	function updateCaptionMsg(currentNum)
	{
		studentNameInstElmnt = document.getElementById("nameInstrument");
		studentCaptionElmnt = document.getElementById("studentCaption");
		
		studentNameInstElmnt.innerHTML = "<h5>" + StudentNames[currentNum] + "</h5><br/>" 
			+ StudentInstruments[currentNum] + "<br/><br/>" ;
		studentCaptionElmnt.innerHTML = StudentCaptions[currentNum];
	}
	
	function updateImage(place, currentNum)
	{
		var new_image = imageArray[currentNum];
		
		document[place].src = new_image;
	}
	
	/*
	This function inserts new cells for the active student and instrument cells and removes
	the two previous cells.  It also must reset the previously selected cells, which is done
	also by inserting two new cells and removing the old two.
	*/
	function updateTableItem(currentNum)
	{	
		var oldStudentRowNum = globalCurrentNum+1; //Table row num is higher than student array index by 1
		var newStudentRowNum = currentNum+1;	   //Table row num is higher than student array index by 1
		var tableElmnt = document.getElementById("studenttable");	
		
		// Replace the previously active cells with standard student and inst cells.
		var oldStudentCell = tableElmnt.rows[oldStudentRowNum].insertCell(-1);
		var oldInstrumentCell = tableElmnt.rows[oldStudentRowNum].insertCell(-1);
		oldStudentCell.innerHTML = "<div class=\"studentCell\">&nbsp;&nbsp;" 
					+ StudentNames[globalCurrentNum] + "</div>";
		oldInstrumentCell.innerHTML = "<div class=\"InstCell\">" 
					+ StudentInstruments[globalCurrentNum] + "&nbsp;&nbsp;</div>";		
		
		tableElmnt.rows[oldStudentRowNum].deleteCell(0);
		tableElmnt.rows[oldStudentRowNum].deleteCell(0);
		
		// Replace the newly selected cells with active cell classes.
		var newStudentCell = tableElmnt.rows[newStudentRowNum].insertCell(-1);
		var newInstrumentCell = tableElmnt.rows[newStudentRowNum].insertCell(-1);
		newStudentCell.innerHTML = "<div class=\"studentCell activeStudentCell\">&nbsp;&nbsp;"
					+ StudentNames[currentNum] + "</div>";
		newInstrumentCell.innerHTML = "<div class=\"InstCell activeInstCell\">" 
					+ StudentInstruments[currentNum] + "&nbsp;&nbsp;</div>";	
		
		tableElmnt.rows[newStudentRowNum].deleteCell(0);
		tableElmnt.rows[newStudentRowNum].deleteCell(0);
		
		globalCurrentNum = currentNum;
	}
	
	function updateBio(currentNum, place)
	{
		updateImage(place, currentNum);
		updateCountMsg(currentNum);	
		updateCaptionMsg(currentNum);
		updateTableItem(currentNum);
	}
	
	function prevImage(place) 
	{
		var new_image = getPrevImage();
		
		document[place].src = new_image;		
	}
	
	function nextImage(place)
	{
		var new_image = getNextImage();
		
		document[place].src = new_image;
	}
	
	function switchImage(place)
	{
		var new_image = getNextImage();
		
		document[place].src = new_image;
			
		var recur_call = "switchImage('"+place+"')";
	}
	
	/* 
	Creates the student table.  The active student must display different than the others and the
	first student selected should be student 0.
	*/
	function fillTable()
	{
		var tableDiv = document.getElementById("studentlistleft");		
		var htmlString = "<table id=\"studenttable\"><tr><th class='studentCell'>Student</th><th class='InstCell'>Instrument(s)</th></tr>";		
		
		for (i=0; i<StudentData.length; i++)
		{
			IDString = "<tr id=\"student" + i + "\" onclick=\"updateBio(" + i + ",'slideImg');\">";
			activeStudentTDs = "<td><div class=\"StudentCell activeStudentCell\">&nbsp;&nbsp;" 
				+ StudentNames[i] + "</div></td>"
				+ "<td><div class=\"InstCell activeInstCell\">" 
				+ StudentInstruments[i] + "&nbsp;&nbsp;</div></td></tr>";
			studentTDs = "<td><div class=\"studentCell\">&nbsp;&nbsp;" + StudentNames[i]
				+ "</div></td><td><div class=\"InstCell\">" + StudentInstruments[i] + "&nbsp;&nbsp;</div></td></tr>";
			
			if (i==globalCurrentNum)
			{
				htmlString = htmlString + IDString + activeStudentTDs;
			}
			else
			{
				htmlString = htmlString + IDString + studentTDs;
			}
		}
		
		tableDiv.innerHTML = htmlString + "</table>";
		globalCurrentNum = 0;
	}
		
	--></script>
	
</head>

<body onload="updateCountMsg(0); updateCaptionMsg(0);fillTable();">

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
					if ($pagename == "index.php")
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
