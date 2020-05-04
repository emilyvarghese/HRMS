<?php
include 'connection.php';
include 'adminheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Add Questions Here......</b></h2><br>
            <tr>
                <td><b>Question :</b></td>
                <td><textarea name="question" class="form-control"></textarea></td>
            </tr>
             <tr>
                 <td><b> Option 1 :</b></td>
                 <td><textarea name="o1" class="form-control"></textarea></td>
            </tr>
           
             
             <tr>
                <td><b>Option 2 :</b></td>
                <td><textarea name="o2" class="form-control"></textarea></td>
            </tr>
             <tr>
                <td><b>Option 3 :</b></td>
                 <td><textarea name="o3" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td><b>Option 4 :</b></td>
                 <td><textarea name="o4" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td><b>Answer :</b></td>
                 <td><textarea name="answer" class="form-control"></textarea></td>
            </tr>
            
             <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="ADD" class="btn btn-success"/></td>
            </tr>
    </table>
    <br><table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>QUESTION</th>
            <th>OPTION 1</th>
            <th>OPTION 2</th>
            <th>OPTION 3</th>
            <th>OPTION 4</th>
            <th colspan="2">ANSWER</th>
        </tr>
        <?php
        $jid=$_GET['id'];
        $qry="select * from tblquestion where jId='$jid'";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['qId'].'</td>';
            echo '<td>'.$row['question'].'</td>';
            echo '<td>'.$row['o1'].'</td>';
            echo '<td>'.$row['o2'].'</td>';
            echo '<td>'.$row['o3'].'</td>';
            echo '<td>'.$row['o4'].'</td>';
            echo '<td><a href="admindeletequestion.php?id='.$row['jId'].'">Delete</a></td>';
            echo '/<tr>';
        }
        
        ?>
    </table>
            </form>
<?php  
          
          if (isset($_POST['submit'])){
  
   $question=$_POST['question'];
   $o1=$_POST['o1'];
   $o2=$_POST['o2'];
   $o3=$_POST['o3'];
   $o4=$_POST['o4'];
   $answer=$_POST['answer'];
   $jid=$_GET['id'];
   
   $qry="select count(*) from tblquestion where lcase(question)='$question'";
   $res=mysql_query($qry);
   $row=mysql_fetch_array($res);
   
   if($row[0]>0)
   {
    echo '<script>alert(" Already added ....");</script>';
       
   }else{
       
   $qry1="insert into tblquestion(jId,question,o1,o2,o3,o4,answer)values('$jid','$question','$o1','$o2','$o3','$o4','$answer')";
   $res1=mysql_query($qry1);
   
   if($res1){
       echo '<script>alert(" Question added ....");</script>';
   }
   else
       echo $qry1;
   
}
}
?>




