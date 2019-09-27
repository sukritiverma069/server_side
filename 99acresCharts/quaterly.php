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
            <a href="quaterly,php">Quarterly</a>
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


    
    <div class = "row">
        <div class = "col span-1-of-3">
        <canvas id="stackedBarChart" width = "10px" height = "10px"></canvas>
        </div>
    </div>

    

    </div>



        <?php

        $mysqli = new mysqli("localhost", "dbuser2", "dbpassword2", "99acresdb2");
        
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        
        /* Fetch result set from table */
        $queryResult = mysqli_query($mysqli,"SELECT year(entrydate) as year, quarter(entrydate) as quarter, count(projectid) from project_details_full group by year , quarter having year > 2012 order by year , quarter");
        
        
        ?>
        
        <script>
            /* o make the data compatible with our chart, we must create JavaScript objects from the data. To do this, we will use PHP while loops to loop through our data to create JavaScript arrays from our result set. */
        var year = [<?php
        while($info=mysqli_fetch_array($queryResult))
        echo '"'.$info['year'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        
        
        <?php
        $queryResult=mysqli_query($mysqli,"SELECT year(entrydate) as year, quarter(entrydate) as quarter, count(projectid) from project_details_full group by year , quarter having year > 2012 order by year , quarter");
        ?>
        
        var quarter=[<?php
        while($info=mysqli_fetch_array($queryResult))
        echo $info['quarter']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        

        <?php
        $queryResult=mysqli_query($mysqli,"SELECT year(entrydate) as year, quarter(entrydate) as quarter, count(projectid) from project_details_full group by year , quarter having year > 2012 order by year , quarter");
        ?>

        var count = [<?php
        while($info=mysqli_fetch_array($queryResult))
        echo $info['count(projectid)']. ",";
        ?>];
        
        
        
        
        </script>
        
        
        <?php
        /* Close the connection */
        $mysqli->close();
        ?>

  <script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  
<script>

 var q1 = [], q2 = [], q3 = [], q4 = [], pc1 = [], pc2 = [], pc3 = [], pc4 = [], a=0,b=0,c=0,d=0, ac=1;

 for(var i=0; i< quarter.length; i++){

   if(ac==1){
     q1[a]=quarter[i];
     pc1[a]=count[i];
     a++;
     ac++;
   }
   else if(ac==2){
     q2[b]=quarter[i];
     pc2[b]=count[i];
     b++;
     ac++;
   }

   else if(ac==3){
     q3[c]=quarter[i];
     pc3[c]=count[i];
     c++;
     ac++;
   }

   else if(ac==4){
     q4[d]=quarter[i];
     pc4[d]=count[i];
     d++;
     ac=1;
   }
 }

 var y = 0;
 var arr = [];
 for(var i = 0; i< year.length; i=i+4 ){
   arr[y] = year[i];
   y++;
 }
 console.log(arr);


 var dataPack1 = pc1;
var dataPack2 = pc2;
var dataPack3 = pc3;
var dataPack4 = pc4;
var XaxisYear = arr;



  
  var ctx = document.getElementById("stackedBarChart").getContext('2d');
  var stackedBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: XaxisYear,
        datasets: [
          {
            label: 'Q1',
            data: dataPack1,
            backgroundColor: "#512DA8",
						hoverBackgroundColor: "#7E57C2",
						hoverBorderWidth: 0

          },                              
          {   
            label: 'Q2',
            data: dataPack2,
            backgroundColor: "#FFA000",
						hoverBackgroundColor: "#FFCA28",
						hoverBorderWidth: 0

          },
          {
            label: 'Q3',
            data: dataPack3,
            backgroundColor: "#D32F2F",
						hoverBackgroundColor: "#EF5350",
						hoverBorderWidth: 0

          },
          {
            label: 'Q4',
            data: dataPack4,
            backgroundColor: "#E3CC2F",
						hoverBackgroundColor: "#3F2150",
						hoverBorderWidth: 0

          }


        ]
    },
      
      
      options: {
       
    scales: {
      xAxes: [{
        stacked: true,
        
      }],
      yAxes: [{
        stacked: true,
        
      }],
      legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#999",
            fontSize: 10
          }
        }
    }
}






  }); 
  

 </script>

  

</body>

</html>
