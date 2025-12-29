<?php
class dbconfig
{
 var $hostt="localhost";
 var $user="porwalvi_ub_electronics";
 var $pass="8r!e$@Pd0KlX";
 var $db="porwalvi_ub_electronics";
 //Function to connect with the database

public function dbconnect(){
      $con = new mysqli($this->hostt,$this->user,$this->pass,$this->db); 
        if($con -> connect_error)
            {
                die("Mysql Connection failed");
            }
            return $con;
                }
                
//Function to perform operation with the database 
public function get_safe_str($str){
		if($str!=''){
			return mysqli_real_escape_string($this->dbconnect(),$str);
		}
	}
	
//	

public function dbperform($query){
     $conn = $this-> dbconnect();
     $result = $conn-> query($query);
     if($conn){
     $conn->close();
     $this-> dbconnect()->close();
    }
    return $result;
}

//Function to perform operation with the database 

public function dbperformm($query){
     $conn = $this-> dbconnect();
     $result = $conn-> query($query);
     if($conn){
     $conn->close();
     $this-> dbconnect()->close();

    }
}
//Function to count number of rows

public function dbcount($query)
{ 
    $conn = $this-> dbconnect();
    $result = $conn-> query($query);
    $this-> dbconnect()->close();
    return $result->num_rows;
    
}


function towrealarray($query)
 {
//   $db = mysqli_connect("localhost", "spyvioxp_feminine", "feminine2020", "spyvioxp_feminine");
   $re = array();
   foreach ($query as $key => $value) {
   $key = str_replace("<","<",$value);
   $key = str_replace(">",">",$key);
   $key = mysqli_real_escape_string($db,$key);

   $re[$key] = $key;
    }
   return $re;
 }
    
}

?>