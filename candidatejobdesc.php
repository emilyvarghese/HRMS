<?php
include 'connection.php';
include 'candidateheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
       
    <br><table border="1" align="center">
        
        <?php
        session_start();
        $email=$_SESSION["email"];
        $jid=$_GET['id'];
        $qry="select * from tbljob where jId='$jid'";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
//            echo '<tr><td>'.$row['jId'].'</td></tr>';
            echo '<tr><td>Job title</td><td>'.$row['jName'].'</td></tr>';
            echo '<tr><td>Ending date</td><td>'.$row['jEdate'].'</td></tr>';
            echo '<tr><td>Qualification</td><td>'.$row['jQualification'].'</td></tr>';
            echo '<tr><td>Skills</td><td>'.$row['jSkills'].'</td></tr>';
            echo '<tr><td>Experience</td><td>'.$row['jExperience'].'</td></tr>';
            echo '<tr><td>No of post</td><td>'.$row['jNoPost'].'</td></tr>';
            $q="select count(*) from tblappliedjob where jId=".$row['jId']." and email='$email'";
            $r=mysql_query($q);
            $re=mysql_fetch_array($r);
            if($re[0]==0)
                echo '<tr><td colspan="2"><a href="candidateapplyjob.php?id='.$row['jId'].'">Apply Now</a></td></tr>';
           
        }
        
        ?>
    </table>
            </form>
