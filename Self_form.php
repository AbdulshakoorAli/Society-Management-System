<?php
    include('session_start.php');
    session_start();
    if(isset($_GET['f_no']))
    {
        $f_no=$_GET['f_no'];        
        $sql="SELECT * FROM `forms` where `Form_id` LIKE '$f_no'";
        $result=$mysqli->query($sql);
        $form=$result->fetch_array();
        $result->free_result();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> <?php echo $form[1]?> FORM</title>
</head>
<body>
    <h1><?php echo $form[1] ?> FORM</h1>
    <form action=""  method="post">
        <label>Full Name</label> 
        <input type="text" placeholder="Full Name"> 
        <label >Roll No.</label> 
        <input type="text" placeholder="Roll No.">
        <label>D.O.B</label>
        <input type="date">
        <label> Male </label>
        <input type="radio" name="gender">
        <label >Female</label>
        <input type="radio" name="gender">        
        <input type="submit" name="SubmitButton"  value="Submit" onclick="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ?f_no=<?php echo  $self_form[0] ?>">
    </form>
     
    <?php  if(isset($_POST['SubmitButton']))  
    { 
            $user=$_SESSION['username'];
            $sql="SELECT * from `fill` where `student_id` LIKE '$user' AND `form_id` LIKE '$form[0]'";
            $result=$mysqli->query($sql);
            if($result->num_rows>=1)
            {
    ?>
                <p><?php $form[1] ?> Already Submitted !</p>    
    <?php   }
            else
            {
                $user=$_SESSION['username'];
                $sql="INSERT INTO `fill` (`student_id`, `form_id`) VALUES ('$user','$form[0]')";
                if($mysqli->query($sql)==true)
                {
    ?>
                    <p><?php $form[1]?> Form Submitted Succesfully !</p>
    <?php
                }
                else
                {
                    echo "Error Submitting Form". $sqli->error;
                }
            }
    }
    ?>
        <a href="student.php">go to main menu</a>                    
</body>
</html>
