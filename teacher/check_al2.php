<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>Check</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<style type="text/css">
<!--
.style1 {font-size: 36px}
-->

</style>
</head>

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
	Welcome, <a href="showprofile.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="/Clab/logout.php"><img src="/Clab/images/logout.gif" alt="Logout" /></a>
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
 			<label><a href="mstudent.php" style="color:#FE9A2E"><b>[ Management Student ]</b></a></label><br><br>
			<label><a href="showlesson.php" style="color:#FE9A2E"><b>[ add/edit lesson ]</b></a></label><br><br>
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column"><center>
<h1>:: Question ที่ตรวจแล้ว ::</h1></center><br><br>
[ <a href="main.php"> Main</a> &gt; <a href="mstudent.php"> manage student</a>&nbsp;&gt; <a href="check_al.php">Section ที่ตรวจแล้ว</a> &gt; Question ที่ตรวจแล้ว<br><br><br>
<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td>NO.</td>
    <td>Question</td>
  </tr>
  <?
  $section=$_GET[section];
	$count=1;
	include "../connect.php";
$sqlx="select * from teacher where username='$sess_username'";
$resultx=mysql_db_query($dbname,$sqlx);
$record=mysql_fetch_array($resultx);

	$sql="select headlesson.detail,headlesson.lesson,student.section from sendanswer,proposition,student,headlesson  where sendanswer.ref_question=proposition.question_id and sendanswer.ref_student=student.student_id and proposition.ref_lesson=headlesson.lesson and student.teach='$record[name]' and student.section='$section'";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		if($a!=$record[detail]){
		echo "<tr> 
			<td>$count</td>
			<td><a href=\"check_al3.php?lesson=$record[lesson]&section=$record[section]\">$record[detail]</a></td>
			
		</tr>";
			$a=$record[detail];
			$count++;
			}
		
	}
	mysql_close();
?>
</table>
</div>
</div>
</body>
</html>
