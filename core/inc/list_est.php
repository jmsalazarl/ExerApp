<?php
$query = "  SELECT  idUsuario,
                    cedula,
                    nombres,
                    apellidos,
                    correo,
                    carrera_est
            FROM    Usuario,Estudiante
            WHERE   cedula=cedula_est;
         ";
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    }
    catch(PDOException $ex){
    echo "Error > " .$ex->getMessage();
    }
    $rows = $stmt->fetchAll();
?>
