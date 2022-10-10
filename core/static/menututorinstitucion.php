
		<div id="navbar" class="navbar navbar-default">
			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-laptop"></i>
							Gestión de Practicas Pre-profesionales.
						</small>
					</a>
				</div>
				<!--menu-->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Foto de <?php echo $data['nombres'] ?>" />
								<span class="user-info">
								Bienvenido: <?php echo $data['nombres']?>
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="configuracion.php">
										<i class="ace-icon fa fa-cog"></i>
										Configuración
									</a>
								</li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-user"></i>
										Perfil
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="index.php?do=salir">
										<i class="ace-icon fa fa-power-off"></i>
										Cerrar sesión
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<div id="sidebar" class="sidebar responsive">
				<ul class="nav nav-list">
					<li class="active">
						<a href="index.php">
							<i class="menu-icon fa fa-linkedin"></i>
							<span class="menu-text">INSTITUCION</span>
						</a>

						<b class="ardata"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa  fa-mortar-board"></i>
							<span class="menu-text">
								Estudiante
							</span>

							<b class="ardata fa fa-angle-down"></b>
						</a>

						<b class="ardata"></b>

						<ul class="submenu">
							<!-- <li class="">
								<a href="index.php?do=registroprofesor">
									<i class="menu-icon fa fa-caret-right"></i>

									Registrar Estudiante
								</a>
								</li> -->

							<li class="">
								<a href="index.php?do=listaestudiante">
									<i class="menu-icon fa fa-caret-right"></i>
									Listar Estudiante
								</a>

								<b class="ardata"></b>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav nav-list">
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list-ol"></i>
							<span class="menu-text"> Actividades </span>

							<b class="ardata fa fa-angle-down"></b>
						</a>

						<b class="ardata"></b>

						<ul class="submenu">
							<li class="">
								<a href="index.php?do=registroActividad">
									<i class="menu-icon fa fa-caret-right"></i>
									Agregar Actividades
								</a>

								<b class="ardata"></b>
							</li>

							<li class="">
								<a href="editar_seccion.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Listar actividades
								</a>

								<b class="ardata"></b>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav nav-list">
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Asistencia </span>

							<b class="ardata fa fa-angle-down"></b>
						</a>

						<b class="ardata"></b>

						<ul class="submenu">
							<li class="">
								<a href="index.php?do=registroasistencia">
									<i class="menu-icon fa fa-caret-right"></i>
									Registrar Asistencia
								</a>

								<b class="ardata"></b>
							</li>

							<li class="">
								<a href="editar_horario.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Listar Asistencia
								</a>

								<b class="ardata"></b>
							</li>
						</ul><!-- /.nav-list -->
					</ul>
					<!--<ul class="nav nav-list">
						<li class="">
							<a href="#" class="dropdown-toggle">
								<i class="menu-icon fa  fa-calendar"></i>
								<span class="menu-text"> Estudiante </span>

								<b class="ardata fa fa-angle-down"></b>
							</a>

							<b class="ardata"></b>

							<ul class="submenu">
								<li class="">
									<a href="registrar_horario.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Registrar estudiante
									</a>

									<b class="ardata"></b>
								</li>

								<li class="">
									<a href="editar_horario.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Listar estudiantes
									</a>

									<b class="ardata"></b>
								</li>
							</ul><!-- /.nav-list
						</ul>-->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
