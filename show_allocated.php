<?php 
include 'dbc.php';
page_protect();
if(checkAdmin())
$id=$_GET['id'];
else
$id=$_SESSION['user_id'];
$que=mysql_query("select * from allocation where uid='$id'");


?>
<link href="includes/styles.css" rel="stylesheet" type="text/css">
<link href="includes/style.css" rel="stylesheet">
</head>

<body>
<?php if(!checkAdmin())
{
	?>
    
    <?php include('includes/non_content.php'); ?>
<div class="content">
    
   <?php
}?>
     <table width="95%" border="0" cellpadding="3" cellspacing="3" class="forms">
     <?php
     while($res=mysql_fetch_array($que))
{
	$sid=$res['sid'];
	$r=mysql_query("select * from area_subs where sid='$sid'");
	$result=mysql_fetch_array($r);
	?>
	 <tr>
        
           <td width="15%">
                    <?php echo $result['subjects'];?>
        </td>
        </tr>
        <?php
	
}
?>
     
      </table>
     <?php if(!checkAdmin())
{
	?>
  </div>   
<?php 
}
?>

</body>
</html>