function eliminarModalUsuario(id){
	var a = document.getElementById('eliminar');
	a.setAttribute('href','index.php?opcion=eliminarUsuario&id='+id);
}

function eliminarModalTipo(id){
	var a = document.getElementById('eliminar');
	a.setAttribute('href','index.php?opcion=eliminarTipo&id='+id);
}

function eliminarModalCategoria(id){
	var a = document.getElementById('eliminar');
	a.setAttribute('href','index.php?opcion=eliminarCategoria&id='+id);
}