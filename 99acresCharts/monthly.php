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

        <div class = "row">
          <div class = "col span-1-of-3">
          <canvas id="myBarChart" width = "300px" height = "300px"></canvas>
        </div>
        
        <div class = "col span-1-of-3">
           <canvas id="myHorizontalChart" width = "300px" height = "300px"></canvas>
        </div>

        <div class = "col span-1-of-3">
           <canvas id="myPieChart" width = "300px" height = "300px"></canvas>
        </div>

        

        </div>

        <div class = "row">
        <div class = "col span-1-of-3">
           <canvas id="myLineChart1" width = "300px" height = "300px"></canvas>
        </div>
        
        <div class = "col span-1-of-3">
           <canvas id="myLineChart2" width = "300px" height = "300px"></canvas>
        </div>

        <div class = "col span-1-of-3">
           <canvas id="myLineChart3" width = "300px" height = "300px"></canvas>
        </div>
        
        
        
        
        
        
        </div>




    
<?php

        $mysqli = new mysqli("localhost", "dbuser2", "dbpassword2", "99acresdb2");
        
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        
        
        $queryResult1=mysqli_query($mysqli,"SELECT substring(monthname(entrydate),1,3) as monthname, COUNT(projectid) as projectcount from project_details_full group by monthname order by month(entrydate)");

        $queryResult2=mysqli_query($mysqli,"select count(P.projectid) as projectcount,L.city,monthname(p.entrydate) as month from project_details_full P LEFT JOIN locality_city_pid L on P.projectid = L.projectid where L.city = 'Hyderabad' and year(p.entrydate) = 2015 group by L.city,month order by city,month(p.entrydate)");

        $queryResult3=mysqli_query($mysqli,"select count(P.projectid) as projectcount,L.city,substring(monthname(p.entrydate),1,3) as month from project_details_full P LEFT JOIN locality_city_pid L on P.projectid = L.projectid where L.city = 'Noida' and year(p.entrydate) = 2015 group by L.city,month order by city,month(p.entrydate)");

        $queryResult4=mysqli_query($mysqli,"select count(P.projectid) as projectcount,L.city,substring(monthname(p.entrydate),1,3) as month from project_details_full P LEFT JOIN locality_city_pid L on P.projectid = L.projectid where L.city = 'Ghaziabad' and year(p.entrydate) = 2015 group by L.city,month order by city,month(p.entrydate)");

        $queryResult5=mysqli_query($mysqli,"select count(P.projectid) as projectcount,L.city,substring(monthname(p.entrydate),1,3) as month from project_details_full P LEFT JOIN locality_city_pid L on P.projectid = L.projectid where L.city = 'Gurgaon' and year(p.entrydate) = 2015 group by L.city,month order by city,month(p.entrydate)");

        // $queryResult6=mysqli_query($mysqli,"select count(projectid) as count, monthname(entrydate) as month from project_details_full where year(entrydate) = 2015 group by month order by count desc limit 5");



        
        ?>
        
        <script>
            
        var myData1=[<?php
        while($info=mysqli_fetch_array($queryResult1))
        echo '"'.$info['monthname'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myData1);

        var myData2=[<?php
        while($info=mysqli_fetch_array($queryResult2))
        echo '"'.$info['month'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myData2);

        var myData3=[<?php
        while($info=mysqli_fetch_array($queryResult3))
        echo '"'.$info['month'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myData3);

        var myData4=[<?php
        while($info=mysqli_fetch_array($queryResult4))
        echo '"'.$info['month'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myData4);

        var myData5=[<?php
        while($info=mysqli_fetch_array($queryResult5))
        echo '"'.$info['month'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myData5);

        // var myData6=[<?php
        // while($info=mysqli_fetch_array($queryResult6))
        // echo '"'.$info['month'].'",'; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        // ?>];
        // console.log(myData6);
        
        <?php
        $queryResult1=mysqli_query($mysqli,"SELECT substring(monthname(entrydate),1,3) as monthname, COUNT(projectid) as projectcount from project_details_full where year(entrydate) = '2018' group by monthname order by month(entrydate)");

        $queryResult2=mysqli_query($mysqli,"select count(P.projectid) as projectcount,L.city,monthname(p.entrydate) as month from project_details_full P LEFT JOIN locality_city_pid L on P.projectid = L.projectid where L.city = 'Hyderabad' and year(p.entrydate) = 2015 group by L.city,month order by city,month(p.entrydate)");

        $queryResult3=mysqli_query($mysqli,"select count(P.projectid) as projectcount,L.city,monthname(p.entrydate) as month from project_details_full P LEFT JOIN locality_city_pid L on P.projectid = L.projectid where L.city = 'Noida' and year(p.entrydate) = 2015 group by L.city,month order by city,month(p.entrydate)");

        $queryResult4=mysqli_query($mysqli,"select count(P.projectid) as projectcount,L.city,monthname(p.entrydate) as month from project_details_full P LEFT JOIN locality_city_pid L on P.projectid = L.projectid where L.city = 'Ghaziabad' and year(p.entrydate) = 2015 group by L.city,month order by city,month(p.entrydate)");

        $queryResult5=mysqli_query($mysqli,"select count(P.projectid) as projectcount,L.city,monthname(p.entrydate) as month from project_details_full P LEFT JOIN locality_city_pid L on P.projectid = L.projectid where L.city = 'Gurgaon' and year(p.entrydate) = 2015 group by L.city,month order by city,month(p.entrydate)");

        // $queryResult6=mysqli_query($mysqli,"select count(projectid) as count, monthname(entrydate) as month from project_details_full where year(entrydate) = 2015 group by month order by count desc limit 5");
        ?>
        
        var myLabels1=[<?php
        while($info=mysqli_fetch_array($queryResult1))
        echo $info['projectcount']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myLabels1);

        var myLabels2=[<?php
        while($info=mysqli_fetch_array($queryResult2))
        echo $info['projectcount']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myLabels2);

        var myLabels3=[<?php
        while($info=mysqli_fetch_array($queryResult3))
        echo $info['projectcount']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myLabels3);

        var myLabels4=[<?php
        while($info=mysqli_fetch_array($queryResult4))
        echo $info['projectcount']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myLabels4);

        var myLabels5=[<?php
        while($info=mysqli_fetch_array($queryResult5))
        echo $info['projectcount']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        ?>];
        console.log(myLabels5);

        // var myLabels6=[<?php
        // while($info=mysqli_fetch_array($queryResult6))
        // echo $info['projectcount']. ","; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
        // ?>];
        // console.log(myLabels6);
        
        </script>
        
        
        <?php
        /* Close the connection */
        $mysqli->close();
        ?>

  <script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.3/Chart.min.js"></script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <script>
    const ctx1 = document.getElementById('myBarChart');
var myBarChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: myData1,
        datasets: [
          {
            label: "Month ",
            data: myLabels1,
            backgroundColor: [
              "rgb(150, 55, 55)",
              "rgb(169, 185, 21)",
              "rgb(55, 150, 68)",
              "rgb(55, 136, 150)",
              "rgb(55, 57, 150)",
              "rgb(150, 55, 137)",
              "rgb(150, 55, 102)",
              "rgb(48, 19, 179)",
              "rgb(67, 82, 52)",
              "rgba(55, 128, 61, 0.623)",
              "rgb(123, 162, 172)",
              "rgb(150, 55, 91)"
            ],
            
            borderWidth: 1
          }          
        ]
      },

      options: {
        maintainAspectRatio: false,
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Properties Updated in 2018",
          fontSize: 10,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 10
          }
        },
        scales: {
          yAxes: [{
            ticks: {
              fontSize: 10,
              min: 0
            }
          }],
          xAxes: [{
            ticks: {
              fontSize: 10,
              
            }
          }]

        }

    },
})




const ctx5 = document.getElementById('myHorizontalChart');
var myHorizontalChart = new Chart(ctx5, {
    type: 'horizontalBar',
    data: {
        labels: myData2,
        datasets: [
          {
            label: "Project Count ",
            data: myLabels2,
            backgroundColor: [
              "rgb(150, 55, 55)",
              "rgb(169, 185, 21)",
              "rgb(55, 150, 68)",
              "rgb(55, 136, 150)",
              "rgb(55, 57, 150)",
              "rgb(150, 55, 137)",
              "rgb(150, 55, 102)",
              "rgb(48, 19, 179)",
              "rgb(67, 82, 52)",
              "rgba(55, 128, 61, 0.623)",
              "rgb(123, 162, 172)",
              "rgb(150, 55, 91)"
            ],
            
            
            borderWidth: 1
          }          
        ]
      },

      options: {
        maintainAspectRatio: false,
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Projects Updated in Hyderabad",
          fontSize: 10,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 10
          }
        },
        scales: {
          yAxes: [{
            ticks: {
              fontSize: 10,
              min: 0
            }
          }],
          xAxes: [{
            ticks: {
              fontSize: 10,
              
            }
          }]

        }

    },
});

const ctx6 = document.getElementById('myLineChart1');


let myLineChart1 = new Chart(ctx6, {
    type: 'line',
    data: {
        labels: myData3,
        datasets: [
            {
                label: "Noida 2015",
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
                data: myLabels3
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
                suggestedMax: 150,
                fontSize : 10,
                stepSize : 10
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

const ctx7 = document.getElementById('myLineChart2');


let myLineChart2 = new Chart(ctx7, {
    type: 'line',
    data: {
        labels: myData4,
        datasets: [
            {
                label: "Ghaziabad 2015",
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
                data: myLabels4
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
                suggestedMax: 400,
                fontSize : 10,
                stepSize : 100
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

const ctx8 = document.getElementById('myLineChart3');


let myLineChart3 = new Chart(ctx8, {
    type: 'line',
    data: {
        labels: myData5,
        datasets: [
            {
                label: "Gurgaon 2015",
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
                data: myLabels5
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
                suggestedMax: 400,
                fontSize : 10,
                stepSize : 100
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

// var canvas = document.getElementById("myPieChart");
// var ctx9 = canvas.getContext('2d');

// // Global Options:
//  Chart.defaults.global.defaultFontColor = 'black';
//  Chart.defaults.global.defaultFontSize = 16;

// data = {
//     datasets: [{
//         data: myData6,
//         backgroundColor: [
//           "#F7464A",
//           "#46BFBD",
//           "#FDB45C",
//           "#949FB1",
//           "#4D5360",
//         ],
//         label: 'Dataset 1'
//     }],
//     labels: myLabels6
// };

// // Notice the rotation from the documentation.

// var options = {
//         title: {
//                   display: true,
//                   text: 'Market Share of Job Sites',
//                   position: 'top',
//                   fontSize: 10
//               },
//         rotation: -0.7 * Math.PI,
//         responsive: true,
//         legend: {
//             display: true,
//             labels: {
//                 fontSize: 10,
//                  }
//          }
        
// },


// // Chart declaration:
// var myPieChart = new Chart(ctx9, {
//     type: 'pie',
//     data: data,
//     options: options
// });


</script>


    
  
  

  

</body>

</html>
