
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
							<i class="menu-icon fa fa-institution"></i>
							<span class="menu-text">DECANO</span>
						</a>

						<b class="ardata"></b>
					</li>

					<li class="">
						<!--<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa  fa-mortar-board"></i>
							<span class="menu-text">
								Decano
							</span>

							<b class="ardata fa fa-angle-down"></b>
						</a>

						<b class="ardata"></b>

						<ul class="submenu">
							<li class="">
								<a href="index.php?do=registroprofesor">
									<i class="menu-icon fa fa-caret-right"></i>

									Registrar decano
								</a>
								</li>

							<li class="">
								<a href="index.php?do=listaprofesor">
									<i class="menu-icon fa fa-caret-right"></i>
									Listar decanos
								</a>

								<b class="ardata"></b>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav nav-list">
					<li class="">-->
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa fa-male"></i>
							<span class="menu-text"> Tutor de prácticas </span>

							<b class="ardata fa fa-angle-down"></b>
						</a>

						<b class="ardata"></b>

						<ul class="submenu">
							<li class="">
									<a href="index.php?do=registrotutorpracticas">
									<i class="menu-icon fa fa-caret-right"></i>
									Registrar tutor de prácticas
								</a>

								<b class="ardata"></b>
							</li>

							<li class="">
								<a href="registro_seccion.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Listar tutores de prácticas
								</a>

								<b class="ardata"></b>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav nav-list">
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa fa-suitcase"></i>
							<span class="menu-text">Instituciones </span>

							<b class="ardata fa fa-angle-down"></b>
						</a>

						<b class="ardata"></b>

						<ul class="submenu">
							<li class="">
								<a href="index.php?do=registroempresa">
									<i class="menu-icon fa fa-caret-right"></i>
									Agregar Institución
								</a>

								<b class="ardata"></b>
							</li>

							<li class="">
								<a href="editar_horario.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Instituciónes Disponibles
								</a>

								<b class="ardata"></b>
							</li>
						</ul><!-- /.nav-list -->
					</ul>
					
					<ul class="nav nav-list">
						<li class="">
							<a href="#" class="dropdown-toggle">
								<i class="fa fa-navicon menu-icon "></i>
								<span class="menu-text"> Carrera </span>

								<b class="ardata fa fa-angle-down"></b>
							</a>

							<b class="ardata"></b>

							<ul class="submenu">
								<li class="">
									<a href="registrar_horario.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Listar Carrera
									</a>

									<b class="ardata"></b>
									
								</li>

								<li class="">
									<!--<a href="editar_horario.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Listar carreras
									</a>-->

									<b class="ardata"></b>
								</li>
							</ul><!-- /.nav-list -->
						</ul>
					<ul class="nav nav-list">
						<li class="">
							<!--<a href="#" class="dropdown-toggle">
								<i class="menu-icon fa  fa-calendar"></i>
								<span class="menu-text"> Area de Practicas </span>

								<b class="ardata fa fa-angle-down"></b>
							</a>

							<b class="ardata"></b>

							<ul class="submenu">
								<li class="">
									<a href="registrar_horario.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Registrar Areas
									</a>

									<b class="ardata"></b>
								</li>

								<li class="">
									<a href="editar_horario.php">
										<i class="menu-icon fa fa-caret-right"></i>
										Listar Areas
									</a>

									<b class="ardata"></b>
								</li>
							</ul><!-- /.nav-list -->
						</ul>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
