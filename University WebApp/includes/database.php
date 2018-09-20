<?php
Class MySQLdatabase{
  
  var $server="localhost";
  var $user="root";
  var $pw="hi";
  var $connection; 
  
  function __construct($db_name){
      
      //Create Connection
      $this->connection = mysqli_connect($this->server,$this->user,$this->pw,$db_name);
      
      // Test if connection succeeded
      if(mysqli_connect_errno()) {
        die("Database connection failed: " . 
             mysqli_connect_error() . 
             " (" . mysqli_connect_errno() . ")"
        );
      }
  }    
  function query($query){
      
      $result = mysqli_query($this->connection, $query);
      if (!$result){
          echo "query failed.<br>";
          echo mysqli_error($this->connection)."<br>";
          echo mysqli_errno($this->connection)."<br>";
          die();
      }
      return $result;
  }  
  function close(){
      if (isset($this->connection)){
          mysqli_close($this->connection);
      }
      unset($this->connection);
  }
}
?>