<?php
include 'connection.php';
include 'candidateheader.php'
?>
<form method="POST" enctype="multipart/form-data">
        
       
    <br><table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th colspan="2">ENDING DATE</th>
        </tr>
        <?php
        session_start();
        $email=$_SESSION["email"];
        $qry="select * from tbljob where jStatus='active'";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['jId'].'</td>';
            echo '<td>'.$row['jName'].'</td>';
            echo '<td>'.$row['jEdate'].'</td>';
            $q="select count(*) from tblappliedjob where jId=".$row['jId']." and email='$email'";
            $r=mysql_query($q);
            $re=mysql_fetch_array($r);
            if($re[0]==0)
                echo '<td><a href="candidatejobdesc.php?id='.$row['jId'].'">Apply Now</a></td>';
           echo '</tr>';
        }
        
        ?>
    </table>
            </form>
