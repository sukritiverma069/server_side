<!DOCTYPE html>
<html lang="en">
<head>
<meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/Grid.css">
  <link rel="stylesheet" href="css/main.css">
  
</head>
<body>

<?php
    //address of the server where db is installed
    $servername = "localhost";
    //username to connect to the db
    //the default value is root
    $username = "dbuser2";
    //password to connect to the db
    //this is the value you specified during installation of WAMP stack
    $password = "dbpassword2";
    //name of the db under which the table is created
    $dbName = "99acresdb2";
    //establishing the connection to the db.
    $conn = new mysqli($servername, $username, $password, $dbName);
    //checking if there were any error during the last connection attempt
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>

<?php
    //the SQL query to be executed
    $query = "select buildername , count(projectid) as projectcount from project_details_full where buildername <> "Unknown" group by buildername order by projectcount DESC";
    //storing the result of the executed query
    $result = $conn->query($query);
?>

<?php
    //initialize the array to store the processed data
    $jsonArray = array();
    //check if there is any data returned by the SQL Query
    if ($result->num_rows > 0) {
      //Converting the results into an associative array
      while($row = $result->fetch_assoc()) {
        $jsonArrayItem = array();
        $jsonArrayItem['label'] = $row['projectcount'];
        $jsonArrayItem['value'] = $row['buildername'];
        //append the above created object into the main array.
        array_push($jsonArray, $jsonArrayItem);
      }
    }
?>

<?php
    //Closing the connection to DB
    $conn->close();
    //set the response content type as JSON
    header('Content-type: application/json');
    //output the return value of json encode using the echo function.
    echo json_encode($jsonArray);
?>

<script>

var apiChart = new FusionCharts({
  type: "column2d",
  renderAt: "api-chart-container",
  width: "550",
  height: "350",
  dataFormat: "json",
  dataSource: {
    chart: chartProperties,
    data: chartData
  }
});
$(function() {
  $("#background-btn").click(function() {
    modifyBackground();
  });

  $("#canvas-btn").click(function() {
    modifyCanvas();
  });

  $("#dataplot-btn").click(function() {
    modifyDataplot();
  });

  apiChart.render();
});

function modifyBackground() {
  //to be implemented
}

function modifyCanvas() {
  //to be implemented
}

function modifyDataplot() {
  //to be implemented
}

</script>


    
</body>
</html>