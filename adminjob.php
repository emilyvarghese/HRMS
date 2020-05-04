<?php
include 'connection.php';
include 'adminheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Add Vacancies Here......</b></h2><br>
            <tr>
                <td><b>Vacancy Name :</b></td>
                <td><input type="text" name="jname" required="" class="form-control"/></td>
            </tr>
             <tr>
                 <td><b> Description :</b></td>
                 <td><textarea name="jdesc" class="form-control"></textarea></td>
            </tr>
           
             
             <tr>
                <td><b>Ending Date :</b></td>
                <td><input type="date" name="jedate" required="" class="form-control"/></td>
            </tr>
             <tr>
                <td><b>Qualification :</b></td>
                 <td><input type="text" name="jqual" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Skills :</b></td>
                 <td><input type="text" name="jskill" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Experience :</b></td>
                 <td><input type="text" name="jexp" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>No of post :</b></td>
                 <td><input type="int" name="jnopost" required="" class="form-control"/></td>
            </tr>
             <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="ADD" class="btn btn-success"/></td>
            </tr>
    </table>
    <br><table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th colspan="3">ENDING DATE</th>
        </tr>
        <?php
        $qry="select * from tbljob where jStatus='active'";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['jId'].'</td>';
            echo '<td>'.$row['jName'].'</td>';
            echo '<td>'.$row['jEdate'].'</td>';
            echo '<td><a href="adminquestion.php?id='.$row['jId'].'">Add question</a></td>';
            echo '<td><a href="admindeletejob.php?id='.$row['jId'].'">Delete</a></td>';
            echo '</tr>';
        }
        
        ?>
    </table>
            </form>
<?php  
          
          if (isset($_POST['submit'])){
  
   $jname=$_POST['jname'];
   $jdesc=$_POST['jdesc'];
   $jedate=$_POST['jedate'];
   $jqual=$_POST['jqual'];
   $jskill=$_POST['jskill'];
   $jexp=$_POST['jexp'];
   $jnopost=$_POST['jnopost'];
   
   $qry="select count(*) from tbljob where lcase(jName)='$jname'";
   $res=mysql_query($qry);
   $row=mysql_fetch_array($res);
   
   if($row[0]>0)
   {
    echo '<script>alert(" Already added ....");</script>';
       
   }else{
       
   $qry1="insert into tbljob(jName,jDesc,jSdate,jEdate,jQualification,jSkills,jExperience,jNoPost,jStatus)values('$jname','$jdesc',(select sysdate()),'$jedate','$jqual','$jskill','$jexp','$jnopost','active')";
   $res1=mysql_query($qry1);
   
   if($res1){
       echo '<script>alert(" Job added ....");</script>';
   }
   
}
}
?>




