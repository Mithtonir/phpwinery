<?php
require '../connection.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  // Validate.
  // if(trim($request->sugarInFruit) === '' || (float)$request->acidity < 0)
  // {
  //   return http_response_code(400);
  // }

  // Sanitize.
  $name = mysqli_real_escape_string($con, trim($request->name));
  $sugar = mysqli_real_escape_string($con, (float)($request->sugar));
  $water = mysqli_real_escape_string($con, (float)$request->water);
  $fruitName = mysqli_real_escape_string($con, trim($request->fruitName));
  $fruit = mysqli_real_escape_string($con, trim($request->fruit));
  $percentage = mysqli_real_escape_string($con, (float)$request->percentage);
  $total = mysqli_real_escape_string($con, (float)$request->total);


  // Create.
$sql = "INSERT INTO `winetable`(`id`, `name`, `sugar`, `water`, `fruitName`, `fruit`, `percentage`, `total`) 
VALUES (null, '{$name}', '{$sugar}', '{$water}', '{$fruitName}', '{$fruit}', '{$percentage}', '{$total}')";
  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $table = [
      'name' => $name,
      'sugar' => $sugar,
      'water' => $water,
      'fruitName' => $fruitName,
      'fruit' => $fruit,
      'percentage' => $percentage,
      'total' => $total,
      'id'    => mysqli_insert_id($con)
    ];
    echo json_encode($table);
  }
  else
  {
    http_response_code(422);
  }
}