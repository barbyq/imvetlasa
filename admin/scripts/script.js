function getView(directory)
{
	$.ajax({
		type: "GET",
		url: directory +"/ver.php",
		success: function(data){
			$('#view').html(data);
		}
	});
	$('#edit').html('');
}

function getAdd(directory)
{
	$.ajax({
		type: "GET",
		url: directory +"/editar.php",
		success: function(data){
			$('#edit').html(data);
			if (directory == 'productos')
			{
				$(".chzn-select").chosen();
			}
		}
	});
}
function getEdit(directory, id)
{
	$.ajax({
		type: "GET",
		url: directory +"/editar.php",
		data: {id: id},
		success: function(data){
			$('#edit').html(data);
			if (directory == 'productos')
			{
				$(".chzn-select").chosen();
			}
		}
	});
}
function cargarValores()
{
	var data = {};
	$('form [name]').each(function(){
    	data[this.name] = this.value;
	});
	return data;
}
function editar(directory, dataJSON, type)
{
	$.ajax({
		type: "POST",
		url: directory +"/insertar.php",
		data: {type: type,
		json: dataJSON},
		success: function(data){
			$('#edit').html("");
			getView(directory);
		}
	});
}


$(function(){
	
	
	
	$('#user').click(function(){
		getView('usuarios');
	});
	
	$('#especie').click(function(){
		getView('especies');
	});
	
	$('#laboratorio').click(function(){
		getView('laboratorios');
	});
	
	$('#grupo').click(function(){
		getView('grupos');
	});
	
	$('#producto').click(function(){
		getView('productos');
	});
	
	$('#view').on('click', '#add', function(){
		var directory = $(this).attr('class');
		getAdd(directory);
	});
	
	$('#edit').on('click', '#insertar', function(){
		var directory = $(this).attr('class');
		var data = cargarValores();
		dataJSON = JSON.stringify(data);
		console.log(dataJSON);
		editar(directory, dataJSON, 'insertar');
	});
	
	$('#view').on('click', '.edit', function(){
		var parent =  $(this).parent();
		var directory = parent.attr('class');
		console.log(parent.parent().attr('id'));
		getEdit(directory, parent.parent().attr('id'));
	});
		
	$('#edit').on('click', '#editar', function(){
		var directory = $(this).attr('class');
		var data = cargarValores();
		dataJSON = JSON.stringify(data);
		editar(directory, dataJSON, 'editar');
	});
	
	$('#view').on('click', '.delete', function(){
		if (confirm("¿Seguro que deseas borrar?")){
			var parent =  $(this).parent();
			var directory = parent.attr('class');
			data = new Object();
			data.id = parent.parent().attr('id');
			dataJSON = JSON.stringify(data);
			editar(directory, dataJSON, 'borrar');
		}
	});
	
});