<?php 

    include_once('../includes/database.php');
    // Create a database connection
    $db = new MySQLdatabase("university");

?>
<html>
<body>
    <h1>Employee Registration Form</h1>
    <h4>Please fill in the following employee information:</h4>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        first name:<input type="text" name="fname"><br/>
        last name:<input type="text" name="lname"><br/>
        Social Security Number:<input type="number" name="ssn" min=111 max=999><br/>
        Date of Birth:<input type="date" name="dob"><br/>
        College:<br> 
        <select name="college">
            <option value="Business">Business</option>
            <option value="Computer Science">Computer Science</option>
            <option value="General Science">General Science</option>
            <option value="Humanities">Humanities</option>
        </select><br>
        <input type="hidden" name="MAX_FILE_SIZE" VALUE="100000">
        CV:<input type="file" name="cv"><br/>
        <input type="submit" name="submit">
    </form>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")  {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $ssn = $_POST['ssn'];
        
        $dob = $_POST['dob'];
        $dob = date("Y-m-d",strtotime($dob));
        $join_date = date("Y-m-d");
        $college = $_POST['college'];
                
        if ($_FILES['cv']['error']==0){
            
            $cv = $_FILES['cv']['name'];
            $tmp_loc = $_FILES['cv']['tmp_name'];
            $target = basename($_FILES['cv']['name']);
           
            $upload_dir = "uploads";
            $result = move_uploaded_file($tmp_loc,$upload_dir."/".$target);
            if (!$result){
                echo "unable to move the uploaded file to the permanent directory";
            }
        } else {echo $_FILES['cv']['error']."<br>";}
                
        $query  = "INSERT INTO employees VALUES ($ssn,'$fname','$lname','$dob',NULL,'$college','$cv')";   
        $result = $db->query($query);
        
        if ($result) {
                echo "<h1>$fname $lname is now registered</h1>";
            } 
    }    
    //Close database connection
    $db->close();
?>