<?php
include 'connection.php';
include 'adminheader.php'
?>
<form method="POST" enctype="multipart/form-data">   
    <table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th colspan="2">ENDING DATE</th>
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
            echo '<td><a href="adminviewcandidate.php?id='.$row['jId'].'">View Candidates</a></td>';
            echo '</tr>';
        }
        
        ?>
    </table>
            </form>
