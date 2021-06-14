<?php
require('../function/db/config.php');
if($_REQUEST['empid']) {

$deleted_record = 'SIM';	
$sql = "UPDATE pacientes
         SET
            deleted_record = '".$deleted_record."'
 			 WHERE id='".$_REQUEST['empid']."'";

 			 $stmt_update = $pdo->prepare($sql); 
			 //$stmt_update->bindParam(':id', $id); 


if($stmt_update->execute()) {
echo "Paciente apagado com successo!";
}
}
?>