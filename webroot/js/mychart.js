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

function doBarChart(projects,array_completed,array_open){
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
    labels: projects,
    datasets : [
        {
            label: 'closed',
            data: array_completed,
            backgroundColor: '#22aa99'
         },
         {
            label: 'open',
            data: array_open,
            backgroundColor: '#dc3912'
         },

    ]
    // datasets: [{
        
    //     label: 'Milestones',
    //     data: [ 12, 19, 3, 5, 2, 3],
    //     backgroundColor: [
    //         'rgba(255, 99, 132, 0.2)',
    //         'rgba(54, 162, 235, 0.2)',
    //         'rgba(255, 206, 86, 0.2)',
    //         'rgba(75, 192, 192, 0.2)',
    //         'rgba(153, 102, 255, 0.2)',
    //         'rgba(255, 159, 64, 0.2)'
    //     ],
    //     borderColor: [
    //         'rgba(255, 99, 132, 1)',
    //         'rgba(54, 162, 235, 1)',
    //         'rgba(255, 206, 86, 1)',
    //         'rgba(75, 192, 192, 1)',
    //         'rgba(153, 102, 255, 1)',
    //         'rgba(255, 159, 64, 1)'
    //     ],
    //     borderWidth: 1
    // }]
},

options:{
    scales: {
        xAxes: [{
             stacked: true,
            barPercentage: 0.7,
            categoryPercentage:0.55,
            // barThickness: 6,
        }],
        yAxes: [{
             stacked: true
        }]
   }
  }

// options: {
//     scales: {
//         yAxes: [{
//             ticks: {
//                 beginAtZero: true
//             }
//         },
//         {stacked: true},
//     ],
//     xAxes: [{stacked: true}],
//     }
// }
}); 

}


function doBarChart2(projects, budget, expense){
    console.log(budget)
    var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
    labels: projects,
    datasets : [
        {
            label: 'Budget',
            data: budget,
            // data: [1000000, 3000000, 5000000, 7000000, 2000000, 4000000],
            backgroundColor: '#22aa99'
         },
         {
            label: 'Paid',
            data: expense,
            // data: [2000000, 4000000, 1000000, 2000000, 1000000, 2000000],
            backgroundColor: '#dc3912'
         },
    ]
    // datasets: [{
        
    //     label: 'Milestones',
    //     data: [ 12, 19, 3, 5, 2, 3],
    //     backgroundColor: [
    //         'rgba(255, 99, 132, 0.2)',
    //         'rgba(54, 162, 235, 0.2)',
    //         'rgba(255, 206, 86, 0.2)',
    //         'rgba(75, 192, 192, 0.2)',
    //         'rgba(153, 102, 255, 0.2)',
    //         'rgba(255, 159, 64, 0.2)'
    //     ],
    //     borderColor: [
    //         'rgba(255, 99, 132, 1)',
    //         'rgba(54, 162, 235, 1)',
    //         'rgba(255, 206, 86, 1)',
    //         'rgba(75, 192, 192, 1)',
    //         'rgba(153, 102, 255, 1)',
    //         'rgba(255, 159, 64, 1)'
    //     ],
    //     borderWidth: 1
    // }]
},

options:{
    scales: {
        yAxes: [{
            ticks :{
                beginAtZero: true,
                stepSize: 1000000,

                // Return an empty string to draw the tick line but hide the tick label
                // Return `null` or `undefined` to hide the tick line entirely
                userCallback: function(value, index, values) {
                    // Convert the number to a string and splite the string every 3 charaters from the end
                    valuez = fnum(value);
                    // value = value.toString();
                    // value = value.split(/(?=(?:...)*$)/);
        
                    // // Convert the array to a string and format the output
                    // value = value.join('.');
                    return '$' + valuez;
                }
                
            },
             display: true
        }],
        // xAxes:[{
        //     barPercentage: 0.6
        // }]
   }
  }

// options: {
//     scales: {
//         yAxes: [{
//             ticks: {
//                 beginAtZero: true
//             }
//         },
//         {stacked: true},
//     ],
//     xAxes: [{stacked: true}],
//     }
// }
}); 

}

function fnum(x) {
	if(isNaN(x)) return x;

	if(x < 9999) {
		return x;
	}

	if(x < 1000000) {
		return Math.round(x/1000) + "K";
	}
	if( x < 10000000) {
		return (x/1000000) + "M";
	}

	if(x < 1000000000) {
		return Math.round((x/1000000)) + "M";
	}

	if(x < 1000000000000) {
		return Math.round((x/1000000000)) + "B";
	}

    return "1T+";
}



function donut(projects){
	var resourceChartElement = document.getElementById("myChart3");
var resourceChart = new Chart(resourceChartElement, {
    type: "doughnut",
    options:{
        legend:{
            position:'right',
        }
    },
    data: {
        datasets: [{
            backgroundColor: [
            "#3366CC",
            "#DC3912",
            "#FF9900",
            "#109618",
            "#990099",
            "#3B3EAC"],
            hoverBackgroundColor: [
            "#3366CC",
            "#DC3912",
            "#FF9900",
            "#109618",
            "#990099",
            "#3B3EAC"
            ],
            data: [
                16.67,
                16.67,
                16.67,
                16.67,
                16.67,
                16.67,
            ]
        },
        {
            backgroundColor: [
            "#3366CC",
            "#DC3912",
            "#FF9900",
            "#109618",
            "#990099",
            "#3B3EAC"],
            hoverBackgroundColor: [
            "#3366CC",
            "#DC3912",
            "#FF9900",
            "#109618",
            "#990099",
            "#3B3EAC"
            ],
            data: [
                16.67,
                16.67,
                16.67,
                16.67,
                16.67,
                16.67,
            ]
        }],
        labels:projects
    }

});
}

function ganttProject2 (array_code2) {
    // console.log(array_code2)
    // function dd ((array_code2){
	// create data
	// var data = [{
	// 	id: "1",
	// 	name: "Solar Street Light",
	// 	actualStart: Date.UTC(2020, 01, 02),
	// 	actualEnd: Date.UTC(2020, 12, 31),
    // },
    // {
	// 	id: "2",
	// 	name: "Dredging of the River Niger",
	// 	actualStart: Date.UTC(2020, 01, 02),
	// 	actualEnd: Date.UTC(2020, 06, 15),
	
    // }];
    var data = array_code2
	// create a data tree
    var treeData = anychart.data.tree(data, "as-tree");



	// create a chart
	var chart = anychart.ganttProject();

    // title 
    var title = chart.title();
    title.enabled(true);
    title.text("Timelines");
    title.fontColor("#64b5f6");
    title.fontSize(18);
    title.fontWeight(600);
    title.padding(5);
    // set the minimum and maximum values of the scale
    chart.getTimeline().scale().minimum("2020-01-01");
    chart.getTimeline().scale().maximum("2030-12-31");
    
	// set the data
    chart.data(treeData);
    // set background color
    chart.background("#64b5f6 0.2");
	// configure the scale
	chart.getTimeline().scale().maximum(Date.UTC(2020, 12, 30));
	// set the container id
	chart.container("ganttcontainer2");
	// initiate drawing the chart
	chart.draw();
	// fit elements to the width of the timeline
    chart.fitAll();
    chart.collapseAll();
};