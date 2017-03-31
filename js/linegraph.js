$(document).ready(function(){
    $.ajax({
        url:"http://localhost/data.php",
        type: "GET",
        success: function(data){
            console.log(data);
        var patientsNumber = [];
			var T3 = [];
            var T4 = [];
			var TSH = [];

			for(var i in data) {
				patientsNumber.push("patientsNumber " + data[i].patientsNumber);
				T3.push(data[i].T3);
                T4.push(data[i].T4);
                TSH.push(data[i].TSH);
			}

			var chartdata = {
				labels: patientsNumber,
				datasets : [
					{
						label: 'T3',
                        fill: false,
                        lineTension: 0.1,
						backgroundColor: 'rgba(255, 97, 184, 1)',
						borderColor: 'rgba(255, 97, 184, 1)',
						hoverBackgroundColor: 'rgba(90, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: T3
					},
                    
                    {
						label: 'T4',
                        fill: false,
                        lineTension: 0.1,
						backgroundColor: 'rgba(97, 255, 252, 1)',
						borderColor: 'rgba(97, 255, 252, 1)',
						hoverBackgroundColor: 'rgba(200, 80, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: T4
					},
                    
                    {
						label: 'TSH',
                        fill: false,
                        lineTension: 0.1,
						backgroundColor: 'rgba(131, 255, 97, 1)',
						borderColor: 'rgba(131, 255, 97, 1)',
						hoverBackgroundColor: 'rgba(71, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: TSH
					}
				]
			};
            
           

			var ctx = $("#myCanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
                options: {
        scales: {
            xAxes: [{
                ticks: {
                beginAtZero: true,
                   
                    
            }
            }],
            yAxes: [{
                ticks: {
                beginAtZero: true,
                   
            }
            }]
        }
    }
                
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});