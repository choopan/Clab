<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620" />
<title>Untitled Document</title>
</head>

<body>
<?
include "../chksession.php";

if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
  $ans_id=$_POST[ans_id];

$teacher_name=$_POST[teacher_name];
$result=$_POST[point];
$code_comment=$_POST[code_comment];
$check_date=date("Y-m-d");

include "../connect.php";

$sql2="select  * from SendAnswer,Proposition,student  where (SendAnswer.ref_question=Proposition.question_id and SendAnswer.ref_student=student.student_id) and SendAnswer.answer_id='$ans_id' ";
$result2=mysql_db_query($dbname,$sql2);
$record=mysql_fetch_array($result2);

$section=$record[section];
$student_id=$record[student_id];
$ref_lesson=$record[ref_lesson];
$code_st=$record[code_st];

$sql="insert into Check_answer values('','$ans_id','$teacher_name','$code_comment','$result','$check_date')";
$result=mysql_db_query($dbname,$sql);


if ($result) {
	echo "<h3>��Ǩ���º���� </h3>";
	echo "[ <a href=question_report2.php?id=$student_id&lesson=$ref_lesson&section=$section>Back ⨷������</a> ]";
} else {
	echo "<h3>ERROR �������ö��Ǩ��</h3>";
}



mysql_close();
?>
</body>
</html>
