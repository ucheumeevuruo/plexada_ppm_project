// Pie Chart Example

function drawChart(elementId, percentage){
    percentage = Math.floor(percentage);
    let numerator = (100 - percentage);
    let color = '#17a673';//#caad07
    if(percentage > 80 && percentage <= 50){
        color = '#cac41d';
    }else if(percentage > 0 && percentage < 50){
        color = '#e74a3b' ;
    }
    color = [color, '#6d6564'];
    let data = [percentage,numerator];
    doughnutChart(elementId, ['No. Completed' , 'Total Milestones'], data, color);
}

function doughnutChart( elementId, labels, data, color){

    let ctx = document.getElementById(elementId);
    let myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: color,
                hoverBackgroundColor: ['#17a673'],
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
            cutoutPercentage: 50,
        },
    });

}