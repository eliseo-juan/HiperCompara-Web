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
	$("select#category").change(function(){
		var category=$(this).val();
		$.ajax({
			type: "POST",
	        url: "subcategory.php",
	        data: {category: category},
	        success: function(valores)
			{ 	
	        	/*alert(valores);*/
	        	$("select#subcategory_id").html(valores);
	        }
		});
		$(this).html(price);
	});
});
