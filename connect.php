<?
$host="localhost";
$user="root";
$pw="root";
$dbname="LanguageC";

$c = mysql_connect($host,$user,$pw);
mysql_query("SET NAMES TIS620");
if (!$c) {
	echo "<h3>ERROR : Can not access database</h3>";
	exit();
}
?>

