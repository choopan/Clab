<?
include "/Clab/chksession.php";
if ($sess_table<>student) {
	header( "Location: /Clab/index.html"); 	exit();}
?>
<HTML>
<head>
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<title>Result Lesson</title>
<link href="/Clab/templatemo_style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->
</style>
</head>
<BODY>
<body>
<div id="templatemo_container">
   
    <div id="templatemo_header" >
   	  <div id="logosection"></div>
    	<div id="header">
        	<div class="title">
        	  <p class="style1">&nbsp;</p>
        	  <p>&nbsp;</p>
        	</div>

        </div>
	</div>
    
	<div id="templatemo_menu">
    	<div id="search">
	Welcome, <a href="showprofile.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="../logout.php"><img src="/Clab/images/logout.gif" alt="Logout" /></a>
    	</div>
        <div id="menu">
            <ul>
                <li></li>
               <li><a href="about_us.php">About Us</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </div>
	</div>
    
    <!-- start of content -->
    
	<div id="templatemo_content">
    
    	<!-- start of left column -->
    
    	<div id="templatemo_left_column">        	

            <div id="leftcolumn_box01">
                <div class="leftcolumn_box01_top">
                    <h2>Menu</h2>
                </div>
                <div class="leftcolumn_box01_bottom">
                        <div class="form_row">
                        <label><a href="main.php" style="color:#FE9A2E"><b>[ Main ]</b></a></label><br><br>
 			<label><a href="lesson.php" style="color:#FE9A2E"><b>[ Lesson ]</b></a></label><br><br>
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		
                </div>            
            	</div>            
		</div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column"><center>
<h1>:: ผลคะแนนทั้งหมด ::</h1> </center><br><br>
[ <a href="main.php">Back Main</a> ]<br> <br><center>
<table border="1">
  <tr bgcolor="#D3D3D3"> 
    
    <td>Lesson</td>
    <td><center>Detail Lesson</center></td>
    <td>คะแนนทั้งหมด</td>
  </tr>
  <?
  	include "/Clab/connect.php";
  $sql="select * from student where username='$sess_username' ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);
$student_id=$record[student_id];

	$count=0;

	$sql="select * from headLesson  ORDER BY lesson asc";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		echo "
		<tr> 
			
			<td>$record[lesson]</td>
			<td><a href=\"result_question.php?student_id=$student_id&lesson=$record[lesson]\">$record[detail]</a></td>
			
			
		</tr>";
	}
	mysql_close();
?>
</table></center>
</div></div>
</BODY>
</HTML>
