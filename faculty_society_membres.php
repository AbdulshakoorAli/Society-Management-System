<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>    
    <table>
            <th>ID</th>
            <th>Name</th>
            <th>Head</th>
        
        <?php
            $society_sql="SELECT * FROM `society` where Faculty_Id='$user'";
            $society_result=$mysqli->query($society_sql);
            while($society= $society_result->fetch_array())
            {
        ?>
                <tr>
                    <td><?php echo $society[0]; ?></td>
                    <td><?php echo $society[1]; ?></td>
                    <td><?php 
                             if(isset($society[3]))
                             {
                                echo $society[3];   
                             }
                             else
                             {
                                 echo "-";
                             }
                        ?></td>
                </tr>
        <?php
            }
            $society_result->free_result();
        ?>  
    </table>
</body>
</html>