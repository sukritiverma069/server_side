<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/Grid.css">
  <link rel="stylesheet" href="css/main.css">
  <script src = "js/vendor/modernizr-3.7.1.min.js"></script>
</head>

<div id="mySidepanel" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="index.html">2016</a>
    <a href="#">2017</a>
    <a href="#">2018</a>
    <a href="#">2019</a>
  </div>
  
  <button class="openbtn" onclick="openNav()">☰ </button>  
  
  
  <script>
  function openNav() {
    document.getElementById("mySidepanel").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
  }
  </script>
  
<body>
  <div class = "row">

  <div class = "col span-1-of-3">
        <canvas id="myChart" style="height: 270px; width: 100%;"></canvas>

        

        <label for="name">Points</label><input id="points" type="text" placeholder = "Enter Comma Separated data" />
        <br>
        <br/>
        <input type="button" value="Show Graph" onclick="readUserData();">
        <input type="button" value="Clear Graph" onclick="clearGraph();">
        
        <div id="display"></div>
  </div>

  <div class = "col span-1-of-3">
          <canvas id="myBarChart" width = "300px" height = "300px"></canvas>
    </div>

    <div class = "col span-1-of-3">
        <canvas id="myMixedChart" width = "300px" height = "300px"></canvas>
        <select>
          <option value="March">March</option>
          <option value="April">April</option>
          <option value="May">May</option>
          <option value="June">June</option>
        </select>
   </div>

  </div>
  

</div>

<div class = "row">

<div class = "col span-1-of-3">
    <canvas id="myPieChart" width = "300px" height = "300px"></canvas>
</div>

<div class = "col span-1-of-3">
    <canvas id="myRadarChart" width = "250px" height = "250px"></canvas>
</div>

<div class = "col span-1-of-3">
    <canvas id="myScatterChart" width = "150px" height = "150px"></canvas>
</div>


</div>

<div class = "row">
    <div class = "col span-1-of-3"> X Value:
    <input id="xValue" type="text" step="any" placeholder="Enter X-Value"> <br>
    Y Value:
    <input id="yValue" type="text" step="any" placeholder="Enter Y-Value">
    <button id="renderButton">Add DataPoint & Render</button>
    <div id="chartContainer" style="height: 270px; width: 100%;">
    </div>
  </div>
</div>





<?php

$mysqli = new mysqli("localhost", "dbuser", "dbpassword", "99acresdb1");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* Fetch result set from table */
$queryResult=mysqli_query($mysqli,"SELECT BuilderName, count(ProjectName) as projectcount from project_details group by BuilderName having BuilderName != '' order by projectcount desc limit 10");


?>

<script>
    /* o make the data compatible with our chart, we must create JavaScript objects from the data. To do this, we will use PHP while loops to loop through our data to create JavaScript arrays from our result set. */
var myData=[<?php
while($info=mysqli_fetch_array($queryResult))
echo '"'.$info['BuilderName'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
console.log(myData);

<?php
$queryResult=mysqli_query($mysqli,"SELECT BuilderName, count(ProjectName) as projectcount from project_details group by BuilderName having BuilderName != '' order by projectcount desc limit 10");
?>

var myLabels=[<?php
while($info=mysqli_fetch_array($queryResult))
echo $info['projectcount']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];
console.log(myLabels);



</script>


<?php
/* Close the connection */
$mysqli->close();
?>






  <script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <!-- 
  <script src="js/linechart.js"></script>
  
  <script src="js/radar.js"></script>
  <script src="js/scatter.js"></script>
  <script src="js/mixedchart.js"></script>
  <script src="js/barchart.js"></script>
  <script src="js/EXP.JS"></script> -->
  
  <script type="text/javascript" src="static-data/graph-data.json"></script>
  <script>
    var canvas = document.getElementById("myPieChart");
var ctx2 = canvas.getContext('2d');

// Global Options:
 Chart.defaults.global.defaultFontColor = 'black';
 Chart.defaults.global.defaultFontSize = 16;

 //this is static loading for now 
 //when the backend api is availabla
 //we should be making a fetch or ajax call to get dynamic json response
 var ChartJson = myGraphObject;
 var graphDataKeys = Object.keys(ChartJson)
 var graphDataValues = graphDataKeys.map( (k) => ChartJson[k])

var data = {
    datasets: [{
        data: myLabels,
        backgroundColor: [
          "#F7464A",
          "#46BFBD",
          "#FDB45C",
          "#949FB1",
          "#4D5360",
        ],
        label: 'Dataset 1'
    }],
    labels: myData
};

// Notice the rotation from the documentation.

var options = {
        title: {
                  display: true,
                  text: 'Market Share of Job Sites',
                  position: 'top',
                  fontSize: 10
              },
        rotation: -0.7 * Math.PI,
        responsive: true,
        legend: {
            display: true,
            labels: {
                fontSize: 10,
                 }
         }
        
};


// Chart declaration:
var myPieChart = new Chart(ctx2, {
    type: 'pie',
    data: data,
    options: options
});
  </script>

</body>

</html>
