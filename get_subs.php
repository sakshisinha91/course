<?php 
include 'dbc.php';
session_start();

$area=$_GET['cmd'];
$que=mysql_query("select *from area_subs where area_of_interest='$area'");
$subs=array();
$i=0;
while($sub=mysql_fetch_array($que))
{
	$subs[$i++]=$sub['subjects'];

}
$html='<table  width="95%"  cellpadding="3" cellspacing="3" class="forms"><td width="15%">Subjects</td><td colspan="2" style="text-align:left">';
$html.='<select name="sub">';

foreach($subs as $s)
{
	$html.='<option value="'.$s.'">'.$s.'</option>';
}
$html.='</select>';
$html.='</td></tr>  <tr> 
     <td colspan="3"> <input type="submit" name="post" value="Post" />
     </td>
	 <td>&nbsp;</td>
   </tr>
   </table>';
echo $html;
?>