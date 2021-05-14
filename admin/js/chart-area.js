// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10", "May 11", "May 12", "May 13"],
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "#696969",
      borderColor: "black",
      pointRadius: 5,
      pointBackgroundColor: "#bc241c",
      pointBorderColor: "#bc241c",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "#bc241c",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [100, 232, 464, 803, 902, 1000, 1234, 1674, 1843, 2103, 2190, 2343, 2834],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10000,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
