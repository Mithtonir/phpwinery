<?php
require 'connection.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

  // Validate.
  if(trim($request->sugarInFruit) === '' || (float)$request->acidity < 0)
  {
    return http_response_code(400);
  }

  // Sanitize.
  $name = mysqli_real_escape_string($con, trim($request->name));
  $sugarInFruit = mysqli_real_escape_string($con, (float)($request->sugarInFruit));
  $acidity = mysqli_real_escape_string($con, (float)$request->acidity);


  // Create.
  $sql = "INSERT INTO `fruits`(`id`,`name`,`sugarInFruit`, `acidity`) VALUES (null,'{$name}','{$sugarInFruit}', '{$acidity}')";
  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $fruit = [
      'name' => $name,
      'sugarInFruit' => $sugarInFruit,
      'acidity' => $acidity,
      'id'    => mysqli_insert_id($con)
    ];
    echo json_encode($fruit);
  }
  else
  {
    http_response_code(422);
  }
}