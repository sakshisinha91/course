<?php 

include 'dbc.php';
page_protect();

$id=$_GET['id'];
$que=mysql_query("select *from post where id='$id'");
$res=mysql_fetch_array($que);
$from=$res['absence_from'];
$to=$res['absence_to'];
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

<table width="97%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">Absence / Leave period</td>
  </tr>
  <tr>
  <td>
     <table width="95%" border="0" cellpadding="3" cellspacing="3" class="forms">
      <tr>
        
           <td width="15%">
                     From :
        </td>
        <td>
              <?php echo $from;?>
               
        </td>
      </tr>
      <tr>
        
           <td width="15%">
                     To :
        </td>
        <td>
              <?php echo $to;?>
        </td>
      </tr>
      </table>
  </td>
  </tr>
</table>



</body>
</html>