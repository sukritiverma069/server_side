<!DOCTYPE html>
<html>
<head>
<title>Read Data From Database Using PHP - Demo Preview</title>
<meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/Grid.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class = "row">
  <div class = "col span-1-of-2">
    
  <a class = "btn" href = "index.php">Edit</a>

  </div>
  
</div>

<?php
$con=mysqli_connect("localhost","dbuser2","dbpassword2","99acresdb2");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " .mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM project_details_full limit 5")
$all_property = array();  //declare an array for saving property

//showing property
echo '<table class="data-table">
        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($all_property as $item) {
        echo '<td>' . $row[$item] . '</td>'; //get items using property value
    }
    echo '</tr>';
}
echo "</table>";
?>

<?php
mysqli_close($con);
?>


</body>
</html>
