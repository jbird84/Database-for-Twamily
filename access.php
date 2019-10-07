<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Declare class to access this php file
class access {
   
    //connection global variables (you can tell by the var being used before the variable)
    var $host = null;
    var $user = null;
    var $password = null;
    var $dbName = null;
    var $connection = null;
    var $result = null;
    
    // Constructing our class NOTE:this will run as soon as class access is called. 
    function __construct($dbhost, $dbuser, $dbpass, $dbname) {
       
       //Notice we use "$this->" and remove the $ from each variable.$this-> is just a syntax of PHP when referring to a global variable. 
       $this->host = $dbhost; 
       $this->user = $dbuser;
       $this->password = $dbpass;
       $this->dbName = $dbname;
    }
    
     //This will be a function for an open connection. It will be public so we can access it from another file.
    //This will not run automatically but only when it is called. 
    public function connect() {
    
        // establish connection and store it in $connection
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbName);
        
        //if error loop
        if (mysqli_connect_errno()) {  // <--this is a premade function in PHP that will be called if there is an error.
            echo 'Could not connect to database.';
        }
        
        $this->connection->set_charset("utf8"); //this line of code will accept ALL languages  
    }
      
    // Disconnected Function 
    public function disconnnect() {
        
        //Only close this if we have a connection loop
        if($this->connection != nul) {
           $this->connection->close();
        }
        
    }
    
    
}


?>