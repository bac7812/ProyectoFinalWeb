window.addEventListener("load",gestionCookie,false);

function gestionCookie () {
	document.getElementById("aceptar").addEventListener("click",crearCookie,false);
	if(getCookie('MiWeb')!="cookie"){
		document.getElementById("cookies").style.display="block";
	}
};

// comprueba si existen cookies para esa página
function getCookie(nombre){
    var valor = document.cookie;
    var comienzo = valor.indexOf(" " + nombre + "=");
    if (comienzo == -1){
        comienzo = valor.indexOf(nombre + "=");
    }
    if (comienzo == -1){
        valor = null;
    }else{
        comienzo = valor.indexOf("=", comienzo) + 1;
        var fin = valor.indexOf(";", comienzo);
        if (fin == -1){
            fin = valor.length;
        }
        valor = decodeURI(valor.substring(comienzo,fin));	
    }
    return valor;
};
 
// crea la cookie con los datos pasados como parametros
function setCookie(nombre,value,exdays){
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);		// le suma al dia del mes, los dias de la expiracion
	var expires = "expires="+ exdate.toUTCString();
    document.cookie = nombre + "=" + value + "; " + expires;
};

function crearCookie(){
	cookie_name = 'MiWeb';
	cookie_value = 'cookies';
    setCookie( cookie_name,cookie_value, 30);		// llama a una funcion para crear la cookie con: valor + caducidad
    document.getElementById("cookies").style.display="none";		// "borra" el div con el msg de "aceptar cookies"
};