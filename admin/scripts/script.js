function getView(directory)
{
	$.ajax({
		type: "GET",
		url: directory +"/ver.php",
		success: function(data){
			$('#view').html(data);
		}
	});
}

function getAdd(directory)
{
	$.ajax({
		type: "GET",
		url: directory +"/editar.php",
		success: function(data){
			$('#edit').html(data);
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
function insertar(directory, dataJSON)
{
	$.ajax({
		type: "POST",
		url: directory +"/insertar.php",
		data: {type : 'insertar',
		json: dataJSON},
		success: function(data){
			$('#edit').html("");
			getView(directory);
		}
	});
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
	
	$('#view').on('click', '#add', function(){
		var directory = $(this).attr('class');
		getAdd(directory);
	});
	
	$('#edit').on('click', '#insertar', function(){
		var directory = $(this).attr('class');
		var data = cargarValores();
		dataJSON = JSON.stringify(data);
		editar(directory, dataJSON, 'insertar');
	});
	
	$('#view').on('click', '.edit', function(){
		var parent =  $(this).parent();
		var directory = parent.attr('class');
		console.log( parent.parent().attr('id'));
		getEdit(directory, parent.parent().attr('id'));
		
		//var data = cargarValores();
		//dataJSON = JSON.stringify(data);
		//editar(directory, dataJSON, 'editar');
	});
	
	
});