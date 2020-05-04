<?php //
include 'connection.php';
include 'commonheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
        <table align="center" >
            <br><h2  align="center" > <b>Login</b></h2><br>
            <tr>
                <td><b>Email :</b></td>
                <td><input type="email" name="email" required="" class="form-control"/></td>
            </tr>
            <tr>
                <td><b>Password :</b></td>
                <td><input type="password" name="pwd" required="" class="form-control"/></td>
            </tr>
           
             <tr>
                 <td colspan="2" align="center"><input type="submit" name="submit" value="LOGIN" class="btn btn-success"/></td>
            </tr>
    </table>
    
            </form>
<?php  
          
          if (isset($_POST['submit'])){
  
  
   $email=$_POST['email'];
   $pwd=$_POST['pwd'];
   
   $qry="select count(*) from tbllogin where lcase(uname)='$email'";
   $res=mysql_query($qry);
   $row=mysql_fetch_array($res);
   
   if($row[0]>0)
   {
    
       $qry="select * from tbllogin where lcase(uname)='$email'";
        $res=mysql_query($qry); 
        $row=mysql_fetch_array($res);
            if($row['pwd']==$pwd)
            {
                session_start();
                $_SESSION['email']=$email;
                if($row['status']=='active')
                {
                    if($row['utype']=='admin')
                        echo '<script>location.href="adminhome.php"</script>';
                    else if($row['utype']=='candidate')
                        echo '<script>location.href="candidatehome.php"</script>';
//                        echo 'Hai';
                    else 
                        echo $row['utype'];
                }
                else{
      
       echo '<script>alert(" Account inactive");</script>';
        
}
            }
            else{
      
       echo '<script>alert(" incorrect password ....");</script>';
        
}
   }
   else{
      
       echo '<script>alert(" User doesnt exist ....");</script>';
        
}
}
include 'footer.php';
?>




