<?php //
include 'connection.php';
include 'candidateheader.php';
session_start();
$email=$_SESSION['email'];
$qry="select * from tblregistration where lcase(email)='$email'";
$res=mysql_query($qry);
$row=mysql_fetch_array($res);

?>
<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Profile</b></h2><br>
            <tr>
                <td><b>Email :</b></td>
                <td><input type="email" name="email" value="<?php echo $row['email']; ?>" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b> Name :</b></td>
                <td><input type="text" name="name" value="<?php echo $row['name']; ?>" required="" class="form-control"/></td>
            </tr>
             <tr>
                 <td><b> House name :</b></td>
                 <td><input type="text" name="house" value="<?php echo $row['house']; ?>" required="" class="form-control"/></td>
            </tr>
             <tr>
                <td><b>Place :</b></td>
                <td><input type="text" name="place" required="" value="<?php echo $row['place']; ?>" class="form-control"/></td>
            </tr>
             <tr>
                <td><b>Qualification :</b></td>
                 <td><input type="text" name="qual" required="" value="<?php echo $row['qualification']; ?>" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Skills :</b></td>
                 <td><input type="text" name="skill" required="" value="<?php echo $row['skills']; ?>" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Experience :</b></td>
                 <td><input type="text" name="exp" required="" value="<?php echo $row['experience']; ?>" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Job description :</b></td>
                <td><input type="text" name="job" value="<?php echo $row['designation']; ?>" class="form-control"/></td>
            </tr>
             <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="UPDATE" class="btn btn-success"/></td>
            </tr>
    </table>
</form>
<?php  
          
          if (isset($_POST['submit'])){
  
   $name=$_POST['name'];
   $house=$_POST['house'];
   $place=$_POST['place'];
   $qual=$_POST['qual'];
   $skill=$_POST['skill'];
   $exp=$_POST['exp'];
   $job=$_POST['job'];
   $email=$_POST['email'];
   
   
   
 
       
        $qry1="update tblregistration set name='$name',house='$house',place=''$place,qualification='$qual',skills='$skill',experience='$exp',designation='$job' where email='$email'";
        $res1=mysql_query($qry1);
   
        if($res1){
            
                echo '<script>alert(" Profile updation successfull ....");</script>';
           
        }
        else
            echo $qry1;
   
}

?>




