 <?php 
    
    include('session_start.php');
    session_start();
    if (isset($_SESSION['username']))
    {
        $user=$_SESSION['username'];
        $sql="SELECT * FROM  `student` where student_id='$user'";
        if($result = $mysqli->query($sql))
        {
            $row=$result->fetch_array();
            $result->free_result();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> SMS | Student </title>
</head>
<body>
    <section class="student_info">
        
        <h1>Student Profile</h1>
        
        <?php
            for($x=0; $x<11; $x++)
            {
                echo $row[$x]. " ";
            }
        ?>

    </section>
    <section class="societies">
        <h1>ALL SOCIETIES</h1>
        <table>
            <th>Society ID</th>
            <th>Society Name</th>
            <th>Society Form</th>
            <?php
                $sql="SELECT * FROM `society`";
                $result=$mysqli->query($sql);
                while($row=$result->fetch_array())
                {
            ?>
            <tr>
                <td> <?php echo $row[0] ?>   </td>
                <td> <?php echo $row[1] ?>   </td>
                <td> <a href="All_forms.php?s_id=<?php echo  $row[0]?>">Available FORMS </a></td>
                
            </tr>
        <?php    
                }
                $result->free_result(); 
        ?>
        </table>
    </section>
</body>
</html>