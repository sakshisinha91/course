<?php
include 'dbc.php';
page_protect();
$sid=$_GET['sub'];
$subject_query=mysql_query("select * from area_subs where sid=$sid");
$subject_row=mysql_fetch_array($subject_query);
$subject=$subject_row['subjects'];
$que=mysql_query("select *from post");

$ids=array();

$k=0;
while($res=mysql_fetch_array($que))
{
	$user_subs=$res['subjects'];
	$array_subs=explode(",",$user_subs);
	foreach($array_subs as $s)
	{
		if(strcmp($s,$subject)==0)
		{
	        $ids[$k++]=$res['id'];
			$name_query=mysql_query("select * from users where id={$ids[$k-1]}");
$name_row=mysql_fetch_array($name_query);
$name[$k-1]=$name_row['user_name'];		
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="includes/styles.css" rel="stylesheet" type="text/css">
<link href="includes/style.css" rel="stylesheet">
</head>

<body>
 <table width="95%" border="0" cellpadding="3" cellspacing="3" class="forms">                  
 <form action="allocating.php" method="post">
<?php
$i=-1;
foreach($name as $nam)
{
	$i++;
	?>
	<tr>
 <td width="15%">
<?php echo $nam;?>
</td>
<td>
<input type="checkbox" name="<?php echo $ids[$i]?>" value="abc"/>
</td>
<input type="hidden" name="sid" value="<?php echo $sid;?>"/>
</tr>
<?php
}
?>
<tr>
<td>
<input type="submit" name="allocate" value="Submit" />
</td>
</tr>
</form>
</table>
</body>
</html>