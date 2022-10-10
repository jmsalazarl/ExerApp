<?php
/*
  funcion: Procesa una busqueda en la base de datos de los datos del usuario pedido
  return: Retorna un arreglo con todos los datos del usuario pasado por argumento.
 */
    function getDataBySession($session, PDO $db)
    {
        $query = 'SELECT nombres,
                     apellidos
              FROM   Usuario
              WHERE  cookie = :cedula
             ';
        $query_params = array(
              ':cedula' => $session,
          );
        try {
            $stmt = $db->prepare($query);
            $stmt->execute($query_params);
        } catch (PDOException $ex) {
            echo 'Error > '.$ex->getMessage();
        }
        $dataUsuario = $stmt->fetch();

        return $dataUsuario;
    }
