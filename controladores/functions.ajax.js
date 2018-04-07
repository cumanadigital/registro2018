/**=============================================================================
 *
 *	Filename:  function.ajax.js
 *	
 *	(c)Autor: TSU Oswaldo Hernández
 *	
 *	Description: Ajax para hacer las consultas
 *	
 *	Licence: GPL|LGPL
 *	
 *===========================================================================**/
var dato_usuario = ""
$(document).ready(function(){
	
	

	// if($.browser.msie){
	// 	$("#contenido").text("Tu navegador es Internet Explorer " + $.browser.version);
	// }
	// if($.browser.webkit || $.browser.safari){
	// 	$("#contenido").text("Tu navegador es Safari o Chrome " + $.browser.version);
	// }
	// if($.browser.mozilla){
	// 	$("#contenido").text("Tu navegador es Mozilla " + $.browser.version);
	// }
	// if($.browser.opera){
	// 	$("#contenido").text("Tu navegadir es Opera " + $.browser.version);
	// }

	var timeSlide = 500;
	var timeFadeOut = 500;

	var timeLoginSucces = 10;
	var timeLoginFail = 3000;
	var timeLoadHtml = 50;
	var timeExitSession = 10;
	
	var login_cedula = $('#user_name').attr('oculto');
	var userced = $('#user_name').attr('ocultoced');
	
	var usernombre = $('#name_user').html();
	var cargouser = $('#cargo_user').html();
	var dptouser = $('#departamento_user').html();
	var userestatus = $('#estatus_loading').attr('estatus');

	var login_cedula = $('#user_name').attr('oculto');
	
	// var userced = $('#user_name').attr('ocultoced');
	var sesionencode = $('#user_name').attr('sesionencode');
	// **********************
	var parametros_user = 'dptouser='+dptouser + '&cargouser='+cargouser + '&userestatus='+userestatus +  '&userced='+userced + '&sesionencode='+sesionencode+'&relleno=valor';

	// alert(parametros_user);

	$modal2 = $('#modal_login2').modal({show: false});

	// $("#txt_reg_cedula").inputmask("99999999");
	// $("#txt_reg_telefono").inputmask("9999-9999999");
	// $("#txt_reg_correo").inputmask("email");
	// $("#txt_reg_correo").inputmask('Regex', { regex: "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}" });
	// $("#txt_reg_correo").inputmask("{1,20}@{1,20}.{2,6}[.{2}]")
	// $("#txt_reg_correo").inputmask({ alias: "email"});
	hora();
	
	// $('#txt_reg_cedula').val('11829328');
	// $('#txt_reg_nombre').val('Oswaldo');
	// $('#txt_reg_apellido').val('Hernandez');
	// $('#txt_reg_correo').val('oswaldoehc@gmail.com');
	// $('#txt_reg_telefono').val('0416-5936395');
	// $('#txt_reg_password1').val('1234');
	// $('#txt_reg_password2').val('1234');

	// $('#txt_departamento').val('1');

	

	
	
	//	Eventos asociados a la pagina index.php
	//	Eventos asociados a la pagina index.php
	//	Eventos asociados a la pagina index.php
	


	 // ######   ####   #####   #    #      #####   ######       ####   ######   ####   #   ####   #    # 
	 // #       #    #  #    #  ##  ##      #    #  #           #       #       #       #  #    #  ##   # 
	 // #####   #    #  #    #  # ## #      #    #  #####        ####   #####    ####   #  #    #  # #  # 
	 // #       #    #  #####   #    #      #    #  #                #  #            #  #  #    #  #  # # 
	 // #       #    #  #   #   #    #      #    #  #           #    #  #       #    #  #  #    #  #   ## 
	 // #        ####   #    #  #    #      #####   ######       ####   ######   ####   #   ####   #    # 
	                                                                                                   
	// INICIO DE SESIÓN
	
	$('#iniciarsesion' ).on("click", function(event){
		console.log($(this).attr('id'));
		$('#login_cedula').val('');
		$('#login_plantel').val('');
		$('#login_nomina').val('');
		$('#modal_login').modal('show');
	});


	 // ######   ####   #####   #    #      #####   ######   ####   #   ####   #####  #####     ##    #####           #    #   ####   #    #    ##    #####   #   ####  
	 // #       #    #  #    #  ##  ##      #    #  #       #    #  #  #         #    #    #   #  #   #    #          #    #  #       #    #   #  #   #    #  #  #    # 
	 // #####   #    #  #    #  # ## #      #    #  #####   #       #   ####     #    #    #  #    #  #    #          #    #   ####   #    #  #    #  #    #  #  #    # 
	 // #       #    #  #####   #    #      #####   #       #  ###  #       #    #    #####   ######  #####           #    #       #  #    #  ######  #####   #  #    # 
	 // #       #    #  #   #   #    #      #   #   #       #    #  #  #    #    #    #   #   #    #  #   #           #    #  #    #  #    #  #    #  #   #   #  #    # 
	 // #        ####   #    #  #    #      #    #  ######   ####   #   ####     #    #    #  #    #  #    #           ####    ####    ####   #    #  #    #  #   ####  
	 // 	                                                                                                                 
	// $('#iniciarregistro' ).on("click", function(event){
	// 	console.log($(this).attr('id'));
	// 	$('#txt_reg_cedula').val('');
	// 	$('#txt_reg_nombre').val('');
	// 	$('#txt_reg_apellido').val('');
	// 	$('#txt_reg_correo').val('');
	// 	$('#txt_reg_telefono').val('');
	// 	$('#txt_reg_password1').val('');
	// 	$('#txt_reg_password2').val('');
	// 	$('#txt_departamento').val('0');


	// 	//$modal_login = $('#modal_login').modal({show: false});
	// 	//$modal_login = $('#modal_articulos').modal({show: false});
	// 	//$modal_login.modal('show');
	// 	//showModal($(this).text());
	// 	// $('#modal_register').modal('show');
	// 	$modal2.modal('show');
	// });

	// #  #    #  #   ####   #   ####        ####   ######   ####   #   ####   #    # 
	// #  ##   #  #  #    #  #  #    #      #       #       #       #  #    #  ##   # 
	// #  # #  #  #  #       #  #    #       ####   #####    ####   #  #    #  # #  # 
	// #  #  # #  #  #       #  #    #           #  #            #  #  #    #  #  # # 
	// #  #   ##  #  #    #  #  #    #      #    #  #       #    #  #  #    #  #   ## 
	// #  #    #  #   ####   #   ####        ####   ######   ####   #   ####   #    # 
	                                                                                		
	//	**** BOTON LOGIN USER (INGRESAR) EN index.php
	
    $('#login_userbttn').on("click", function(event){

    	console.log("accion  ->  " + $(this).attr('id') + "  ->  " + $(this).text() );

		//setTimeout(function(){
			// var login_cedula = $('#login_cedula').val();
			// var login_plantel = $('#login_plantel').val();
			// 
			var login_cedula = $('#login_cedula').val();
			var login_plantel = $('#login_plantel').val();
			var login_nomina = $('#login_nomina').val();

			if ( $('#login_cedula').val() != "" || $('#login_plantel').val() != "" || $('#login_nomina').val() != "" ){
				$('#content').html('<span class="timer" id="timer"></span>Cargando por favor espere');
				$.ajax({
					type: 'POST',
					url: 'servicios/log.inout.ajax.php',
					data: 'login_cedula=' + login_cedula + '&login_plantel=' + login_plantel + '&login_nomina=' + login_nomina ,
					success:function(response){
						console.log("response ");
						console.log(response);
						if ( response== 1 ){
							$('#content').html('<span class="timer" id="timer"></span> ' + msj('ini_sat'));
							redireccion(1,timeLoginSucces);
						}else{
							$('#content').html('<i id="timer" class="fa fa-user-times"></i> ' + msj('ini_err'));
							redireccion(0,timeLoginFail);
						}
					},
					error:function(){
						$('#content').html('<i id="timer" class="fa fa-warning"></i> ' + msj('ini_fal'));
						redireccion();
					}
				});
			}else{
				$('#content').html('<i id="timer" class="fa fa-user-times"></i> ' + msj('ing_cam'));
				redireccion(0,5000);
			}
		//},timeSlide);
		return false;
	});

	// #  #    #  #   ####   #   ####        ####   ######   ####   #   ####   #    # 
	// #  ##   #  #  #    #  #  #    #      #       #       #       #  #    #  ##   # 
	// #  # #  #  #  #       #  #    #       ####   #####    ####   #  #    #  # #  # 
	// #  #  # #  #  #       #  #    #           #  #            #  #  #    #  #  # # 
	// #  #   ##  #  #    #  #  #    #      #    #  #       #    #  #  #    #  #   ## 
	// #  #    #  #   ####   #   ####        ####   ######   ####   #   ####   #    # 


    $('#login_admin_userbttn').on("click", function(event){

    	// console.log("accion  ->  " + $(this).attr('id') + "  ->  " + $(this).text() );

		//setTimeout(function(){
			// var login_cedula = $('#login_cedula').val();
			// var login_plantel = $('#login_plantel').val();
			// 
			var login_admin = $('#login_admin').val();
			var pass_admin  = $('#pass_admin').val();
			var login_capcha = rand_code();

			if ( login_admin != "" && pass_admin != "" ){
				$('#content').html('<span class="timer" id="timer"></span>Cargando por favor espere');
				$.ajax({
					type: 'POST',
					url: 'servicios/log.inout.admin.ajax.php',
					data: 'login_admin=' + login_admin + '&pass_admin=' + pass_admin + '&login_capcha=' + login_capcha ,
					success:function(response){
						console.log("response ");
						console.log(response);
						if ( response== 1 ){
							$('#content').html('<span class="timer" id="timer"></span> ' + msj('ini_sat'));
							redireccion(1,timeLoginSucces);
						}else{
							$('#content').html('<i id="timer" class="fa fa-user-times"></i> ' + msj('ini_err'));
							redireccion(0,timeLoginFail);
						}
					},
					error:function(){
						$('#content').html('<i id="timer" class="fa fa-warning"></i> ' + msj('ini_fal'));
						redireccion();
					}
				});
			}else{
				$('#content').html('<i id="timer" class="fa fa-user-times"></i> ' + msj('ing_cam'));
				redireccion();
			}
		//},timeSlide);
		return false;
	});
	
	
	//	Eventos asociados a la pagina main.php
	//	Eventos asociados a la pagina main.php
	//	Eventos asociados a la pagina main.php
	                                                                                       
	//  ####   ######  #####   #####     ##    #####        ####   ######   ####   #   ####   #    # 
	// #    #  #       #    #  #    #   #  #   #    #      #       #       #       #  #    #  ##   # 
	// #       #####   #    #  #    #  #    #  #    #       ####   #####    ####   #  #    #  # #  # 
	// #       #       #####   #####   ######  #####            #  #            #  #  #    #  #  # # 
	// #    #  #       #   #   #   #   #    #  #   #       #    #  #       #    #  #  #    #  #   ## 
	//  ####   ######  #    #  #    #  #    #  #    #       ####   ######   ####   #   ####   #    # 
	                                                                                           	
	$('#sessionKiller, #sessionKiller2').click(function(){
		SessionKiller();
	});
	
	// $('#sessionKiller, #sessionKiller2, #perfil, #proveedor, #ordencompra , #ordenpedido, #reporte1, #reporte2' ).click(function(){
	// 	//console.log($(this).attr('id'));
	// });
	
	//* * * * * * * * * * * * * * * * * * *
	//* * * * * * * * * * * * * * * * * * *
	//* * * * * * * * * * * * * * * * * * *
	//* * * * * * * * * * * * * * * * * * *
	//* * * * * * * * * * * * * * * * * * *


	var vista = 'vistas/vista_demo.html';
	var controlador = 'controladores/controller.demo.js';
	var contenedor = '';
	// var nivel = 'Inicio';
	var subnivel= 'Administrar - ' + $(this).text();

	// #     #  #######  #     #  #     # 
	// ##   ##  #        ##    #  #     # 
	// # # # #  #        # #   #  #     # 
	// #  #  #  #####    #  #  #  #     # 
	// #     #  #        #   # #  #     # 
	// #     #  #        #    ##  #     # 
	// #     #  #######  #     #   #####  
	//* * * * * * * * * * * * * * * * * * *
	//* * * * * * * * * * * * * * * * * * *                                                                                 
	//* * * * * * * * * * * * * * * * * * *
	//* * * * * * * * * * * * * * * * * * *                                      
	// #####   ######  #####   ######  #  #              ######   ####   #####   ####  
	// #    #  #       #    #  #       #  #              #       #    #    #    #    # 
	// #    #  #####   #    #  #####   #  #       #####  #####   #    #    #    #    # 
	// #####   #       #####   #       #  #              #       #    #    #    #    # 
	// #       #       #   #   #       #  #              #       #    #    #    #    # 
	// #       ######  #    #  #       #  ######         #        ####     #     ####  
	// - PERFIL
	$("#perfil, #menu_admin_perfil, #menu_jefe_perfil, #menu_secre_perfil, #menu_juridica_perfil, #menu_director_perfil, #menu_bienestar_perfil, #menu_licencia_perfil").on("click", function(event){
		var vista = 'vistas/vista_usuario_contrasena.php';
		var controlador = 'controladores/controller.usuario.contrasena.js';
		var contenedor = '';
		//var nivel = 'Inicio';
		var subnivel= 'Administrar - ' + $(this).text();
		var parametros = 'dptouser='+dptouser + '&cargouser='+cargouser + '&userestatus='+userestatus +  '&userced='+userced + '&' + 'parametros_user=' + parametros_user + '&';
		CargarHtml(vista,controlador,contenedor,subnivel,parametros);
	});
	//* * * * * * * * * * * * * * * * * * *
	//* * * * * * * * * * * * * * * * * * *
	// - FOTOS
	// 
	$("#menu_admin_perfil_foto, #menu_jefe_perfil_foto, #menu_secre_perfil_foto, #menu_juridica_perfil_foto, #menu_director_perfil_foto, #menu_bienestar_perfil_foto, #menu_licencia_perfil_foto ").on("click", function(event){
		var vista = 'vistas/vista_usuario_foto.php';
		var controlador = 'controladores/controller.usuario.foto.js';
		var contenedor = '';
		//var nivel = 'Inicio';
		var subnivel= 'Administrar - ' + $(this).text();
		var parametros = 'dptouser='+dptouser + '&cargouser='+cargouser + '&userestatus='+userestatus +  '&userced='+userced + '&';
		CargarHtml(vista,controlador,contenedor,subnivel,parametros);
	});

	
	// $("#menu_admin_foto_personal").on("click", function(event){
	// 	var vista = 'vistas/demo/camara_demo.php';
	// 	var controlador = 'vistas/demo/camara_demo.js';
	// 	var contenedor = '';
	// 	//var nivel = 'Inicio';
	// 	var subnivel= 'Administrar - ' + $(this).text();
	// 	var parametros = 'dptouser='+dptouser + '&cargouser='+cargouser + '&userestatus='+userestatus +  '&userced='+userced + '&';
	// 	CargarHtml(vista,controlador,contenedor,subnivel,parametros);
	// });


	 // 
	 // #     #  #######  #     #  #     # 
	 // ##   ##  #        ##    #  #     # 
	 // # # # #  #        # #   #  #     # 
	 // #  #  #  #####    #  #  #  #     # 
	 // #     #  #        #   # #  #     # 
	 // #     #  #        #    ##  #     # 
	 // #     #  #######  #     #   #####  
	 // 
	 // 
	 // 
	 // 
	// ALMACEN
	
	// ROOT
	// ######  ####### ####### #######
	// #     # #     # #     #    #
	// #     # #     # #     #    #
	// ######  #     # #     #    #
	// #   #   #     # #     #    #
	// #    #  #     # #     #    #
	// #     # ####### #######    #
	
	$('#menu_admin_gestionar_planteles, #menu_admin_asignar_autoridades').on("click", function(event){
		console.log($(this).attr('id') + " --> " +  $(this).text());
	});

	// ADMIN - ROOT - ADMINISTRAR - PLANTELES
	$("#menu_admin_gestionar_planteles").on("click", function(event){
		var vista = 'vistas/vista_admin_gestionar_planteles.php';
		var controlador = 'controladores/controller.admin.gestionar.planteles.js';
		var contenedor = '';
		var subnivel= 'Administrar - ' + $(this).text();
		var parametros = 'dptouser='+dptouser + '&cargouser='+cargouser + '&userestatus='+userestatus +  '&userced='+userced + '&sesionencode=' + sesionencode + '&';
		CargarHtml(vista,controlador,contenedor,subnivel,parametros);
	});


	// ADMIN - ROOT - ADMINISTRAR - PLANTELES
	$("#menu_admin_asignar_autoridades").on("click", function(event){
		var vista = 'vistas/vista_admin_asignar_autoridades.php';
		var controlador = 'controladores/controller.admin.asignar.autoridades.js';
		var contenedor = '';
		var subnivel= 'Administrar - ' + $(this).text();
		var parametros = 'dptouser='+dptouser + '&cargouser='+cargouser + '&userestatus='+userestatus +  '&userced='+userced + '&sesionencode=' + sesionencode + '&';
		CargarHtml(vista,controlador,contenedor,subnivel,parametros);
	});
	//
	//
	// ADMIN - ROOT - 
	// 		
	//  #   #   ##    #  #   ###    #   #  ###    ####   #  #   #####   ##           ###    ####   ###     ##     ##    #  #     #    #
	//  ## ##  #  #   #  #    #     ## ##   #     #      ## #     #    #  #          #  #   #      #  #   #  #   #  #   ## #    # #   #
	//  # # #  #  #   #  #    #     # # #   #     ###    # ##     #    #  #          #  #   ###    #  #    #     #  #   # ##   #   #  #
	//  # # #  #  #   ####    #     # # #   #     #      #  #     #    #  #          ###    #      ###      #    #  #   #  #   #####  #
	//  #   #  #  #    ##     #     #   #   #     #      #  #     #    #  #          #      #      #  #   #  #   #  #   #  #   #   #  #
  	//  #   #   ##     ##    ###    #   #  ###    ####   #  #     #     ##           #      ####   #  #    ##     ##    #  #   #   #  ####	
	// ADMIN - ROOT - MOVIMIENTO PERSONAL
	$("#menu_admin_movimiento_personal").on("click", function(event){
		var vista = 'vistas/vista_admin_movimiento_personal.php';
		var controlador = 'controladores/controller.admin.movimiento.personal.js';
		var contenedor = '';
		var subnivel= 'Administrar - ' + $(this).text();
		var parametros = 'dptouser='+dptouser + '&cargouser='+cargouser + '&userestatus='+userestatus +  '&userced='+userced + '&sesionencode=' + sesionencode + '&';
		CargarHtml(vista,controlador,contenedor,subnivel,parametros);
	});
	//
	//
	// ADMIN - ROOT - 
	// 
	//  ###    ####   ###     ##    ###    #####  ####          ###    ####   ###     ##     ##    #  #     #    #
	//  #  #   #      #  #   #  #   #  #     #    #             #  #   #      #  #   #  #   #  #   ## #    # #   #
	//  #  #   ###    #  #   #  #   #  #     #    ###           #  #   ###    #  #    #     #  #   # ##   #   #  #
	//  ###    #      ###    #  #   ###      #    #             ###    #      ###      #    #  #   #  #   #####  #
	//  #  #   #      #      #  #   #  #     #    #             #      #      #  #   #  #   #  #   #  #   #   #  #
	//  #  #   ####   #       ##    #  #     #    ####          #      ####   #  #    ##     ##    #  #   #   #  ####
	//                                                   #####
	$("#menu_admin_reporte_personal").on("click", function(event){
		var vista = 'vistas/vista_admin_reporte_personal.php';
		var controlador = 'controladores/controller.admin.reporte_personal.js';
		var contenedor = '';
		var subnivel= 'Administrar - ' + $(this).text();
		var parametros = 'dptouser='+dptouser + '&cargouser='+cargouser + '&userestatus='+userestatus +  '&userced='+userced + '&sesionencode=' + sesionencode + '&';
		CargarHtml(vista,controlador,contenedor,subnivel,parametros);
	});

	// ADMIN - ROOT
	// 
	//    #    ###    ####   ###    #####  #  #   ###      #           #   #  #  #   #  #   ###     ##    ###    ###    ###     ##     ##
	//   # #   #  #   #      #  #     #    #  #   #  #    # #          ## ##  #  #   ## #    #     #  #    #     #  #    #     #  #   #  #
	//  #   #  #  #   ###    #  #     #    #  #   #  #   #   #         # # #  #  #   # ##    #     #       #     #  #    #     #  #    #
	//  #####  ###    #      ###      #    #  #   ###    #####         # # #  #  #   #  #    #     #       #     ###     #     #  #     #
	//  #   #  #      #      #  #     #    #  #   #  #   #   #         #   #  #  #   #  #    #     #  #    #     #       #     #  #   #  #
	//  #   #  #      ####   #  #     #     ##    #  #   #   #         #   #   ##    #  #   ###     ##    ###    #      ###     ##     ##
	//                                                          #####
	$("#menu_root_apertura_municipios").on("click", function(event){
		var vista = 'vistas/vista_root_apertura_municipios.php';
		var controlador = 'controladores/controller.root.apertura.municipios.js';
		var contenedor = '';
		var subnivel= 'Administrar - ' + $(this).text();
		var parametros = 'dptouser='+dptouser + '&cargouser='+cargouser + '&userestatus='+userestatus +  '&userced='+userced + '&sesionencode=' + sesionencode + '&';
		CargarHtml(vista,controlador,contenedor,subnivel,parametros);
	});
	


	 // #######                                                                  #####                                                                  
	 // #        #    #  #    #   ####   #   ####   #    #  ######   ####       #     #  ######  #    #  ######  #####     ##    #       ######   ####  
	 // #        #    #  ##   #  #    #  #  #    #  ##   #  #       #           #        #       ##   #  #       #    #   #  #   #       #       #      
	 // #####    #    #  # #  #  #       #  #    #  # #  #  #####    ####       #  ####  #####   # #  #  #####   #    #  #    #  #       #####    ####  
	 // #        #    #  #  # #  #       #  #    #  #  # #  #            #      #     #  #       #  # #  #       #####   ######  #       #            # 
	 // #        #    #  #   ##  #    #  #  #    #  #   ##  #       #    #      #     #  #       #   ##  #       #   #   #    #  #       #       #    # 
	 // #         ####   #    #   ####   #   ####   #    #  ######   ####        #####   ######  #    #  ######  #    #  #    #  ######  ######   ####  
	                                                                                                                                                 
	                                                                                                                                                 
	//	* * * * * * Funciones generales * * * * * *
	//	* * * * * * Funciones generales * * * * * *
	//	* * * * * * Funciones generales * * * * * *

	/* @description Permite cargar una Vista HTML con su archivo JS
	 * @param {String} vista URL de la vista html
	 * @param {String} controlador URL del controlador JS
	 * @param {String} nivel Valor del Breadcund Nivel
	 * @param {String} subnivel Valor del Breadcund subnivel
	 */
	function CargarHtml(vista,controlador,contenedor,subnivel,parametros) {
		//console.log(parametros);
		controlador || ( controlador = null ) ;
		contenedor || ( contenedor = '#content') ;
		parametros || ( parametros = '') ;
		//console.log(parametros);
		var dato_usuario = parametros;
		
		$(contenedor).html('<span class="timer" id="timer"></span>Cargando por favor espere');
		// * * * * * * * * * * * * * * * * * * * * * * *
		//Cargamos el Archivo HTML/PHP
		$.ajax({
			type: 'POST',
			url: vista,
			//encoding:"UTF-8",
			//contentType: "charset=utf-8", 
			//data: 'name_user='+name_user+'&foto_user='+foto_user+'&token1='+rand_code(),
			data: parametros + 'token1='+rand_code(),
			success:function(response){
				$('#breadcrumb_subnivel').html(subnivel);
				$('#header_principal').html(subnivel);
				
				$(contenedor).html(response);
				if (controlador!=null) {
					CargarJS(controlador)
				}
			},
			error:function(){
				$(contenedor).html('<span class="timer" id="timer"></span>' + msj('res_err'));
				MostrarNotificacion(msj('res_err'));
				redireccion(1,5000);
			}
		});
	}
	/* @description Permite cargar una Vista HTML con su archivo JS
	 * @param {String} vista URL de la vista html
	 * @param {String} controlador URL del controlador JS
	 * @param {String} contenedor Nombre del Contenedor
	 * @param {String} parametro Parametros adicionales
	 */
	function CargarHtmlSencillaDiv1(vista,controlador,contenedor,parametros) {
		// console.info(vista,controlador,contenedor,parametros);
		alert(vista,controlador,contenedor,parametros);
		$(contenedor).html('<span class="timer" id="timer"></span>Cargando por favor espere');
		$.ajax({
			type: 'POST',
			url: vista,
			data: parametros + 'token1='+rand_code(),
			success:function(response){
				$(contenedor).hide()
				$(contenedor).html(response);
				$(contenedor).fadeIn()
				if (controlador!=null) {
					CargarJS2(controlador)
				}
			},
			error:function(){
				$(contenedor).html('<span class="timer" id="timer"></span>' + msj('res_err'));
				MostrarNotificacion(msj('res_err'));
				// // redireccion(1,5000);
			}
		});
	}
	/* @description Permite cargar una Vista HTML con su archivo JS
	 * @param {String} vista URL de la vista html
	 * @param {String} controlador URL del controlador JS
	 * @param {String} contenedor Nombre del Contenedor
	 * @param {String} parametro Parametros adicionales
	 */
	function CargarHtmlSencilla(vista,controlador,contenedor,parametros) {
		controlador || ( controlador = null ) ;
		contenedor || ( contenedor = '#content') ;
		parametros || ( parametros = '') ;
		$(contenedor).html('<span class="timer" id="timer"></span>Cargando por favor espere');
		// * * * * * * * * * * * * * * * * * * * * * * *
		//Cargamos el Archivo HTML/PHP
		$.ajax({
			type: 'POST',
			url: vista,
			data: parametros + 'token1='+rand_code(),
			success:function(response){
				$(contenedor).html(response);
				if (controlador!=null) {
					CargarJS(controlador)
				}
			},
			error:function(){
				$(contenedor).html('<span class="timer" id="timer"></span>' + msj('res_err'));
				MostrarNotificacion(msj('res_err'));
				// redireccion(1,5000);
			}
		});
	}
	/* @description Permite cargar una Vista HTML con su archivo JS
	 * @param {String} vista URL de la vista html
	 * @param {String} controlador URL del controlador JS
	 * @param {String} nivel Valor del Breadcund Nivel
	 * @param {String} subnivel Valor del Breadcund subnivel
	 */
	function CargarHtmlInicio(vista,controlador,contenedor,subnivel) {
		controlador || ( controlador = null ) ;
		var name_user = $('#name_user').text();
		var foto_user    = $('#foto_user').attr('src');
		$('#content').html('<span class="timer" id="timer"></span>Cargando por favor espere');
		// * * * * * * * * * * * * * * * * * * * * * * *
		//Cargamos el Archivo HTML/PHP
		$.ajax({
			type: 'POST',
			url: vista,
			//encoding:"UTF-8",
			//contentType: "charset=utf-8", 
			data: 'name_user='+name_user+'&foto_user='+foto_user+'&token1='+rand_code(),
			success:function(response){
				$('#breadcrumb_subnivel').html(subnivel);
				$('#content').html(response);
				if (controlador!=null) {
					CargarJS(controlador)
				}
			},
			error:function(){
				$('#content').html('<span class="timer" id="timer"></span>' + msj('res_err'));
				MostrarNotificacion(msj('res_err'));
				redireccion(1,1000);
			}
		});
	}
	
	function Consulta_Ajax_Modal(accion,servicio,parametros,contenedor) {
		//console.log("Consulta_Ajax");
		accion || ( accion = null ) ;
		servicio || ( servicio = null ) ;
		parametros || ( parametros = '') ;
		contenedor || ( contenedor = '#content') ;
		//servicio = "servicios/servicios.admin.cargos.php?nocache=" + Math.random();
		$(contenedor).html('<span class="timer" id="timer"></span>Enviando datos... por favor espere');
		// * * * * * * * * * * * * * * * * * * * * * * *
		//Cargamos el Archivo HTML/PHP    
		$.ajax({
			type: 'POST',
			url: servicio,
			//encoding:"UTF-8",
			//contentType: "charset=utf-8", 
			data: parametros + "&token1="+rand_code(),
			success:function(response){
				$(contenedor).html(response);
			},
			error:function(){
				$(contenedor).html('<span class="timer" id="timer"></span>' + msj('res_err'));
				MostrarNotificacion(msj('res_err'));
				redireccion(1,10000);
			}
		});    
	}

	/* @description Permite cargar un archivo JS
	 * @param {String} controlador URL del controlador JS
	 */
	function CargarJS(controlador) {
		//code
		// * * * * * * * * * * * * * * * * * * * * * * *
		//Cargamos el Archivo JS
		// console.info(controlador);
		$.getScript(controlador)
		.done(function( script, textStatus ) {
			//console.log( textStatus );
		})
		.fail(function( jqxhr, settings, exception ) {
			//$( "#div.log" ).text( "Triggered ajaxError handler." );
			// console.log(jqxhr);
			// console.log(settings);
			// console.log(exception);
			MostrarNotificacion('CargarJS Triggered ajax Error handler.');
		});
	}
	/*
		pruebafuncion
	 */
	function pruebafuncion() {
		//code
		console.log("pruebafuncion");
	}
	/*
		redireccion
	 */
	function redireccion(link,tiempo){
		//console.log('redireccionando ' + hora() );
		link || ( link = 0) ;
		tiempo || ( tiempo = 500 );
		if (link==0) {
			link='servicios/logout.php';
		}
		if (link==1) {
			link='main.php';
		}
		setTimeout(function(){
			window.location.href = link;
		},(timeSlide + tiempo));
	}

	function SessionKiller() {
		var mensajesalir = tildes_unicode('Cerrando la sesión');
		$('#content').html('<span class="timer" id="timer"></span>' + msj('ini_out'));
		$('#timer').fadeIn(300);
		$('#alertBoxes').html('<div class="box-success"></div>');
		$('.box-danger').hide(0).html('Espera un momento&#133;');
		$('.box-danger').slideDown(timeSlide);
		redireccion(0,10);
	}
});

// *****************************************************************************************
// *****************************************************************************************
// *****************************************************************************************
//  ___            __     __        ___  __      ___     ___  ___  __             __
// |__  |  | |\ | /  ` | /  \ |\ | |__  /__`    |__  \_/  |  |__  |__) |\ |  /\  /__`     /\
// |    \__/ | \| \__, | \__/ | \| |___ .__/    |___ / \  |  |___ |  \ | \| /~~\ .__/    /~~\

//  __   __   __              ___      ___      __   ___       __
// |  \ /  \ /  ` |  |  |\/| |__  |\ |  |      |__) |__   /\  |  \ \ /
// |__/ \__/ \__, \__/  |  | |___ | \|  |  .   |  \ |___ /~~\ |__/  |
// 
// *****************************************************************************************
// *****************************************************************************************
// *****************************************************************************************


function pruebafuncion2() {
	//code
	console.log("pruebafuncion2");
}
/* @description Permite cargar una Vista HTML con su archivo JS
 * @param {String} vista URL de la vista html
 * @param {String} controlador URL del controlador JS
 * @param {String} contenedor Nombre del Contenedor
 * @param {String} parametro Parametros adicionales
 */
function CargarHtmlSencillaDiv2(vista,controlador,contenedor,parametros) {
	// console.info(vista,controlador,contenedor,parametros);
	// alert(vista,controlador,contenedor,parametros);
	$(contenedor).html('<span class="timer" id="timer"></span>Cargando por favor espere');
	$.ajax({
		type: 'POST',
		url: vista,
		data: parametros + 'token1='+rand_code(),
		success:function(response){
			$(contenedor).hide()
			$(contenedor).html(response);
			$(contenedor).fadeIn()
			if (controlador!=null) {
				CargarJS2(controlador)
			}
		},
		error:function(){
			// $(contenedor).html('<span class="timer" id="timer"></span>' + msj('res_err'));
			MostrarNotificacion(msj('res_err'));
			// // redireccion(1,5000);
		}
	});
}
function CargarHtmldiv() {
	console.info('CargarHtmldiv');
}
/* @description Permite cargar un archivo JS
 * @param {String} controlador URL del controlador JS
 */
function CargarJS2(controlador) {
	//code
	// * * * * * * * * * * * * * * * * * * * * * * *
	//Cargamos el Archivo JS
	$.getScript( controlador)
	.done(function( script, textStatus ) {
		//console.log( textStatus );
	})
	.fail(function( jqxhr, settings, exception ) {
		//$( "#div.log" ).text( "Triggered ajaxError handler." );
		MostrarNotificacion('CargarJS Triggered ajax Error handler.');
	});
}
/* @description Consulta Ajax retorna arreglo en json
 * @param {accion} valor del accion
 * @param {servicio} url del sercvio php
 * @param {parmetros} parametros adicionales 
 */
function Consulta_Ajax_JSON(accion,servicio,parametros) {
		//console.log("Consulta_Ajax");
		accion || ( accion = null ) ;
		servicio || ( servicio = null ) ;
		parametros || ( parametros = '') ;
		// console.log(accion,servicio);
		// console.log(parametros);
		//contenedor || ( contenedor = '#content') ;
		//servicio = "servicios/servicios.admin.cargos.php?nocache=" + Math.random();
		//$(contenedor).html('<span class="timer" id="timer"></span>Enviando datos... por favor espere');
		// * * * * * * * * * * * * * * * * * * * * * * *
		//Cargamos el Archivo HTML/PHP    
		$.ajax({
			type: 'POST',
			url: servicio,
			//encoding:"UTF-8",
			//contentType: "charset=utf-8", 
			data: parametros + "&token1="+rand_code(),
			success:function(response){
				//console.log(response);
				//var objeto = JSON.parse(response);
				//console.log(objeto);
				return(response)
				//$('#content').html(JSON.parse(response));
			},
			error:function(){
				//$(contenedor).html('<span class="timer" id="timer"></span>' + msj('res_err'));
				MostrarNotificacion(msj('res_err'));
				//redireccion(1,10000);
			}
		});    
	}
	// 
	function existeUrl(url) {
		var http = new XMLHttpRequest();
		http.open('HEAD', url, false);
		http.send();
		return http.status!=404;
	}
// * * * * * * Chuletarios * * * * * * * * *
// * * * * * * Chuletarios * * * * * * * * *
// * * * * * * Chuletarios * * * * * * * * *

//    class="content' 	-> $('.content')
//    id="content' 	-> $('#content')

//var valorInput = $("#unInput").val();
//var valorSpan = $("#unSpan").text();
//var valorDiv = $("#unDiv").html();



// ######   #######  ######    #####   #######  #     #     #     #       
// #     #  #        #     #  #     #  #     #  ##    #    # #    #       
// #     #  #        #     #  #        #     #  # #   #   #   #   #       
// ######   #####    ######    #####   #     #  #  #  #  #     #  #       
// #        #        #   #          #  #     #  #   # #  #######  #       
// #        #        #    #   #     #  #     #  #    ##  #     #  #       
// #        #######  #     #   #####   #######  #     #  #     #  ####### 



//  #####   #######   #####   ######            ######   #######  ######    #####   #######  #     #     #     #       
// #     #  #        #     #  #     #           #     #  #        #     #  #     #  #     #  ##    #    # #    #       
// #        #        #        #     #           #     #  #        #     #  #        #     #  # #   #   #   #   #       
//  #####   #####    #        ######            ######   #####    ######    #####   #     #  #  #  #  #     #  #       
//       #  #        #        #   #    ###      #        #        #   #          #  #     #  #   # #  #######  #       
// #     #  #        #     #  #    #   ###      #        #        #    #   #     #  #     #  #    ##  #     #  #       
//  #####   #######   #####   #     #  ###      #        #######  #     #   #####   #######  #     #  #     #  ####### 



//       #  #     #  ######   ###  ######   ###   #####      #    
//       #  #     #  #     #   #   #     #   #   #     #    # #   
//       #  #     #  #     #   #   #     #   #   #         #   #  
//       #  #     #  ######    #   #     #   #   #        #     # 
// #     #  #     #  #   #     #   #     #   #   #        ####### 
// #     #  #     #  #    #    #   #     #   #   #     #  #     # 
//  #####    #####   #     #  ###  ######   ###   #####   #     # 



// #        ###   #####   #######  #     #   #####   ###     #    
// #         #   #     #  #        ##    #  #     #   #     # #   
// #         #   #        #        # #   #  #         #    #   #  
// #         #   #        #####    #  #  #  #         #   #     # 
// #         #   #        #        #   # #  #         #   ####### 
// #         #   #     #  #        #    ##  #     #   #   #     # 
// #######  ###   #####   #######  #     #   #####   ###  #     # 



// ######   ###  #######  #     #  #######   #####   #######     #     ######  
// #     #   #   #        ##    #  #        #     #     #       # #    #     # 
// #     #   #   #        # #   #  #        #           #      #   #   #     # 
// ######    #   #####    #  #  #  #####     #####      #     #     #  ######  
// #     #   #   #        #   # #  #              #     #     #######  #   #   
// #     #   #   #        #    ##  #        #     #     #     #     #  #    #  
// ######   ###  #######  #     #  #######   #####      #     #     #  #     # 


                                                                                                 
 //      #  ######  ######  ######      #  #    #  #    #  ######  #####   #    ##    #####   ####  
 //      #  #       #       #           #  ##   #  ##  ##  #       #    #  #   #  #     #    #    # 
 //      #  #####   #####   #####       #  # #  #  # ## #  #####   #    #  #  #    #    #    #    # 
 //      #  #       #       #           #  #  # #  #    #  #       #    #  #  ######    #    #    # 
 // #    #  #       #       #           #  #   ##  #    #  #       #    #  #  #    #    #    #    # 
 //  ####   ######  #       ######      #  #    #  #    #  ######  #####   #  #    #    #     ####  
                                                                                                 