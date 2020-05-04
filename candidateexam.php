<?php
include 'connection.php';
$jid=$_GET['id'];

?>
<form method="POST">
    <div style="margin:50px 50px 50px 250px">
        <?php
        $qry="select * from tblquestion where jId='$jid'";
        $res=mysql_query($qry);
         while ($row=mysql_fetch_array($res))
         {
             echo '<label>'.$row['question'].'</label>';
             echo '<br>';
             echo '<input type="radio" name="'.$row['qId'].'" value="'.$row['o1'].'">'.$row['o1'];
             echo '<input type="radio" name="'.$row['qId'].'" value="'.$row['o2'].'">'.$row['o2'];
             echo '<input type="radio" name="'.$row['qId'].'" value="'.$row['o3'].'">'.$row['o3'];
             echo '<input type="radio" name="'.$row['qId'].'" value="'.$row['o4'].'">'.$row['o4'];
             echo '<br><br>';
         }
        ?>
        <input type="submit" name="submit" value="SUBMIT" class="btn btn-success"/>
    </div>
</form>
<?php
if (isset($_POST['submit'])){
  
//   $question=$_POST['question'];
//   $o1=$_POST['o1'];
//   $o2=$_POST['o2'];
//   $o3=$_POST['o3'];
//   $o4=$_POST['o4'];
    echo '<script>alert("Exam completed! Please wait for the notification")</script>';
    echo '<script>location.href="candidatehome.php?id='.$jid.'"</script>';
}
?>
