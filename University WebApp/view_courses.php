<?php
    include_once('includes/database.php');
    // Create a database connection
    $db = new MySQLdatabase("university");
    
    //Perform database query
    $query  = "SELECT * FROM courses ORDER BY college";
    $result = $db->query($query);

    if ($result){
        //loop through the rows of the result
        echo "<h2>Available Courses:</h2>";
        echo "<table border=1>";
        echo "<th>College</th><th>Course Name</th><th>Course Code</th>";
        while ($course = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$course['college']."</td>";
            echo "<td>".$course['name']."</td>";
            echo "<td>".$course['code']."</td>"; 
            echo "</tr>";
        }
        echo "</table>";
    }
    
    //Close database connection
    $db->close();
?>