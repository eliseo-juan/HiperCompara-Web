/**
 * Javascript
 */
/*function muestraMenu(item){
	document.getElementById(item).style.visibility="visible";
}

function ocultaMenu(item){
	document.getElementById(item).style.visibility="hidden";
}*/

$(document).ready(function(){
	$("ul.subMenuIzquierda").hide();
	$("a.itemMenuIzquierda").click(function(event){
		event.preventDefault();
		$(this).parent().find("ul.subMenuIzquierda").toggle('slow');
	});
	$("td.precio").dblclick(function(event){
		var price=$(this).html();
		$(this).html("<textarea class=\"NewPrice\">"+price+"</textarea>");
		$("textarea.NewPrice").focus();
	});
	$("td.precio").focusout(function(){
		var price=$(this).find("textarea.NewPrice").val();
/* 		alert(price); */
		var response = '';
		var product=new Object();
		product_id=$(this).parent().find("td.product_id").html();
		$.ajax({
			type: "POST",
			url: "js/newprice.php",
			data:{product_id: product_id, price: price},
	        success : function(text)
	        {	
/* 	        	alert(text); */
	        }
		});
		$(this).html(price);
	});
	/*validación del formulario de registro*/
	$("form#edita-articulos").submit(function(event){
		if($("input#name").val()==""){alert("Debe indicar un nombre de supermercado.");event.preventDefault();}
		else if($("input#login_supermarket").val()==""){alert("Debe indicar un login de supermercado.");event.preventDefault();}
		else if($("input#pais").val()==""){alert("Debe indicar el pais.");event.preventDefault();}
		else if($("input#ciudad").val()==""){alert("Debe indicar la ciudad.");event.preventDefault();}
		else if($("input#CP").val()==""){alert("Debe indicar el codigo postal.");event.preventDefault();}
		else if($("input#direccion").val()==""){alert("Debe indicar la direccion.");event.preventDefault();}
		else if($("input#latitud").val()==""){alert("Debe indicar la latitud.");event.preventDefault();}
		else if($("input#longitud").val()==""){alert("Debe indicar la longitud.");event.preventDefault();}
		else if($("input#pas").val()==""){alert("Debe indicar un password.");event.preventDefault();}
		else if($("input#pas").val()!=$("input#conpas").val()){alert("Los password no son iguales");event.preventDefault();}
	});	
	$("input.busqueda").keyup(function(){
		search=$(this).val();
		$.ajax({
		type: "POST",
        url: "include/ajax/productsSearcher.php",
        data: {search: search},
        success: function(valores)
		{ 	
        	$("#contenido").html(valores);
        }
         
        });
        
         
    });
});
