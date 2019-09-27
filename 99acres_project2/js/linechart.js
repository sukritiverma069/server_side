
var graphDataKeys = new Array("Proptiger", "99acres", "Housing", "Magicbricks");

clearGraph();

function clearGraph(){
    drawChart(graphDataKeys,new Array());
}

function readUserData(){

var userInputY = document.getElementById("points").value;
var graphDataValues = userInputY.split(",");

drawChart(graphDataKeys,graphDataValues)

}

function drawChart(graphDataKeys,graphDataValues) {

const ctx = document.getElementById('myChart');

//ctx.clearRect(0, 0, 150, 150);
// var graphDataKeys = Object.keys(ChartJson)
// var graphDataValues = graphDataKeys.map( (k) => ChartJson[k])

let myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: graphDataKeys,
        datasets: [
            {
                label: "July Web Traffic Count",
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
                data: graphDataValues
            }
    ]
},
options: {
    //responsive: true,
    //maintainAspectRatio: false,
    scales: {
        yAxes: [{
            ticks: {
                suggestedMin: 0,
                suggestedMax: 800,
                fontSize : 10,
                stepSize : 200
            }
        }],
        xAxes: [{
            ticks: {
                suggestedMin: 0,
                suggestedMax: 10,
                fontSize : 10,
                stepSize : 1
            }
        }]
    },
    legend: {
        display: true,
        labels: {
            fontSize: 10,
             }
     }

}

});

}