// JavaScript Document
$(document).ready(function(){
	/*$("#tProductos").dataTable({
		"bJQueryUI": true,
		"sPaginationType": "full_numbers",
		"oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ clientes por pagina",
            "sZeroRecords": "No se encontraron coincidencias",
            //"sInfo": "Mostrando _START_ de _END_, Total: _TOTAL_ registros(s)",
			"sInfo": "Total: _TOTAL_ registros(s)",
            "sInfoEmpty": "Mostrando 0 de 0 de 0 clientes",
            "sInfoFiltered": "(Filtrado de _MAX_ total de clientes)",
			"sSearch" : "Buscar :",
			"oPaginate": {
				"sFirst": "Primera",
				"sPrevious": "Previa",
				"sNext" : "Siguiente",
				"sLast" : "Ultima"
			}
        },
		"aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 3 ] }
        ],
	});	*/
	
	$("input.btModificar").each(function(){
		$(this).click(function(){
			$("#xdp").val($(this).attr('data-id-producto'));
			$("#Datos").attr("action","producto.php");
			$("#Datos").submit();
		});			  
	});
	
	$("#btNuevo").click(function(){
		window.location.href="producto.php";
	});
	
});