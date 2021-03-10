@extends ('layouts.admin')
@section ('contenido')


<div class="row col-12 chart-container" style="position: relative; height:30vh; width:60vw">
	<canvas id="myChart" ></canvas>

</div>


@push('scripts')
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
	

	<script>
		let marcas = []
		let valores = []
		const modelos = @json($modelos);
		for (var i = modelos.length - 1; i >= 0; i--) {
			marcas.push(modelos[i].marca)
			valores.push(modelos[i].valor)
		}
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'pie',
		    data: {
		        labels: marcas ,
		        datasets: [{
		            label: '# of Votes',
		            data: valores,
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)',
		                'rgba(255, 159, 64, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255, 99, 132, 1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)',
		                'rgba(153, 102, 255, 1)',
		                'rgba(255, 159, 64, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero: true
		                }
		            }]
		        }
		    }
		});

	</script>
@endpush
@endsection