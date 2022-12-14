<?PHP

if (!defined('ExerApp')) {
    die('Logged Hacking attempt!');
}
include_once CORE_DIR.'/sys_config.php';
require CORE_DIR.'/config.php';
include_once CORE_DIR.'/security/check.loged.php';
include_once CORE_DIR.'/security/check.login.php';
include_once CORE_DIR.'/security/functions.php';
switch ($_GET['do']) {
    case 'panel' :
    if ($login_ok) {
        include_once CORE_DIR.'/modulos/panel.php';
        break;
    } else {
            include_once CORE_DIR.'/modulos/login.php';
        }
    case 'salir' :
        include_once CORE_DIR.'/security/logout.php';
        break;
    case 'listaestudiante' :
    if ($login_ok) {
        include_once CORE_DIR.'/modulos/listaestudiante.php';
        break;
    } else {
            include_once CORE_DIR.'/modulos/login.php';
    }
    case 'registroActividad' :
    if ($login_ok) {
        include_once CORE_DIR.'/modulos/registroActividad.php';
        break;
    } else {
            include_once CORE_DIR.'/modulos/login.php';
    }
    case 'perfil' :
    if ($login_ok) {
        include_once CORE_DIR.'/modulos/perfil.php';
        break;
    } else {
            include_once CORE_DIR.'/modulos/login.php';
            }
    case 'listaprofesor' :
    if ($login_ok) {
        include_once CORE_DIR.'/modulos/listaprof.php';
        break;
    } else {
            include_once CORE_DIR.'/modulos/login.php';
        }
    case 'editar_profesor' :
    if ($login_ok) {
        include_once CORE_DIR.'/modulos/panel.php';
        break;
    } else {
            include_once CORE_DIR.'/modulos/login.php';
        }
    case 'panel' :
    if ($login_ok) {
        include_once CORE_DIR.'/modulos/panel.php';
        break;
    } else {
            include_once CORE_DIR.'/modulos/login.php';
        }
    case 'login' :
    if ($login_ok) {
        include_once CORE_DIR.'/modulos/panel.php';
        break;
    } else {
        include_once CORE_DIR.'/modulos/login.php';
        break;
    }
    default:
    if ($login_ok) {
        include_once CORE_DIR.'/modulos/panel.php';
        break;
    } else {
        include_once CORE_DIR.'/modulos/login.php';
        break;
    }
    }

if (isset($_GET['accion'])) {
    switch ($_GET['accion']) {
    case 'registrado':
        echo "
    	<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
		<div class='modal-dialog'>
            <div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h3>??Felicidades!</h3>
				</div>
				<div class='modal-body'>
					<p>Te has registrado con ??xito!</p>
					<p> Ahora puedes acceder al sistema, por medio del panel que aparecer?? al cerrar esta ventana.</p>
				</div>
				<div class='modal-footer'>
				<button type='button' class='btn btn-info' data-dismiss='modal'>??Entiendo!</button>
				</div>
            </div>
      	  </div>
    	</div>";
    break;
    case 'error':
        echo "
    	<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
		<div class='modal-dialog'>
            <div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h3>??ERROR!</h3>
				</div>
				<div class='modal-body'>
					<p>Este usuario ya esta registrado!</p>
					<p> Intenta con otro usuario</p>
				</div>
				<div class='modal-footer'>
				<button type='button' class='btn btn-info' data-dismiss='modal'>??Entiendo!</button>
				</div>
            </div>
      	  </div>
    	</div>";
    break;
    case 'pass_error':
        echo "
		<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
		 <div class='modal-dialog'>
             <div class='modal-content'>
					  <div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
						<h3>??Houston, tenemos un problema!</h3>
					  </div>
					<div class='modal-body'>
						<p> El usuario y la contrase??a no coinciden con nuestros registros. Contacta al administrador de sistemas, si has olvidado tus datos de inicio de sesion.</p>
					</div>
					<div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>??Entiendo!</button>
				   </div>
                </div>
            </div>
        </div>";
    break;
    case 'log_error':
        echo "<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
		 <div class='modal-dialog'>
             <div class='modal-content'>
				<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h3>??La p??gina est?? protegida!</h3>
					</div>
					<div class='modal-body'>
					<p>Si quieres ingresar a la pagina anterior, debes entrar con tus datos al sistema primero!</p>
					</div>
					<div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>??Entiendo!</button>
					</div>
                </div>
            </div>
        </div>";
    break;
    case 'salir':
      echo "<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
   <div class='modal-dialog'>
             <div class='modal-content'>
          <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h3>??Ha cerrado sesi??n correctamente!</h3>
          </div>
          <div class='modal-body'>
          <p>Hemos cerrado todas las conexiones con el sistema.</p>
          </div>
          <div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>??Entiendo!</button>
           </div>
            </div>
        </div>
    </div>";
    break;
    case 'inactivo':
      echo "
      <div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
   <div class='modal-dialog'>
             <div class='modal-content'>
          <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h3>??Tu cuenta no est?? activada!</h3>
          </div>
          <div class='modal-body'>
          <p>Tu cuenta se encuentra inactiva, espera a que un Adminisrador revise tu registro y te otorge los permisos necesarios.</p>
          </div>
          <div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>??Entiendo!</button>
           </div>
            </div>
        </div>
    </div>";
    break;
    case 'logueado':
      echo "<div class='modal fade' id='Alerta' tabindex='-1' role='dialog' aria-labeledby='AlertaLabel' aria-hidden='false'>
   <div class='modal-dialog'>
             <div class='modal-content'>
          <div class='modal-header'>
      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h3>??Hey que haces!</h3>
          </div>
          <div class='modal-body'>
          <p>No se que intentas, pero esta accion esta prohibida.</p>
          </div>
          <div class='modal-footer'>
<button type='button' class='btn btn-info' data-dismiss='modal'>??Entiendo!</button>
           </div>
            </div>
        </div>
    </div>";
    break;
        } //fin del switch
} //fin del isset accion
;
