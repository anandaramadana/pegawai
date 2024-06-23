Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Script Grafik
var chartDataElement = document.getElementById('myPieChart');
var labels = JSON.parse(chartDataElement.getAttribute('data-labels'));
var total_pegawai = JSON.parse(chartDataElement.getAttribute('data-total'));

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
type: 'doughnut',
data: {
    labels: labels,
    datasets: [{
        data: total_pegawai,
        backgroundColor: ['#38b6ff','#7ed957'],
        hoverBackgroundColor: ['#004aad','#00bf63'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
},
options: {
    maintainAspectRatio: false,
    tooltips: {
    backgroundColor: "rgb(255,255,255)",
    bodyFontColor: "#858796",
    borderColor: '#dddfeb',
    borderWidth: 1,
    xPadding: 15,
    yPadding: 15,
    displayColors: false,
    caretPadding: 10,
    },
    legend: {
    display: false
    },
    cutoutPercentage: 80,
},
});
