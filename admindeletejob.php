<?php
include 'connection.php';
$id=$_GET['id'];
$qry1="update tbljob set jStatus='inactive' where jId='$id'";
$res1=mysql_query($qry1);
echo '<script>location.href="adminjob.php"</script>';
?>