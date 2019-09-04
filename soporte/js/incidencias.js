function eliminarModalIncidencia(id){
	var a = document.getElementById('eliminar');
	a.setAttribute('href','index.php?opcion=eliminar&id='+id);
}

function eliminarModalSeguimiento(id){
	var a = document.getElementById('eliminar');
	a.setAttribute('onclick','eliminarSeguimiento('+id+')');
}

function eliminarSeguimiento(id){
	var url = new URLSearchParams(location.search);
	var seguimiento = "eliminar";
	ajax = new XMLHttpRequest();
	ajax.open('POST','index.php?opcion=editar&id='+url.get('id'), true);
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send('&seguimiento='+seguimiento+'&id='+id);
	
	ajax.onreadystatechange = function(){
		if (ajax.readyState == 4 && ajax.status == 200){
			location.reload();
		}
	}
}

window.addEventListener('load',iniciar,false);

function iniciar()
{
  document.getElementById('anadir').addEventListener('click',anadirSeguimiento,false);
}

function anadirSeguimiento(){
	var descripcion_seguimiento = document.getElementById("seguimiento").value;
	var url = new URLSearchParams(location.search);
	var seguimiento = "añadir";
	ajax = new XMLHttpRequest();
	ajax.open('POST','index.php?opcion=editar&id='+url.get('id'), true);
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send('&seguimiento='+seguimiento+'&descripcion_seguimiento='+descripcion_seguimiento);
	ajax.onreadystatechange = function(){
		if (ajax.readyState == 4 && ajax.status == 200){
			location.reload();
		}
	}
}