<?php
    
    include('session_start.php');
    session_start();
    if(isset($_GET['s_id']))
    {
        $s_id=$_GET['s_id'];
        $sql="SELECT * FROM `society` WHERE `Society_id` LIKE '$s_id'";   
        if($result = $mysqli->query($sql))
        {
            $row=$result->fetch_array();
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
    <title> <?php echo $row[1]?> INDUCTION FORM</title>
</head>
<body>
    <h1><?php echo $row[1] ?> INDUCTION FORM</h1>
    <form action="#" method="post">
        <label>Full Name</label> 
        <input type="text" placeholder="Full Name"> 
        <label >Roll No.</label> 
        <input type="text" placeholder="Roll No.">
        <label>D.O.B</label>
        <input type="date">
        <label> Male </label>
        <input type="radio">
        <label >Female</label>
        <input type="radio">        
        <button type="submit" onclick="return confirm('Are you sure you want to submit this FORM?')">>SUBMIT</button>
    </form>

     <!-- After submitting where should be stored this student to which form -->
</body>
</html>

