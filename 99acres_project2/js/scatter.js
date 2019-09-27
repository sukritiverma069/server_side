const ctx5 = document.getElementById("myScatterChart")
var myScatterChart = new Chart(ctx5, {
    type: 'scatter',
    data: {
        datasets: [{
            label: 'First Dataset',
            data: graphDataValues
        }],
        labels: graphDataKeys,
    },
    options: {
        scales: {
            xAxes: [{
                type: 'linear',
                position: 'bottom',
                fontSize: 10
            }],
            yAxes: [{
                fontSize: 10
            }]
        }
    }
});