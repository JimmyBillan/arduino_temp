<?php 
if(!empty($_POST["t"]) && isset($_POST["s"]) && isset($_POST["b"])){

  $t = floatval($_POST["t"])/100;
  $conn = new mysqli("localhost", "root", "root", "projet_temp");
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
  $sql = "INSERT INTO temperatures (nom_salle, temperature_salle, datePost, batterie)VALUES ( '".$_POST["s"]."', '".$t."', NOW(),'".$_POST["b"]."' )";

  if ($conn->query($sql) === TRUE){echo "New record created successfully";}else {echo "Error: " . $sql . "<br>" . $conn->error;}
  $conn->close();
}

  $t = rand(21.00 ,25.00);
  $conn = new mysqli("localhost", "root", "root", "projet_temp");
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
   $sql = "INSERT INTO temperatures (nom_salle, temperature_salle, datePost, batterie)VALUES (  'salle224', '".$t."', NOW(), '".rand(70.00 ,80.00)."')";

  if ($conn->query($sql) === TRUE){echo "New record created successfully";}else {echo "Error: " . $sql . "<br>" . $conn->error;}


$conn->close();