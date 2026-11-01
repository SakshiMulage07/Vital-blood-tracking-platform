<?php
session_start();
if(!isset($_SESSION['login_admin']))
{
header("Location: admin.php");
}
include("config.php");
$d_check=$_SESSION['login_admin'];

$ses_sql=mysql_query("select * from blood.admin where a_email='$d_check' ");

$row=mysql_fetch_array($ses_sql);

echo " WELCOME".$data=$row['a_email'];

?>