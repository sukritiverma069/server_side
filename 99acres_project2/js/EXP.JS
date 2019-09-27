window.onload = function() {
    var dps = []; //dataPoints. 

    var ChartJson = myGraphObject;
    var graphDataKeys = Object.keys(ChartJson)
    var graphDataValues = graphDataKeys.map( (k) => ChartJson[k])

    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "Accepting DataPoints from User Input"
        },
        data: [{
            type: "line",
            dataPoints: dps
        }]
    });

    function addDataPointsAndRender() {
        xValue = Number(document.getElementById("xValue").value);
        yValue = Number(document.getElementById("yValue").value);
        dps.push({
            x: xValue,
            y: yValue
        });
        chart.render();
    }

    var renderButton = document.getElementById("renderButton");
    renderButton.addEventListener("click", addDataPointsAndRender);
}