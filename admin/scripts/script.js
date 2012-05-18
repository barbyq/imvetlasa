function getUsuarioView()
{
	$.ajax({
		type: "GET",
		url: "usuarios/ver.php",
		success: function(data){
			$('#view').html(data);
		}
	});
}


$(function(){
	
	$('#user').click(function(){
		getUsuarioView();
	});
	
});