<?
include "../chksession.php";

if ($sess_table<>admin) {
	header( "Location: ../index.html"); 	exit();
}

  $lesson=$_GET[lesson];
  $section=$_GET[section];
?>
<HTML>
<HEAD><TITLE>question report</TITLE></HEAD>
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
<meta content="text/html; charset=TIS-620" http-equiv="content-type">
<meta http-equiv="Refresh" content="3; URL=addlesson.php">
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
        <!-- end of left column -->
        
        <!-- start of middle column -->
        
    	<div id="templatemo_middle_column">
<p><h1>:: �����觢���ͺ::</h1><br><br>
<p>[<a href="main.php">Main</a> &gt;<a href="m_scroll.php">Management Scroll</a>�&gt;<a href="report2.php?lesson=<?=$lesson?>&section=<?=$section?>">������觧ҹ�����</a> &gt;�����觢���ͺ</p>
<table border="0">
  <tr bgcolor="#D3D3D3"> 
    
    <td>NO.</td>
    <td>⨷��</td>
    <td>���Ӣ���ͺ</td>
  </tr>
  <?

	$count=1;
	include "../connect.php";
	$sql="select Proposition.proposition,student.name,Answer.ans_id from Answer,Proposition,student  where Answer.ref_question=Proposition.question_id and Answer.ref_student=student.student_id  and Proposition.ref_lesson='$lesson' and  student.section='$section' and Answer.answer_code!='$space'";
	$result=mysql_db_query($dbname,$sql);
	while($record=mysql_fetch_array($result)) {
		
		$sql2="select * from Check_answer where ref_answer='$record[ans_id]'";
		$result2=mysql_db_query($dbname,$sql2);
		$num2=mysql_num_rows($result2);
		if($num2==0) {
		echo "
		
		<tr> 
			<td>$count</td>
			<td>$record[proposition]</td>
			<td>$record[name]</a></td>
			<td><a href=\"question_check.php?ans_id=$record[ans_id]\">��Ǩ</a></td>
		</tr>";
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
