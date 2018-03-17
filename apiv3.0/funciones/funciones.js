//session_usuario = document.getElementById('session_usuario');
//name_session_users = session_usuario.innerHTML

function nuevoAjax(){
	var xmlhttp=false;
	/*@cc_on @*/
	/*@if (@_jscript_version >= 5) @*/
	// JScript gives us Conditional compilation, we can cope with old IE versions.
	// and security blocked creation of the objects.	
	try{
		// Internet Explorer
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try {
			// Internet Explorer
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(E){
			xmlhttp = false;
		}
	}
	
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		// Firefox, Opera 8.0+, Safari
		xmlhttp = new XMLHttpRequest();
	}
	/*@end @*/
	if (!xmlhttp && window.createRequest) {
		try {
			xmlhttp = window.createRequest();
		} catch (e) {
			xmlhttp=false;
		}
	}	
	return xmlhttp;
}

/*

if (!xmlhttp && window.createRequest) {
	try {
		xmlhttp = window.createRequest();
	} catch (e) {
		xmlhttp=false;
	}
}

*/

/*
* Funcion que retorna el valor de un RadioButton
* @param {String} control El objeto radio dentro de un formulario
* @example
* var valor = getRadioValue(document.form.radio);
*/
function getRadioValue(control){
	for(i=0;i<control.length;i++){
        if(control[i].checked) {
            break
        }else{
			
		}
	}
	return control[i].value;
}


function getSelectValue(control){
	return control.value;
}

function inicia_form(){
	
}

/*
* Funcion que limpia el Formulario X del Documento, y envio Focus al N elemento
* f = numero del formulario
* p = posicion del objeto al darle focus
* @example
* limpiar()    -> limpiar el primer form(0) por default  y envia focus a primer objeto por default
* limpiar(1)   -> limpiar el primer form(0) por default  y envia focus a segundo objeto(1)
* limpiar(0,1) -> limpiar el form(1) y envia focus a primer objeto(0)
* limpiar(1,1) -> limpiar el form(1) y envia focus a segundo objeto(1)
*/
function limpiar(p,f){		
	f = f || 0;
	p = p || 0 ;
	if (document.forms[f]) {
		//alert (document.forms.length);  ==> document.forms.length cantidad de formularios
		var miForm = document.forms[f];
		miForm.reset();
		setFocus(p,f);
	}else{
		//alert("no form");
	}
	//miForm.elements[p].focus();
	return false;
}

/*
function limpiar(p,f){		
	f = f || 0;
	p = p || 0 ;
	var miForm = document.forms[f];
	miForm.reset();
	setFocus(p,f);
	//miForm.elements[p].focus();
	return false;
}
*/

/*
 Envia el focus al objeto pos = p y formulario form = f
 p = posicion del objeto. Default p=0
 f = formulario n			
 */
function setFocus(p,f){
	f = f || 0;
	p = p || 0 ;	
	var miForm = document.forms[f];
	miForm.elements[p].focus();
}

//Limpia un formulario formulario
function load_form(formulario){    
	usuario = document.getElementById('usuario');
	clave = document.getElementById('clave');
    formu = document.getElementById(formulario);
	formu.reset;
	usuario.focus();
}

/*
function clearAll(id) {
    for (j=0; j<document.nameform.elements.length; j++) {
          if (document.form1.elements[j].type == ("text" || "textarea") )
            document.form1.elements[j].value='';
          if (document.form1.elements[j].type == "checkbox")
            document.form1.elements[j].checked = false;
    }
}
*/

function focus(id_objeto){
	//obj = document.getElementById(id_objeto);
    //obj.focus();
	document.getElementById(id_objeto).focus();
}

/*
* Buscar Tecla Enter
*/
function searchKeyPress(e) {
        // look for window.event in case event isn't passed in
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            return true;
        }
	return false;
}

/**
 Retorna un mensaje preestablecido
 @param {String} mensaje
 @returns {String} texto
 @example msj('ing_ced')
 @argument
  ing_val = Debe ingresar un Valor
  ing_ced = Debe ingresar Cédula
  ing_cam = Debe ingresar todos los Campos
  ing_cod = Debe ingresar un Código
  cam_obl = Debe ingresar todos los Campos
  val_ent = Debe ingresar un valor entero
  fec_val = Fecha no Vá1lida
  no_exis = No existe
  si_exis = Registro ya existe
  sel_opc = Debe seleccionar una opción
  res_exi = Operación Satisfactoria
  res_fal = Operación No Completada
  con_asi = Desea asignar este recurso
  con_pen = Desea registrar como pendiente este recurso
  default = Procesando Información del Sistema			
 */
function msj(mensaje,mensaje2) {
	mensaje2 = mensaje2 || '';
	var texto;
	switch (mensaje)
	{
		case 'ing_val':
			texto = 'Debe ingresar un Valor'; //
			break;		
		case 'ing_ced':
			texto = 'Debe ingresar C\u00e9dula'; //Cédula
			break;
		case 'ing_cam':
			texto = 'Debe ingresar todos los Campos';
			break;
		case 'ing_cod':
			texto = 'Debe ingresar un C\u00f3digo';
			break;
		case 'cam_obl':
			texto = 'Debe ingresar todos los Campos Obligatorios';
			break;
		case 'val_ent':
			texto = 'Debe ingresar un valor entero';
			break;
		case 'fec_val':
			texto = 'Fecha no V\u00e1lida';	//Vá1lida
			break;
		case 'no_exis':
			texto = 'No existe';
			break;
		case 'si_exis':
			texto = 'Registro ya existe';
			break;
		case 'sel_opc':
			texto = 'Debe seleccionar una opci\u00f3n';
			break;
		case 'conf_add':
			texto = 'Desea registrar los datos';
			break;
		case 'conf_mod':
			texto = 'Desea modificar los datos';
			break;
		case 'conf_del':
			texto = 'Desea eliminar los datos';
			break;
		case 'conf_con':
			texto = 'Desea continuar';
			break;
		case 'res_exi':
			texto = 'Operaci\u00f3n Satisfactoria';
			break;
		case 'res_fal':
			texto = 'Operaci\u00f3n No Completada';
			break;
		case 'con_asi':
			texto = 'Desea asignar este recurso';
			break;
		case 'con_pen':
			texto = 'Desea registrar como pendiente este recurso';
			break;
		case 'car_lib':
			texto = 'Desea cargar este recurso al inventario';
			break;		
		case 'ing_log':
			texto = 'Debe ingresar Login de Usuario';
			break;
		case 'ing_pwd':
			texto = 'Debe ingresar Password de Usuario';
			break;
		case 'ing_sel':
			texto = 'Debe seleccionar un Valor'; //
			break;
		case 'conf_gen':
			texto = 'Desea generar Calendarios'; //
			break;
		case 'conf_avc':
			texto = 'Desea cargar Avances'; //
			break;
		case 'conf_pag':
			texto = 'Antes de Imprimir debe configurar la \nOrientaci\u00f3n del papel adecuadamente'; //
			break;
		default:
			texto = 'Procesando Informaci\u00f3n del Sistema';
			break;
	}
	if (mensaje2 != '') {
		texto = texto + "\n" + mensaje2;	
	}
	return texto;
}
/**
 Permite mostrar un mensaje de confirmación 
 @param {String} mensaje
 @example confirmar('conf_add')
 @returns True/False
 Valores permitidos:
  - 'conf_add' = Desea registrar los datos
  - 'conf_mod' = Desea modificar los datos
  - 'conf_del' = Desea eliminar los datos
 Cualquier otro muestra
  - 'con_con' = Desea continuar
 */
function confirmar(mensaje1, mensaje2) {
	mensaje2 = mensaje2 || '';
	//alert (mensaje2);
	if ( mensaje2 == '' ) {
		//mensaje1 = mensaje1 + "\n" + mensaje2 ;		
		var answer = confirm (msj(mensaje1))
	}else{
		var answer = confirm (msj(mensaje1,mensaje2))
	}
	//var answer = confirm (msj(mensaje1))
	if (answer) return true	
	return false
}  

	
function comprobar_formulario(objForm) {
    // Se comprueba si se pasa bien el objeto formulario
    var iExiste = false;
    var iCont = 0;
    var sMensaje = "Por favor rellene todos los campos del formulario, faltan \n";
  
    for (iCont = 0 ; iCont < document.forms.length ; iCont++)
    {
        if (document.forms[iCont] == objForm)
            iExiste = true;
    }
    
    // No se ha pasado formulario, intentamos coger el primero del formulario
    if (! iExiste)
    {
        objForm = document.forms[0];
        if (! objForm)
        {
            alert("Formulario pasado incorrecto.\nNo se pudo encontrar formulario");
            return false;    
        }    
    }

    // Recorremos los elementos del formulario
    for (iCont = 0 ; iCont < objForm.elements.length ; iCont++)
    {
		//alert ("Title = "+objForm.elements[iCont].title + "\n"+
		//	   "Tipo = "+objForm.elements[iCont].type + "\n"+
		//	   "Name = "+objForm.elements[iCont].name + "\n"+
		//	   "Id   = "+objForm.elements[iCont].id + "\n"+
		//	   "Value = "+objForm.elements[iCont].value + "\n"+
		//	   "Index = "+objForm.elements[iCont].selectedIndex + "\n"+
		//	   "Class = "+objForm.elements[iCont].className + "\n")		
		
		var clases = objForm.elements[iCont].className.split(" ");
		// retorna como array
		// clases = requerido,cedula,min:8,max:10		
		//alert (clases);
		if (clases[0] == "requerido") {
			//alert (clases[1]);
			//Dependiendo del tipo de objeto podemos desglozar la validacion
			// Y del tipo de vali8dacion requerida
			if (objForm.elements[iCont].type == "text" || objForm.elements[iCont].type == "password" || objForm.elements[iCont].type == "file" || objForm.elements[iCont].type == "select-one" ) {
				//if (objForm.elements[iCont].value == "0" ) {
				//	//alert(objForm.elements[iCont].type);
				//	alert("Por favor rellene todos los campos del formulario, \nfalta el campo " + objForm.elements[iCont].title);
				//	objForm.elements[iCont].focus();
				//	return false;
				//}
				//if (objForm.elements[iCont].options[objForm.elements[iCont].selectedIndex].value == "0") {
				//	alert("Por favor rellene todos los campos del formulario, \nfalta el campo " + objForm.elements[iCont].title);
				//	objForm.elements[iCont].focus();
				//	return false;															
				//}
				
				if (objForm.elements[iCont].value.length == 0 || objForm.elements[iCont].value == "0" ) {
					//alert("Por favor rellene todos los campos del formulario, falta el campo " + objForm.elements[iCont].name);
					alert("Por favor rellene todos los campos del formulario, \nfalta el campo " + objForm.elements[iCont].title);
					objForm.elements[iCont].focus();
					return false;					
				}
	        }
        }
    }
    
    // Si hemos llegado aquí, todos los campos son correctos, enviamos el formulario
    
    //objForm.submit();
    return true;
}

/*
function permite(elEvento, permitidos) {
	alert(permitidos);
	// Variables que definen los caracteres permitidos
	var numeros = "0123456789";
	var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
	var numeros_caracteres = numeros + caracteres;
	var teclas_especiales = [8, 37, 39, 46];	
	// 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
	var signos = ",.-()/#";
	
	
	// Seleccionar los caracteres a partir del parámetro de la función
	switch(permitidos) {
		case 'num':
			permitidos = numeros;
			break;
		case 'car':
			permitidos = caracteres;
			break;
		case 'num_car':
			permitidos = numeros_caracteres;
			break;
		case 'cedula':
			permitidos = numeros + ".";
			break;
		case 'telefono':
			permitidos = numeros + signos;
			break;
	}
	
	// Obtener la tecla pulsada 
	var evento = elEvento || window.event;
	var codigoCaracter = evento.charCode || evento.keyCode;
	var caracter = String.fromCharCode(codigoCaracter);
	
	// Comprobar si la tecla pulsada es alguna de las teclas especiales
	// (teclas de borrado y flechas horizontales)
	var tecla_especial = false;
	for(var i in teclas_especiales) {
		if(codigoCaracter == teclas_especiales[i]) {
			tecla_especial = true;
			break;
		}
	}
	
	// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
	// o si es una tecla especial
	return permitidos.indexOf(caracter) != -1 || tecla_especial;
	

	//// Sólo números
	//<input type="text" id="texto" onkeypress="return permite(event, 'num')" />
	//
	//// Sólo letras
	//<input type="text" id="texto" onkeypress="return permite(event, 'car')" />
	//
	//// Sólo letras o números
	//<input type="text" id="texto" onkeypress="return permite(event, 'num_car')" />
}
*/

/**
 *
 */
function popUp(path,title,confirmation,question) {
    var popwin;
	var input=true;
	if (confirmation) input=confirm(question);
	if (input) {
	    if (title=="small") {
	        // small window
	        leftval=(screen.width)?(screen.width-400)/2:100;
	        topval=(screen.height)?(screen.height-500)/2:100;
	        popwin=window.open(path, title, "width=400,height=500,top=" + topval + ",left=" + leftval + ",toolbar=0,scrollbars=1,directories=no,location=0,statusbar=0,menubar=0,resizable=0");
	    }
		
		if (title=="view") {
	        // big window
	        leftval=(screen.width)?(screen.width-1020)/2:100;
	        topval=(screen.height)?(screen.height-500)/2:100;
	        popwin=window.open(path, title, "width=1020,height=500,top=" + topval + ",left=" + leftval + ",toolbar=0,scrollbars=1,directories=no,location=0,statusbar=0,menubar=0,resizable=1");
	    }
		
		if (title=="noticias") {
	        // big window
	        leftval=(screen.width)?(screen.width-1020)/2:100;
	        topval=(screen.height)?(screen.height-450)/2:100;
	        popwin=window.open(path, title, "width=1020,height=450,top=" + topval + ",left=" + leftval + ",toolbar=0,scrollbars=1,directories=no,location=0,statusbar=0,menubar=0,resizable=1");
	    }
		
		if (title=="archivo") {
	        // big window
	        leftval=(screen.width)?(screen.width-400)/2:100;
	        topval=(screen.height)?(screen.height-300)/2:100;
	        popwin=window.open(path, title, "width=400,height=300,top=" + topval + ",left=" + leftval + ",toolbar=0,scrollbars=1,directories=no,location=0,statusbar=0,menubar=0,resizable=1");
	    }
		
	    popwin.focus();
	}
}


function valida_fecha(f){
	/* la forma de verificar el formato es la que ya comentamos */
	alert (f);
	re=/^[0-9][0-9]\/[0-9][0-9]\/[0-9][0-9][0-9][0-9]$/
	if(f.length==0 || !re.exec(f))
	{
		alert("La fecha no tiene formato correcto.")
		return false
	}
	
	/* comprobamos que la fecha es válida */
	var d = new Date()
	/* la función tiene como entrada: año, mes, día */
	d.setFullYear(f.substring(6,10), 
			  f.substring(3,5)-1,
			  f.substring(0,2))
	
	/* ¿el mes del objeto Date es el mes introducido por el usuario?
	   OJO: getMonth() devuelve el número de mes del 0 al 11
	
	   ¿el día del objeto Date es el día introducido por el usuario?
	   OJO: getDate() devuelve el día del mes */
	if(d.getMonth() != f.substring(3,5)-1 
		|| d.getDate() != f.substring(0,2))
	{
		alert("Fecha no válida.")
		return false
	}
	
	return true;
}

function obtiene_fecha() {  
      
    var fecha_actual = new Date()  
  
    var dia = fecha_actual.getDate()  
    var mes = fecha_actual.getMonth() + 1  
    var anio = fecha_actual.getFullYear()  
  
    if (mes < 10)  
        mes = '0' + mes  
  
    if (dia < 10)  
        dia = '0' + dia  
  
    return (dia + "/" + mes + "/" + anio)  
}

/* Convierte una Fecha 2012-12-31 -> 31-12-2012
 */
function Fecha_To_Normal(string) {
	var dia = string.substring(8, 10)
    var mes = string.substring(5, 7)
    var anio = string.substring(0, 4)
    //if (mes < 10)  
        //mes = '0' + mes  
    //if (dia < 10)  
        //dia = '0' + dia  
    return (dia + "/" + mes + "/" + anio)
}

/* Convierte una Fecha Normal 31-12-2012 --> Mysql 2012-12-31
 */
function Fecha_To_MySql(string) {
	var dia = string.substring(0,2)
    var mes = string.substring(3, 5)
    var anio = string.substring(6, 10)
    //if (mes < 10)  
        //mes = '0' + mes  
    //if (dia < 10)  
        //dia = '0' + dia  
return (anio + "-" + mes + "-" + dia)
}

function imprSelec(nombre)
{
  var ficha = document.getElementById(nombre);
  //imprimir_informe
  ficha.style= 'font-family: Arial,Helvetica,sans-serif; text-align: center';
  var ventimp = window.open(' ', 'popimpr');
  ventimp.style= 'font-family: Arial,Helvetica,sans-serif; text-align: center';
  ventimp.document.write( ficha.innerHTML );
  ventimp.print( );
  ventimp.document.close();
  ventimp.close();
}

function VistaPrevia(nombre)
{
  var ficha = document.getElementById(nombre);  
  var ventimp = window.open(' ', 'popimpr',', scrollbars=yes');
  ventimp.document.write(ficha.innerHTML);
}

/*
 * Permisos del objeto. valor enabled (true-false)
 * @augments: 	permisos(admin,usuario,invitado,session,objeto)
 * 1 -> .enabled=true
 * 1 -> .enabled=false
 * @example:	
 * 		permisos(1,1,1,session,boton) todos pueden acceder al boton
 * 		permisos(1,1,0,session,boton) invitado no puede acceder al boton
 * 		permisos(1,0,0,session,boton) solo admin puede acceder al boton
 */

 function permisos(admin,usuario,invitado,session,objeto)
{
	//alert(admin+""+usuario+""+invitado+" - "+session.value)
	if (session.value == "admin") {
		//alert(session.value)
		objeto.style.display = ""
	}
	if (session.value == "usuario" && usuario==1){
		objeto.style.display = ""
	}
	if (session.value == "usuario" && usuario==0){
		objeto.style.display = "none"
		alert("Puede consultar pero no tiene privilegios suficientes para procesar")
	}
	if (session.value == "invitado" && invitado==1){
		objeto.style.display = ""
	}
	if (session.value == "invitado" && invitado==0){
		objeto.style.display = "none"
		alert("Puede consultar pero no tiene privilegios suficientes para procesar")
	}
}

function LoadJS(nomarch) {
	
	var d = new Date();
	var temp_id = replaceChars(nomarch,'/','');
	temp_id = replaceChars(temp_id,'.','');
	var ele = document.getElementById(temp_id);
	if (ele != undefined) {
		eliminarElemento(temp_id);
	}
	//if (ele == undefined) {
		var tagjs = document.createElement("script");
		
		tagjs.setAttribute("type", "text/javascript");
		tagjs.setAttribute("id", temp_id); 
		tagjs.setAttribute("src", nomarch+"?rnd="+d.getTime());
		document.getElementsByTagName("head")[0].appendChild(tagjs);
	//}
}

function replaceChars(entry,out,add) {
	//out = "a"; // reemplazar la letra a
	//add = "z"; // por la letra z
	temp = "" + entry;
	while (temp.indexOf(out)>-1) {
		pos= temp.indexOf(out);
		temp = "" + (temp.substring(0, pos) + add + 
		temp.substring((pos + out.length), temp.length));
	}
	//document.subform.text.value = temp;
	return temp; 
}

function eliminarElemento(id){
	objeto = document.getElementById(id);
	if (!objeto){
		//alert("El elemento selecionado no existe");
	} else {
		padre = objeto.parentNode;
		padre.removeChild(objeto);
	}
}

function LimpiarJS(){
	var ele = document.getElementsByTagName("head")[0];
	////console.info(ele.childNodes.length );
	for( var i=0; i<ele.childNodes.length; ++i ) {
		if (ele.childNodes[i].type == 'text/javascript' ) {
			////console.info(ele.childNodes[i].type);
			////console.info(ele.childNodes[i].id);
			eliminarElemento(ele.childNodes[i].id);
		}
	}
}

function changeReadOnly(element,valor){
	
	//alert(element.getAttribute('readonly','readonly'))
	if (valor) {
		element.setAttribute('readonly','readonly')
	}else{
		element.removeAttribute('readonly'); //el atributo	
	}
	
	//if (element.getAttribute('readonly','readonly')) {
	//	element.removeAttribute('readonly'); //el atributo	
	//}else{
	//	element.setAttribute('readonly','readonly')
	//}

  //if(!check.checked){
  //      element.setAttribute('disabled','disabled'); //atributo y valor
  //   }else{
  //     element.removeAttribute('disabled'); //el atributo
  //   }
}


function changeDisabled(element,valor){
	if (valor) {
		element.setAttribute('disabled',true)
		//comb_add_txt6.disabled = true
	}else{
		element.removeAttribute('disabled'); //el atributo	
	}
}


function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

//function FullTrim(stringToTrim) {
//	return stringToTrim.replace(/^\s+/,"");
//}



function acentos(str) {
	//alert(str)
	var map = {
	'á':'\u00e1', 
	'é':'\u00e9',
	'í':'\u00ed',
	'ó':'\u00f3',
	'ú':'\u00fa',
	'Á':'\u00c1',
	'É':'\u00c9',
	'Í':'\u00cd',
	'Ó':'\u00d3',
	'Ú':'\u00da',
	'ñ':'\u00f1',
	'Ñ':'\u00d1'
	}
	var res=''; //Está variable almacenará el valor de str, pero sin acentos y tildes
	for (var i=0;i<str.length;i++) {
		c=str.charAt(i);
		res+=map[c]||c;
	}
	return res;
}

function tildes_unicode(str){
	str = str.replace('á','\u00e1');
	str = str.replace('é','\u00e9');
	str = str.replace('í','\u00ed');
	str = str.replace('ó','\u00f3');
	str = str.replace('ú','\u00fa');

	str = str.replace('Á','\u00c1');
	str = str.replace('É','\u00c9');
	str = str.replace('Í','\u00cd');
	str = str.replace('Ó','\u00d3');
	str = str.replace('Ú','\u00da');

	str = str.replace('ñ','\u00f1');
	str = str.replace('Ñ','\u00d1');
	return str;
}

function pulsar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  return (tecla != 13);
}


function archivo_existe(file) {
    // initialize ActiveXObject and create an object of Scripting.FileSystemObject.
    var fso = new ActiveXObject("Scripting.FileSystemObject");
	// if condition to check whether the specified file exists or not.  
    //if (fso.FileExists("C:\\Temp\\myFolder\\file.txt")) {
	if (fso.FileExists(file)) {  
        //document.write("File.txt exists.");
		fso = true
    }  
    else {  
        //document.write("File.txt does not exist.");
		fso = false
    }  
  
    fso = null;
	return fso;
}



function dateChanged(calendar) {
	if (calendar.dateClicked) {
		var y = calendar.date.getFullYear();
		var m = calendar.date.getMonth();
		var d = calendar.date.getDate();
		window.location = "#";
	}
};

//function fillSelect(obj_select, arr_data) {
//	var opts = obj_select.options; //cache, direct access
//	var l = arr_data.length;//cache
//	opts.length = l;//resize
//	for (i = 0; i > l; i++) { //fill
//		var opt = opts[i];//cache, direct access
//		var d = arr_data[i];//cache
//		opt.value = d.value;//value for current option
//		opt.text = d.label;//text for current option
//	}
//}


function llenarSelect(obj_select, arr_data) {
	var l = arr_data.length;//cache
	for (i = 0; i < l; i++) {
		valor = arr_data[i][0]
		etiqueta = arr_data[i][1]
		var option=document.createElement("option");
		option = new Option(etiqueta,valor);
		obj_select.appendChild(option);
	}
	return null
}
/**
 * Eliminar todos los elementos de un Select con parametro el ID del objeto
 * @param ID del Objeto Select
 * @param Texto (opcional) Texto unico a mostar en el Select
 */
function LimpiarSelect_Id(idControl, texto) {
    var obj_select = document.getElementById(idControl);
    obj_select.options.length = 0;
	if (texto!=null) {
		obj_select.options[0] = new Option('- Seleccione ' + texto + ' -', '-1');
	}
}
/**
 * Eliminar todos los elementos de un Select con parametro el Objeto
 * @param Objeto Select
 * @param Texto (opcional) Texto unico a mostar en el Select
 */
function LimpiarSelect_objeto(obj_select, texto) {
    obj_select.options.length = 0;
	if (texto!=null) {
		obj_select.options[0] = new Option('- ' + texto + ' -', '-1');
		//obj_select.options[0] = new Option('- ' + tildes_unicode(texto) + ' -', '-1');
		//obj_select.options[0] = new Option('- ' + acentos(texto) + ' -', '-1');	
	}
}
/**
 * Permite seleccionar un select segun su valor (value)
 * @param {combo} Nombre del objeto Select
 * @param {valor} Valor del Select
 */
function selectInCombo(combo,valor) {
	////console.info("valor del combo: "+valor)
	if (valor==0){
		combo.selectedIndex =valor;
	}else{
		for(var indice=0 ;indice<combo.length;indice++)
		{
			if (combo.options[indice].value==valor )
				combo.selectedIndex =indice;
		}
	}
}

function textInSelect(combo,valor){
	var texto = ""
	////console.info("valor del combo: "+valor)
	for(var indice=0 ;indice<combo.length;indice++) {
		if (combo.options[indice].value==valor ){
			texto = combo.options[indice].text
			break
		}	
	}
	return texto
}
/*
 * Desactiva un elemento option de un select (disabled)
 * @parameter combo: el ID del select / combo
 * @parameter valor: el Valor del option que quiero desactivar
 */
function disableOptionSelectID(combo,valor) {
	var tam = combo.options.length
	var elemento = combo.options
	for (var i=0;i<tam;i++ ) {
		valor_option = elemento[i].value
		if (valor_option == valor) {
			elemento[i].disabled = "disabled"
		}
	}
}
/*
 * Desactiva un elemento option de un select (disabled)
 * @parameter combo: el ID del select / combo
 * @parameter valor: el Valor del option que quiero desactivar
 */
function enableOptionSelectID(combo,valor) {
	var tam = combo.options.length
	var elemento = combo.options
	for (var i=0;i<tam;i++ ) {
		valor_option = elemento[i].value
		if (valor_option == valor) {
			elemento[i].disabled = ""
		}
	}
}

function LlenarCuadroBusqueda(objeto,arreglo,obj_text,obj_hid){
	objeto.innerHTML = "";
	var html = ""
	////console.info("arreglo " + arreglo.length)
	//ventana = document.getElementById(objeto.id)
	////console.info(ventana)
	////console.info(objeto.id)
	//obj_text = "texto"
	//obj_hid = "hidden"
	for (var i=0; i<arreglo.length;i++){
		if (arreglo[i][0] != 'false') {
			evento = "onclick=\"pasarValores('"+arreglo[i][0]+"','"+arreglo[i][1]+"','"+obj_text.id+"','"+obj_hid.id+"','"+objeto.id+"')\""
			html = html  + "<div id='"+arreglo[i][0] + "' value='"+arreglo[i][0] + "' "+ evento +" class='elementobusqueda'>"+ arreglo[i][1]+"</div>";
		}
	}
	
	//cadena = "onclick=\"document.getElementById('"+objeto.id+"').style.display='none'\""
	////html = html  + "<a  class='elementobusqueda' href='javascript:cerrarDiv(objeto);'>Cerrar Ventana</a>";
	//html = html  + "<div class='elementobusqueda' " + cadena + " >Cerrar</div>";
	
	cadena2 = "onclick=\"cerrarDiv2('"+objeto.id+"')\""
	html = html  + "<div class='elementobusquedacerrar' " + cadena2 + " >Cerrar busqueda</div>";
	objeto.innerHTML = html;
}


function cerrarDiv2(elemento) {
	objeto = document.getElementById(elemento);
	objeto.style.display='none';
	objeto.innerHTML = ""
	//if (objeto.id == 'busqueda_nombre_add_campo2') {
	//	if ( document.getElementById('add_campo2_hid').value == '' ) {
	//		input_add_txt2.value = ""
	//	}
	//}
	//if (objeto.id == 'busqueda_nombre_add_campo3') {
	//	if ( document.getElementById('add_campo3_hid').value == '' ) {
	//		input_add_txt3.value = ""	
	//	}
	//}
	//
}


//function pasarValores(codigo,datos,obj_text,obj_hid,objeto){
//	//console.info(objeto)
//	//console.info(obj_text)
//	//console.info(obj_hid)
//	//console.info(codigo)
//	//console.info(datos)
//	document.getElementById(obj_text).value = datos;
//	document.getElementById(obj_hid).value = codigo;
//	//objeto_texto.value = arreglo
//	//alert(arreglo)
//	
//	cerrarDiv2(objeto)
//	
//}

//
//function displayResult()
//{
//var x=document.getElementById("mySelect").selectedIndex;
//var y=document.getElementById("mySelect").options;
//alert("Index: " + y[x].index + " \n is " + y[x].text + " \n value " + y[x].value);
//}

function file_exists (url) {
  // http://kevin.vanzonneveld.net
  // +   original by: Enrique Gonzalez
  // +      input by: Jani Hartikainen
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // %        note 1: This function uses XmlHttpRequest and cannot retrieve resource from different domain.
  // %        note 1: Synchronous so may lock up browser, mainly here for study purposes.
  // *     example 1: file_exists('http://kevin.vanzonneveld.net/pj_test_supportfile_1.htm');
  // *     returns 1: '123'
  var req = this.window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
  if (!req) {
    throw new Error('XMLHttpRequest not supported');
  }

  // HEAD Results are usually shorter (faster) than GET
  req.open('HEAD', url, false);
  req.send(null);
  if (req.status == 200) {
    return true;
  }

  return false;
}


function filesize (url) {
  // http://kevin.vanzonneveld.net
  // + original by: Enrique Gonzalez
  // + input by: Jani Hartikainen
  // + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // + improved by: T. Wild
  // % note 1: This function uses XmlHttpRequest and cannot retrieve resource from different domain.
  // % note 1: Synchronous so may lock up browser, mainly here for study purposes.
  // * example 1: filesize('http://kevin.vanzonneveld.net/pj_test_supportfile_1.htm');
  // * returns 1: '3'
  var req = this.window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
  if (!req) {
    throw new Error('XMLHttpRequest not supported');
  }

  req.open('HEAD', url, false);
  req.send(null);

  if (!req.getResponseHeader) {
    try {
      throw new Error('No getResponseHeader!');
    } catch (e) {
      return false;
    }
  } else if (!req.getResponseHeader('Content-Length')) {
    try {
      throw new Error('No Content-Length!');
    } catch (e2) {
      return false;
    }
  } else {
    return req.getResponseHeader('Content-Length');
  }
}
/*
 *
 */
function hora(){
	////console.info(elemento)
	//elemento = "'" + elemento + "'"
	////console.info(elemento)
	//objeto = document.getElementById(elemento);
	//objeto.style.display='';
	//objeto.innerHTML = ""
	////console.info(elemento)
	var fecha = new Date()
	var hora = fecha.getHours()
	var hora_corta = fecha.getHours()
	var minuto = fecha.getMinutes()
	var segundo = fecha.getSeconds()
	
	var dia = fecha.getDate()
	var mes = fecha.getMonth() + 1 // getMonth -> 0-11
	var anio = fecha.getFullYear()
	
	//dia = 11
	//mes = 6
	//anio = 2013
	if (dia < 10 ) { dia = "0" + dia}
	if (mes < 10 ) { mes = "0" + mes}
	
	if(hora>=12 && hora<=23) {
		if (hora==12) {
			hora_corta = hora
		}else{
			hora_corta = hora - 12
		}
		m="pm"
	}else{
		m="am"
		hora_corta = hora
	}	
	if (hora_corta < 10) {hora_corta = "0" + hora_corta}
	if (minuto < 10) {minuto = "0" + minuto}
	if (segundo < 10) {segundo = "0" + segundo}
	var fecha_texto = dia + "/" + mes + "/" + anio
	var nowhora = hora_corta + ":" + minuto + ":" + segundo + " " + m
	var reloj_total = fecha_texto + ' ' + nowhora + ' Semana ' + ( semanadelano(fecha_texto) +1 )
	
	document.getElementById('relojservidor').firstChild.nodeValue = reloj_total
	//document.getElementById('menuleft').firstChild.nodeValue = reloj_total
	
	tiempo = setTimeout('hora()',1000)
}

function dia_actual_txt(){
	var Semana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
	var fecha = new Date()
	var dia = Semana[fecha.getDay()]
	return dia
}

function hora_actual(){
	var fecha = new Date()
	var hora = fecha.getHours()
	var hora_corta = fecha.getHours()
	var minuto = fecha.getMinutes()
	var segundo = fecha.getSeconds()
	
	//if(hora>=12 && hora<=23) {
	//	if (hora==12) {
	//		hora_corta = hora
	//	}else{
	//		hora_corta = hora - 12
	//	}
	//	m="pm"
	//}else{
	//	m="am"
	//	hora_corta = hora
	//}	
	if (hora_corta < 10) {hora_corta = "0" + hora_corta}
	if (minuto < 10) {minuto = "0" + minuto}
	if (segundo < 10) {segundo = "0" + segundo}
	//var fecha_texto = dia + "/" + mes + "/" + anio
	var nowhora = hora_corta + ":" + minuto + ":" + segundo
	//var reloj_total = fecha_texto + ' ' + nowhora
	return nowhora
}


// A esta funcion se le pasa el parametro en formato fecha
// dd/mm/yyyy o dd-mm-yyyy ambos son aceptados

function semanadelano($fecha){
	$const  =  [2,1,7,6,5,4,3]; 
	// Constantes para el calculo del primer dia de la primera semana del año
	 
	if ($fecha.match(/\//)){
	  $fecha   =  $fecha.replace(/\//g,"-",$fecha);
	};
	// Con lo anterior permitimos que la fecha pasada a la funcion este
	// separada por "/" al remplazarlas por "-" mediante .replace y el uso
	// de expresiones regulares
		
	$fecha  =  $fecha.split("-");
	// Partimos la fecha en trozos para obtener dia, mes y año por separado
	$dia    =  eval($fecha[0]);
	$mes    =  eval($fecha[1]);
	$ano       =  eval($fecha[2]);   
	if ($mes!=0) {
	  $mes--;
	};
	// Convertimos el mes a formato javascript 0=enero
	
	$dia_pri   =  new Date($ano,0,1); 
	$dia_pri   =  $dia_pri.getDay();
	// Obtenemos el dia de la semana del 1 de enero
	$dia_pri   =  eval($const[$dia_pri]);
	// Obtenemos el valor de la constante correspondiente al día
	$tiempo0   =  new Date($ano,0,$dia_pri);
	// Establecemos la fecha del primer dia de la semana del año
	$dia       =  ($dia+$dia_pri);
	// Sumamos el valor de la constante a la fecha ingresada para mantener 
	// los lapsos de tiempo
	$tiempo1   =  new Date($ano,$mes,$dia);
	// Obtenemos la fecha con la que operaremos
	$lapso     =  ($tiempo1 - $tiempo0)
	// Restamos ambas fechas y obtenemos una marca de tiempo
	$semanas   =  Math.floor($lapso/1000/60/60/24/7);
	// Dividimos la marca de tiempo para obtener el numero de semanas
	 
	if ($dia_pri == 1) {
	  $semanas++;
	};
	// Si el 1 de enero es lunes le sumamos 1 a la semana caso contrarios el
	// calculo nos daria 0 y nos presentaria la semana como semana 52 del 
	// año anterior
	 
	if ($semanas == 0) {
	  $semanas=52;
	  $ano--;
	};
	// Establecemos que si el resultado de semanas es 0 lo cambie a 52 y 
	// reste 1 al año esto funciona para todos los años en donde el 1 de 
	// Enero no es Lunes
	 
	if ($ano < 10) {
	  $ano = '0'+$ano;
	};
	// Por pura estetica establecemos que si el año es menor de 10, aumente 
	// un 0 por delante, esto para aquellos que ingresen formato de fecha
	// corto dd/mm/yy
	 
	//alert($semanas+" - "+$ano);
	return $semanas;
	// Con esta sentencia arrojamos el resultado. Esta ultima linea puede ser
	// cambiada a gusto y conveniencia del lector 
};


function ExpiroTiempo(sHora1, sHora2) {
    var arHora1 = sHora1.split(":");
    var arHora2 = sHora2.split(":");

    // Obtener horas y minutos (hora 1)
    var hh1 = parseInt(arHora1[0],10);
    var mm1 = parseInt(arHora1[1],10);

    // Obtener horas y minutos (hora 2)
    var hh2 = parseInt(arHora2[0],10);
    var mm2 = parseInt(arHora2[1],10);

    // Comparar
    if (hh1<hh2 || (hh1==hh2 && mm1<mm2)) {
        //return sHora1 + " MENOR " + sHora2;
		return false;
	} else if (hh1>hh2 || (hh1==hh2 && mm1>mm2)) {
		//return sHora1 + " MAYOR " + sHora2;
		return true;
	} else {
		//return sHora1 + " IGUAL " + sHora2;
		return true;
	}
}

function funcion_pruebas(){
    //console.info("funcion_pruebas --> click al objeto")
    //console.info(this.id )
    //alert ("funcion_pruebas" +"\n" + "click al objeto" + "\n" + this.id )
}

/*
 * @description Determina el tipo de objeto
 * @example
 * toType({a: 4}); //"object"
 * toType([1, 2, 3]); //"array"
 * (function() {console.log(toType(arguments))})(); //arguments
 * toType(new ReferenceError); //"error"
 * toType(new Date); //"date"
 * toType(/a-z/); //"regexp"
 * toType(Math); //"math"
 * toType(JSON); //"json"
 * toType(new Number(4)); //"number"
 * toType(new String("abc")); //"string"
 * toType(new Boolean(true)); //"boolean"
 */
function toType(obj) {
	return ({}).toString.call(obj).match(/\s([a-z|A-Z]+)/)[1].toLowerCase()
}

function ocultar_objeto(objeto) {
	objeto.style.display = "none"
}
function mostrar_objeto(objeto) {
	objeto.style.display = ""
}


function base64_encode (data) {
  // http://kevin.vanzonneveld.net
  // +   original by: Tyler Akins (http://rumkin.com)
  // +   improved by: Bayron Guevara
  // +   improved by: Thunder.m
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   bugfixed by: Pellentesque Malesuada
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   improved by: Rafał Kukawski (http://kukawski.pl)
  // *     example 1: base64_encode('Kevin van Zonneveld');
  // *     returns 1: 'S2V2aW4gdmFuIFpvbm5ldmVsZA=='
  // mozilla has this native
  // - but breaks in 2.0.0.12!
  //if (typeof this.window['btoa'] == 'function') {
  //    return btoa(data);
  //}
  var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    enc = "",
    tmp_arr = [];

  if (!data) {
    return data;
  }

  do { // pack three octets into four hexets
    o1 = data.charCodeAt(i++);
    o2 = data.charCodeAt(i++);
    o3 = data.charCodeAt(i++);

    bits = o1 << 16 | o2 << 8 | o3;

    h1 = bits >> 18 & 0x3f;
    h2 = bits >> 12 & 0x3f;
    h3 = bits >> 6 & 0x3f;
    h4 = bits & 0x3f;

    // use hexets to index into b64, and append result to encoded string
    tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
  } while (i < data.length);

  enc = tmp_arr.join('');

  var r = data.length % 3;

  return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);

}

function base64_decode (data) {
  // http://kevin.vanzonneveld.net
  // +   original by: Tyler Akins (http://rumkin.com)
  // +   improved by: Thunder.m
  // +      input by: Aman Gupta
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   bugfixed by: Onno Marsman
  // +   bugfixed by: Pellentesque Malesuada
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +      input by: Brett Zamir (http://brett-zamir.me)
  // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // *     example 1: base64_decode('S2V2aW4gdmFuIFpvbm5ldmVsZA==');
  // *     returns 1: 'Kevin van Zonneveld'
  // mozilla has this native
  // - but breaks in 2.0.0.12!
  //if (typeof this.window['atob'] == 'function') {
  //    return atob(data);
  //}
  var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    dec = "",
    tmp_arr = [];

  if (!data) {
    return data;
  }

  data += '';

  do { // unpack four hexets into three octets using index points in b64
    h1 = b64.indexOf(data.charAt(i++));
    h2 = b64.indexOf(data.charAt(i++));
    h3 = b64.indexOf(data.charAt(i++));
    h4 = b64.indexOf(data.charAt(i++));

    bits = h1 << 18 | h2 << 12 | h3 << 6 | h4;

    o1 = bits >> 16 & 0xff;
    o2 = bits >> 8 & 0xff;
    o3 = bits & 0xff;

    if (h3 == 64) {
      tmp_arr[ac++] = String.fromCharCode(o1);
    } else if (h4 == 64) {
      tmp_arr[ac++] = String.fromCharCode(o1, o2);
    } else {
      tmp_arr[ac++] = String.fromCharCode(o1, o2, o3);
    }
  } while (i < data.length);

  dec = tmp_arr.join('');

  return dec;
}


/* Suprimir el uso de la tecla ENTER en Textarea 
  Autor: John Sánchez Alvarez 
  Este código es libre de usar y modificarse*/ 

//Me permite remplazar valores dentro de una cadena
function str_replace($cambia_esto, $por_esto, $cadena) {
   return $cadena.split($cambia_esto).join($por_esto);
}

//Valida que no sean ingresado ENTER dentro del textarea
function Textarea_Sin_Enter($char, $id){
   //alert ($char);
   $textarea = document.getElementById($id);
   
   if($char == 13){
      $texto_escapado = escape($textarea.value);
      if(navigator.appName == "Opera" || navigator.appName == "Microsoft Internet Explorer") $texto_sin_enter = str_replace("%0D%0A", "", $texto_escapado); 
      else $texto_sin_enter = str_replace("%0A", "", $texto_escapado);
      
      $textarea.value = unescape($texto_sin_enter); 
   }
}

function validaNumero(objeto) {
	valor = objeto.value;
	if( isNaN(parseInt(valor)) ) {
	  return false;
	}else{
		return true;
	}
}
function validaRango(objeto,min,max) {
	valor = parseInt(objeto.value);
	////console.info(valor)
	//console.info(min)
	//console.info(max)
	//if (validaNumero(valor)) {
		if (valor>=min && valor <=max) {
			return true;	
		}else{
			return false;
		}
	//}else{
	//	return false;
	//}
}
function validaEmail(objeto) {
	valor = objeto.value;
	if( !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)/.test(valor)) ) {
		return false;
	}else{
		return true;
	}
}