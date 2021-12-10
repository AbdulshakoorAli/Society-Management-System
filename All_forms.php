<?php    
    include('session_start.php');
    session_start();
    if(isset($_GET['s_id']))
    {
        $s_id=$_GET['s_id'];        
        $sql="SELECT * FROM `forms` where `Society_id` LIKE '$s_id'";
        $result=$mysqli->query($sql);
        if($result->num_rows==0)
        {
            Header("Location:student.php");
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
    <title>Document</title>
</head>
<body>
        <?php
            while($self_form=$result->fetch_array())
            {
        ?>
                <a href="Self_form.php?f_no=<?php echo  $self_form[0] ?>"> <?php echo  $self_form[1] ?> </a></td>
        <?php   
            }
            $result->free_result(); 
        ?>
</body>
</html>

