<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "products";
 #create a conection
  $conn = mysqli_connect($servername,$username,$password,$database);
  //die if the conection is not sucessful 
  if(!$conn){
  	die("sorry we failed to connet".mysqli_connect_error());
  }
  else{
  	echo "Connection was sucessful";
  }
   $city_name='London';
   $api_key = '9fd6d3c953f293d8ecadd58796ebf1a7';
   $api_url = 'http://api.openweathermap.org/data/2.5/weather?q='.$city_name.'&appid='.$api_key;
   $weather_data = json_decode(file_get_contents($api_url),true);

   $temperature = $weather_data['main']['temp'];
   $pressure = $weather_data['main']['pressure'];
   $humidity = $weather_data['main']['humidity'];
   $wind_speed = $weather_data['wind']['speed'];
   $wind_dir = $weather_data['wind']['deg'];
   $temp_min = $weather_data['main']['temp_min'];
   $temp_max = $weather_data['main']['temp_max'];
   // echo "temperature" .$temperature."<br>";
   // echo "pressure" .$pressure."<br>";
   // echo "humidity" .$humidity."<br>";
   // echo "wind speed" .$wind_speed."<br>";
   // echo "wind direction" .$wind_dir."<br>";
   // echo "temp_min" .$temp_min."<br>";
   // echo "temp_max" .$temp_max."<br>";
 
$sql = "INSERT INTO products VALUES('$temperature','$pressure','$humidity','$wind_speed','$wind_dir','$temp_min','$temp_max')";


$result = mysqli_query($conn,$sql);

  #check if the table creation was sucessful
  if($result){
  	echo "The table was sucessful<br>";
  }
  else{
  	echo "the table was not created";
  }
  $query = 'select *from products limit 1';
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  echo json_encode($row);

    ?>