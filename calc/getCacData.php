<?php
require '../connection.php';

$winetable = [];
$sql = "SELECT id, name, sugar, water, fruitName, fruit, percentage, total FROM winetable";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $winetable[$i]['id'] = $row['id'];
    $winetable[$i]['name'] = $row['name'];
    $winetable[$i]['sugar'] = $row['sugar'];
    $winetable[$i]['water'] = $row['water'];
    $winetable[$i]['fruitName'] = $row['fruitName'];
    $winetable[$i]['fruit'] = $row['fruit'];
    $winetable[$i]['percentage'] = $row['percentage'];
    $winetable[$i]['total'] = $row['total'];
    $i++;
  }

  echo json_encode($winetable);
}
else
{
  http_response_code(404);
}