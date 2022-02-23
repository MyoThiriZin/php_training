$(function() {
  $.ajax({
    url: "http://localhost/test/php_training/tutorials/tutorial_9/chart_data.php",
    type: "GET",
    success: function(data) {
      chartData = data;
      var chartProperties = {
        caption: "Book Sales",
        xAxisName: "Book Name",
        yAxisName: "Price",
        rotatevalues: "1",
        theme: "zune"
      };
      apiChart = new FusionCharts({
        type: "column2d",
        renderAt: "chart-container",
        width: "550",
        height: "350",
        dataFormat: "json",
        dataSource: {
          chart: chartProperties,
          data: chartData
        }
      });
      apiChart.render();
    }
  });
});
