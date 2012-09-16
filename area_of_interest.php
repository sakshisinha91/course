<?php 
include 'dbc.php';
page_protect();



?>
<html>
<head>
<title>My Account</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<link href="includes/styles.css" rel="stylesheet" type="text/css">
<link href="includes/style.css" rel="stylesheet">
<?php
$id=$_SESSION['user_id'];
$name=$_SESSION['user_name'];
if($_POST['post']=='Post')
{
	$interest=$_POST['area'];
	$interest_sub=$_POST['sub'];	
	$exist="select *from post where id=$id";
	$exist=mysql_query($exist);
	if(mysql_num_rows($exist)==0)
	{
	  mysql_query("insert into post(id) values($id)");	
	}
	$query=mysql_query("select subjects from post where id=$id");
	$res=mysql_fetch_array($query);
	$subjects=explode(",",$res['subjects']);
	$flag=1;
	foreach($subjects as $sub)
	{
		if(strcmp($sub,$interest_sub)==0)
		{
			 $error="This subject has already been posted";
			 $flag=0;
			 break;
		}
	}
	if($flag==1)
		{
			 $result=$res['subjects'].','.$interest_sub;
				mysql_query("update post set subjects='$result' where id=$id");
	$msg="Subject of your area of interest has been posted successfully";
		}
	

}

?>
</head>

<body>
<?php 	include('includes/non_content.php'); ?>
<div class="content">
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">Post area of interest</td>
  </tr>
  <?php
     if(isset($error))
	 {
		  ?>
           <tr>
           <td>
            <div class="msg">
             <?php echo $error;?>
            </div>
           </td>
           </tr>
          <?php
	 }
  ?>
      <tr>
      <td>
      <form action="area_of_interest.php" method="post" name="intForm" id="intForm" >
      <table width="95%" border="0" cellpadding="3" cellspacing="3" class="forms">
      <tr>
      <td width="15%">
      List of fields
      </td>
      <td>
         <select name="area" id="name" onChange='$("#sub_msg").html("Please wait...");$.get("get_subs.php",{ cmd: this.value} ,function(data){ $("#subs").html(data); });$("#sub_msg").html("");$("#subs").show("slow");'>
           <option selected disabled>[Select your area]</option>
           <option value="humanities" >Humanities</option>
           <option value="computer_languages">Computer Languages</option>
           <option value="comm_languages">Communication Languages</option>
           <option value="management">Management</option>
         </select>
      </td>
      <td>
        <span id="sub_msg"></span>
      </td>
    </tr>
    </table>
     <div style="display:none" id="subs">
         </div>
   </form>
   </td>
   </tr>
   <?php if(isset($msg))
   {
	   ?>
       <tr>
             <td>
              <div class="msg" style="background:#EAEAEA;color:#393;border-color:#000">
                  <?php echo $msg;?>
              </div>
             </td>
        </tr>
   <?php
   }
   ?>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3">Post your experience</td>
  </tr>
  <tr>
  <td>
     <table width="95%" border="0" cellpadding="3" cellspacing="3" class="forms">
      <tr>
        
           <td width="15%">
                      Experience (in yrs) 
        </td>
        <td>
             <select name="exper" id="exper">
           <option selected disabled>[Select exp]</option>
           <option value="1" >1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="Above four">Above four</option>
         </select>  
        </td>
        <td>
          <span id="ex_msg"></span>
        </td>
      </tr>
      <tr> 
         <td colspan="2"> <input type="button" value="Post" onClick='$("#ex_msg").html("Please wait...");$.get("post_experience.php",{ cmd: $("#exper").val()} ,function(data){ $("#exper_msg").html(data); });$("#ex_msg").html("");$("#exper_msg").show("fast")' />
          </td>
     </tr>
        <tr>
             <td colspan="4">
              <div class="msg" id="exper_msg" style="background:#EAEAEA;color:#393;border-color:#000;display:none">
              </div>
             </td>
        </tr>
      </table>
  </td>
  </tr>
</table>

</div>
</body>
</html>
