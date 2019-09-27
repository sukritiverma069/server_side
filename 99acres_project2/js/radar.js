const ctx4 = document.getElementById("myRadarChart")
let myRadarChart = new Chart(ctx4, {
    type: 'radar',
    data: {
        datasets: [{
            label: 'First dataset',
            fontSize: 10,
            data: graphDataValues
        }],
        labels: graphDataKeys
    },
    options: {
        
        scale: {
            ticks: {
                suggestedMin: 50,
                suggestedMax: 100,
                fontColor:'green',
                fontSize: 10
            }
        }
   
    }
});