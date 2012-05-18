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


$(function(){
	
	$('#user').click(function(){
		getView('usuarios');
	});
	
	$('#especie').click(function(){
		getView('especies');
	});
	
});