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
        data: graphDataValues,
        backgroundColor: [
          "#F7464A",
          "#46BFBD",
          "#FDB45C",
          "#949FB1",
          "#4D5360",
        ],
        label: 'Dataset 1'
    }],
    labels: graphDataKeys
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