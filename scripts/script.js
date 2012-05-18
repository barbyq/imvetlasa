function llenarPedido(pedido)
{
	
	/*infoProducto = new Object();
	infoProducto.cantidad = cant;
	infoProducto.producto = producto;
	infoProducto.presentacion = pres;
	pedido.push(infoProducto);*/
}

$(function(){
	var pedido = [];
	var pedidoLength = 0;
	$(".chzn-select").chosen();
	$(".presentacion").hide();
	$(".cantidad").hide();
	
	$(".chzn-select").change(function(){
		$(".presentacion").fadeIn();
		$(".cantidad").fadeIn();		
	});
	
	$(".cantidad input[type='text']").change(function(){
		if (isNaN(this.value)){
			 $(this).parent().next().html('<img src="images/no.png"/>');
		}else{
			 $(this).parent().next().html('<img src="images/yes.png"/>');
		}
	});
	
	$("#nombre").change(function(){
		if (this.value==""){
			 $(this).parent().next().html('<img src="images/no.png"/>');
		}else{
			 $(this).parent().next().html('<img src="images/yes.png"/>');
		}
	});
	$("#email").change(function(){
		var val = this.value;
		if (val.indexOf("@") == -1){
			 $(this).parent().next().html('<img src="images/no.png"/>');
		}else{
			 $(this).parent().next().html('<img src="images/yes.png"/>');
		}
	});
	
	$("#agregarPedido").click(function(){
		
		var error = "";
		var cant = $(".cantidad input[type='text']").val();
		var pres = $(".presentacion input[type='text']").val();
		var producto = $(".chzn-select").val();
		if (cant == "" || isNaN(cant))
		{
			error = "Favor de ingresar cantidad correcta";	
		}
		if (pres == "")
		{
			error += "\nFavor de ingresar presentación";		
		}
		if (error == ""){
			
			$(".presentacion input[type='text']").val("");
			$(".cantidad input[type='text']").val("");
			$(".cantidad .check").html("");
			var item = "<tr id='"+ pedidoLength +"'><td>"+cant +"</td><td>" + producto + "</td><td>"+ pres +"</td><td><img class='delete' src='images/delete.png'/></td></tr>";
			pedidoLength++;
			$("#right .pedido").append(item);
			
			if ($('#pedido tr').length != 0  && $("#right input[type='button']").is(":hidden")){
				$('#pedido input[type="button"]').fadeIn();
				$('.pedido').fadeIn();
			}else if ($('#pedido tr').length == 0){
				$('#pedido input[type="button"]').fadeOut();
				$('.pedido').fadeOut();
			}
		}
		else
		{
			alert(error);
		}
	});
	
	$('.pedido').on('click', '.delete', function(){
		var row = $(this).parent().parent();
		var id = row.attr('id');
		row.html("");
		
	});
	
	$("#enviarPedido").click(function(){
		if (document.getElementById("nombre").value =="" || document.getElementById("email").value ==""){
			alert("Favor de llenar nombre y email.")
		}else{
			$("#howto").hide();
			llenarPedido(pedido);
			$("#content").text("Gracias por hacer tu pedido, te responderemos por email tan pronto este la cotización. Si deseas hacer otro pedido haz click ");
			$("#content").append("<a href='cotizacion.php'>aquí</a><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>");
		}
	});
	
	$("#laboratorios li").click(function(){
		$.ajax({
			type: 'GET',
			url: 'includes/productos.php',
			data: {type: type},
			success: function(data)
			{
				$('#productos').html(data);	
			}
		});
	});
	

});