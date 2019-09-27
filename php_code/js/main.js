window.onload= function(){
    chartjs.render({

        data = {
            datasets: [{
                data: myData,
                backgroundColor: [
                  "#F7464A",
                  "#46BFBD",
                  "#FDB45C",
                  "#949FB1",
                  "#4D5360",
                ],
                label: 'Dataset 1'
            }],
            labels: myLabels
        },
        
        // Notice the rotation from the documentation.
        
         options = {
                title: {
                          display: true,
                          text: 'Builder with the highest projects',
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
                
        },
        
        
        // Chart declaration:
        myPieChart = new Chart(ctx2, {
            type: 'pie',
            data: data,
            options: options
        }),




    })
    
}

