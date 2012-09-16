<?php 
include 'dbc.php';
page_protect();
if(!checkAdmin())
{
	 echo "<h1>You don't have administrative priviliges to view this page</h1>";
	 die();
}
$que=mysql_query("select *from area_subs");
$i=0;
$j=0;
$subs=array();
while($a=mysql_fetch_array($que))
{
	$subs[$i++]=$a['subjects'];
	$sid[$j++]=$a['sid'];
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<link href="includes/styles.css" rel="stylesheet" type="text/css">
<link href="includes/style.css" rel="stylesheet">
<!--
Shadow box starts
-->

	 <link rel="stylesheet" type="text/css" href="css/shadowbox.css">
   <script type="text/javascript" src="js/shadowbox.js"></script>
   <script type="text/javascript">
  Shadowbox.init({
     handleOversize: "drag",
    modal: true
});

function moveCloseLink(){
	var cb=document.getElementById('sb-nav-close');
	var tb=document.getElementById('sb-title');
	if(tb) tb.appendChild(cb);
}
function view(fac_id)
{
        

  	Shadowbox.init({
	handleOversize:"drag",
	modal:true,
	player:"html",
	displayCounter:false,
	showMovieControls:false,
	overlayOpacity : 0.5,
	onOpen: moveCloseLink
});
   Shadowbox.open({
		content: 'view_profile.php?id='+fac_id+'',
		player: "iframe",
		title: "Faculty profile",
		height: 400,
		width: 700,
		onClose: function() {
					window.location.reload();
				}
	        
	});

 
}

function check(fac_id)
{
        

  	Shadowbox.init({
	handleOversize:"drag",
	modal:true,
	player:"html",
	displayCounter:false,
	showMovieControls:false,
	overlayOpacity : 0.5,
	onOpen: moveCloseLink
});
   Shadowbox.open({
		content: 'availability.php?id='+fac_id+'',
		player: "iframe",
		title: "Availability",
		height: 300,
		width: 400,
		onClose: function() {
					window.location.reload();
				}
	        
	});

 
}

function allocate(sid)
{
        

  	Shadowbox.init({
	handleOversize:"drag",
	modal:true,
	player:"html",
	displayCounter:false,
	showMovieControls:false,
	overlayOpacity : 0.5,
	onOpen: moveCloseLink
});
   Shadowbox.open({
		content: 'allocate.php?sub='+sid+'',
		player: "iframe",
		title: "Allocation",
		height: 300,
		width: 400,
		onClose: function() {
					window.location.reload();
				}
	        
	});

 
}



</script>

<!--
Shadow box ends
-->
</head>

<body>
<?php include('includes/non_content.php'); ?>
<div class="content">

<?php 
$b=-1;
 foreach($subs as $s)
 {
	 $b++;
?>
<table width="100%">
<tr>
<td><input type="button" value="<?php echo $s;?>" onclick='$("#wait_msg").html("Please wait...");$.get("get_faculties.php",{ cmd:this.value ,sid:"<?php echo $sid[$b];?>"} ,function(data){ $("#facs<?php echo $b?>").html(data); });$("#wait_msg").html("");$("#facs<?php echo $b?>").show("slow");' /></td>
<td><span id="wait_msg"></span></td>
</tr>
<tr>
<td>
<div id="facs<?php echo $b?>" style="display:none">
</div>
</td>
</table>

<?php
 }
 ?>


</div>
</body>
</html>