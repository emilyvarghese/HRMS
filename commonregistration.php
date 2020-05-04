<?php //
include 'connection.php';
include 'commonheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Registration</b></h2><br>
            <tr>
                <td><b>Email :</b></td>
                <td><input type="email" name="email" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Password :</b></td>
                <td><input type="password" name="pwd" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b> Name :</b></td>
                <td><input type="text" name="name" required="" class="form-control"/></td>
            </tr>
             <tr>
                 <td><b> House name :</b></td>
                 <td><input type="text" name="house" required="" class="form-control"/></td>
            </tr>
           
             
             <tr>
                <td><b>Place :</b></td>
                <td><input type="text" name="place" required="" class="form-control"/></td>
            </tr>
             <tr>
                <td><b>Qualification :</b></td>
                 <td><input type="text" name="qual" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Skills :</b></td>
                 <td><input type="text" name="skill" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Experience :</b></td>
                 <td><input type="text" name="exp" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Description of current job :</b></td>
                <td><input type="text" name="job" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Upload resume :</b></td>
                <td><input type="file" name="file" class="form-control"/></td>
            </tr>
             <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="Register" class="btn btn-success"/></td>
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
   $pwd=$_POST['pwd'];
   
   $folder='images/';
   $file=$folder.basename($_FILES['file']['name']);
   move_uploaded_file($_FILES['file']['tmp_name'],$file);
   
   $qry="select count(*) from tbllogin where lcase(uname)='$email'";
   $res=mysql_query($qry);
   $row=mysql_fetch_array($res);
   
   if($row[0]>0)
   {
    echo '<script>alert(" Already registered ....");</script>';
       
   }
   else{
      
       
        $qry1="insert into tblregistration(email,name,house,place,qualification,skills,experience,designation,rdate,resume)values"
           . "('$email','$name','$house','$place','$qual','$skill','$exp','$job',(select sysdate()),'$file')";
        $res1=mysql_query($qry1);
   
        if($res1){
            $qry1="insert into tbllogin(uname,pwd,utype,status)values('$email','$pwd','candidate','active')";
            $res1=mysql_query($qry1);
            if($res1)
                echo '<script>alert(" Registration successfull ....");</script>';
            else
                echo $qry1;
        }
        else
            echo $qry1;
   
}
}
include 'footer.php';
?>




