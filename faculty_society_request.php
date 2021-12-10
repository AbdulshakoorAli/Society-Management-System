<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
                $find_form="SELECT * from forms, society WHERE forms.Society_id=society.Society_id AND `Faculty_Id`='$user' AND Form_id LIKE 'I%'";
                $form_result=$mysqli->query($find_form);
                while($faculty_get_form=$form_result->fetch_array())
                {
                   echo  $faculty_get_form[1]."<br>";
                   $requests_sql="SELECT * FROM `fill` NATURAL JOIN `student` where `form_id`='$faculty_get_form[0]'";
                   $requests_result=$mysqli->query($requests_sql);
        ?>
                   <table style="border:2px solid black;">
                        <th>Roll No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Section</th>
                        <th>Batch</th>
                        <th>Semester</th>
                        <th>CGPA</th>
                        <th>Phone No.</th>
                        <th>Email</th>
                        <th>Accept</th>
                        <th>Reject</th>
        <?php
                   while($requests_students=$requests_result->fetch_array())
                   {
        ?>
                    <tr>
                      <td> <?php echo $requests_students[0] ?> </td>
                      <td> <?php echo $requests_students[2] ?> </td>
                      <td> <?php echo $requests_students[3] ?> </td>
                      <td> <?php echo $requests_students[4] ?> </td>
                      <td> <?php echo $requests_students[5] ?> </td>
                      <td> <?php echo $requests_students[6] ?> </td>
                      <td> <?php echo $requests_students[7] ?> </td>
                      <td> <?php echo $requests_students[8] ?> </td>
                      <td> <?php echo $requests_students[9] ?> </td>
                      <td> <a href="faculty.php?action=accept&s_id=<?php echo $requests_students[0] ?>&f_id=<?php echo $faculty_get_form[0]?>&society=<?php echo $faculty_get_form[2]?>">Accept </a></td>
                      <td> <a href="faculty.php?action=reject&s_id=<?php echo $requests_students[0] ?>&f_id=<?php echo $faculty_get_form[0]?>">Reject </a></td>
                    </tr>
        <?php  
                   }
                   $requests_result->free_result();
        ?>
                   </table>
                   <br>
        <?php                   
                }
                $form_result->free_result();
        ?>
</body>
</html>