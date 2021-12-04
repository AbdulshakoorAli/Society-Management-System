<?php
    include('session_start.php');
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST['user']))
        {
            $user=null;
            echo "Roll No. Required <br>" ;   
        }
        else
        {
            $user=$_POST['user'];
        }

        if(empty($_POST['pass']))
        {
            $pass=null;
            echo "Password Required <br>";
        }
        else
        {
            $pass=$_POST['pass'];
        }
    if($user!=null && $pass!=null)
    { 
        $sql = "SELECT * FROM `student` WHERE `student_id` LIKE '$user' AND `Password` LIKE '$pass'";
        if($result = $mysqli->query($sql))
        {
            if($result->num_rows==1)
            {
                $row=$result->fetch_array();
                $_SESSION['username'] = $user;
                $result->free_result();
                header("location:student.php");
            }
            else
            {
                echo "Invalid Username OR password";
            }
        }
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
    <title>SMP LOGIN</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>Roll No.</label> 
        <input type="text" name="user" id="user" placeholder="Roll Number i.e (17|-1234)"> 
        <label >Password</label> 
        <input type="password" name="pass" id="pass" placeholder="Password">
        <button type="submit">Sign In</button>
    </form>
</body>
</html>

