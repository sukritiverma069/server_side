<!DOCTYPE html>
<html lang="en">
<head>
<meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/Grid.css">
  <link rel="stylesheet" href="css/main.css">
  
    <title>Document</title>
</head>
<body>
<div class = "row">

<div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="home.php">Home</a>
            <a href="monthly.php">Monthly</a>
            <a href="quaterly.php">Quaterly</a>
            <a href="yearly.php">Yearly</a>
            
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



</div>


    

    <div class = "col span-1-of-3">
        <canvas id="myChart" width = "300px" height = "300px"></canvas>
    </div>

    



        <?php

        $mysqli = new mysqli("localhost", "dbuser2", "dbpassword2", "99acresdb2");
        
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        
        /* Fetch result set from table */
        $queryResult2=mysqli_query($mysqli,"SELECT year(entrydate) as year, COUNT(projectid) as projectcount from project_details_full group by year order by year");
        
        
        ?>
        
        <script>
            /* o make the data compatible with our chart, we must create JavaScript objects from the data. To do this, we will use PHP while loops to loop through our data to create JavaScript arrays from our result set. */
        var myData2=[<?php
        while($info=mysqli_fetch_array($queryResult2))
        echo '"'.$info['year'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myData2);
        
        <?php
        $queryResult2 = mysqli_query($mysqli,"SELECT year(entrydate) as year, COUNT(projectid) as projectcount from project_details_full group by year order by year");
        ?>
        
        var myLabels2=[<?php
        while($info=mysqli_fetch_array($queryResult2))
        echo $info['projectcount']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myLabels2);
        
        
        
        </script>
        
        
        <?php
        /* Close the connection */
        $mysqli->close();
        ?>

  <script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  

  
 

  <script >
  const ctx = document.getElementById('myChart');


let myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: myData2,
        datasets: [
            {
                label: "YEAR",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(75, 192, 192, 0.4)",
                borderColor: "rgba(75, 192, 192, 1)",
                borderCapStyle: "butt",
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinstyle: 'miter',
                pointBorderColor: "rgba(75, 192, 192, 1)",
                pointBackgroundColor: "#fff",
                pointHoverBorderWidth: 1,
                pointHoverBorderRadius: 5,
                pointHoverBackgroundColor: "rgba(75, 192, 192, 1)",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth:1,
                pointRadius: 1,
                pointHitRadius: 10,
                data: myLabels2
            }
    ]
},
options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                suggestedMin: 0,
                suggestedMax: 15000,
                fontSize : 10,
                stepSize : 5000
            }
        }],
        xAxes: [{
            ticks: {
                
                suggestedMin: 0,
                suggestedMax: 10,
                fontSize : 10,
                stepSize : 1
            },
            
        }]
    },
    legend: {
        display: true,
        labels: {
            fontSize: 10
             }
     }

}

});



</script>



</body>

</html>
