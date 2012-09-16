<?php 
include 'dbc.php';
page_protect();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/base/jquery.ui.all.css" />
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/jquery.ui.core.js"></script>
 <script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.datepicker.js"></script>
	<script>
	$(function() {
		var dates = $( "#fr, #to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				var option = this.id == "fr" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});
	</script>
<link href="includes/styles.css" rel="stylesheet" type="text/css">
<link href="includes/style.css" rel="stylesheet">
</head>

<body>

<?php include('includes/non_content.php'); ?>
<div class="content">

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
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
            <input type="text" id="fr" name="fr"/>
               
        </td>
      </tr>
      <tr>
        
           <td width="15%">
                     To :
        </td>
        <td>
              <input type="text" id="to" name="to"/>
        </td>
      </tr>
      <tr> 
         <td colspan="2"> <input type="button" value="Post" onClick='$("#msg").html("Please wait...");$.get("post_absence.php",{ frm: $("#fr").val(),to:$("#to").val()} ,function(data){ $("#abs_msg").html(data); });$("#abs_msg").show("fast")' />
          </td>
     </tr>
        <tr>
             <td colspan="4">
              <div class="msg" id="abs_msg" style="background:#EAEAEA;color:#393;border-color:#000;display:none">
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