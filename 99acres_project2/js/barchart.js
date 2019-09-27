const ctx1 = document.getElementById('myBarChart');
var myBarChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: graphDataKeys,
        datasets: [
          {
            label: "June ",
            data: [10, 50, 25, 70, 40],
            backgroundColor: [
              "rgba(10,20,30,0.3)",
              "rgba(10,20,30,0.3)",
              "rgba(10,20,30,0.3)",
              "rgba(10,20,30,0.3)",
              "rgba(10,20,30,0.3)"
            ],
            
            borderColor: [
              "rgba(10,20,30,1)",
              "rgba(10,20,30,1)",
              "rgba(10,20,30,1)",
              "rgba(10,20,30,1)",
              "rgba(10,20,30,1)"
            ],
            borderWidth: 1
          },
          {
            label: "July",
            data: [20, 35, 40, 60, 50],
            backgroundColor: [
              "rgba(50,150,200,0.3)",
              "rgba(50,150,200,0.3)",
              "rgba(50,150,200,0.3)",
              "rgba(50,150,200,0.3)",
              "rgba(50,150,200,0.3)"
            ],
            borderColor: [
              "rgba(50,150,200,1)",
              "rgba(50,150,200,1)",
              "rgba(50,150,200,1)",
              "rgba(50,150,200,1)",
              "rgba(50,150,200,1)"
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
          text: "Properties Updated",
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




    
