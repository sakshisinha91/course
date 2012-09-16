<?php 
include 'dbc.php';
session_start();
$subject=$_GET['cmd'];
$sid=$_GET['sid'];
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
		}
	}
}
$k=1;
 $html='';
 $html.= '<table width="95%" border="0" cellpadding="3" cellspacing="3" class="forms">';
    $html.= '<tr>
     <td>S. No.</td>
     <td>Faculty name</td>
	 <td>Experience</td>
   </tr>';
  foreach($ids as $id)
  {
	 $que=mysql_query("select *from users where id='$id'");
	 $exp_query=mysql_query("select *from post where id='$id'");
	 $exp_row=mysql_fetch_array($exp_query);
	 $exp=$exp_row['experience'];
	 $row=mysql_fetch_array($que);
	 $name=$row['user_name']; 
	 $que=mysql_query("select *from allocation where uid='$id' and sid='$sid'");
	 if(mysql_num_rows($que)>0)$msg="Deallocate";
	 else $msg="Allocate";
    $html.='<tr>
     <td>'.$k++.' </td>
     <td>'.$name.'</td>
	 <td>'.$exp.'</td>
     <td><input type="button" value="View Profile" name="'.$id.'vp" onClick="view('.$id.')"/></td>
     <td><input type="button" value="Check Availability" name="'.$id.'ca" onClick="check('.$id.')"/></td>
	 <td><input type="button" onclick="allocate('.$id.','.$sid.')" value="'.$msg.'" id="'.$id.$sid.'"/></td>
	 <td><span id="wait_msg"></span></td>
   </tr>';
  }
  $html.='</table>';
  
 echo $html;
 
 ?>
 
 <script>
function allocate(user,subs)
{

 $("#wait_msg").html("Please wait...");
 $.get("allocating.php",{ sid:subs ,uid:user} );
 $("#wait_msg").html("");	
 var val=document.getElementById(user+""+subs).value;
 if(val=="Allocate")document.getElementById(user+""+subs).value="Deallocate";
 else document.getElementById(user+""+subs).value="Allocate";
 
}
</script>