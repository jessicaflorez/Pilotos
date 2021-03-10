$(document).ready(function() {    
    $('#exportar').DataTable({        
        language: {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            },
        //para usar los botones   
        responsive: "true",
        dom: 'Bfrtilp',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      'Excel ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success',
                footer: true
			},
			{
				extend:    'pdfHtml5',
				text:      'PDF',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger',
                footer: true
			},
			{
				extend:    'copyHtml5',
				text:      'Copiar <i class="fa fa-clipboard"></i>',
				titleAttr: 'Copiar a clipboard',
				className: 'btn btn-info',
                footer: true
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info',
                footer: true
			},
		]	        
    });     
});