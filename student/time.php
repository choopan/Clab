<?
include "../connect.php";
$sql="select * from HeadLesson  ";
$result=mysql_db_query($dbname,$sql);
$record=mysql_fetch_array($result); 
$time=$record[time];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>
 
<body>
<body onLoad="begintimer()">
<script language="">
var limit="0:10"
if (document.images){
var parselimit=limit.split(":")
parselimit=parselimit[0]*60+parselimit[1]*1
}
function begintimer(){
if (!document.images)
return
if (parselimit==1)
// �˵ء�ó����ͧ�������Դ���
 //��ҵ�ͧ��������ⴴ��ѧ Page ���

frmTest.submit();
else{
parselimit-=1
curmin=Math.floor(parselimit/60)
cursec=parselimit%60
if (curmin!=0)
curtime="���ҷ������� <font color=red> "+curmin+" </font>�ҷ� �Ѻ <font color=red>"+cursec+" </font>�Թҷ� "
else if(cursec==1)
{
alert("����������Ǩ��");
window.location="../logout.php";
}
else
{
curtime="���ҷ������� <font color=red>"+cursec+" </font>�Թҷ� "
}
document.getElementById('dplay').innerHTML = curtime;
setTimeout("begintimer()",1000)
}
}
//-->
</script>
<div id=dplay ></div>
<form name="frmTest" action="JavaScript:window.close();">
 
</form>
</body>
</html>