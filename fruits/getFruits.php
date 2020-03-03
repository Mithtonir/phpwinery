<?php
/**
 * Returns the list of policies.
 */
require '../connection.php';

$fruits = [];
$sql = "SELECT id, name, sugarInFruit, acidity FROM fruits";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $fruits[$i]['id']    = $row['id'];
    $fruits[$i]['name'] = $row['name'];
    $fruits[$i]['sugarInFruit'] = $row['sugarInFruit'];
    $fruits[$i]['acidity'] = $row['acidity'];
    $i++;
  }

  echo json_encode($fruits);
}
else
{
  http_response_code(404);
}