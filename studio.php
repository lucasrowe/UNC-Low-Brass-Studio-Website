<?php require('HeaderFooter/studioheader.php'); ?>
<div id="contentMain" class="studio">
<div id="topslidecontainer">
	<div id="topfadeshow"></div>

	<div id="topslideshowcontrols" class="slidecontrol">	
		<div id="fadeshow1toggler">
			<img class="prev" src="Images/Icons/bigarrowL.png" alt="leftarrow"/>
		<span class="status"></span>
			<img class="next" src="Images/Icons/bigarrow.png" alt="rightarrow"/>
		</div>				
	</div>
</div>

<!-- ===================================================================
Note to Mike:  

You shouldn't need to edit much on this webpage.

SLIDESHOW:
To add images to the slideshow just add them to the folder Images/Slideshow. 
They will need to be in PNG or JPG format and should ideally be 400 x 267
as that was the ratio of the files you sent me earlier.  Smaller or larger
images are accepted but won't necessarily look good.

Image size: 401 x 267

STUDENT DIRECTORIES:
In order to add a student you will need to open studentinfo.txt and then
put a breakline in front of your student entry.  Breaklines should only
be used when you are done with a piece of information or are starting a new student.
For labels, put a colon after your label text.

Example:
Student Name
Instrument
Hometown: HOMETOWN
Hobbies: HOBBY
Quote: The whole quote must be on one line.  It will wrap automatically when displayed but here it must be on one line.

=================================================================== -->

<div id="location">
	<h3>Studio Location</h3>
	<b>Hill Hall<br/>
	Room 107</b><br/><br/>
	
	<b>Trombones:</b><br/> Mondays from 6-7 PM<br/><br/>
	<b>Euphoniums and Tubas:</b><br/> Wednesdays from 6-7 PM
</div>

<div class="listbar"></div>

<div id ="studentlist" style="min-height: 600px;">	<!-- EDIT THE HEIGHT IF NEEDED -->
	<h3>Student Directory</h3>

	<p>Below are the 2011/2012 lowbrass studio members.  For biographical and contact information, 
	click the left column names to view photo and bio on right.</p>

<!-- ====================================
NO NEED TO EDIT ANYTHING BELOW THIS LINE
========================================= -->	
	
	<!--
		STUDENT DIRECTORY - FIRST COLUMN
	-->
	<div id="studentlistleft" class="dirlist leftcol">
		<!--Example Table
		<table>
			<th>Student</th><th>Instrument(s)</th>
			<tr id="student1" onclick="updateBio(1,'slideImg');"><td class='activeStudent'>Joey Aloi</td><td>Trombone</td></tr>
			<tr id="student1" onclick="updateBio(1,'slideImg');"><td>Stuart Cleaver</td><td>Trombone</td></tr>
		</table>-->
	</div>
		
	<!--
		STUDENT DIRECTORY - SECOND COLUMN
	-->		
	<div id="studentlistright" class="rightcol">
		
		<div id="studentInfoContainer">
			
			<div id="slideshowcontrols">	
				<span id="curcount"></span>
				<span id="controlbtns">
					<img id="previousStudentBTN" class="prev" src="Images/Icons/bigarrowL.png" alt="leftarrow" onclick="prevImage('slideImg');"/>
					<img id="nextStudentBTN" class="next" src="Images/Icons/bigarrow.png" alt="rightarrow" onclick="nextImage('slideImg');"/>
				</span>
			</div>
		
			<div id="studentImage">
				<img id="slideImg" name="slideImg" src="Images/StudentPics/JoeyAloi.jpg" 
					alt ="student picture" onclick="nextImage('slideImg'); " />
			</div>		
			
			<div id="studentInfo">
				<div id="nameInstrument"></div>
				<div id="studentCaption"></div>
			</div>
		</div>
	</div>
	
</div>	
</div>

<?php require('HeaderFooter/footer.php'); ?>