<?php
include 'connection.php';
$id=$_GET['id'];
$qry1="delete from tblquestion where qId='$id'";
$res1=mysql_query($qry1);
echo '<script>location.href="adminquestion.php?id="'.$id.'</script>';
?>