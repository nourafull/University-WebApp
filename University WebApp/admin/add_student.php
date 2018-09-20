<?php
    include_once('../includes/database.php');
    // Create a database connection
    $db = new MySQLdatabase("university");
?>
<html>
<body>
    <h1>Student Registration Form</h1>
    <h4>Please fill in the following student information:</h4>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        first name:<input type="text" name="fname"><br/>
        last name:<input type="text" name="lname"><br/>
        Date of Birth:<input type="date" name="dob"><br/>
        Program:<br> 
        <select name="program">
            <option value="Linguistics">Linguistics</option>
            <option value="Translation">Translation</option>
            <option value="Information Systems">Information Systems</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Marketing">Marketing</option>
            <option value="Finance">Finance</option>
        </select><br>
        Status:<br>
            <input type="radio" name="status" value="part-time">part-time<br>
            <input type="radio" name="status" value="full-time">full-time<br>
        email:<input type="email" name="email"><br/>    
        <input type="submit" name="submit" value="register student">
    </form>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")  {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        
        $dob = $_POST['dob'];
        $dob = date("Y-m-d",strtotime($dob));
        
        $program = $_POST['program'];
        
        $status = $_POST['status'];
                    
		if ($status == "full-time"){ 
            $grad_date = date("Y-m-d",strtotime("+4 years"));
        } else {
            $grad_date = date("Y-m-d",strtotime("+6 years")); 
        }
                    
        $email = $_POST['email'];
        
        $query  = "INSERT INTO students VALUES (NULL,'$fname','$lname','$dob',NULL,'$grad_date','$program','$status','$email')";
                
        $result = $db->query($query);
        
        if ($result) {
                echo "<h1>$fname $lname is now registered</h1>";
            } 
    }    
    //Close database connection
    $db->close();
?>