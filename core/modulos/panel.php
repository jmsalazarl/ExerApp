<?php
if (! defined ( 'ExerApp' )) {
	die ( "Logged Hacking attempt!" );
}
$data = getDataBySession($_COOKIE["session"],$db);

$query = "  SELECT  cedula,
										nombres,
										apellidos,
										correo,
										password,
										logueado,
										nivel,
										salt
						FROM  Usuario
						WHERE cookie = :cookie
				 ";
$query_params = array(
		':cookie' => $_COOKIE['session']
);
try{
		$stmt = $db->prepare($query);
		$result = $stmt->execute($query_params);
} //fin try
catch(PDOException $ex){
echo "<div class='panel-body'>
						<div class='alert alert-warning alert-dismissable'>
								<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
								Tenemos problemas al ejecutar la consulta :c El error es el siguiente:
	</div>
</div>" .$ex->getMessage();
}//fin catch

$row = $stmt->fetch();
$nivel=$row['nivel'];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Panel principal</title>
	<?php
		include_once (STATIC_DIR . '/header.php');
		?>
	</head>

	<body class="no-skin">
		<?php
		if ($nivel=='1') {
			include_once (STATIC_DIR . '/menuAdmin.php');
		}elseif ($nivel=='2') {
			include_once (STATIC_DIR . '/menudecano.php');
		}elseif ($nivel=='3') {
			include_once (STATIC_DIR . '/menututordocente.php');
		}elseif ($nivel=='4') {
			include_once (STATIC_DIR . '/menututorinstitucion.php');
		}elseif ($nivel=='5') {
			include_once (STATIC_DIR . '/menuestudiante.php');
		}

		?>
	</head>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Inicio</a>
							</li>
							<li class="active">Principal</li>
						</ul><!-- /.breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Buscar..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>
						<div class="page-header">
							<h1>
								Principal
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Principal.
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="data">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>

									<i class="ace-icon fa fa-check green"></i>

									Bienvenido al
									<strong class="green">
										Sistema de gestión de prácticas pre-profesionales
										<small>(v1.0)</small>
									</strong>, Para comenzar a hacer uso del sistema seleccione algun elemento en el panel izquierdo.
								</div>
									<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.data -->
				</div> <!-- main container inner -->
			</div><!-- /.main-content -->
	<?php include_once (STATIC_DIR . '/footer.php'); 		?>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- inline scripts related to this page -->
		</body>
</html>
