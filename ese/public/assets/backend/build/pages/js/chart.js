var app = app || {};

app.init = function () {
	$(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
    $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
	});
	var start = moment().subtract(29, 'days');
	var end = moment();

	$('#reportrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
					'This Year': [moment().startOf('year'), moment().endOf('year')],
					'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
			}
	}, app.cb);

	app.cb(start, end);

	var table_dynamic_search = $('.table-dynamic-search').DataTable({
		"processing": true,
		"ajax": "/data/chart.json",
		'responsive': true,
		'paging': true,
		'lengthChange': true,
		'searching': true,
		'ordering': true,
		'info': true,
		'autoWidth': true,
		'scrollX': true,
		'scrollCollapse': true,
		"columns": [
			{"data": "id"},
			{"data": "keyword"},
			{"data": "times"},
			// {"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '100px',
				targets: [0, 2],
				class: 'text-center'
			},
			// {
			// 	width: '200px',
			// 	targets: [-1],
			// 	orderable: false,
			// 	class: 'text-center',
			// 	render: function (data, type, row, meta) {
			// 		return '<a' +
			// 				' class="table-action table-action-edit text-green cursor-pointer" data-id="' + data.id + '"><i' +
			// 				' class="fa fa-edit"></i></a>' +
			// 				' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' + data.id + '"><i' +
			// 				' class="fa fa-trash"></i></a>';
			// 	}
			// }
		]
	});

	var table_dynamic_view = $('.table-dynamic-view').DataTable({
		"processing": true,
		"ajax": "/data/chart.json",
		'responsive': true,
		'paging': true,
		'lengthChange': true,
		'searching': true,
		'ordering': true,
		'info': true,
		'autoWidth': true,
		'scrollX': true,
		'scrollCollapse': true,
		"columns": [
			{"data": "id"},
			{"data": "school"},
			{"data": "times"},
			// {"data": null}
		],
		'columnDefs': [
			{
				targets: [1],
				class: 'text-ellipsis'
			},
			{
				width: '100px',
				targets: [0, 2],
				class: 'text-center'
			},
			// {
			// 	width: '200px',
			// 	targets: [-1],
			// 	orderable: false,
			// 	class: 'text-center',
			// 	render: function (data, type, row, meta) {
			// 		return '<a' +
			// 				' class="table-action table-action-edit text-green cursor-pointer" data-id="' + data.id + '"><i' +
			// 				' class="fa fa-edit"></i></a>' +
			// 				' <a class="table-action text-red table-action-delete cursor-pointer" data-id="' + data.id + '"><i' +
			// 				' class="fa fa-trash"></i></a>';
			// 	}
			// }
		]
	});

	var areaChartData = {
		labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		datasets: [
			{
				label               : 'Khách hàng đăng ký',
				backgroundColor			: '#3c8dbc',
				data                : [65, 59, 80, 81, 56, 55, 40, 28, 48, 40, 19, 86]
			}
		]
	}

	var areaChartVisitData = {
		labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
		datasets: [
			{
				label               : 'Khách hàng book tham quan',
				backgroundColor			: '#3c8dbc',
				data                : [28, 48, 40, 19, 86, 27, 90, 65, 59, 80, 81, 56]
			}
		]
	}
	var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
	var barChartVisitCanvas              = $('#barChartVisit').get(0).getContext('2d')
	var barChartData                     = areaChartData
	var barChartVisitData                = areaChartVisitData
	var barChartOptions                  = {
		//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
		scaleBeginAtZero        : true,
		//Boolean - Whether grid lines are shown across the chart
		scaleShowGridLines      : true,
		//String - Colour of the grid lines
		scaleGridLineColor      : 'rgba(0,0,0,.05)',
		//Number - Width of the grid lines
		scaleGridLineWidth      : 1,
		//Boolean - Whether to show horizontal lines (except X axis)
		scaleShowHorizontalLines: true,
		//Boolean - Whether to show vertical lines (except Y axis)
		scaleShowVerticalLines  : true,
		//Boolean - If there is a stroke on each bar
		barShowStroke           : true,
		//Number - Pixel width of the bar stroke
		barStrokeWidth          : 2,
		//Number - Spacing between each of the X value sets
		barValueSpacing         : 5,
		//Number - Spacing between data sets within X values
		barDatasetSpacing       : 1,
		//String - A legend template
		// legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		//Boolean - whether to make the chart responsive
		responsive              : true,
		maintainAspectRatio     : false
	}
	
	barChartOptions.datasetFill = false
	var barChart = new Chart(barChartCanvas, {
		type: 'line',
		data: barChartData, 
		options: barChartOptions
	})
	var barChartVisit = new Chart(barChartVisitCanvas, {
		type: 'line',
		data: barChartVisitData, 
		options: barChartOptions
	})
}

app. cb = function (start, end) {
	$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
}

$(function() {
	app.init();
});