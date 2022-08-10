<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "products";
 #create a conection
  $conn = mysqli_connect($servername,$username,$password,$database);
// $response = array();
if(!$conn){
  echo "databse connection failed";
}
  else
  {  
     $sql = "SELECT * FROM products";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($result);
   
      while ($row=mysqli_fetch_assoc($result)){
          echo json_encode($row);
   //royal bro
          echo "string";
   
   }

  }
  ?>