<?php
if (! defined ( 'ExerApp' )) {
  die ( "Logged Hacking attempt!" );
}
if ($_COOKIE["session"]!=""){
$query = "  SELECT  logueado
            FROM    Usuario
            WHERE   cookie = :cookie
         ";
$query_params = array(
                      ':cookie' => $_COOKIE['session']
                    );
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex){
      //echo del error!
    }
$row = $stmt->fetch();
if($row['logueado']=='SI'){
  $login_ok = true;
}else{
  $login_ok = 0;
}
}
?>
