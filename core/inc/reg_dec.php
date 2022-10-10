<?php

if (!defined('ExerApp')) {
    die('Logged Hacking attempt!');
}
    //comienzo del registro de los profesores.
    if (!empty($_POST)) {
        /*
         * TODO Arreglar los Echo, por paneles bien hechos.
         TODO: Acomopar las validaciones con sus modales.
         */
        // if (empty($_POST['cedula'])) {
        //     echo "<div class='panel-body'>
        //         <div class='alert alert-warning alert-dismissable'>
        //         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //         Error: Coloque su cedula.</div>
        //     </div>";
        // }
        // if (empty($_POST['nombre'])) {
        //     echo "<div class='panel-body'>
        //         <div class='alert alert-warning alert-dismissable'>
        //         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //         Error: Coloque su nombre.</div>
        //     </div>";
        // }
        // if (empty($_POST['apellido'])) {
        //     echo "<div class='panel-body'>
        //         <div class='alert alert-warning alert-dismissable'>
        //         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //         Error: Coloque su apellido.</div>
        //     </div>";
        // }
        // if (empty($_POST['direccion'])) {
        //     echo "<div class='panel-body'>
        //         <div class='alert alert-warning alert-dismissable'>
        //         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //         Error: Coloque su dirección.</div>
        //     </div>";
        // }
        // if (empty($_POST['telefono'])) {
        //     echo "<div class='panel-body'>
        //         <div class='alert alert-warning alert-dismissable'>
        //         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //         Error: Coloque su teléfono.</div>
        //     </div>";
        // }
        // if (empty($_POST['correo'])) {
        //     echo "<div class='panel-body'>
        //         <div class='alert alert-warning alert-dismissable'>
        //         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //         Error: Coloque su correo.</div>
        //     </div>";
        // }
        // if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
        //     echo "<div class='panel-body'>
        //         <div class='alert alert-warning alert-dismissable'>
        //         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        //         Error: el correo no es valido.</div>
        //     </div>";
        // }
        // // Chequeamos si la cedula existe

        $query = '  SELECT *
            		FROM Decano
            		WHERE cedula = :cedula
        		  ';
        $query_params = array(':cedula' => $_POST['cedula']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } catch (PDOException $ex) {
            /*
        	  TODO: Aqui de igual forma cambiaremos a un modal
        	 */
            die('Fallamos al hacer la busqueda: '.$ex->getMessage());
        }
        $row = $stmt->fetch();
        if ($row) {
            echo "<div class='panel-body'>
                <div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Error: La cédula ya existe.</div>
            </div>";
        }
        $query = 'SELECT *
            	  FROM Decano
            	  WHERE correo = :correo
        		 ';
        $query_params = array(
            ':correo' => $_POST['correo'],
        );
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } catch (PDOException $ex) {
            die('Fallamos al revisar el email.: '.$ex->getMessage());
        }
        $row = $stmt->fetch();
        if ($row) {
            echo "<div class='panel-body'>
                <div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Error: El correo ya esta en uso.</div>
            </div>";
        }
        /// Si todo pasa enviamos los datos a la base de datos mediante PDO para evitar Inyecciones SQL
        $query = '	INSERT INTO Decano (
				                cedula_dec,
				                facultad
				    ) VALUES (
				                :cedula_dec,
				                :facultad
				            )
        		';
        $query_params = array(
            ':cedula_dec' => $_POST['cedula'],
            ':facultad' => $_POST['facultad']
            );
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        } catch (PDOException $ex) {
            // Si tenemos problemas para ejecutar la consulta imprimimos el error
            echo "<div class='panel-body'>
                     <div class='alert alert-warning alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        Tenemos problemas al ejecutar la consulta :c El error es el siguiente:
					</div>
				  </div>".$ex->getMessage();
        }
            // Si todo pasa como deberia ser, referimos al usuario al panel de
            // inicio de sesion con el mensaje de bienvenida.

            /*
            TODO: Implementar un contalizador de errores en un arreglo para mostrarlos con un if

            if(errores){
            showerrors=1;
            else header('Location: index.php?do=aqui');
          }
            */
        header('Location: index.php?do=listaprofesor');
    }

    if (isset($_GET['accion'])) {

    //check the action
    switch ($_GET['accion']) {
        case 'error':
            echo "<div class='panel-body'>
                    <div class='alert alert-success alert-dismissable'>
                      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                      Hay varios errores en tu registro.
                      Si necesitas ayuda puedes hacer clic al botón de Ayuda en el fondo de la página.
					</div>
				</div>";
            break;
    }
    }
