<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: /Clab/index.html"); 	exit();
}
?>
<HTML>
<HEAD><TITLE>Manage Score</TITLE></HEAD>
<link href="/Clab/templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=utf-8" http-equiv="content-type">
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
	Welcome, <a href="changepw.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="../logout.php"><img src="../images/logout.gif" alt="Logout" /></a>
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
 			<label><a href="mstudent.php" style="color:#FE9A2E"><b>[  Student Management ]</b></a></label><br><br>
			<label><a href="mteacher.php" style="color:#FE9A2E"><b>[  Teacher Management ]</b></a></label><br><br>
			<label><a href="m_lesson.php" style="color:#FE9A2E"><b>[  Lesson Management ]</b></a></label><br><br>
			<label><a href="m_scroll.php" style="color:#FE9A2E"><b>[  Score Management ]</b></a></label><br><br>
			<label><a href="changepw.php" style="color:#FE9A2E"><b>[ Change Password ]</b></a></label><br><br>

		
               </div> 
            </div>            	            
        </div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
<center>
<h1>:: Score Management ::</h1></center><br><br>
<a href="main.php">Back Main</a>&gt; Section <br />
<br />
<table border="1">
  <tr bgcolor="#D3D3D3">
    <td><b><center>NO.</center></b></td>
    <td><b><center>SECTION ที่ส่งงานเข้ามา</center></b></td>
  </tr>
  <?
	$count=1;
	include "../connect.php";
		$sql="select student.section from check_answer,sendanswer,student where check_answer.ref_answer=sendanswer.answer_id and sendanswer.ref_student=student.student_id GROUP BY  student.section ";
 		$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		
		echo "<tr> 
			<td>$count</td>
			<td><a href=\"m_scroll_name.php?section=$record[section]\">$record[section]</a></td>
		    </tr>";
			$count++;	
			

	}
	mysql_close();
?>
</table>
</div>
</div>
</body>
</html>
