<?php
include 'dbc.php';
page_protect();
$sid=$_GET['sid'];
$uid=$_GET['uid'];
 $que=mysql_query("select *from allocation where uid='$uid' and sid='$sid'");
	 if(mysql_num_rows($que)>0)
	 {
		 		 $que="delete from allocation where uid='$uid' and sid='$sid'";
		 mysql_query($que);

	 }
	 else
	 {
		 	 $que="insert into allocation values('$uid','$sid')";
		 mysql_query($que);

	 }

?>
