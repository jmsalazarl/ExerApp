oira<?php
if (! defined ( 'ExerApp' )) {
	die ( "Logged Hacking attempt!" );
}
if (!empty($_POST['login'])){
include_once (CORE_DIR . '/security/check.login.php');
}
if (!empty($_POST['registro'])){
include_once (CORE_DIR . '/security/check.registro.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Entrar al sistema - ExerApp</title>

		<meta name="description" content="Panel de inicio de sesion" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />


		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

	</head>

	<body class="login-layout blur-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">Sistema </span>
									<span class="white" id="id-text2">de Gestión de Prácticas Pre-Profesionales</span>
								</h1>

							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Por favor introduzca sus datos
											</h4>

											<div class="space-6"></div>

											<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" name="login">
												<fieldset>
												<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input onkeyup="this.value=this.value.toUpperCase()" type="text" name="cedula" id="cedula" required class="form-control" placeholder="Cedula" />
															<i class="ace-icon fa fa-user"></i>
														</span>
														<small class="errorText"></small>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" name="recordar" id="recordar" checked="checked" value="1" />
															<span class="lbl"> Recordarme? </span>
														</label>

														<button type="submit" value="login" name="login" id="login" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Entrar</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													¿Olvidaste tu clave?
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													Me quiero registrar
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Recuperar contraseña
											</h4>

											<div class="space-6"></div>
											<p>
												Coloque su correo electrónico para recibir las instrucciones.
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input onkeyup="this.value=this.value.toUpperCase()" type="email" class="form-control" placeholder="Correo" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Enviar!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Regresar al panel de inicio de sesión
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												Registrar nuevo usuario.
											</h4>

											<div class="space-6"></div>
											<p> Rellene con sus datos para registrarse. </p>

											<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form" name="registro">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input name="cedula" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" type="text" class="form-control" placeholder="Cedula" required />
															<i class="ace-icon fa fa-list-alt"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input name="nombres" onkeyup="this.value=this.value.toUpperCase()" type="text" class="form-control" placeholder="Nombre" id="nombres" required />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input name="apellidos" onkeyup="this.value=this.value.toUpperCase()" type="text" class="form-control" placeholder="Apellido" id="apellidos" required />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>


													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input name="correo" onkeyup="this.value=this.value.toUpperCase()" type="email" class="form-control" placeholder="Correo" required />
															<i class="ace-icon fa fa-envelope-o"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input name="password" type="password" class="form-control" placeholder="Contraseña" required />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<input name="repassword" type="password" class="form-control" placeholder="Repita la Contraseña" required />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-left">
															<h4 class="header green lighter bigger">
																<i class="ace-icon glyphicon glyphicon-user blue"></i>
																Tipo de usuario.
															</h4>

															<p class="lighter bigger"><input type="radio" checked name="nivel" value="2" id="2" onclick="mostrarOcultar()" >Decano</p>
															<p class="lighter bigger"><input type="radio"  name="nivel" value="3" id="3" onclick="mostrarOcultar()" >Tutor Academico</p>
															<p class="lighter bigger"><input type="radio"  name="nivel" value="4" id="4" onclick="mostrarOcultar()" >Tutor Institucional</p>
															<p class="lighter bigger"><input type="radio"  name="nivel" value="5" id="5" onclick="mostrarOcultar()" >Estudiante</p>
														</span>
														<!--div oculto-->

														<!-- div decano -->
														<div id="decano" style="display:none;">
															<label class="block clearfix">
															<span class="block input-icon input-icon-left">
																<h4 class="header green lighter bigger">
																	<i class="ace-icon fa fa-university blue"></i>
																	Decano de que facultad?
																</h4>

																<?php
																include("config.php");
																		/* comprobar la conexión */
																		if (mysqli_connect_error()) {
																		    printf("Falló la conexión: %s\n", mysqli_connect_error());
																		    exit();
																		}
																		    $consulta = "SELECT idFacultad,nombre from Facultad where idFacultad>=0";

																    if ($resultado = mysqli_query($enlace, $consulta)) {
																	        /* Obtener la información del campo para todas las columnas */
																			while ($info_campo = mysqli_fetch_array($resultado)) {
																				//echo $info_campo['nombre']."<br>";
																							?>
																		<p class="lighter bigger"><input type="radio" name="facultad" value="<?php echo $info_campo['idFacultad'];?>"> <?php echo $info_campo['nombre'];?></p>
																		<!-- <i class="ace-icon glyphicon glyphicon-book"></i> -->
															<?php
																			}
																		}
															?>

															</span>
														</label>
														</div>
														<!-- fin decano -->

														<!-- tutor de practicas o academico -->
														<div id="tutor_A" style="display:none;">
															<label class="block clearfix">
															<span class="block input-icon input-icon-left">
																<h4 class="header green lighter bigger">
																	<i class="ace-icon glyphicon glyphicon-edit blue"></i>
																	Carrera a la que pertenece y area/s de práctica asignada/s.
																</h4>
															</span>
																<!-- presentar area segun carrera ....hacer luego cuando haya tiempo -->
																<!-- <select class="form-control">
																<?php

																		// $consulta = "SELECT nombre_carrera,idCarrera from Carrera where idCarrera>=0";
																		//
																    // if ($resultado = mysqli_query($enlace, $consulta)) {
																	  //       /* Obtener la información del campo para todas las columnas */
																		// 	while ($info_campo = mysqli_fetch_array($resultado)) {
																		// 		//echo $info_campo['nombre']."<br>";
																							?>

																					<option>
																						<input type="select" name="carrera" value="<?php //echo $info_campo['idCarrera']?>"/><?php //echo $info_campo['nombre_carrera'];?>
																					</option>

															<?php

																			//}

																		//}
															?>
																</select>

																<?php
																		// $consulta = "SELECT nombre,idArea_Practica from Carrera,Area_Practica where carrera_area_practica=idCarrera";
																		// if ($resultado = mysqli_query($enlace, $consulta)) {
																	  //       /* Obtener la información del campo para todas las columnas */
																		// 	while ($info_campo = mysqli_fetch_array($resultado)) {
																 ?>
																	<p class="lighter bigger"><input type="radio" name="area" value="<?php //echo $info_campo['idArea_Practica'];?>"><?php //echo $info_campo['nombre'];?></p>
																	<?php
																			//}
																		//}
																	 ?> -->



															<span class="block input-icon input-icon-left">
																<input type="text" name="carrera_tutor_prac" class="form-control" placeholder="Carrera"/>
																<i class="ace-icon glyphicon glyphicon-bookmark"></i>
															</span>
															<span class="block input-icon input-icon-left">
																<input type="text" name="area_tutor_prac" class="form-control" placeholder="Area a cargo"/>
																<i class="ace-icon glyphicon glyphicon-tower"></i>
															</span>
														</label>
														</div>
														<!-- fin tutor de practicas o academico -->
														<!-- tutor institucion  -->
														<div  id="tutor_I" style="display:none;">
															<label class="block clearfix">
															<span class="block input-icon input-icon-left">
																<input name="institucion" type="text" class="form-control" placeholder="Empresa a la que pertenece"  />
																<i class="ace-icon glyphicon glyphicon-briefcase"></i>
															</span>
															<!-- <span class="block input-icon input-icon-left">
																<input name="cargo" type="text" class="form-control" placeholder="Cargo" />
																<i class="ace-icon glyphicon glyphicon-knight"></i>
															</span> -->
															</label>
														</div>
														<!-- fin tutor institucion -->
														<!-- Estudiante -->
														<div  id="Estudiante" style="display:none;">
															<label class="block clearfix">
															<span class="block input-icon input-icon-left">
																<input name="carrera_est" type="text" class="form-control" placeholder="Carrera" />
																<i class="ace-icon glyphicon glyphicon-education"></i>
															</span>
															</label>
														</div>
														<!-- fin Estudiante -->
													</label>

													<label class="block">
														<input type="checkbox" class="ace" required/>
														<span class="lbl">
															Acepto los
															<a href="#">Términos y condiciones</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Limpiar</span>
														</button>

														<button type="submit" value="registro" name="registro" id="registro" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Registrar</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>
										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Regresar al panel de inicio de sesión.
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- ocultar divs por cada usuario -->
		<script type="text/javascript">

   			function mostrarOcultar(){
				//document.write("Hola mundo")
				//Si la opcion con id Conocido_1 (dentro del documento > formulario con name fcontacto >     y a la vez dentro del array de Conocido) esta activada
				if (document.getElementById('2').checked == true
					&& document.getElementById('3').checked == false
					&& document.getElementById('4').checked == false
					&& document.getElementById('5').checked == false) {
					//document.write(valor);
					//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
					document.getElementById('decano').style.display='block';
					//por el contrario, si no esta seleccionada
				}else {
					document.getElementById('decano').style.display='none';
				}

				if (document.getElementById('3').checked == true
					&& document.getElementById('2').checked == false
					&& document.getElementById('4').checked == false
					&& document.getElementById('5').checked == false) {
					//document.write(valor);
					//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
					document.getElementById('tutor_A').style.display='block';
					//por el contrario, si no esta seleccionada
				}else {
					document.getElementById('tutor_A').style.display='none';
				}

				if (document.getElementById('4').checked == true
					&& document.getElementById('2').checked == false
					&& document.getElementById('3').checked == false
					&& document.getElementById('5').checked == false) {
					//document.write(valor);
					//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
					document.getElementById('tutor_I').style.display='block';
					//por el contrario, si no esta seleccionada
				}else {
					document.getElementById('tutor_I').style.display='none';
				}

				if (document.getElementById('5').checked == true
					&& document.getElementById('2').checked == false
					&& document.getElementById('3').checked == false
					&& document.getElementById('4').checked == false) {
					//document.write(valor);
					//muestra (cambiando la propiedad display del estilo) el div con id 'desdeotro'
					document.getElementById('Estudiante').style.display='block';
					//por el contrario, si no esta seleccionada
				}else {
					document.getElementById('Estudiante').style.display='none';
				}
			}
		</script>

		<!-- basic scripts -->
        <script src="assets/js/jquery.gritter.min.js"></script>

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			// automatic modal
			    $(window).load(function(){
        		$('#Alerta').modal('show');
    			});


			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');

				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');

				e.preventDefault();
			 });

			});
		</script>
	</body>
</html>
