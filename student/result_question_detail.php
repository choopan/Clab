<?
 include "../chksession.php";
if ($sess_table<>student) {
	header( "Location: ../index.html"); 	exit();
}

?>
<HTML>
<head>
<meta content="text/html; charset=TIS-620" http-equiv="content-type">
<meta name="keywords" content="Business Website, free templates, website templates, 3-column layout, CSS, XHTML" />
<meta name="description" content="Business Website, 3-column layout, free CSS template from templatemo.com" />
<title>Lesson</title>
<link href="../templatemo_style.css" rel="stylesheet" type="text/css" />
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
	Welcome, <a href="showprofile.php" style="color:#000000"><b><?=$sess_username?></b></a>&nbsp;&nbsp;<a href="../logout.php"><img src="../images/logout.gif" alt="Logout" /></a>
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
			<label><a href="result_lesson.php" style="color:#FE9A2E"><b>[ Result Lesson ]</b></a></label><br><br>
			<label><a href="showprofile.php" style="color:#FE9A2E"><b>[ Show Profile ]</b></a></label><br><br>
		
                </div>            
            	</div>
            
		</div>
        </div>
        <!-- end of left column -->
        
        <!-- start of middle column -->
<div id="templatemo_middle_column">
 <?

  $check_id=$_GET[check_id];


	include "../connect.php";
	$sql="select * from Check_answer,SendAnswer,Proposition,student,Time_use  where Check_answer.ref_answer=SendAnswer.answer_id and SendAnswer.ref_question=Proposition.question_id and SendAnswer.ref_student=student.student_id and Time_use.ref_student=student.student_id and Check_answer.check_id='$check_id'";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result);

$name=$record[name];
$code_st=$record[code_st];
$section=$record[section];
$time_start=$record[time_start];
$question=$record[proposition];
$code=$record[code];
$comment=$record[code_comment];
$result=$record[result];
$student_id=$record[student_id];
$lesson=$record[ref_lesson];
?>
    &nbsp;<br />
[ <a href="result_question.php?student_id=<?=$student_id?>&lesson=<?=$lesson?>">Back �Ť�ṹ������</a> ]</p>
<form id="form1" name="form1" method="post" action="question_check2.php">
  <table width="100%" border="0">
    <tr>
      <td width="10%">���ͼ���� :  </td>
      <td width="90%"><?=$name?>
      <input name="ref_answer" type="hidden" id="ref_answer" value="<?=$ans_id?>" />
      <input name="teacher_name" type="hidden" id="teacher_name" value="<?=$teacher_name?>" /></td>
    </tr>
    <tr>
      <td>���ʹѡ�֡�� :</td>
      <td><?=$code_st?></td>
    </tr>
    <tr>
      <td>section:</td>
      <td><?=$section?></td>
    </tr>
    <tr>
      <td>�ѹ������:</td>
      <td><?=$time_start?></td>
    </tr>
    <tr>
      <td>⨷��:</td>
      <td><?=$question?></td>
    </tr>
    <tr>
      <td>Code �����:</td>
      <td><label>
        <textarea name="textarea2" id="textarea2" cols="45" rows="5"><?=$code?>
        </textarea>
      </label></td>
    </tr>
    <tr>
      <td>Comment:
      <label> </label></td>
      <td><?=$comment?></td>
    </tr>
    <tr>
      <td>��ṹ</td>
      <td><label>
        <?=$result?></label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
<br>
</div></div>
</body>
</html>
