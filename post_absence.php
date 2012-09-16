<?php

include 'dbc.php';
session_start();
$frm=$_GET['frm'];
$to=$_GET['to'];
$frm_date=date("Y-m-d", strtotime($frm));
$to_date=date("Y-m-d", strtotime($to));
$id=$_SESSION['user_id'];
mysql_query("update post set absence_from='$frm_date' where id='$id'");
mysql_query("update post set absence_to='$to_date' where id='$id'");
echo "Leave period has been updated successfully";
?>