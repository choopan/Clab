<? include"../chksession.php";
if ($sess_table<>teacher) {
	header( "Location: ../index.html"); 	exit();
}
?>
<html>
<meta content="text/html; charset=TIS-620" http-equiv="content-type">
<body>
<style type="text/css">
/* class ����Ѻ����ǹ��Ǣͧ���ҧ */
.tr_head{ 
	background-color:#333333;
	color:#FFFFFF;
}
/* class ����Ѻ���á�ͧ��������´ */
.tr_odd{
	background-color:#F8F8F8;
}
/* class ����Ѻ���ͧ�ͧ��������´ */
.tr_even{
	background-color:#F2F2F2;
}
</style>

<script language="javascript">
  window.onload = function () {    
	 	var a=document.getElementById('mytable'); // ��ҧ�ԧ���ҧ���µ���� a
		for(i=0;i<a.rows.length;i++){ // ǹ Loop �Ѻ�ӹǹ��㹵��ҧ
			if(i>0){  // ��Ǩ�ͺ������������Ǣ��
				if(i%2==1){   // ��Ǩ�ͺ������������������´
					a.rows[i].className="tr_odd";	  // ��˹� class ���á
				}else{
					a.rows[i].className="tr_even";	// ��˹� class �Ƿ���ͧ
				}	
			}else{ // ���������Ǣ�͡�˹� class 
				a.rows[i].className="tr_head";	
			}	
		}
 }
 </script>
 </body>
 <body>
 <br>
<h3>��§ҹ�š�����¹�ͧ�ѡ�֡�� <?=$_GET[section];?> �ա���֡�ҷ�� <?=$_GET[year];?></h3>

<table id="mytable" border="0" cellspacing="0" cellpadding="0">

<tr >
<td>&nbsp; No.&nbsp; </td><td>&nbsp; ��ª��͹ѡ�֡��&nbsp; </td>

<?
$section=$_GET[section];
$year=$_GET[year];
include "../connect.php";
$sql="select * from HeadLesson";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);


for ($i = 1; $i <= $num; $i++){
echo"<td>&nbsp; ����� $i&nbsp; </td>";
}
echo"<td>&nbsp; Total &nbsp; </td>";


$count=1;
$sql2="select student.name,student.student_id from Check_answer,SendAnswer,student,Proposition where Check_answer.ref_answer=SendAnswer.answer_id and SendAnswer.ref_student=student.student_id and SendAnswer.ref_question=Proposition.question_id and student.section='$section' and student.year='$year' group by student.name";
$result2=mysql_db_query($dbname,$sql2);
$numx=mysql_num_rows($result2);

while($record=mysql_fetch_array($result2)){



echo"<tr>";
echo"<td><center>$count</center></td><td><center>$record[name]</center></td>";

for ($i = 1; $i <= $num; $i++){

$sql3="select  sum(Check_answer.result) as sum_result from Check_answer,SendAnswer,student,Proposition where Check_answer.ref_answer=SendAnswer.answer_id and SendAnswer.ref_student=student.student_id and SendAnswer.ref_question=Proposition.question_id and student.section='$section' and student.year='$year' and Proposition.ref_lesson='$i' and student.student_id='$record[student_id]'";
$result3=mysql_db_query($dbname,$sql3);
$record3=mysql_fetch_array($result3);


if($record3[sum_result]==0){
echo"<td><center>-</center></td>";
}else{
echo"<td><center>$record3[sum_result] </center></td>";
}
$total_sum+=$record3[sum_result];
}
echo"<td><center>$total_sum</center></td>";
$total_sum=0;
$count++;

}


?>
</tr>
</table>
<input type="submit" value="Print" onClick="window.print()">
</body>
</html>
