<?php
    include('session_start.php');
    session_start();
    if (isset($_SESSION['username']))
    {
        $user=$_SESSION['username'];
        $sql="SELECT * FROM  `faculty` NATURAL JOIN `departments` where Faculty_Id='$user'";
        if($result = $mysqli->query($sql))
        {
            $row=$result->fetch_array();
            
        }
        else
        {
            echo "error";
        }
        $result->free_result();

        if(isset($_GET['s_id']) && isset($_GET['f_id']) && isset($_GET['action']))
        {
                $action=$_GET['action'];
                $student=$_GET['s_id'];
                $form=$_GET['f_id'];
                if($action=='accept')
                {                    
                    $society=$_GET['society'];
                    $sql="INSERT INTO `join` (`student_id`, `society_id`, `form_id`) VALUES ('$student', '$society', '$form')";
                    $mysqli->query($sql);
                }              
                $sql="DELETE FROM `fill` WHERE student_id='$student' AND form_id='$form'";
                $mysqli->query($sql);
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
    <title>SMS | Faculty</title>
</head>
<body>
    <section class="faculty_info">
        <h1>PERSONAL INFORMATION</h1>
        <?php require_once('faculty_profile.php'); ?>
    </section>

    
    <section class="societies">
        <h1>MY SOCIETIES</h1>
        <?php require_once('faculty_society_membres.php'); ?>

    </section>
    
    <section class="other_forms_Participants">
        <h1> PARTICIPANTS</h1>
        <?php  
            
        ?>
    </section>
    
    <section class="Induction request">
        <h1>SOCIETY`S INDUCTION REQUEST</h1>
        <?php require_once('faculty_society_request.php'); ?>        
    </section>
    
    <section class="other_forms">
        <h1>COMPETION WAITING LIST</h1>
        <?php require_once('faculty_participation_request.php'); ?>
    </section>
</body>
</html>