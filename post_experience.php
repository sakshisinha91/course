<?php

include 'dbc.php';
session_start();
$exp=$_GET['cmd'];
$id=$_SESSION['user_id'];
$que=mysql_query("select experience from post where id='$id'");
$ex=mysql_fetch_array($que);
if($ex['experience']=='')
{
	mysql_query("update post set experience='$exp' where id='$id'");
	echo 'Experience posted successfully';
}
else
{
echo 'Experience can be posted only once';
}
?>