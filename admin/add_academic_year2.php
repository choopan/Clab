<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
$add_year=$_POST[add_year];
include "../connect.php";
$sql="select * from academic_year where Academic_detail='$add_year' ";
$result=mysql_db_query($dbname,$sql);
$num=mysql_num_rows($result);
if($num>0) {
	echo "<h3>ERROR : Section name was duplicate in Database</h3>";	 exit();
}
$sql="insert into academic_year values('','$add_year')";
$result=mysql_db_query($dbname,$sql);
if ($result) {
	echo "<h3>Insert ปีการศึกษา  successful</h3>";
echo"<meta http-equiv=\"Refresh\" content=\"5; URL=add_academic_year.php\">";
} else {
	echo "<h3>Error Can't insert to database</h3>";
}
mysql_close();
?>
</body>
</html>
