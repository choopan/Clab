<?
include "../connect.php";
?>
<html>
<body>
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620" /> 
<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui-1.7.2.custom.css">  
    <script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>  
    <script type="text/javascript" src="../js/jquery-ui-1.7.2.custom.min.js"></script>  
    <script type="text/javascript">  
  
$(function(){  
    // �á�� jquery  
    $("#dateInput").datepicker({ dateFormat: 'yy-mm-dd' });  
    // �ٻẺ�ѹ���������� 2009-08-16  
});
	
    </script>  
    <style type="text/css">  
.ui-datepicker{  
    width:150px;  
    font-family:tahoma;  
    font-size:11px;  
    text-align:center;  
}  
</style> 
<style type="text/css">
/* class ����Ѻ����ǹ��Ǣͧ���ҧ */
.tr_head{ 
	background-color:#333333;
	color:#FFFFFF;
}
/* class ����Ѻ���á�ͧ��������´ */
.tr_odd{
	background-color:#99FFCC;
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
<h1>��˹���������㹡���觧ҹ<br></h1>
<a href="main.php">main</a>
<form name="form1" method="post" action="fix_send2.php">
  <table width="45%" border="0.5">
    <tr>
      <td width="38%">�����¹</td>
      <td width="62%"><select name="HeadLesson" id="HeadLesson">
        <? 
     $sql="select * from HeadLesson order by lesson asc";  
     $result=mysql_db_query($dbname,$sql);
$count=1;
     while($rs=mysql_fetch_array($result)){  
 ?>
        <option value="<?=$rs[lesson]?>" selected><? echo "������ $count $rs[detail]";?></option>
        <?php 
$count++;} ?>
      </select></td>
    </tr>
    <tr>
      <td> &nbsp;Section</td>
      <td><select name="section" id="section">
        <? 
     $sql="select * from Section ";  
     $result=mysql_db_query($dbname,$sql);
     while($rs=mysql_fetch_array($result)){  
 ?>
        <option value="<?=$rs[section_name]?>" selected>
        <?=$rs[section_name]?>
        </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;�ա���֡��</td>
      <td><select name="year" id="province">
        <? 
     $sql="select * from Academic_year ";  
     $result=mysql_db_query($dbname,$sql);
     while($rs=mysql_fetch_array($result)){  
 ?>
        <option value="<?=$rs[Academic_detail]?>" selected>
        <?=$rs[Academic_detail]?>
        </option>
        <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>��˹��ѹ�觧ҹ</td>
      <td>
      <input   id="dateInput"  type="input" name="time" value=""> &nbsp;
      <select name="HH" id="HH">
        <?
for($x=0;$x<=23;$x++) {
?>
        <option value=<? echo "$x";?> >
          <?  if($x<10){echo"0".$x;}else{echo"$x";}?>
          </option>
        <? } ?>
      </select>
      &nbsp;
      <select name="MM" id="MM">
        <?
for($x=0;$x<=59;$x++) {
?>
        <option value=<? echo"$x";?>>
          <?  if($x<10){echo"0".$x;}else{echo"$x";}?>
          </option>
        <? } ?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><INPUT TYPE="Submit" VALUE="Submit"/></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<table id="mytable" width="50%" border="1">
  <tr>
    <td width="12%"><div align="center">Section</div></td>
    <td width="14%"><div align="center">Year</div></td>
    <td width="46%"><div align="center">�����¹</div></td>
    <td width="28%"><div align="center">��˹����ҷ���ͧ��</div></td>
  </tr>



<?

$sql="select * from time_fix ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num<=0){
echo "<tr><td>�ѧ������˹������觧ҹ�ͧ�ء Section</td></tr> ";
exit();
}
while($record=mysql_fetch_array($result)){
$sql2="select * from Proposition,HeadLesson where Proposition.ref_lesson=HeadLesson.lesson and ref_lesson='$record[ref_lesson]' ";
$result2=mysql_db_query($dbname,$sql2);
$record2=mysql_fetch_array($result2);

echo"

<tr>
<td>$record[fix_sec]</td><td>$record[fix_year]</td><td>����� $record[ref_lesson] $record2[detail]</td><td>$record[time_finish]</td>
</tr>";
}
?>
<p>&nbsp;</p>
</table>
</body>
</html>
