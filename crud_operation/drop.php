<?php 
require './functions/function.php';
require './functions/modal.php';

$id = $_GET["id"];
drop($id);

echo(drop($id));

?>