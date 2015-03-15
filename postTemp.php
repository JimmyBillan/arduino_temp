<?php 

if(!empty($_POST["t"]) && isset($_POST["s"])){

  $t = floatval($_POST["t"])/100;
  $conn = new mysqli("localhost", "root", "root", "projet_temp");
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
  $sql = "INSERT INTO temperatures (nom_salle, temperature_salle, datePost)VALUES ( '".$_POST["s"]."', '".$t."', NOW())";

  if ($conn->query($sql) === TRUE){echo "New record created successfully";}else {echo "Error: " . $sql . "<br>" . $conn->error;}
  $conn->close();
}
/*
  //$t = floatval($_POST["t"])/100;
  $conn = new mysqli("localhost", "root", "root", "projet_temp");
  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
  $sql = "INSERT INTO temperatures (nom_salle, temperature_salle, datePost)VALUES ( 'salle224', '24', NOW())";

  if ($conn->query($sql) === TRUE){echo "New record created successfully";}else {echo "Error: " . $sql . "<br>" . $conn->error;}
  $conn->close();*/