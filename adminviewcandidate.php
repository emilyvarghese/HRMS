<?php
include 'connection.php';
include 'adminheader.php'
?>
<form method="POST" enctype="multipart/form-data">   
    <table border="1" align="center">
        <tr>
            <th>EMAIL</th>
            <th>NAME</th>
            <th>PLACE</th>
            <th>QUALIFICATION</th>
            <th>SKILLS</th>
            <th colspan="2">EXPERIENCE</th>
        </tr>
        <?php
        $jid=$_GET['id'];
        $qry="select * from tblregistration where email in(select email from tblappliedjob where jId='$jid')";
        $res=mysql_query($qry);
        while ($row=mysql_fetch_array($res))
        {
            echo '<tr>';
            echo '<td>'.$row['email'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['place'].'</td>';
            echo '<td>'.$row['qualification'].'</td>';
            echo '<td>'.$row['skills'].'</td>';
            echo '<td>'.$row['experience'].'</td>';
            echo '<td><a href="'.$row['resume'].'">View Resume</a></td>';
            echo '</tr>';
            
        }
        
        ?>
    </table>
            </form>
