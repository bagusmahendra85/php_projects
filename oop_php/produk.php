<?php 
require "autoload/App/init.php";

$sao = new Book("Sword Art Online", "Misashi Kobayakawa", "Silver Link", 55000, 470);
$coralIsland = new Game("Coral Island", "Stairway Games", "Steam Incorporated", 150000, 32);

$product = new ProductRegistered();

$product -> insertNew($sao);
$product -> insertNew($coralIsland);
echo $product -> displayAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OOP PHP</title>
</head>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #dddded;
  }
</style>
<body>
  
</body>
</html>