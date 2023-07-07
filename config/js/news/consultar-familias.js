
function eliminar(id){
	swal({
		type:"warning",
		title:"Atención",
		text:"Estás por eliminar esta familia, ¿deseas continuar?",
		showCancelButton:true,
		cancelButtonText:"No",
		confirmButtonColor: '#9D2323',
		confirmButtonText:"Si"
	},function(isConfirm){
		if(isConfirm){
			$.ajax({
				type:"POST",
				url:BASE_URL+"Familias/eliminar_de_familias",
				data:{'id':id}
			}).done(function(result){
				alert(result);
                     setTimeout(function(){
                    	swal({
                    		type:"success",
                    		title:"Éxito",
                    		text:"Se ha eliminado exitosamente esta familia",
                    		timer:2000,
                    		showConfirmButton:false
                    	});

                    	setTimeout(function(){location.reload();},1000);
                  },500);
			});
		}
	})
}

document.getElementById("cerrarmodalfamilia").onclick = function(){
	location.reload();
}