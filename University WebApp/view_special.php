<?php
  
  include_once('includes/database.php');
  // Create a database connection
    $db = new MySQLdatabase("university");
  }
    //Perform database query
    $query  = "SELECT * FROM courses WHERE college='Computer Science' && credits=3";
    
    $result = $db->query($query);

    if ($result) {
            
        //loop through the rows of the result
        echo "<h2>Computer Science Courses with 3 hours credit:</h2>";
        echo "<ul>";

        while ($course = mysqli_fetch_assoc($result)){
            echo "<li>";
            echo $course['code']." : ";
            echo $course['name'];
            echo "</li>";
    }
    echo "</ul>";
    //Close database connection
    $db->close();
?>