<?php 
include 'dbc.php';
page_protect();
if(checkAdmin())
$id=$_GET['id'];
else
$id=$_SESSION['user_id'];
$id1=mysql_query("select id from users where id='$id'");
$name=mysql_query("select user_name from users where id='$id'");
$email=mysql_query("select user_email from users where id='$id'");
$pref_sub=mysql_query("select subjects from post where id='$id'");
$tel=mysql_query("select tel from users where id='$id'");
$addr=mysql_query("select address from users where id='$id'");

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
      <tr>
        
           <td width="15%">
                     Faculty's Name:
        </td>
        <td>
            <?php
			$ab=mysql_fetch_array($name);
			echo $ab['user_name'];
			?>
               
        </td>
      </tr>
      <tr>
        
           <td width="15%">
                     Faculty's id:
        </td>
        <td>
            <?php
			$ab=mysql_fetch_array($id1);
			echo $ab['id'];
			?>
               
        </td>
      </tr>
      <tr>
        
           <td width="15%">
                     Faculty's e-mail:
        </td>
        <td>
              <?php
			$ab=mysql_fetch_array($email);
			echo $ab['user_email'];
			?>
        </td>
      </tr>
      <tr>
        
           <td width="15%">
                     Faculty's address:
        </td>
        <td>
              <?php
			$ab=mysql_fetch_array($addr);
			echo $ab['address'];
			?>
        </td>
      </tr>
      <tr>
        
           <td width="15%">
                     Faculty's Telephone No:
        </td>
        <td>
              <?php
			$ab=mysql_fetch_array($tel);
			echo $ab['tel'];
			?>
        </td>
      </tr>
      <tr>
        
           <td width="15%">
                     Faculty's Preffered subjects:
        </td>
        <td>
              <?php
			$ab=mysql_fetch_array($pref_sub);
			echo $ab['subjects'];
			?>
        </td>
      </tr>
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