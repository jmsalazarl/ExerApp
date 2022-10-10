<?php

if (!defined('ExerApp')) {
    die('Logged Hacking attempt!');
}
    //comienzo del registro de los profesores.
    if (!empty($_POST['registro'])) {

        /// Si todo pasa enviamos los datos a la base de datos mediante PDO para evitar Inyecciones SQL
        $query = 'INSERT INTO Tarea (idTarea,tipo,estado,titulo,descripcion,hora_inicio,hora_finalizacion,lugar_ejecucion)
                  VALUES (:idTarea,:tipo,:estado,:titulo,:descripcion,:hora_inicio,:hora_finalizacion,:lugar_ejecucion)';
        $query_params = array(
            ':idTarea' => $_POST[''],
            ':tipo' => $_POST['tipo'],
            ':estado' => $_POST['estado'],
            ':titulo' => $_POST['titulo'],
            ':descripcion' => $_POST['descripcion'],
            ':hora_inicio' => $_POST['hora_inicio'],
            ':hora_finalizacion' => $_POST['hora_finalizacion'],
            ':lugar_ejecucion' => $_POST['lugar_ejecucion']
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
        header('Location: index.php?do=listarActividades');
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
