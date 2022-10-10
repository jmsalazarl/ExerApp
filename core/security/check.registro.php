<?php
if (! defined ( 'ExerApp' )) {
    die ( "Logged Hacking attempt!" );
}
if (!empty($_POST['registro']))
    {
        $query = "
            SELECT *
            FROM Usuario
            WHERE cedula = :cedula
        ";
        $query_params = array( ':cedula' => $_POST['cedula'] );
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }
        catch(PDOException $ex){
		echo "<div class='panel-body'>
        		<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Tenemos problemas al ejecutar la consulta :c El error es el siguiente:
				</div>" .$ex->getMessage();
				exit;
		}
        $row = $stmt->fetch();
        if($row){
				echo "<div class='panel-body'>
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Esta cedula ya esta en uso. Intenta con otra.
					</div>";
					header('Location: index.php?accion=error');
					exit;
		      }
        // TESTING NIVEL 1 = ADMINISTRADOR.
        // NIVEL 2 = DECANO.
        // NIVEL 3 = TUTOR DE PRACTICAS.
        // NIVEL 3 = TUTOR DE LA INSTITUCIÓN.
        // NIVEL 4 = ESTUDIANTE.

        //FUNCION PARA ENCRIPTAR CONTRASEÑAS
        function encriptar_password($password){
          //encriptación de password
          $salt = str_replace('=', '.', base64_encode(mcrypt_create_iv(20)));
          $password = hash('sha512', $password . $salt);
          for($round = 0; $round < 65536; $round++){
          $password = hash('sha512', $password . $salt);
          }
          return array($password, $salt);
        }

        //consulta para guardar usuario
        $inserta_usuario="INSERT INTO Usuario(cedula,nombres,apellidos,correo,password,nivel,salt) VALUES (
                :cedula,:nombres,:apellidos,:correo,:password,:nivel,:salt)";
        //consulta para insertar un decano
        $inserta_decano="INSERT INTO Decano(cedula_dec,facultad) VALUES (:cedula_dec,:facultad)";
        //insertar un tutor de practicas
        $inserta_tutor_practicas="INSERT INTO Tutor_Practicas(cedula_tutor_prac,carrera_tutor_prac,area_tutor_prac) VALUES (
                                  :cedula_tutor_prac,:carrera_tutor_prac,:area_tutor_prac)";
        //insertar un tutor de la institucion
        $inserta_tutor_institucion="INSERT INTO Tutor_Institucion(cedula_tutor_inst,institucion) VALUES(
                                  :cedula_tutor_inst,:institucion)";
        //insertar un ESTUDIANTE
        $inserta_estudiante="INSERT INTO Estudiante(cedula_est,carrera_est) VALUES(
                                  :cedula_est,:carrera_est)";
        //actualizar area/s que tiene cada tutor de practicas
        //$actualiza_area_tutor="UPDATE tutor_a_cargo=:tutor_a_cargo from Area_Practica where idArea_Practica=:idArea_Practica";
        // aquí se registrara cada atributo a la base de datos segun el usuario
        //si usuario=decano
        if ($_POST['nivel']=="2") {
            //encriptación de password
            list($password,$salt)=encriptar_password($_POST['password']);
            //registro de usuario en la base
            $inserta_usuario_db=array(':cedula' => $_POST['cedula'], ':nombres' => $_POST['nombres'],
                                      ':apellidos' => $_POST['apellidos'],':correo' => $_POST['correo'],
                                      ':password' => $password,':nivel' => $_POST['nivel'],':salt' => $salt);
            //inserta decano en dase de datos
            $inserta_decano_db=array(':cedula_dec' => $_POST['cedula'],
                                  ':facultad' => $_POST['facultad']);
            try {
                //usuario
                $stmt_u = $db->prepare($inserta_usuario);
                $result_u = $stmt_u->execute($inserta_usuario_db);
                //decano
                $stmt_d = $db->prepare($inserta_decano);
                $result_d = $stmt_d->execute($inserta_decano_db);
                header('Location: index.php?accion=registrado');
                $stmt_u="";
                $result_u="";
            }
            catch(PDOException $ex){
              echo "<div class='panel-body'>
                             <div class='alert alert-warning alert-dismissable'>
                                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                  Tenemos problemas al ejecutar la consulta :c El error es el siguiente:
                  </div>" .$ex->getMessage();
            }
                header('Location: index.php?accion=registrado');

            //si usuario=Tutor de practicas o academico
      }elseif ($_POST['nivel']=="3") {

          //encriptación de password
          list($password,$salt)=encriptar_password($_POST['password']);

          //registro de usuario en la base
          $inserta_usuario_db = array(':cedula' => $_POST['cedula'],':nombres' => $_POST['nombres'],
                                ':apellidos' => $_POST['apellidos'],':correo' => $_POST['correo'],
                                ':password' => $password,':nivel' => $_POST['nivel'],':salt' => $salt);
          //registro de tutor de practicas en la base
          $inserta_tutor_practicas_db = array(
                                        ':cedula_tutor_prac' => $_POST['cedula'],
                                        ':carrera_tutor_prac' => $_POST['carrera_tutor_prac'],
                                        ':area_tutor_prac'  => $_POST['area_tutor_prac']);
          //asignar tutor a una area
          // $actualiza_area_tutor_db=array(':tutor_a_cargo' => $_POST['cedula'],
          //                               ':idArea_Practica' => $_POST['idArea_Practica']);
          try {
            //usuario
              $stmt_u = $db->prepare($inserta_usuario);
              $result_u = $stmt_u->execute($inserta_usuario_db);
              //tuto de practicas
              $stmt_tp = $db->prepare($inserta_tutor_practicas);
              $result_tp = $stmt_tp->execute($inserta_tutor_practicas_db);
              //asignar tutor a una area
              // $stmt_at = $db->prepare($actualiza_area_tutor);
              // $result_at = $stmt_at->execute($actualiza_area_tutor_db);

              header('Location: index.php?accion=registrado');
              $stmt_u="";
              $result_u="";
          }
          catch(PDOException $ex){
        echo "<div class='panel-body'>
                       <div class='alert alert-warning alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            Tenemos problemas al ejecutar la consulta :c El error es el siguiente:
            </div>" .$ex->getMessage();
          }
              header('Location: index.php?accion=registrado');
              //si usuario=Tutor de la institución
      }elseif ($_POST['nivel']=="4") {
        list($password,$salt)=encriptar_password($_POST['password']);

        //registro de usuario en la base
        $inserta_usuario_db = array(':cedula' => $_POST['cedula'],':nombres' => $_POST['nombres'],
                              ':apellidos' => $_POST['apellidos'],':correo' => $_POST['correo'],
                              ':password' => $password,':nivel' => $_POST['nivel'],':salt' => $salt);
        //registro de tutor de practicas en la base
        $inserta_tutor_institucion_db = array(
                                      ':cedula_tutor_inst' => $_POST['cedula'],
                                      ':institucion' => $_POST['institucion']);
        //asignar tutor a una area
        // $actualiza_area_tutor_db=array(':tutor_a_cargo' => $_POST['cedula'],
        //                               ':idArea_Practica' => $_POST['idArea_Practica']);
        try {
          //usuario
            $stmt_u = $db->prepare($inserta_usuario);
            $result_u = $stmt_u->execute($inserta_usuario_db);
            //tuto de practicas
            $stmt_ti = $db->prepare($inserta_tutor_institucion);
            $result_ti = $stmt_ti->execute($inserta_tutor_institucion_db);
            //asignar tutor a una area
            // $stmt_at = $db->prepare($actualiza_area_tutor);
            // $result_at = $stmt_at->execute($actualiza_area_tutor_db);

            header('Location: index.php?accion=registrado');
            $stmt_u="";
            $result_u="";
        }
        catch(PDOException $ex){
      echo "<div class='panel-body'>
                     <div class='alert alert-warning alert-dismissable'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          Tenemos problemas al ejecutar la consulta :c El error es el siguiente:
          </div>" .$ex->getMessage();
        }
          header('Location: index.php?accion=registrado');
            // si usuario= Estudiante
      }elseif ($_POST['nivel']=="5") {
        list($password,$salt)=encriptar_password($_POST['password']);

        //registro de usuario en la base
        $inserta_usuario_db = array(':cedula' => $_POST['cedula'],':nombres' => $_POST['nombres'],
                              ':apellidos' => $_POST['apellidos'],':correo' => $_POST['correo'],
                              ':password' => $password,':nivel' => $_POST['nivel'],':salt' => $salt);
        //registro de tutor de practicas en la base
        $inserta_estudiante_db = array(
                                      ':cedula_est' => $_POST['cedula'],
                                      ':carrera_est' => $_POST['carrera_est']);
        //asignar tutor a una area
        // $actualiza_area_tutor_db=array(':tutor_a_cargo' => $_POST['cedula'],
        //                               ':idArea_Practica' => $_POST['idArea_Practica']);
        try {
          //usuario
            $stmt_u = $db->prepare($inserta_usuario);
            $result_u = $stmt_u->execute($inserta_usuario_db);
            //tuto de practicas
            $stmt_e = $db->prepare($inserta_estudiante);
            $result_e = $stmt_e->execute($inserta_estudiante_db);
            //asignar tutor a una area
            // $stmt_at = $db->prepare($actualiza_area_tutor);
            // $result_at = $stmt_at->execute($actualiza_area_tutor_db);

            header('Location: index.php?accion=registrado');
            $stmt_u="";
            $result_u="";
        }
        catch(PDOException $ex){
      echo "<div class='panel-body'>
                     <div class='alert alert-warning alert-dismissable'>
                          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                          Tenemos problemas al ejecutar la consulta :c El error es el siguiente:
          </div>" .$ex->getMessage();
        }
          header('Location: index.php?accion=registrado');
      }

}
?>
