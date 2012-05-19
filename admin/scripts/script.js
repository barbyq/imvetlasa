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
		url: directory +"/agregar.html",
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
		data: {json: dataJSON},
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
		var type = $(this).attr('class');
		getAdd(type);
	});
	
	$('#edit').on('click', '#insertar', function(){
		var type = $(this).attr('class');
		var data = cargarValores();
		dataJSON = JSON.stringify(data);
		insertar(type, dataJSON);
	});
});