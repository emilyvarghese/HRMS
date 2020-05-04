<?php
include 'connection.php';
session_start();
$email=$_SESSION["email"];
$jid=$_GET['id'];
$qry1="insert into tblappliedjob(jId,email,aDate,mark,aStatus) values('$jid','$email',(select sysdate()),'0','applied')";
$res1=mysql_query($qry1);
echo '<script>location.href="candidateexam.php?id='.$jid.'"</script>';
?>